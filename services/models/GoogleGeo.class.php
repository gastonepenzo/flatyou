<?php

namespace Flatyou\Models;

class GoogleGeo extends Model
{   
    public static function get_position_from_address($cap, $town, $province, $address = null, $number = null)
    {
        $full_address = $cap . ' ' . $town . ' ' . $province . ', Italia';
        if($address)
        {
            if($number)
            {
                $full_address = $address . ', ' . $number . ', ' . $full_address;
            }
            else
            {
                $full_address = $address . ', ' . $full_address;
            }
        }
        
        $google_maps_api_key = $GLOBALS['settings']['settings']['google']['maps_api_key'];
        $url = 'https://maps.googleapis.com/maps/api/geocode/json?address=' . urlencode($full_address) . '&key=' . $google_maps_api_key;
        $res = file_get_contents($url);
        if($res)
        {
            $res_decoded = (array)json_decode($res);
            if($res_decoded['status'] == 'OK')
            {
                $lat  = $res_decoded['results'][0]->geometry->location->lat;
                $lng  = $res_decoded['results'][0]->geometry->location->lng;
                $type = $res_decoded['results'][0]->geometry->location_type;
                switch ($type)
                {
                    case 'ROOFTOP';
                        $type_label = 'precise';
                        break;
                    case 'RANGE_INTERPOLATED';
                        $type_label = 'range_interpolated';
                        break;
                    case 'GEOMETRIC_CENTER';
                        $type_label = 'geometric_center';
                        break;
                    case 'APPROXIMATE';
                        $type_label = 'approximate';
                        break;
                    default:
                        $type_label = 'error';
                        break;
                }
                if($type_label == 'error')
                {
                    return ['error'=>'WRONG_TYPE (' . $type . ')', 'url'=>$url];
                }
                else
                {
                    return ['lat' => $lat, 'lng' => $lng, 'type' => $type_label , 'url' => $url, 'response' => $res];
                }
            }
            else
            {
                return ['type' => 'not_found', 'url' => $url, 'response' => $res];
            }
        }
        return ['error'=>'EMPTY_RESPONSE', 'url'=>$url];
    }

    public static function get_map($lat, $lng, $width='800px', $height='600px', $zoom = 2)
    {
        $api_key = $GLOBALS['settings']['settings']['google']['maps_api_key'];
        
        $html = '<div id="map"></div>
                 <style>
                    #map {
                        height: ' .$height . ';
                        width: ' . $width . ';
                    }
                </style>
                <script>
                    function initMap() {
                        var app_pos = {lat: ' . $lat . ', lng: ' . $lng . '};
                        var map = new google.maps.Map(document.getElementById(\'map\'), {
                          zoom: ' . $zoom. ',
                          center: app_pos
                        });
                        var marker = new google.maps.Marker({
                            position: app_pos,
                            map: map
                        });
                    }
                    </script>
                    <script async defer src="https://maps.googleapis.com/maps/api/js?key=' . $api_key . '&callback=initMap">
                </script>';
        return $html;
    }

    
}

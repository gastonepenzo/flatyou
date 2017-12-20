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

                return ['lat' => $lat, 'lng' => $lng, 'type' => $type , 'url' => $url, 'response' => $res];
            }
            else
            {
                return ['error' => $res_decoded['status'], 'url' => $url, 'response' => $res];
            }
        }
        return ['error'=>'EMPTY_RESPONSE', 'url'=>$url];
    }    
}

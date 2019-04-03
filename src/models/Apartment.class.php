<?php

namespace Flatyou\Models;


class Apartment extends Model
{
    var $id;
    var $code;
    var $user_id;
    var $title;
    var $description;
    var $address;
    var $street_number;
    var $cap;
    var $town;
    var $province;
    var $typology;
    var $smokers;
    var $washing_machine;
    var $air_conditioned;
    var $internet;
    var $heating;
    var $living_room;
    var $television;
    var $pets;
    var $car_parking;
    var $bike_parking;
    var $garden;
    var $mq;
    var $extra;
    var $lat;
    var $lng;
    var $state;
    var $position_result;
    var $active;
    var $created_at;
    var $modified_at;
    
    public function __construct($value)
    {
        $db = self::dbInstance();
        
        if(strlen($value) == 8)
        {
            $field = 'code';
        }
        else
        {
            $field = 'id';
        }
        
        $db->where($field, strtoupper($value));
        $db->where('active', 1);
        $data = $db->getOne('apartments');
        
        if($data)
        {
            foreach($data as $field => $value)
            {
                $this->{$field} = $value;
            }
        }
        return null;
    }
    
    public function exists()
    {
        if($this->id)
        {
            return true;
        }
        return false;
    }
    
    
    public function get($var)
    {
        return $this->{$var};
    }
    
    
    public static function getAll($only_active = true)
    {
        $db = self::dbInstance();
        
        $apartments = array();
        
        if($only_active)
        {
            $db->where('active', 1);
        }
        $res = $db->get('apartments');
        foreach($res as $r)
        {
            $apartments[] = new Apartment($r['id']);
        }
        return $apartments;
    }
    
    public function getUser()
    {
        return new User($this->user_id);
    }
    
    public function getRooms()
    {
        $db = self::dbInstance();
        
        $db->where('apartment_id', $this->id);
        $res = $db->get('rooms');
        $rooms = [];
        foreach($res as $r)
        {
            $room_id = $r['id'];
            $rooms[] = new Room($room_id);
        }
        return $rooms;
    }
    
    public function getPhotos()
    {
        $db = self::dbInstance();
        
        $db->where('apartment_id', $this->id);
        $db->orderBy('is_main_photo', 'desc');
        $res = $db->get('photos');
        $photos = [];
        foreach($res as $r)
        {
            $photo_id = $r['id'];
            $photos[] = new Photo($photo_id);
        }
        return $photos;
    }
    
    public function calculatePosition()
    {
        return GoogleGeo::get_position_from_address($this->cap, $this->town, $this->province, $this->address, $this->street_number);
    }
    
    public function updatePosition()
    {
        $db = self::dbInstance();
        
        $lat = null;
        $lng = null;
        $position_result = null;
        
        $position = $this->calculatePosition();
        if(isset($position['error']))
        {
            $position_result = 'error';
        }
        else
        {
            $position_result = $position['type'];
            if($position_result != 'not_found')
            {
                $lat = $position['lat'];
                $lng = $position['lng'];
            }
        }
        
        $data = array(
            'lat' => $lat,
            'lng' => $lng,
            'position_result' => $position_result,
        );
        
        $db->where('id', $this->id);
        return $db->update('apartments', $data);
    }
    
    public function getMap($width = '640px', $height = '480px', $zoom = 13)
    {
        return GoogleGeo::get_map($this->lat, $this->lng, $width, $height, $zoom);
    }
    
    
    public function getRating()
    {
        return 4;
    }
    
    public function getRatingHtml()
    {
        $rating = $this->getRating();
        $html = '<div class="rating_stars">';
        for($i=0; $i<$rating; $i++)
        {
            $html .=  '<svg class="rating_active" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">' .
                      '<path d="M9 11.3l3.71 2.7-1.42-4.36L15 7h-4.55L9 2.5 7.55 7H3l3.71 2.64L5.29 14z"/>' .
                      '</svg>';
        }
        for($i=0; $i<(5-$rating); $i++)
        {
            $html .=  '<svg class="rating_not_active" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">' .
                      '<path d="M9 11.3l3.71 2.7-1.42-4.36L15 7h-4.55L9 2.5 7.55 7H3l3.71 2.64L5.29 14z"/>' .
                      '</svg>';
        }
        $html.= '</div>';
        return $html;
        
    }
    
}

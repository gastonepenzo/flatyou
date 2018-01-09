<?php

namespace Flatyou\Models;


class Apartment extends Model
{
    private $id;
    private $code;
    private $user_id;
    private $title;
    private $address;
    private $street_number;
    private $cap;
    private $town;
    private $province;
    private $typology;
    private $smokers;
    private $washing_machine;
    private $air_conditioned;
    private $internet;
    private $heating;
    private $living_room;
    private $television;
    private $pets;
    private $car_parking;
    private $bike_parking;
    private $garden;
    private $mq;
    private $extra;
    private $lat;
    private $lng;
    private $created_at;
    private $modified_at;
    
    
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
        
        $db->where($field, $value);
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
    
    public function getMap($width = '800px', $height = '600px', $zoom = 13)
    {
        return GoogleGeo::get_map($this->lat, $this->lng, $width, $height, $zoom);
    }
}

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
    
}

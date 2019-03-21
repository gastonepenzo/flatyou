<?php

namespace Flatyou\Models;


class Room extends Model
{
    var $id;
    var $apartment_id;
    
    public function __construct($value)
    {
        $db = self::dbInstance();
        
        $db->where('id', $value);
        $data = $db->getOne('rooms');
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
    
    public function getApartment()
    {
        return new Apartment($this->apartment_id);
    }
    
}

<?php

namespace Flatyou\Models;


class Bed extends Model
{
    var $id;
    var $room_id;
    var $typology;
    var $state;
    
    
    public function __construct($value)
    {
        $db = self::dbInstance();
       
        $db->where('id', $value);
        $data = $db->getOne('beds');
        
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
    
    public function getRoom()
    {
        return new Room($this->room_id);
    }
    
}

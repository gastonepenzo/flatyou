<?php

namespace Flatyou\Models;


class Photo extends Model
{
    var $id;
    var $apartment_id;
    var $name;
    
    public function __construct($value)
    {
        $db = self::dbInstance();
        
        $db->where('id', $value);
        $data = $db->getOne('photos');
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
    
    public function getUrl()
    {
        $s = $GLOBALS['settings']['settings'];
        return $s['host'] . $s['photos_path'] . $this->apartment_id  . '/' . $this->name;
    }
    
}

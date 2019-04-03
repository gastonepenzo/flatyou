<?php

namespace Flatyou\Models;


class Comment extends Model
{
    var $id;
    var $user_id;
    var $apartment_id;
    var $comment;
    var $created_at;
    
    public function __construct($value)
    {
        $db = self::dbInstance();
        
        $db->where('id', $value);
        $data = $db->getOne('comments');
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
    
    public function getUser()
    {
        return new User($this->user_id);
    }
    
}

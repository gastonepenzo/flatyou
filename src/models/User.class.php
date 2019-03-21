<?php

namespace Flatyou\Models;


class User extends Model
{
    var $id;
    var $code;
    var $email;
    var $username;
    var $password;
    var $name;
    var $surname;
    var $gender;
    var $birthday;
    var $smoker;
    var $job;
    var $photo;
    var $biography;
    var $created_at;
    var $modified_il;
    
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
        $data = $db->getOne('users');
        
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
        $db = self::dbInstance();
        
        $db->where('user_id', $this->id);
        $db->where('active', 1);
        $apartment = $db->getOne('apartments');
        
        if($apartment)
        {
            return $apartment;
        }
        return null;
    }
    
}

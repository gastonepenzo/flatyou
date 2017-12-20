<?php

namespace Flatyou\Models;


class User extends Model
{
    private $id;
    private $code;
    private $email;
    private $username;
    private $password;
    private $name;
    private $surname;
    private $gender;
    private $birthday;
    private $smoker;
    private $job;
    private $photo;
    private $biography;
    private $created_at;
    private $modified_il;
    
    
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

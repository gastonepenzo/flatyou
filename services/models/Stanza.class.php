<?php

namespace Flatyou\Models;


class Stanza extends Modello
{
    private $id;
    private $id_appartamento;
    
    public function __construct($value)
    {
        $db = self::dbInstance();
        
        $db->where('id', $value);
        $data = $db->getOne('stanze');
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
        return new Appartamento($this->id_appartamento);
    }
    
}

<?php

namespace Flatyou\Models;


class Posto extends Modello
{
    private $id;
    private $id_stanza;
    private $tipologia;
    private $stato;
    
    
    public function __construct($value)
    {
        $db = self::dbInstance();
       
        $db->where('id', $value);
        $data = $db->getOne('posti');
        
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
    
    public function getStanza()
    {
        return new Stanza($this->id_stanza);
    }
    
}

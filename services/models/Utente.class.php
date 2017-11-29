<?php

namespace Flatyou\Models;


class Utente extends Modello
{
    private $id;
    private $codice;
    private $email;
    private $username;
    private $password;
    private $nome;
    private $cognome;
    private $sesso;
    private $compleanno;
    private $fumatore;
    private $impiego;
    private $foto;
    private $biografia;
    private $creato_il;
    private $modificato_il;
    
    
    public function __construct($value)
    {
        $db = self::dbInstance();
        
        if(strlen($value) == 8)
        {
            $field = 'codice';
        }
        else
        {
            $field = 'id';
        }
        
        $db->where($field, $value);
        $db->where('attivo', 1);
        $data = $db->getOne('utenti');
        
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
        
        $db->where('id_utente', $this->id);
        $db->where('attivo', 1);
        $apartment = $db->getOne('appartamenti');
        
        if($apartment)
        {
            return $apartment;
        }
        return null;
    }
    
}

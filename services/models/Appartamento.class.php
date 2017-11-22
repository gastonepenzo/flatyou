<?php

namespace Flatyou\Models;


class Appartamento extends Modello
{
    private $id;
    private $codice;
    private $id_utente;
    private $titolo;
    private $indirizzo;
    private $numero_civico;
    private $cap;
    private $citta;
    private $provincia;
    private $tipologia;
    private $fumatori;
    private $lavatrice;
    private $aria_condizionata;
    private $internet;
    private $riscaldamento;
    private $salotto;
    private $televisione;
    private $animali_domestici;
    private $posto_auto;
    private $posto_bici;
    private $giardino;
    private $metri_quadri;
    private $extra;
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
        $data = $db->getOne('appartamenti');
        
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
    
}

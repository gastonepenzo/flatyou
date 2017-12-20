<?php

namespace Flatyou\Models;


class Model
{   
    public static function dbInstance()
    {   
        $db_conf = $GLOBALS['settings']['settings']['db'];
        
        if(!$db = \MysqliDb::getInstance())
        {
            $db = new \MysqliDb (Array (
                'host'     => $db_conf['host'],
                'username' => $db_conf['user'], 
                'password' => $db_conf['pass'],
                'db'       => $db_conf['name'],
                'charset'  => 'utf8'));
        }
        return $db;
    }
}

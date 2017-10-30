<?php

namespace App;

/**
 * summary
 */
class Conn
{
    public static function getDb()
    {
    	return new \PDO("mysql:host=localhost;dbname=curso-mvc", "root", "123456");
    }
}
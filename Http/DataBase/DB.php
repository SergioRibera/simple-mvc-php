<?php

    class DB{
        private static $db = null;

        public static function getDB() : PDO{
            if(is_null(self::$db)){
                $engine = Config::get('DATABASE_ENGINE', "mysql");
                $host = Config::get('DATABASE_HOST', "localhost");
                $database = Config::get('DATABASE_NAMEDB', "Volpmient");
                $user = Config::get('DATABASE_USERNAME', "root");
                $pass = Config::get('DATABASE_PASSWORD', "");
                self::$db = new PDO("{$engine}:host={$host};dbname={$database}", $user, $pass);
            }
            return self::$db;
        }

    }
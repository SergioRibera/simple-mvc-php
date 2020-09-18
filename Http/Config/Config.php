<?php

    class Config{
        
        private static $env = [];

        public static function get($nameVar, $default = null){
            if(is_null(self::$env) || empty($env)){
                $handle = fopen(DIR."/.env", "r");

                if ($handle) {
                    while (($line = fgets($handle)) !== false) {
                        if(substr($line, 0, 1) !== "#"){
                            if('' !== trim(($line))){
                                $data = explode("=", $line);
                                self::$env[] = $data;
                            }
                        }
                    }
                    fclose($handle);
                } else {
                    throw new Exception('Ha ocurrido un error al leer el archivo de configuracion');
                }
            }
            for ($i=0; $i < count(self::$env); $i++) { 
                if(self::$env[$i][0] === $nameVar){
                    $dataToReturn = self::$env[$i][1];
                    self::$env = [];
                    return trim($dataToReturn);
                }
            }
            self::$env = [];
            return $default;
        }
    }
<?php
class Conectar{
              
         public static function conexion(){
                $serverName = "tcp:cipavi2.database.windows.net,1433"; // update me
                $connectionOptions = array(
                    "Database" => "CIPAVI", // update me
                     "Uid" => "excapps", // update me
                     "PWD" => "z3OI&5gM",
                     "CharacterSet" => "UTF-8" // update me
                 );
            //Establishes the connection
            $conn = sqlsrv_connect($serverName, $connectionOptions);
            return $conn;
        }
         
}


?>
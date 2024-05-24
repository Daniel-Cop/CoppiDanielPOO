<?php

namespace Src\Manager;
use PDO;
use Exception;


class DatabaseManager {
    private PDO $connection;

    public function __construct() {
        try {
            $dbHost ='localhost';
            $dbName = 'motocycle';
            $dbUser = 'root';
            $dbPassword = '';
        $this->connection = new PDO('mysql:host='.$dbHost.';port=3307;dbname='.$dbName.';charset=utf8', $dbUser, $dbPassword);
        $this->configPDO();
        } catch(Exception $e) {
        echo("Error during the connection to DataBase: ".$e->getMessage());
        exit;
        }
    }

        // config the connection
       private function configPDO() {
            // fetch the PDO error (SQL side)
           $this->connection->setAttribute(
               PDO::ATTR_ERRMODE, // choose the attribute
               PDO::ERRMODE_EXCEPTION //change the attribute
           );
           // remove index from fetch
           $this->connection->setAttribute(
               PDO::ATTR_DEFAULT_FETCH_MODE, // choose the attribute
               PDO::FETCH_ASSOC //change the attribute
           );
       }
   
       public function getConnection() {
        return $this->connection;
       }
}
<?php

namespace Src\Manager;
use Src\Entity\Moto;
use PDO;
use Exception;

class MotoManager extends DatabaseManager {
    public function findAll()
    {
        $query = $this->getConnection()->prepare("SELECT * FROM motos");
        $query->execute([]);

        $results = $query->fetchAll();
        $motos = [];

        foreach ($results as $result) {
            $motos[] = Moto::fromArray($result);
        }
        
        return $motos;
    }

    public function findById(int $id)
    {
        $query = $this->getConnection()->prepare("SELECT * FROM motos WHERE id = :id");
        $query->execute([":id" => $id]);
        $result = $query->fetch(); // give an array or false 
        
        if ($result != false) {
        return Moto::fromArray($result);
        } else {
            return false;
        }
    }

    public function findByType(string $type)
    {
        $query = $this->getConnection()->prepare("SELECT * FROM motos WHERE type = :type");
        $query->execute([":type" => $type]);
        $results = $query->fetchAll(); // give an array or false 
        $motos = [];
        
        foreach ($results as $result) {
            $motos[] = Moto::fromArray($result);
        } 

        if ($results != false) {
        return $motos;
        } else {
            return false;
        }
    }

    public function add(Moto $moto)
    {
        try {
            $query = $this->getConnection()->prepare("INSERT INTO motos (brand, model, type, price, image) VALUES (:brand, :model, :type, :price, :image)");
            $query->execute([
                ":brand" =>$moto->getBrand(),
                ":model" =>$moto->getModel(),
                ":type" =>$moto->getType(),
                ":price" =>$moto->getPrice(),
                ":image" =>$moto->getImage()
        ]);
        } catch(Exception $e) {
            echo("Error during the connection to DataBase: ".$e->getMessage());
            exit;
        }
    }

    public function edit(Moto $moto)
    {
        try {
            $query = $this->getConnection()->prepare("UPDATE motos SET brand=:brand, model=:model, type=:type, price=:price, image=:image WHERE id=:id");
            $query->execute([
                ":id"=>$service->getId(),
                ":brand" =>$moto->getBrand(),
                ":model" =>$moto->getModel(),
                ":type" =>$moto->getType(),
                ":price" =>$moto->getPrice(),
                ":image" =>$moto->getImage()
        ]);
        } catch(Exception $e) {
            echo("Error during the connection to DataBase: ".$e->getMessage());
            exit;
        }
    }

    public function delete(int $id)
    {
        try {
            $query = $this->getConnection()->prepare("DELETE FROM motos WHERE id=:id");
            $query->execute([
                ":id"=>$id
        ]);
    } catch(Exception $e) {
            echo("Error during the connection to DataBase: ".$e->getMessage());
            exit;
    }
    }
}
<?php

namespace Src\Controller;


use Src\Entity\Moto;
use Src\Manager\MotoManager;


class MotoController
{   
    private MotoManager $motoManager;

    
    public function __construct()
    {
        $this->motoManager = new MotoManager();
    }

    // /moto/$id
    public function findById(int $id)
    {   
        $moto = $this->motoManager->findById($id);

        if ($moto instanceof Moto) {
            $title = $moto->getBrand()." ".$moto->getModel();
            include(__DIR__."/../../Templates/moto/detail.php");
          return $moto;
        } else {
                            
            $error = "Moto not found";
            include(__DIR__."/../../Templates/block/error.php");
        }
    }

    // /moto/$type
    // qui le moto trovate possono essere più di una, quindi deve essere un array
    public function findByType(string $type)
    {   
        $motos = $this->motoManager->findBytype($type);

        if ($motos != false) {
            $title = "All our ".ucfirst($type);
            include(__DIR__."/../../Templates/moto/index.php");
        } else {
                            
            $error = "Moto not found";
            include(__DIR__."/../../Templates/block/error.php");
        }
    }

    // /moto
    public function findAll()
    {
       $motos = $this->motoManager->findAll();
       $title = "All our motocycles";
       include(__DIR__."/../../Templates/moto/index.php");
    }

    // /moto/add/
    public function add()
    {   
        //Verify method
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            //get the data from POST and verify they were not left empty or filled with white spaces
            $brand = isset($_POST['brand']) && strlen(trim($_POST["brand"])) != 0 ? $_POST['brand'] : false;
            $model = isset($_POST['model']) && strlen(trim($_POST["model"])) != 0 ? $_POST['model'] : false;
            $type = isset($_POST['type']) && strlen(trim($_POST["type"])) != 0 ? $_POST['type'] : false;
            $price = isset($_POST['price']) ? $_POST['price'] : false;
            $image = isset($_POST['image']) && strlen(trim($_POST["brand"])) != 0 ? $_POST['image'] : '/img/placeholder.jpg';
        
            if ($brand != false && $model != false && $type != false && $price != false) {
                //create a Moto object with the data
                $newMoto = new Moto(0, $brand, $model, $type, $price, $image);
                //add it to the DB
                $this->motoManager->add($newMoto);
                header("http://localhost/CoppiDanielPOO/index.php/moto/");
            } else {
                $error = "A parameters is missing or invalid";
            }

        } else {
            //if we arrive not in post
        }
       // include form add
       include(__DIR__."/../../Templates/moto/add.php");
    }

    // /moto/edit/$id
    public function edit(int $id)
    {   
        $moto = $this->motoManager->findById($id); 
        if($moto instanceof Moto) { 
            if ($_SERVER['REQUEST_METHOD'] === "POST") {

                $newBrand = isset($_POST['brand']) && strlen(trim($_POST["brand"])) != 0 ? $_POST['brand'] : false;
                $newModel = isset($_POST['model']) && strlen(trim($_POST["model"])) != 0 ? $_POST['model'] : false;
                $newType = isset($_POST['type']) && strlen(trim($_POST["type"])) != 0 ? $_POST['type'] : false;
                $newPrice = isset($_POST['price']) ? $_POST['price'] : false;
                $newImage = isset($_POST['image']) && strlen(trim($_POST["brand"])) != 0 ? $_POST['image'] : '/img/placeholder.jpg';
                
                    if ($newBrand != false && $newModel != false && $newType != false && $newPrice != false) {
                        //change the parameters of the moto
                        $moto->setBrand($newBrand);
                        $moto->setModel($newModel);
                        $moto->setType($newType);
                        $moto->setPrice($newPrice);
                        $moto->setImage($newImage);

                        //update the DB
                        $this->motoManager->edit($moto);
                        header("http://localhost/CoppiDanielPOO/index.php/moto/");

                    } else {
                        $error = "A parameters is missing or invalid";
                    }
            } else {
            //if we arrive not in POST
            }
            include(__DIR__."/../../Templates/moto/edit.php");
        } else {
            $error = "Moto not found";
            include(__DIR__."/../../Templates/block/error.php");
        }
    }

    // /moto/delete/$id
    public function delete(int $id)
    {
        $moto = $this->motoManager->findById($id);
        if ($moto instanceof Moto) {
            if($_SERVER['REQUEST_METHOD'] === "DELETE") {
                $this->motoManager->delete($id);
                header("http://localhost/CoppiDanielPOO/index.php/moto/");
            } else {
                //if we arrive in method not DELETE
            }
            include(__DIR__."/../../Templates/moto/delete.php");
        } else {
            $error = "Moto not found";
            include(__DIR__."/../../Templates/block/error.php");
        }
    }


}


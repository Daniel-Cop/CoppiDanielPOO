<?php

namespace Src;

use Src\Controller\MotoController;

class Router
{

    private string $uri;

    const string BASE_PATH = '/index.php/';

    public function __construct()
    {
        $this->uri = $_SERVER['REQUEST_URI'];
        $this->getRoute(explode('/', substr($this->uri, strpos($this->uri, self::BASE_PATH) + strlen(self::BASE_PATH))));
    }

    private function getRoute(array $segments)
    {
        $mainRoute = !empty($segments[0]) ? $segments[0] : null;
        $subRoute =  !empty($segments[1]) ? $segments[1] : null;
        switch ($mainRoute) {

            case 'moto':

                $motoController = new MotoController();

                $hasNumericID = !empty($segments[2]) && is_numeric($segments[2]);

                switch ($subRoute) {

                    case 'add':

                        $motoController->add();

                        break;

                    case 'edit':

                        if ($hasNumericID) {

                            $motoController->edit($segments[2]);

                        } else {
                            echo "ROUTE: /moto/edit/ Bad Request: Missing ID";
                        }

                        break;

                    case 'delete':

                        if ($hasNumericID) {

                            $motoController->delete($segments[2]);

                        } else {
                            echo "ROUTE: /moto/delete/ Bad Request: Missing ID";
                        }

                        break;

                    case null:
                        // moto/
                        // get all motos
                        $motoController->findAll();

                        break;
                    default:
                        if (is_numeric($subRoute)) {

                            $motoController->findById($subRoute);
                        } else {
                            // Get all motos of one type
                            $motoController->findByType($subRoute);
                        }
                        break;
                }
                break;

            // lPOO is the result of the router "explosion" of the url when the URL is  "localhost/CoppiDanielPOO" or "localhost/CoppiDanielPOO/index.php", so i made it the home page
            // null happens when the url is "localhost/CoppiDanielPOO/index.php/"  (note the difference is just a final "/")
            case "lPOO": 
            case null:
                // Home page
                include(__DIR__."/../Templates/block/home.php");
                break;

            default:
                // If $mainRoute does not corrispond to a known route
                //In our case just have moto
                echo "Page not found";
                break;
        }
    }
}

<?php

session_start();

require_once "../config/database.php";

require_once "../MVC/controllers/AuthController.php";
require_once "../MVC/controllers/UserController.php";
require_once "../MVC/controllers/ArtistController.php";
require_once "../MVC/controllers/PlaylistController.php";
require_once "../MVC/controllers/MessageController.php";
require_once "../MVC/controllers/AdminController.php";
require_once "../MVC/controllers/HomeController.php";

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$uri = str_replace("/LASK/public/index.php", "", $uri);
$uri = str_replace("/LASK/public", "", $uri);

if($uri == ""){
    $uri = "/";
}

switch($uri){

    case "/":
    case "/index.php":

        $controller = new HomeController();
        $controller->home();

    break;


    case "/login":

        if($_SERVER['REQUEST_METHOD'] === "POST"){

            $controller = new AuthController();
            $controller->login();

        } else {

            require "../MVC/views/login.php";

        }

    break;


    case "/register":

        if($_SERVER['REQUEST_METHOD'] === "POST"){

            $controller = new AuthController();
            $controller->register();

        } else {

            require "../MVC/views/register.php";

        }

    break;


    case "/profile":

        if(isset($_GET['id'])){

            $controller = new UserController();
            $controller->profile($_GET['id']);

        } else {

            echo "Usuario no especificado";

        }

    break;


    case "/artist":

        if(isset($_GET['id'])){

            $controller = new ArtistController();
            $controller->profile($_GET['id']);

        } else {

            echo "Artista no especificado";

        }

    break;


    case "/playlist/create":

        if($_SERVER['REQUEST_METHOD'] === "POST"){

            $controller = new PlaylistController();
            $controller->create();

        }

    break;


    case "/message/send":

        if($_SERVER['REQUEST_METHOD'] === "POST"){

            $controller = new MessageController();
            $controller->send();

        }

    break;


    default:

        echo "404 Página no encontrada";

}
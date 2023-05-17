<?php


//die($_GET['q']);
//die(print_r($_POST));



declare(strict_types=1);

namespace Api;

require_once '../vendor/autoload.php';
require_once "../func.php";

use Model;
use PDO;
use \PDOException;

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');
header('Access-Control-Allow-Methods: *');
header('Access-Control-Allow-Credentials: true');


header('Content-type: json/application');

//require_once "functions.php";
require_once "../func.php";


$method = $_SERVER['REQUEST_METHOD'];

@$q = $_GET['q'];
@$params = explode('/', $q ?: "");

//$connect = new Model\PostModel();
$connect = new Model\NewPostModel();

$type = $params[0];
@$id = (int)$params[1]; ///  можно ????

if ($method === 'GET') {
    if ($type === 'gets') {
        echo 'get1231312';
    }
} elseif ($method === 'POST') {
    //ОТПРАВКА НА СЕРВЕР ФАЙЛА
    if ($type === 'uploadFile') {
        upload();
    }
} elseif ($method === 'PATCH') {
    echo 'patch';
} elseif ($method === 'DELETE') {
    echo 'delete';
}







//if ($method === 'GET') {
//    if ($type === 'api-posts') {
//        echo $connect->getPosts();
//        $connect = null;
//    } elseif ($type === 'api-post' && isset($id)) {
//        echo $connect->getPost($id);
//        $connect = null;
//    }
//} elseif ($method === 'POST') {
//    if ($type === 'api-post') {
//        $connect->addPost($_POST);
//        $connect = null;
//    }
//} elseif ($method === 'PATCH') {
//    if ($type === 'api-post') {
//        if (isset($id)) {
//            $data = file_get_contents('php://input');
//            $data = json_decode($data, true);
////            die(print_r($data));
//            $connect->updatePost($id, $data);
//            $connect = null;
//        }
//    }
//} elseif ($method === 'DELETE') {
//    if ($type === 'api-post') {
//        if (isset($id)) {
//            $connect->deletePost($id);
//            $connect = null;
//        }
//    }
//}


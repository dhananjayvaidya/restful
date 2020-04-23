<?php 

require "config.php";
require "RestFul.php";

class App extends RestFul{
    function __construct($data){
        parent::__construct($data);
    }
    //.... code some thing else ... here
    //... for your app....
}
$Routes = array(
    "/api/user" => array(
        "get" => true,
        "post" => true,
        "put" => true,
        "delete" => true,
        "resource" => "api/user"
    ),
    "/api/product" => array(
        "get" => true,
        "post" => true,
        "put" => true,
        "delete" => true,
        "resource" => "api/product"
    )
);

$AppObj = new App($Routes);













// echo "<pre>";
// print_r($_SERVER);
// print_r($_GET);
// $RequestURI = str_replace("/index.php","",$_SERVER['REQUEST_URI']);
// $RequestMethod = $_SERVER['REQUEST_METHOD'];
// global $_PUT;
// parse_str(file_get_contents("php://input"),$_PUT);

//Allowed Routes

// if ($RequestURI == "/"){
//     foreach($Routes as $key => $Route){
//         echo $key."<br>";
//     }
// }else{
//     $RequestedRoute = $Routes[$RequestURI];
//     require $RequestedRoute['resource'].".php";
//     switch($RequestMethod){
//         case "GET":
//             if ($RequestedRoute['get'] == true){
//                 response(doGet());
//             }else{
//                 response(array("message"=>"not allowed"));
//             }
//         break;
//         case "POST":
//             if ($RequestedRoute['post'] == true){
//                 response(doPost());
//             }else{
//                 response(array("message"=>"not allowed"));
//             }
//         break;
//         case "PUT":
//             if ($RequestedRoute['put'] == true){
//                 response(doPut());
//             }else{
//                 response(array("message"=>"not allowed"));
//             }
//         break;
//         case "DELETE":
//             if ($RequestedRoute['delete'] == true){
//                 response(doDelete());
//             }else{
//                 response(array("message"=>"not allowed"));
//             }
//         break;
//     }
// }

// function response($data){
//     echo json_encode(array("data"=>$data));
// }
?>
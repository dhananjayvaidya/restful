<?php 
class RestFul{
    public $RequestURI;
    public $RequestedRoute;
    public $Input;
    public $Routes;
    function __construct($routes){
        $this->Routes = $routes;
        parse_str(file_get_contents("php://input"),$_PUT);
        $this->RequestURI = str_replace("/index.php","",$_SERVER['REQUEST_URI']);
        $this->RequestMethod = $_SERVER['REQUEST_METHOD'];
        $this->Input['GET']     = $_GET;
        $this->Input['POST']    = $_POST;
        $this->Input['PUT']     = $_PUT;
        
        if ($this->RequestURI == "/"){
            foreach($this->Routes as $key => $Route){
                echo $key."<br>";
            }
        }else{
            $this->RequestedRoute = $this->Routes[$this->RequestURI];
            $ResourceName = explode("/",$this->RequestedRoute['resource']);
            $ResourceName = end($ResourceName);
            require $this->RequestedRoute['resource'].".php";
            $ResourceObj = new $ResourceName($this);

            switch($this->RequestMethod){
                case "GET":
                    if ($this->RequestedRoute['get'] == true){
                        $this->response($ResourceObj->doGet());
                    }else{
                        $this->response(array("message"=>"not allowed"));
                    }
                break;
                case "POST":
                    if ($this->RequestedRoute['post'] == true){
                        $this->response($ResourceObj->doPost());
                    }else{
                        $this->response(array("message"=>"not allowed"));
                    }
                break;
                case "PUT":
                    if ($this->RequestedRoute['put'] == true){
                        $this->response($ResourceObj->doPut());
                    }else{
                        $this->response(array("message"=>"not allowed"));
                    }
                break;
                case "DELETE":
                    if ($this->RequestedRoute['delete'] == true){
                        $this->response($ResourceObj->doDelete());
                    }else{
                        $this->response(array("message"=>"not allowed"));
                    }
                break;
            }
        }
    }
    
    function response($data){
        echo json_encode(array("status"=>200,"data"=>$data));
    }
}
?>
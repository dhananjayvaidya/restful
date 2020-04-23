<?php 
class user extends PDO{
    
    function __construct($data){
        $this->Input = $data->Input;
        parent::__construct(_DNS_, _USER_, _PASS_);
    }
    function doGet(){
       $state = "SELECT * FROM `users` ";
       $query = $this->prepare($state);
       $query->execute();
       return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    function doPost(){
        return "Do Post";
    }
    function doPut(){
         
        return $this->Input['PUT']['username'];
    }
    function doDelete(){
        return "Do Delete";
    }
}


?>
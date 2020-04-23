<?php 
class product extends PDO{
    function __construct($data){
        $this->Input = $data->Input;
    }
    function doGet(){
        return "Product get method called";
    }
    function doPost(){
        return "Product Post method called";
    }
    function doPut(){
        return "Product Put method called";
    }
    function doDelete(){
        return "Product Delete method called";
    }
}
?>
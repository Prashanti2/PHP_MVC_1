<?php
error_reporting(0);
class Controller {
    public function view($view, $data = []){
        require_once '../application/views/'.$view.'.php';
    }

    public function model($modelName){

        if(file_exists("../application/models/" . $modelName . ".php")){
  
          require_once "../application/models/$modelName.php";
          return new $modelName;
  
        } else {
          echo "<div style='margin:0;padding: 10px;background-color:silver;'>Sorry $modelName.php file not found </div>";
        }
  
     }
    public function redirect($path){

        header("location:" . BASEURL . "/".$path);
     
    }

    public function input($inputName){

        if($_SERVER['REQUEST_METHOD'] == "POST" || $_SERVER['REQUEST_METHOD'] == 'post'){
  
           return trim(strip_tags($_POST[$inputName]));
  
        } else if($_SERVER['REQUEST_METHOD'] == 'GET' || $_SERVER['REQUEST_METHOD'] == 'get'){
  
           return trim(strip_tags($_GET[$inputName]));
  
        }
  
     }
}

?>
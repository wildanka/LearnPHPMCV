<?php

//this class will be the route later
class App{
   protected $controller = 'Home';
   protected $method = 'index';
   protected $params = [];

   public function __construct(){
      $url  = $this->parseURL();

      //Step 1. check the controller 
      if(file_exists('../app/controllers/'. $url[0] . '.php')){
         $this->controller = $url[0];
         unset($url[0]);
         
      }else{
         echo 'no controller found, use default route <br>';
      }

      //memanggil class yang ada di dalam $controller ($this->controller)
      require_once '../app/controllers/'. $this->controller. '.php';
      $this->controller = new $this->controller;
      
      //Step 2. method
      if(isset($url[1])){ //jika method tidak kosong (tidak hanya berisi controller)
         if(method_exists($this->controller, $url[1])){
            $this->method = $url[1];
            unset($url[1]);
         }
      }

      //Step 4. cek params 
      /* jika url tidak empty, (jika memiliki params, di dalam $url akan tetap ada array setelah 2 kali di unset [oleh controller dan method]) */
      if(!empty($url)){
         $this->params = array_values($url);
         // var_dump($url);
      }

      //Step 5. (Final) jalankan controller & method, serta kirimkan params jika ada
      call_user_func_array([$this->controller,$this->method], $this->params);
   }

   public function parseURL(){
      if( isset($_GET['url']) ){
         $url = rtrim($_GET['url'], '/');
         $url = filter_var($url, FILTER_SANITIZE_URL);
         $url = explode('/',$url);
         return $url;
      }
   }

   
}
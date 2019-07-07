<?php

//class Home akan dijadikan  default
class Home extends Controller{
   //method default
   public function index(){
      $this->view('home/index');
   }
}
<?php

//this class will controll everythings inside "../app/controllers" folder later
class Controller
{
   public function view($view, $data = [])
   {
      require_once '../app/views/' . $view . '.php';
   }

   public function model($model)
   {
      require_once '../app/models/' . $model . '.php';
      return new $model;
   }
}

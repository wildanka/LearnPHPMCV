<?php

//class Home akan dijadikan  default
class Home extends Controller
{
   //method default
   public function index()
   {

      $header_data['judul'] = 'Home';

      $this->view('templates/header', $header_data);
      $this->view('home/index');
      $this->view('templates/footer');
   }
}

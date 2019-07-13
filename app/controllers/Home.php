<?php

//class Home akan dijadikan  default
class Home extends Controller
{
   //method default
   public function index()
   {

      $header_data['judul'] = 'Home';
      $data['nama'] = $this->model('User_model')->getUser();

      $this->view('templates/header', $header_data);
      $this->view('home/index', $data);
      $this->view('templates/footer');
   }
}

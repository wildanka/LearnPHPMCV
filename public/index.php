<?php
if (!session_id()) session_start(); //menjalankan session agar SESSION['flasher'] dapat dijalankan

//require controller dan router agar bisa digunakan di index
require_once '../app/init.php';

//access router dan controller
$app = new App();

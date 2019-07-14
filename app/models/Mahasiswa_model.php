<?php
class Mahasiswa_model
{
   private $table = 't_mahasiswa';
   private $db;

   public function __construct()
   {
      $this->db = new Database;
   }

   public function getAllMahasiswa()
   {
      $this->db->query('SELECT * FROM ' . $this->table);
      return $this->db->resultSet();
   }

   public function getDetailMahasiswabyId($id)
   {
      //untuk menghindari SQL injection, kita akan memasukkan idnya ke binding (untuk mengamankan query kita)
      $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
      //kita masukkan querynya melalui bind
      $this->db->bind('id', $id);
      return $this->db->single();
   }
}

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

   public function tambahDataMahasiswa($data)
   {
      $query = "INSERT INTO " . $this->table . " VALUES  ('', :nama, :nim, :email, :jurusan)";

      $this->db->query($query);
      $this->db->bind('nama', $data['nama']);
      $this->db->bind('nim', $data['nim']);
      $this->db->bind('email', $data['email']);
      $this->db->bind('jurusan', $data['jurusan']);
      $this->db->execute();

      return $this->db->rowCount();
   }


   public function hapusDataMahasiswa($data)
   {
      $query = "DELETE FROM " . $this->table . " WHERE id = :id";

      $this->db->query($query);
      $this->db->bind('id', $data['id']);

      $this->db->execute();

      return $this->db->rowCount();
   }


   public function ubahDataMahasiswa($data)
   {
      $query = "UPDATE " . $this->table . " SET 
         nama = :nama, 
         nim = :nim, 
         email = :email, 
         jurusan = :jurusan 
         WHERE id = :id";

      $this->db->query($query);
      $this->db->bind('nama', $data['nama']);
      $this->db->bind('nim', $data['nim']);
      $this->db->bind('email', $data['email']);
      $this->db->bind('jurusan', $data['jurusan']);
      $this->db->bind('id', $data['id']);

      $this->db->execute();

      return $this->db->rowCount();
   }
}

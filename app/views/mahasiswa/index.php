<div class="container mt-5">

   <div class="row">
      <div class="col-lg-6">
         <!-- Flasher::getFlash() digunakan karena getFlash merupakan method static -->
         <?php Flasher::getFlash() ?>
      </div>
   </div>

   <div class="row mb-3">
      <div class="col-lg-6">
         <!-- Button trigger modal -->
         <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#mahasiswaModal" id="tampilModalTambah">
            Tambah Data Mahasiswa
         </button> <br><br>
      </div>
   </div>
   <div class="row mb-3">
      <div class="col-lg-6">
         <form action="<?= BASE_URL . '/mahasiswa/cari' ?>" method="post">
            <div class="input-group mb-3">
               <input type="text" class="form-control" placeholder="Cari NIM atau Nama Mahasiswa" aria-label="Recipient's username" aria-describedby="button-cari" class="keyword" id="keyword" name="keyword">
               <div class="input-group-append">
                  <button class="btn btn-primary" type="submit" id="button-cari">Cari</button>
               </div>
            </div>
         </form>
      </div>
   </div>

   <div class="row">
      <div class="col-6">
         <h3>Daftar Mahasiswa</h3>

         <?php foreach ($data['mahasiswa'] as $mhs) : ?>
            <ul class="list-group">
               <li class="list-group-item">
                  <?= $mhs['nama'] ?>
                  <a href="<?= BASE_URL; ?>/mahasiswa/delete_mahasiswa/<?= $mhs['id'] ?>" class="badge badge-danger float-right ml-1" onclick="return confirm('anda yakin ingin menghapus data ini?');">Hapus</a>
                  <a href="#" class="badge badge-success float-right ml-1 tampilModalUbah" data-toggle="modal" data-target="#mahasiswaModal" data-id="<?= $mhs['id']; ?>">Ubah</a>
                  <!-- data-id digunakan untuk jquery -->
                  <a href="<?= BASE_URL; ?>/mahasiswa/detail/<?= $mhs['id'] ?>" class="badge badge-primary float-right">Lihat Detail</a>
               </li>
            </ul>

         <?php endforeach; ?>

      </div>
   </div>
</div>

<!-- Modal -->
<div class="modal fade" id="mahasiswaModal" tabindex="-1" role="dialog" aria-labelledby="mahasiswaModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="mahasiswaModalLabel">Tambah Data Mahasiswa</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <form action="<?= BASE_URL . '/mahasiswa/tambah' ?>" method="POST">
               <input type="hidden" name="id" id="id">
               <div class="form-group">
                  <label for="nama">Nama</label>
                  <input type="text" class="form-control" id="nama" aria-describedby="name" placeholder="Masukkan nama mahasiswa" name="nama">
               </div>
               <div class="form-group">
                  <label for="nim">NIM</label>
                  <input type="text" class="form-control" id="nim" aria-describedby="nim" placeholder="Masukkan NIM" name="nim">
               </div>
               <div class="form-group">
                  <label for="email">Email address</label>
                  <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Masukkan Email" name="email">
                  <small id="emailHelp" class="form-text text-muted">Kami tidak akan membagikan alamat email Anda kepada orang lain.</small>
               </div>
               <div class="form-group">
                  <label for="jurusan">Jurusan</label>
                  <select class="form-control" id="jurusan" name="jurusan">
                     <option>Teknik Informatika</option>
                     <option>Teknik Komputer</option>
                     <option>Sistem Informasi</option>
                     <option>Desain Interior</option>
                     <option>Desain Komunikasi Visual</option>
                     <option>Ilmu Komunikasi</option>
                  </select>
               </div>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
            </form>
         </div>
      </div>
   </div>
</div>
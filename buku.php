<h1 class="mt-4">Buku</h1>
<?php
   if($_SESSION['user']['level'] != 'peminjam'){
?>
<a href="?page=buku_tambah" class="btn btn-primary mb-3 rounded-1">+ Add buku</a>
<?php 
   }
?>
<div class="card">
    <div class="card-body">
    <div class="row">
    <div class="col-md-12">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <?php if ($_SESSION['user']['level'] != 'peminjam') { ?>
            <tr>
                <th>No</th>
                <th>Sampul</th>
                <th>Nama Kategori</th>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Penerbit</th>
                <th>Tahun Terbit</th>
                <th>Deskripsi</th>
                <th>Action</th>
            </tr>
            <?php
            $i = 1;
            $query = mysqli_query($koneksi, "SELECT * FROM buku LEFT JOIN kategori ON buku.id_kategori = kategori.id_kategori");
            while ($data = mysqli_fetch_array($query)) {
            ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td>
                        <?php if ($data['sampul']) { ?>
                            <img src="uploads/<?= $data['sampul']; ?>" width="60" alt="sampul">
                        <?php } else { ?>
                            <span class="text-muted">-</span>
                        <?php } ?>
                    </td>
                    <td><?= $data['kategori']; ?></td>
                    <td><?= $data['judul']; ?></td>
                    <td><?= $data['penulis']; ?></td>
                    <td><?= $data['penerbit']; ?></td>
                    <td><?= $data['tahun_terbit']; ?></td>
                    <td><?= $data['deskripsi']; ?></td>
                    <td>
                        <a href="?page=buku_ubah&&id=<?= $data['id_buku']; ?>" class="btn btn-primary rounded-1">Ubah</a>
                        <a href="?page=buku_hapus&&id=<?= $data['id_buku']; ?>" onclick="return confirm('Apakah anda yakin untuk menghapus data ini?');" class="btn btn-danger rounded-1">Hapus</a>
                    </td>
                </tr>
            <?php } ?>
        <?php } else { ?>
            <tr>
                <th>No</th>
                <th>Sampul</th>
                <th>Nama Kategori</th>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Penerbit</th>
                <th>Tahun Terbit</th>
                <th>Deskripsi</th>
            </tr>
            <?php
            $i = 1;
            $query = mysqli_query($koneksi, "SELECT * FROM buku LEFT JOIN kategori ON buku.id_kategori = kategori.id_kategori");
            while ($data = mysqli_fetch_array($query)) {
            ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td>
                        <?php if ($data['sampul']) { ?>
                            <img src="uploads/<?= $data['sampul']; ?>" width="60" alt="sampul">
                        <?php } else { ?>
                            <span class="text-muted">-</span>
                        <?php } ?>
                    </td>
                    <td><?= $data['kategori']; ?></td>
                    <td><?= $data['judul']; ?></td>
                    <td><?= $data['penulis']; ?></td>
                    <td><?= $data['penerbit']; ?></td>
                    <td><?= $data['tahun_terbit']; ?></td>
                    <td><?= $data['deskripsi']; ?></td>
                </tr>
            <?php } ?>
        <?php } ?>
        </table>
    </div>
</div>
    </div>
</div>

<style>
    body {
        background: linear-gradient(135deg, #E1F5FE, #FFEBEE);
        font-family: 'Poppins', sans-serif;
        color: #333;
        margin: 0;
        padding: 0;
        height: 100vh;
    }
</style>

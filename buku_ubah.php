<h1 class="mt-4">Ubah Buku</h1>
<div class="card">
    <div class="card-body">
    <div class="row">
        <div class="col-md-12">
         <form method="post" enctype="multipart/form-data">

            <?php   
                $id = $_GET['id'];
                $query = mysqli_query($koneksi, "SELECT * FROM buku WHERE id_buku='$id'");
                $data = mysqli_fetch_array($query);

                if (isset($_POST['submit'])) {
                    $id_kategori = $_POST['id_kategori'];
                    $judul = $_POST['judul'];
                    $penulis = $_POST['penulis'];
                    $penerbit = $_POST['penerbit'];
                    $tahun_terbit = $_POST['tahun_terbit'];
                    $deskripsi = $_POST['deskripsi'];

                    // Upload sampul jika ada
                    $sampul = $data['sampul']; // default sampul lama
                    if ($_FILES['sampul']['name'] != '') {
                        $sampul = $_FILES['sampul']['name'];
                        move_uploaded_file($_FILES['sampul']['tmp_name'], "uploads/" . $sampul);
                    }

                    $query = mysqli_query($koneksi, "UPDATE buku SET 
                        id_kategori='$id_kategori', 
                        judul='$judul', 
                        penulis='$penulis', 
                        penerbit='$penerbit', 
                        tahun_terbit='$tahun_terbit', 
                        deskripsi='$deskripsi', 
                        sampul='$sampul'
                        WHERE id_buku='$id'");

                    if ($query) {
                        echo '<div class="alert alert-success">Ubah data berhasil</div>';
                        // Refresh data
                        $query = mysqli_query($koneksi, "SELECT * FROM buku WHERE id_buku='$id'");
                        $data = mysqli_fetch_array($query);
                    } else {
                        echo '<div class="alert alert-danger">Ubah data gagal</div>';
                    }
                }
            ?>

            <div class="row mb-3">
                <div class="col-md-2">Kategori</div>
                <div class="col-md-8">
                    <select class="form-select w-50" name="id_kategori">
                        <?php
                            $kat = mysqli_query($koneksi, "SELECT * FROM kategori");
                            while($kategori = mysqli_fetch_array($kat)) {
                        ?>
                            <option value="<?= $kategori['id_kategori']; ?>" 
                                <?= ($kategori['id_kategori'] == $data['id_kategori']) ? 'selected' : ''; ?>>
                                <?= $kategori['kategori']; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-2">Judul</div>
                <div class="col-md-8">
                    <input type="text" name="judul" value="<?= $data['judul']; ?>" class="form-control" style="width: 50%">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-2">Penulis</div>
                <div class="col-md-8">
                    <input type="text" name="penulis" value="<?= $data['penulis']; ?>" class="form-control" style="width: 50%">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-2">Penerbit</div>
                <div class="col-md-8">
                    <input type="text" name="penerbit" value="<?= $data['penerbit']; ?>" class="form-control" style="width: 50%">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-2">Tahun Terbit</div>
                <div class="col-md-8">
                    <input type="number" name="tahun_terbit" value="<?= $data['tahun_terbit']; ?>" class="form-control" style="width: 50%">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-2">Deskripsi</div>
                <div class="col-md-8">
                    <textarea name="deskripsi" rows="5" class="form-control"><?= $data['deskripsi']; ?></textarea>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-2">Sampul</div>
                <div class="col-md-8">
                    <?php if ($data['sampul']) { ?>
                        <p><img src="uploads/<?= $data['sampul']; ?>" width="100" alt="sampul"></p>
                    <?php } ?>
                    <input type="file" name="sampul" class="form-control-file">
                    <small class="text-muted">Biarkan kosong jika tidak ingin mengubah sampul.</small>
                </div>
            </div>

            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <button type="submit" class="btn btn-primary" name="submit" value="submit">Simpan</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                    <a href="?page=buku" class="btn btn-danger">Kembali</a>
                </div>
            </div>

        </form>
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

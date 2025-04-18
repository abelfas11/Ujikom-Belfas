<h1 class="mt-4">Tambah Buku</h1>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <form method="post" enctype="multipart/form-data">
                    <?php
                    if (isset($_POST['submit'])) {
                        $id_kategori   = $_POST['id_kategori'];
                        $judul         = $_POST['judul'];
                        $penulis       = $_POST['penulis'];
                        $penerbit      = $_POST['penerbit'];
                        $tahun_terbit  = $_POST['tahun_terbit'];
                        $deskripsi     = $_POST['deskripsi'];

                        // Upload sampul
                        $sampul        = $_FILES['sampul']['name'];
                        $tmp_name      = $_FILES['sampul']['tmp_name'];
                        $folder        = "uploads/";

                        if ($sampul != "") {
                            move_uploaded_file($tmp_name, $folder . $sampul);
                        }

                        // Query insert data
                        $query = mysqli_query($koneksi, "INSERT INTO buku 
                            (id_kategori, judul, penulis, penerbit, tahun_terbit, deskripsi, sampul)
                            VALUES 
                            ('$id_kategori','$judul','$penulis','$penerbit','$tahun_terbit','$deskripsi','$sampul')");

                        if ($query) {
                            echo '<div class="alert alert-success">Tambah data berhasil</div>';
                        } else {
                            echo '<div class="alert alert-danger">Tambah data gagal</div>';
                        }
                    }
                    ?>

                    <!-- Kategori -->
                    <div class="row mb-3">
                        <div class="col-md-2">Kategori</div>
                        <div class="col-md-8">
                            <select class="form-select w-50" name="id_kategori">
                                <?php
                                $kat = mysqli_query($koneksi, "SELECT * FROM kategori");
                                while ($kategori = mysqli_fetch_array($kat)) {
                                ?>
                                    <option value="<?php echo $kategori['id_kategori']; ?>">
                                        <?php echo $kategori['kategori']; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <!-- Judul -->
                    <div class="row mb-3">
                        <div class="col-md-2">Judul</div>
                        <div class="col-md-8"><input type="text" name="judul" class="form-control" style="width: 50%"></div>
                    </div>

                    <!-- Penulis -->
                    <div class="row mb-3">
                        <div class="col-md-2">Penulis</div>
                        <div class="col-md-8"><input type="text" name="penulis" class="form-control" style="width: 50%"></div>
                    </div>

                    <!-- Penerbit -->
                    <div class="row mb-3">
                        <div class="col-md-2">Penerbit</div>
                        <div class="col-md-8"><input type="text" name="penerbit" class="form-control" style="width: 50%"></div>
                    </div>

                    <!-- Tahun Terbit -->
                    <div class="row mb-3">
                        <div class="col-md-2">Tahun Terbit</div>
                        <div class="col-md-8"><input type="number" name="tahun_terbit" class="form-control" style="width: 50%"></div>
                    </div>

                    <!-- Deskripsi -->
                    <div class="row mb-3">
                        <div class="col-md-2">Deskripsi</div>
                        <div class="col-md-8">
                            <textarea name="deskripsi" rows="5" class="form-control" style="width: 70%"></textarea>
                        </div>
                    </div>

                    <!-- Sampul -->
                    <div class="row mb-3">
                        <div class="col-md-2">Sampul</div>
                        <div class="col-md-8">
                            <input type="file" name="sampul" class="form-control" style="width: 50%">
                        </div>
                    </div>

                    <!-- Tombol -->
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

<!-- Styling background (optional) -->
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

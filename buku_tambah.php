<h1 class="mt-4">Buku</h1>
<div class="card">
    <div class="card-body">
    <div class="row">
        <div class="col-md-12">
         <form method="post">

            <?php
                if(isset($_POST['submit'])) {
                    $id_kategori = $_POST['id_kategori'];
                    $judul = $_POST['judul'];
                    $penulis = $_POST['penulis'];
                    $penerbit = $_POST['penerbit'];
                    $tahun_terbit = $_POST['tahun_terbit'];
                    $deskripsi = $_POST['deskripsi'];
                    $query = mysqli_query($koneksi, "INSERT INTO buku (id_kategori, judul, penulis, penerbit, tahun_terbit, deskripsi) VALUES ('$id_kategori','$judul','$penulis','$penerbit','$tahun_terbit','$deskripsi')");


                    if($query) {
                        echo '<div class ="alert alert-success">tambah data berhasil</div>';
                    } else {
                        echo '<div class ="alert alert-danger">tambah data gagal</div>';
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
                                <option value="<?php echo $kategori['id_kategori']; ?>"><?php echo $kategori['kategori']; ?></option>
                                <?php
                            }
                        ?>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-2">Judul</div>
                <div class="col-md-8"><input type="text" name="judul" class="form-control" style="width: 50%"></div>
            </div>
            <div class="row mb-3">
                <div class="col-md-2">Penulis</div>
                <div class="col-md-8"><input type="text" name="penulis" class="form-control" style="width: 50%"></div>
            </div>
            <div class="row mb-3">
                <div class="col-md-2">Penerbit</div>
                <div class="col-md-8"><input type="text" name="penerbit" class="form-control" style="width: 50%"></div>
            </div>
            <div class="row mb-3">
                <div class="col-md-2">Tahun Terbit</div>
                <div class="col-md-8"><input type="number" name="tahun_terbit" class="form-control" style="width: 50%"></div>
            </div>
            <div class="row mb-3">
                <div class="col-md-2">Deskripsi</div>
                <div class="col-md-8">
                    <textarea name="deskripsi" rows="5" class="form-control"></textarea>
                </div>
            </div>
             <div class="row">
                  <div class="col-md-2">
                 </div>
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
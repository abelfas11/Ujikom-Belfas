<h1 class="mt-4">Peminjaman Buku</h1>
<div class="card">
    <div class="card-body">
    <div class="row">
        <div class="col-md-12">
         <form method="post">

            <?php
                if (isset($_POST['submit'])) {
                    $id_buku = $_POST['id_buku'];
                    $id_user = $_SESSION['user']['id_user'];
                    $tanggal_peminjaman = $_POST['tanggal_peminjaman'];
                    $tanggal_pengembalian = $_POST['tanggal_pengembalian'];
                    $status_peminjaman = 'menunggu';  
                    $query = mysqli_query($koneksi, "INSERT INTO peminjaman (id_buku, id_user, tanggal_peminjaman, tanggal_pengembalian, status_peminjaman) 
                    VALUES('$id_buku', '$id_user', '$tanggal_peminjaman', '$tanggal_pengembalian', '$status_peminjaman')");

                    if ($query) {
                        echo '<div class="alert alert-success">Peminjaman berhasil ditambahkan dan menunggu persetujuan admin.</div>';
                    } else {
                        echo '<div class="alert alert-danger">Gagal menambahkan peminjaman.</div>';
                    }
                }
                
                
            ?>


            <div class="row mb-3">
                <div class="col-md-2">Buku</div>
                <div class="col-md-8">
                    <select class="form-select w-50" name="id_buku">
                        <?php
                            $buk = mysqli_query($koneksi, "SELECT * FROM buku");
                            while($buku = mysqli_fetch_array($buk)) {
                                ?>
                                <option value="<?php echo $buku['id_buku']; ?>"><?php echo $buku['judul']; ?></option>
                                <?php
                            }
                        ?>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-2">tanggal_peminjaman</div>
                <div class="col-md-8">
                    <input type="date" class="form-control" name="tanggal_peminjaman">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-2">tanggal_pengembalian</div>
                <div class="col-md-8">
                    <input type="date" class="form-control" name="tanggal_pengembalian">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-2">status_peminjaman</div>
                <div class="col-md-8">
                <select name="status_peminjaman" class="form-select w-25">
                    <option value="dipinjam">Dipinjam</option>
                    <option value="dikembalikan">Dikembalikan</option>
                </select>    
                </div>
            </div>

             <div class="row">
                  <div class="col-md-2">
                 </div>
                  <div class="col-md-8">
                       <button type="submit" class="btn btn-primary" name="submit" value="submit">Save</button>
                      <button type="reset" class="btn btn-secondary">Reset</button>
                      <a href="?page=peminjaman" class="btn btn-danger">Back</a>
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
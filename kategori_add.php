<h1 class="mt-4">Kategori Buku</h1>
<div class="card">
    <div class="card-body">
    <div class="row">
        <div class="col-md-12">
         <form method="post">

            <?php
                if(isset($_POST['submit'])) {
                    $kategori = $_POST['kategori'];
                    $query = mysqli_query($koneksi, "INSERT INTO kategori(kategori) values('$kategori')");

                    if($query) {
                        echo '<div class ="alert alert-success">tambah data berhasil</div>';
                    } else {
                        echo '<div class ="alert alert-danger">tambah data berhasil</div>';
                    }
                    
                }
            ?>


            <div class="row mb-3">
                <div class="col-md-2">Nama Kategori</div>
                <div class="col-md-8"><input type="text" name="kategori" class="from-control" style="width: 50%"></div>
            </div>
             <div class="row">
                  <div class="col-md-2">
                 </div>
                  <div class="col-md-8">
                       <button type="submit" class="btn btn-primary" name="submit" value="submit">Save</button>
                      <button type="reset" class="btn btn-secondary">Reset</button>
                      <a href="?page=kategori" class="btn btn-danger">Back</a>
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
<h1 class="mt-4">Ulasan Buku</h1>
<div class="card">
    <div class="card-body">
    <div class="row">
        <div class="col-md-12">
         <form method="post">

            <?php
                if(isset($_POST['submit'])) {
                    $id_buku = $_POST['id_buku'];
                    $id_user = $_SESSION['user']['id_user'];
                    $ulasan = $_POST['ulasan'];
                    $rating = $_POST['rating'];
                    $query = mysqli_query($koneksi, "INSERT INTO ulasan (id_buku, id_user, ulasan, rating) VALUES ('$id_buku','$id_user', '$ulasan','$rating')");


                    if($query) {
                        echo '<div class ="alert alert-success">tambah ulasan berhasil</div>';
                    } else {
                        echo '<div class ="alert alert-danger">tambah ulasan gagal</div>';
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
                <div class="col-md-2">Ulasan</div>
                <div class="col-md-8">
                    <textarea name="ulasan" rows="5" class="form-control"></textarea>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-2">Rating</div>
                <div class="col-md-8">
                    <select name ="rating" class="form-select">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                        <option>10</option>
                    </select>
                </div>
            </div>
             <div class="row">
                  <div class="col-md-2">
                 </div>
                  <div class="col-md-8">
                       <button type="submit" class="btn btn-primary" name="submit" value="submit">Save</button>
                      <button type="reset" class="btn btn-secondary">Reset</button>
                      <a href="?page=ulasan" class="btn btn-danger">Back</a>
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
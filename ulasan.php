<h1 class="mt-4">Ulasan</h1>
<a href="?page=ulasan_tambah" class="btn btn-primary mb-3 rounded-1">+ Add</a>
<div class="card">
    <div class="card-body">
    <div class="row">
    <div class="col-md-12">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <tr>
                <th>No</th>
                <th>User</th>
                <th>Buku</th>
                <th>Ulasan</th>
                <th>Rating</th>
                <th>Action</th>
            </tr>
            <?php
            $i = 1;
            $query = mysqli_query($koneksi, "
            SELECT ulasan.*, user.nama, buku.judul 
            FROM ulasan 
            LEFT JOIN user ON user.id_user = ulasan.id_user 
            LEFT JOIN buku ON buku.id_buku = ulasan.id_buku
            ");
        
                while($data = mysqli_fetch_array($query)){
                    ?>
                    <tr>
                        <td><?php echo $i++; ?> </td>
                        <td><?php echo $data['nama'];  ?> </td>
                        <td><?php echo $data['judul'];  ?> </td>
                        <td><?php echo $data['ulasan'];  ?> </td>
                        <td><?php echo $data['rating'];  ?> </td>
                        <td>
                            <a href="?page=ulasan_ubah&&id=<?php echo $data['id_ulasan']; ?>" class="btn btn-primary rounded-1">Change</a>
                            <a  href="?page=ulasan_hapus&&id=<?php echo $data['id_ulasan']; ?>" onclick="return confirm('Apakah anda yakin untuk menghapus data ini?');" class="btn btn-danger rounded-1"> Delete</a>
                        </td>
                    </tr>
                    <?php
                }
            ?>
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
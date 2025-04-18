<h1 class="mt-4"> peminjaman</h1>
<a href="?page=peminjaman_tambah"  class="btn btn-primary"><i class="fa fa-plus"></i> tambah peminjaman</a>
<div class="card">
    <div class="card-body">
    <div class="row">
    <div class="col-md-12">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <tr>
                <th>No</th>
                <th>User</th>
                <th>Buku</th>
                <th>tanggal peminjaman</th>
                <th>tanggal pengembalian</th>
                <th>status pengembalian</th>
                <th>Action</th>
            </tr>
            <?php
            $i = 1;
            $query = mysqli_query($koneksi, "SELECT * FROM peminjaman LEFT JOIN user ON user.id_user = peminjaman.id_user LEFT JOIN buku ON buku.id_buku = peminjaman.id_buku WHERE peminjaman.id_user=".$_SESSION ['user']['id_user']);

        
                while($data = mysqli_fetch_array($query)){
                    ?>
                    <tr>
                        <td><?php echo $i++; ?> </td>
                        <td><?php echo $data['nama'];  ?> </td>
                        <td><?php echo $data['judul'];  ?> </td>
                        <td><?php echo $data['tanggal_peminjaman'];  ?> </td>
                        <td><?php echo $data['tanggal_pengembalian'];  ?> </td>
                        <td><?php echo $data['status_peminjaman'];  ?> </td>
                    </tr>
                        <td>
                            <a href="?page=peminjaman_ubah&&id=<?php echo $data['id_peminjaman']; ?>" class="btn btn-primary rounded-1">Change</a>
                            <a  href="?page=peminjaman_hapus&&id=<?php echo $data['id_peminjaman']; ?>" onclick="return confirm('Apakah anda yakin untuk menghapus data ini?');" class="btn btn-danger rounded-1"> Delete</a>
                        </td>
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
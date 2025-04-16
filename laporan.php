<h1 class="mt-4">Laporan peminjaman</h1>
<a href="cetak.php" class="btn btn-primary mb-3 rounded-1">Cetak</a>
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
            </tr>
            <?php
            $i = 1;
            $query = mysqli_query($koneksi, "SELECT*FROM peminjaman LEFT JOIN user on user.id_user=peminjaman.id_user LEFT JOIN buku ON buku.id_buku = peminjaman.id_user LEFT JOIN buku ON buku.id_buku = peminjaman.id_buku
            ");
        
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
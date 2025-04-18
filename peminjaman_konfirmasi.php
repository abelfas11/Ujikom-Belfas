<h1 class="mt-4">Konfirmasi Peminjaman</h1>
<div class="card">
    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>User</th>
                <th>Buku</th>
                <th>Tanggal Peminjaman</th>
                <th>Tanggal Pengembalian</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
            <?php
            $i = 1;
            $query = mysqli_query($koneksi, "SELECT * FROM peminjaman 
                    LEFT JOIN user ON user.id_user = peminjaman.id_user 
                    LEFT JOIN buku ON buku.id_buku = peminjaman.id_buku 
                    WHERE status_peminjaman = 'menunggu'");
            while ($data = mysqli_fetch_array($query)) {
            ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td><?= $data['nama'] ?></td>
                    <td><?= $data['judul'] ?></td>
                    <td><?= $data['tanggal_peminjaman'] ?></td>
                    <td><?= $data['tanggal_pengembalian'] ?></td>
                    <td><?= $data['status_peminjaman'] ?></td>
                    <td>
                        <a href="?page=approve_peminjaman&id=<?= $data['id_peminjaman'] ?>" class="btn btn-success btn-sm">Approve</a>
                        <a href="?page=tolak_peminjaman&id=<?= $data['id_peminjaman'] ?>" class="btn btn-danger btn-sm">Tolak</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
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

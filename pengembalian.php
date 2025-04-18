<h1 class="mt-4">Pengembalian Buku</h1>
<div class="card">
    <div class="card-body">
        <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <tr>
                    <th>No</th>
                    <th>Buku</th>
                    <th>Tanggal Peminjaman</th>
                    <th>Tanggal Pengembalian</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
                <?php
                $i = 1;
                $id_user = $_SESSION['user']['id_user'];
                $query = mysqli_query($koneksi, "SELECT * FROM peminjaman 
                            LEFT JOIN buku ON buku.id_buku = peminjaman.id_buku 
                            WHERE peminjaman.id_user = $id_user AND status_peminjaman = 'dipinjam'");

                while ($data = mysqli_fetch_array($query)) {
                ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $data['judul']; ?></td>
                        <td><?= $data['tanggal_peminjaman']; ?></td>
                        <td><?= $data['tanggal_pengembalian']; ?></td>
                        <td><?= $data['status_peminjaman']; ?></td>
                        <td>
                            <a href="?page=pengembalian_kembali&id=<?= $data['id_peminjaman']; ?>" class="btn btn-success btn-sm" onclick="return confirm('Yakin ingin mengembalikan buku ini?')">Kembalikan</a>
                        </td>
                    </tr>
                <?php } ?>
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

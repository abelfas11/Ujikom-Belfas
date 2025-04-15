<h1 class="mt-4">Kategori Buku</h1>
<a href="?page=kategori_add" class="btn btn-primary mb-3 rounded-1">+ Add Kategori</a>
<div class="card">
    <div class="card-body">
    <div class="row">
    <div class="col-md-12">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <tr>
                <th>No</th>
                <th>Nama Kategori</th>
                <th>Action</th>
            </tr>
            <?php
            $i = 1;
                $query = mysqli_query($koneksi, "SELECT * FROM kategori");
                while($data = mysqli_fetch_array($query)){
                    ?>
                    <tr>
                        <td><?php echo $i++; ?> </td>
                        <td><?php echo $data['kategori'];  ?> </td>
                        <td>
                            <a href="?page=kategori_Change&&id=<?php echo $data['id_kategori']; ?>" class="btn btn-primary rounded-1">Change</a>
                            <a  href="?page=kategori_Delete&&id=<?php echo $data['id_kategori']; ?>" onclick="return confirm('Apakah anda yakin untuk menghapus data ini?');" class="btn btn-danger rounded-1"> Delete</a>
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
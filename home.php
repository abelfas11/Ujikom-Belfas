<h1 class="mt-4">Dashboard</h1>
<ol class="breadcrumb mb-4">
</ol>
<div class="row">
    <div class="col-xl-3 col-md-6">
        <div class="card bg-light-purple text-white mb-4">
            <div class="card-body">
            <?php
                echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM kategori")); 
            ?>
            Total Kategori</div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="?page=kategori">View Details</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-light-blue text-white mb-4">
            <div class="card-body">
            <?php
                echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM buku")); 
            ?>
            Total Buku</div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="?page=buku">View Details</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-light-green text-white mb-4">
            <div class="card-body">
            <?php
                echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM ulasan")); 
            ?>
            Total Ulasan</div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="?page=ulasan">View Details</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-light-orange text-white mb-4">
            <div class="card-body">
            <?php
                echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM user")); 
            ?>    
            Total User</div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
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
    .row {
        padding: 30px;
    }
    .card.bg-light-purple {
        background-color: #B48AB2; 
    }

    .card.bg-light-blue {
        background-color: #A0C4FF;
    }

    .card.bg-light-green {
        background-color: #A8E6CF;
    }
    .card.bg-light-orange {
        background-color: #FFD3B6; 
    }
    .card-body {
        font-weight: bold;
    }
    .card-footer a {
        color: #2C3E50; 
    }
    .card-footer a:hover {
        color: #4E5D6C; 
        text-decoration: underline;
    }
    .card {
        border-radius: 8px;
        border: none;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }
    .breadcrumb {
        background-color: transparent;
        color: #6c757d;
    }

    .breadcrumb a {
        color: #007bff;
    }

    .breadcrumb a:hover {
        text-decoration: underline;
    }
    .container-fluid {
        background-color: transparent;
    }
</style>

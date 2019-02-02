<?php
    session_start();
    if(!isset($_SESSION["login"])) {
        header("Location: ../login");
    }

    $username = $_SESSION["user"];

    include('../view/header.php');
?>
<!-- Page Content -->
<div id="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="homepage">
                    <div class="text-center">
                        <h2>Tentang</h2>
                        <p>
                            Laundry Crafty merupakan sebuah sistem informasi sederhana berbasis web. Laundry Crafty digunakan untuk melakukan pendataan terhadap laundry masuk dan laundry keluar. Laundry Crafty dibangun menggunakan bahasa php, javascript, dan framework bootstrap.                                        
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    include('../view/footer.php');
?>
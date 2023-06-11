<?php
require  'functions.php';
$name = 'Registrasi';
$id = htmlspecialchars($_GET['id']);
$student = query("SELECT * FROM pengguna WHERE id = $id")[0];


if (isset($_POST['Registrasi'])) {

    if (ubah($_POST) > 0) {
        echo "<script> 
               alert('ubah data berhasil!');
               document.location.href = 'index.php';  
        </script>";
    }
}

require 'views/Registrasi.view.php';

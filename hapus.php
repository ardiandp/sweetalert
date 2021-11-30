<?php
session_start();
    
    //koneksi ke database latihan
    //$koneksi = mysqli_connect("localhost", "root", "", "latihan");
     $koneksi = mysqli_connect("178-18-253-214.cprapid.com", "ur5rc6ey_root", "dianmustika99", "ur5rc6ey_latihan");

    $hapus=mysqli_query($koneksi,"delete from post where idpost ='$_GET[idpost]' ") or die (mysql_error());
    //set session sukses
    $_SESSION["hapus"] = 'Data Berhasil Dihapus';
    
    //redirect ke halaman index.php
    header('Location: index.php');   
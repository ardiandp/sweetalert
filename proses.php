<?php

    //gunakan fungsi di bawah ini agar session bisa dibuat
    session_start();
    
    //koneksi ke database latihan
    //$koneksi = mysqli_connect("localhost", "root", "", "latihan");
     $koneksi = mysqli_connect("178-18-253-214.cprapid.com", "ur5rc6ey_root", "dianmustika99", "ur5rc6ey_latihan");
    
    //ambil data yang diparsing dari form sebelumnya
    $judul  = $_POST['judul'];
    $isi    = $_POST['isi'];
    $tanggal=date('Y-m-d');
    echo "$judul - $isi - $tanggal";
    
    //masukkan data ke dalam tabel post
    $insert = mysqli_query($koneksi,"insert into post (judul,isi,tanggal) values ('$judul','$isi','$tanggal')") or die(mysql_error()) ;
    
    //set session sukses
    $_SESSION["sukses"] = 'Data Berhasil Disimpan';
    
    //redirect ke halaman index.php
    header('Location: index.php');   
    
?>
<!DOCTYPE html>
    <html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <!-- import bootstrap  -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
            integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    
        <link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.css" rel="stylesheet">
        </link>
    </head>
    <!-- penting untuk menggunakan fungsi session di bawah ini  -->
    <?php session_start(); ?>
    <body>
        <br>
        <!-- membuat container dengan lebar colomn col-lg-10  -->
        <div class="container col-lg-10">
            <!-- membuat tulisan alert berwarna hijau dengan tulisan di tengah  -->
            <h3 class="alert alert-success text-center" role="alert">
                Tutorial Insert Data dengan Modal dan Sweet Alert
            </h3>
            <br>
            <!-- membuat card untuk membungkus tabel -->
            <div class="card">
                <div class="card-body">
                    <!-- membuat tombol tambah -->
                    <a href="#" class="btn btn-primary mb-2" data-toggle="modal" data-target="#modal">Tambah</a>
                    <!-- memuat modal tambah, cek di dokumentasi bootstrap untuk membuat modal-->
                    <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Tambah Post</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <!-- modal body, berisi form  -->
                                <!-- form akan dikirim ke halaman proses.php dengan method post  -->
                                <!-- form modal layaknya form pada umumnya  -->
                                <form method="post" action="proses.php">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>Judul</label>
                                        <input type="text" class="form-control" name="judul">
                                    </div>
                                    <div class="form-group">
                                        <label>Isi</label>
                                        <textarea class="form-control" name="isi" rows="5"></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- membuat header tabel dengan tema dark -->
                    <!-- cek dokumentasi bootstrap untuk membuat macam-macam tabel  -->
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th width="300px">Judul Post</th>
                                <th scope="col">Isi Post</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                // membuat koneksi ke database 
                               // $koneksi = mysqli_connect("localhost", "root", "", "latihan");
                                $koneksi = mysqli_connect("178-18-253-214.cprapid.com", "ur5rc6ey_root", "dianmustika99", "ur5rc6ey_latihan");
    
                                //membuat variabel angka
                                $no = 1;
    
                                //mengambil data dari tabel post
                                $select         = mysqli_query($koneksi, "select * from post");
    
                                //melooping(perulangan) dengan menggunakan while
                                while($data= mysqli_fetch_array($select)){
                            ?>
                            <tr>
    
                                <!-- menampilkan data dengan menggunakan array  -->
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $data['judul']; ?></td>
                                <td><?php echo $data['isi']; ?></td>
                                <td><a href="hapus.php?idpost=<?php echo $data['idpost']; ?>">Hapus</td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
        </script>
        <!-- jangan lupa menambahkan script js sweet alert di bawah ini  -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js"></script>
    
    
    <!-- jika ada session sukses maka tampilkan sweet alert dengan pesan yang telah di set
    di dalam session sukses  -->
    <?php if(@$_SESSION['sukses']){ ?>
        <script>
            swal("Good job!", "<?php echo $_SESSION['sukses']; ?>", "success");
        </script>
    <!-- jangan lupa untuk menambahkan unset agar sweet alert tidak muncul lagi saat di refresh -->
    <?php unset($_SESSION['hau']); } ?>

<!-- swall untuk hapus -->
     <?php if(@$_SESSION['hapus']){ ?>
        <script>
            swal("Data Terhapus!", "<?php echo $_SESSION['hapus']; ?>", "hapuss");
        </script>
    <!-- jangan lupa untuk menambahkan unset agar sweet alert tidak muncul lagi saat di refresh -->
    <?php unset($_SESSION['hapus']); } ?>
    </body>
    
    </html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masjid Al Ikram</title>
    <link rel="stylesheet" href="style2.css">
    <link href='https://fonts.googleapis.com/css?family=Epilogue' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Be Vietnam Pro' rel='stylesheet'>
    <link rel="shortcut icon" type="image/x-icon" href="logowikrama.png" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">


</head>
<body>
<header>
  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="header_logo">
      <img src="logowikrama.png" alt="" srcset="">
      <p class="tag">
        SMK WIKRAMA <br> BOGOR
      </p>
    </div>
    <div class="header_links">
      <ul class="nav_links">
        <li class="nav_link"><a href="#home" class="page-scroll">Beranda</a></li>
        <li class="nav-link"><a href="#">Cara wakaf</a></li>
        <li class="nav-link"><a href="#" class="page-scroll">Data wakaf</a></li>
        <li class="nav-link"><a href="#" class="page-scroll">Gallery</a></li>
        <li class="nav-link"><a href="#" class="page-scroll">Web Wikrama</a></li>
      </ul>
    </div>
  </nav>
</header>

  <section class="main">
    <div class="balapi">
   <p class="balap">Masjid Besar SMK Wikrama Bogor</p>
   <h1 class="balap1">Mari <span>Tingkatkan</span> <br> <span>Keimanan </span>Masyarakat <br> SMK Wikrama Bogor </h1>
   
   </div>  

   <div class="balapin">
   <img src="imgdas.png" alt="">
   
</div>

<img class="gambarsamping" src="logowikrama.png" alt="">
<img class="gambarkecil" src="imginf.png" alt="">

<button class="butsho" onclick="openPopup()"><b>Beri Bantuan Shodaqoh</b></button>
</section>

<div id="popup" class="popup-card">
<center>
         <h1>Bantuan Shodaqoh</h1>
         <form action="insert.php" method="post">
            <p>
               <label for="Nama">Nama:</label>
               <input class="forminputt" type="text" name="nama" id="firstName">
            </p>
            <p>
               <label for="ID">ID:</label>
               <input class="forminputt" type="text" name="id" id="lastName">
            </p>
            <p>
               <label for="Paket">Paket:</label>
               <select class="forminputt" name="paket" id="Paket">
                <option value="Paket1">Paket 1</option>
                <option value="Paket2">Paket 2</option>
                <option value="Paket3">Paket 3</option>
               </select>
            </p>
            <p>
               <label for="Kategori">Kategori:</label>
               <select class="forminputt" name="kategori" id="Kategori">
                <option value="Barang">Barang</option>
                <option value="Uang">Uang</option>
               </select>
            </p>
            <p>
               <label for="Nominal">Nominal:</label>
               <input class="forminputt" type="text" name="nominal" id="emailAddress">
            </p>
            <input type="submit" value="Submit">
         </form>
      </center>

    <button onclick="closePopup()">Tutup</button>
  </div>
  
  <!-- Overlay -->
  <div id="overlay" class="overlay"></div>
  
    
  <?php
    // Koneksi ke database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "masjidwik";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Koneksi database gagal: " . $conn->connect_error);
    }

    // Mengambil data donasi dari tabel sodakoh
    $sql = "SELECT SUM(REPLACE(nominal, '.', '')) AS total_donasi, COUNT(*) AS jumlah_donatur FROM sodakoh";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $total_donasi = $row["total_donasi"];
        $jumlah_donatur = $row["jumlah_donatur"];
    } else {
        $total_donasi = 0;
        $jumlah_donatur = 0;
    }

    // Menentukan target donasi
    $target_donasi = 200000000; // 200 juta

    // Menghitung persentase donasi terkumpul
    $persentase = ($total_donasi / $target_donasi) * 100;

    // Menghitung lebar bar progress
    $bar_width = $persentase * 3;
    
    // 3 adalah faktor untuk mengatur lebar

    $sql = "SELECT * FROM sodakoh";
    $result = $conn->query($sql);
    $scrolling_text = "";

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $nama = $row["nama"];
            $nominal = $row["nominal"];
            $kategori = $row["kategori"];

            $scrolling_text .= "$nama - $kategori : Rp. " . number_format($nominal) . "  •  ";
        }
    }
    ?>

    <div class="card">
        <div class="donation-info">
            <p>Total Donasi</p> <br> <h1> <?php echo $jumlah_donatur; ?> orang</h1>
        </div>
        <div class="donation-info1">
            <p>Total Dana Terkumpul</p> <br> <h1> Rp. <?php echo number_format($total_donasi); ?> </h1>
        </div>
        <div class="target-donation">
            <p> Total Target Dana</p> <br> <h1> Rp. <?php echo number_format($target_donasi); ?></h1> 
        </div>
        <hr color="green">
        <div class="progress-bar">
            <div class="progress" style="width: <?php echo $bar_width; ?>px;"></div>
            <div class="percentage">
                <strong><?php echo number_format($persentase, 2); ?>%</strong><p>Terpenuhi</p>
            </div>
        </div>
        <div class="scrolling-text">
            <p><?php echo $scrolling_text; ?></p>
            
            <div class="blue-bar"></div>
        </div>
    </div>
    
    </section> 

    <section class="bane"> <div class="slider">
        <div class="list">
            <div class="item">
                <img src="1.jpg" alt="">
            </div>
            <div class="item">
                <img src="2.jpg" alt="">
            </div>
            <div class="item">
                <img src="3.jpg" alt="">
            </div>
            <div class="item">
                <img src="4.jpg" alt="">
            </div>
            <div class="item">
                <img src="5.jpg" alt="">
            </div>
        </div>
        <div class="buttons">
            <button id="prev"><</button>
            <button id="next">></button>
        </div>
        <ul class="dots">
            <li class="active"></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
    </div>
  </section>
  


<div class="balapi">
  <h1 class="manfaath1"><span>Manfaat </span>Wakaf, Infaq <br>Shodaqoh. </h1>
  <p class="manfaatteks">Berikut Adalah Beberapa Keutamaan Wakaf, Infaq <br>Shodaqoh Yang Akan Anda Dapatkan.</p>
  </div>
</section>

<section class="manfaatcard">
<div class="card0">
  <div class="card-details">
    <img src="border.png" class="bordercard"> 
    <img src="bigheart.png" class="picbaccard">
  <b class="text-title">Menjadikan hati <br> lebih tenang</b>
    <p class="text-body">Kami memberikan harga <br> yang terbaik dibandingkan <br> dengan Kompetitor kami. </p>
  </div>
</div>
<div class="card1">
  <div class="card-details">
    <img src="ver.png" class="bordercard"> 
    <img src="bigver.png" class="picbaccard">
  <b class="text-title">Terbukanya <br> Pintu Rezeki</b>
    <p class="text-body">Allah SWT akan membuka <br> pintu rezeki dari arah yang <br> tidak dikira sebelumnya. </p>
  </div>
</div>
<div class="card2">
  <div class="card-details">
    <img src="sec.png" class="bordercard"> 
    <img src="bigsec.png" class="picbaccard">
  <b class="text-title">Menjauhkan Dari  <br> Bahaya</b>
    <p class="text-body">Rasulullah SAW pernah <br> bersabda: "Bersegeralah <br> untuk bersedekah, karena <br> musibah dan bencana tidak <br> bisa mendahului sedekah." </p>
  </div>
</div>
<div class="card3">
  <div class="card-details">
    <img src="star.png" class="bordercard"> 
    <img src="bigstar.png" class="picbaccard">
  <b class="text-title">Pahala Yang Tak <br> Terputus</b>
    <p class="text-body">Ini akan menolong kita di  <br> akhirat nantinya, juga <br> dapat menyelamatkannya <br> dari api neraka.</p>
  </div>
  <img src="handmasjid.png" class="handpicmas" alt="">
</div>
</section>

<section class="carawakaf">
 <div class="balapi">
  <h1 class="carah1"><span>Cara Melakukan  </span>Wakaf, Infaq <br>Shodaqoh. </h1>
  <p class="carateks">Berikut Adalah Cara Melakukan Wakaf, Infaq Shodaqoh Untuk <br> Membantu Pembangunan Masjid Besar SMK Wikrama Bogor.</p>
  </div>
 </section>

 <section class="caracard">
<div class="caracard1">
  <div class="cara-details">
    <p class="titleecard"><b> <span>01</span> </b> </p> 
  <b class="cara-title">Isi Form Data Diri</b>
    <p class="cara-body">Isikan form pengisian yang disediakan di form data diri, isikan dengan data diri anda dengan <br> teliti. </p>
  </div>
</div>
<div class="caracard2">
  <div class="cara-details">
    <p class="titleecard"><b> <span>02</span> </b> </p> 
  <b class="cara-title">Isikan Nominal Shodaqoh</b>
    <p class="cara-body">Isikan nominal yang akan anda Shodaqohkan, <br> pastikan isi nominalnya dengan seiklasnya tanpa ada <br> paksaan apapun. </p>
  </div>
</div>
<div class="caracard3">
  <div class="cara-details">
    <p class="titleecard"><b> <span>03</span> </b> </p> 
  <b class="cara-title">Upload Bukti Pembayaran</b>
    <p class="cara-body">Pilih metode pembayaran dan upload bukti <br> pembayarannya. </p>
  </div>
</div>
<div class="caracard4">
  <div class="cara-details">
    <p class="titleecard"><b> <span>04</span> </b> </p> 
  <b class="cara-title">Verifikasi Pembayaran</b>
    <p class="cara-body">Pembayaran anda akan di verifikasi oleh admin  <br> dan jika terverifikasi nama anda akan tampil. </p>
  </div>
</div>
 </section>

<section class="datawakaf">
<div class="balapi">
  <h1 class="datah1"><span>Data Donatur </span>Wakaf, Infaq <br>Shodaqoh. </h1>
  <p class="datateks">Berikut Adalah Data Donatur Wakaf, Infaq Sodaqoh Untuk <br> Masjid Besar SMK Wikrama Bogor.</p>
  </div>
</section>

<section class="datatabel">
<?php
include("koneksi.php");
?>

<div class="datatabel">
 <div class="row">
   <div class="col-sm-8">
    <?php echo $deleteMsg??''; ?>
    <div class="table-responsive">
      <table class="table-table-bordered">
       <thead><tr><th>Nomor</th>

         <th>Nama Donatur</th>
         <th>ID Donatur</th>
         <th>Paket</th>
         <th>Kategori</th>
         <th>Nominal</th>
    </thead>
    <tbody>
  <?php
      if(is_array($fetchData)){      
      $sn=1;
      foreach($fetchData as $data){
    ?>
      <tr>
      <td><?php echo $sn; ?></td>
      <td><?php echo $data['Nama']??''; ?></td>
      <td><?php echo $data['ID']??''; ?></td>
      <td><?php echo $data['Paket']??''; ?></td>
      <td><?php echo $data['Kategori']??''; ?></td>
      <td><?php echo 'Rp. ' . $data['Nominal']??''; ?></td>  
     </tr>
     <?php
      $sn++;}}else{ ?>
      <tr>
        <td colspan="8">
    <?php echo $fetchData; ?>
  </td>
    <tr>
    <?php
    }?>
    </tbody>
     </table>
   </div>
</div>
</div>
</div>

</section>

<section class="gallwakaf">
<div class="balapi">
  <h1 class="galh1"><span>Gallery </span>Masjid Besar SMK <br>Wikrama Bogor. </h1>
  <p class="galteks">Berikut Adalah Gallery Masjid Besar SMK Wikrama Bogor.</p>
  </div>
</section>

<section class="gallwak">
  <img class="gallmas" src="masjidwik4.jpg" alt="">
  <img class="gallmas1" src="masjidwik5.jpg" alt="">
  <img class="gallmas2" src="masjidwik6.jpg" alt="">
  
  <img class="gallmas4" src="masjidwik8.jpg" alt="">
  <img class="gallmas5" src="masjidwik9.jpg" alt="">
  
  
  <div class="gallcard">
  <div class="gallcara-details">
   <a href="#"><img class="gallimg" src="next.png" alt=""></a>  
  <b class="gallcara-title">Buka Galeri</b>

  </div>
</div>
</section>




<section class="footer">
            <footer>
                <div class="footer-left">
                    <div class="footer-title-body">
                        <img src="logowikrama.png">
                        <h3 class="title">Smk Wikrama <br>Bogor</h3>
                    </div>
                    <div class="address">
                        <h4>Alamat</h4>
                        <p>Jl. Raya Wangun <br>
                            Kelurahan Sindangsari<br>
                            Bogor Timur 16720</p>
                    </div><br>
                    <div class="call">
                        <h4>Telepon</h4>
                        <p> 0251-8242411 / <br>
                            082221718035 (Whatsapp)</p>
                    </div><br>
                    <div class="footer-social-icons">
                        <a href="#"><i class='bx bxl-facebook-square'></i></a>
                        <a href="#"><i class='bx bxl-twitter'></i></a>
                        <a href="#"><i class='bx bxl-instagram'></i></a>
                        <a href="#"><i class='bx bxl-youtube'></i></a>
                    </div>
                </div>
                <div class="footer-right">
                    <h4>Tentang Wikrama</h4>
                    <ul>
                        <li><a href="#">Sejarah</a></li>
                        <li><a href="#">Peraturan Sekolah</a></li>
                        <li><a href="#">Rencana Strategi &amp; Prestasi</a></li>
                        <li><a href="#">Yayasan</a></li>
                        <li><a href="#">Struktur Organisasi</a></li>
                        <li><a href="#">Cabang</a></li>
                        <li><a href="#">Penghargaan</a></li>
                        <li><a href="#">Kerjasama</a></li>
                    </ul>
                </div>
                <?php


                if (isset($_POST['submit'])) {
                    $nama = $_POST['nama'];
                    $email = $_POST['email'];
                    $pesan = $_POST['pesan'];


                    $sql = "INSERT INTO kontak (naxma, email, pesan) VALUES ('$nama', '$email', '$pesan')";
                    if (mysqli_query($conn, $sql)) {
                    }
                }
                ?>
                <div class="footer-right-box">
                    <h4>Kirim Pesan</h4>
                    <div class="content-footer">
                        <form action="" method="post">
                            <div class="name">
                                <input type="text" name="nama" required placeholder="Nama">
                            </div>
                            <div class="email">
                                <input type="email" name="email" required placeholder="Email">
                            </div>
                            <div class="msg">
                                <textarea name="pesan" cols="30" rows="5" placeholder="Pesan Anda"></textarea>
                            </div>
                            <div class="btn">
                                <button type="submit" name="submit">Kirim Pesan</button>
                            </div>
                        </form>
                    </div>
                </div>

            </footer>

        </section>

        <p class="footer-copy">© 2023 - SMK Wikrama Bogor. All Rights Reserved.</p>

<script>
    // JavaScript untuk mengontrol pop-up
    function openPopup() {
      document.getElementById("popup").style.display = "block";
      document.getElementById("overlay").style.display = "block";
    }

    function closePopup() {
      document.getElementById("popup").style.display = "none";
      document.getElementById("overlay").style.display = "none";
    }




  </script> <script src="app.js"></script>

</body>
</html>
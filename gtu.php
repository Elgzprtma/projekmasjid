<!DOCTYPE html>
<html>
<head>
<link href='https://fonts.googleapis.com/css?family=Be Vietnam Pro' rel='stylesheet'>
    <title>Progress Bar Donasi</title>
    <style>
     
       
       .card {
            border: 1px solid #ccc;
           padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: flex-start; /* Updated to align items to the left */
            width: 80%;
            border-radius: 5px;
        }
        

        .donation-info {
           

            margin-bottom: 10px;
            text-align: left;
            margin-bottom: -43px;
            margin-top: -3px;
            margin-left: 83%;
            font-family: 'Be Vietnam Pro';

        }

        .donation-info p {
            font-family: 'Be Vietnam Pro';
            margin-bottom: -30px; 
            width: 215px;
            height: 33px;
            margin-left: 0px;
            font-family: 'Be Vietnam Pro';
            font-style: normal;
            font-weight: 500;
            font-size: 20px;
            line-height: 213.5%;
            /* identical to box height, or 33px */
            text-transform: capitalize;
            /* text */
            color: #919191;
        }

        .donation-info h1 {
            width: 192px;
            height: 65px;
            font-family: 'Be Vietnam Pro';
            font-style: normal;
            font-weight: 700;
            font-size: 40px;
            line-height: 163.5%;
            color: #181F1C;
        }

        .donation-info1 {
            margin-bottom: 20px;
            text-align: left;
         
            margin-top: -104px;
           margin-left: 30px;
            font-family: 'Be Vietnam Pro';
        }

        .donation-info1 p {
            font-family: 'Be Vietnam Pro';
            margin-bottom: -30px; 
            width: 215px;
            height: 33px;
            margin-left: 0px;
            font-family: 'Be Vietnam Pro';
            font-style: normal;
            font-weight: 500;
            font-size: 20px;
            line-height: 163.5%;
            /* identical to box height, or 33px */
            text-transform: capitalize;
            /* text */
            color: #919191;
        }

        .donation-info1 h1 {
            width: 292px;
            height: 65px;
            font-family: 'Be Vietnam Pro';
            font-style: normal;
            font-weight: 700;
            font-size: 40px;
            line-height: 163.5%;
            color: #181F1C;
        }
        
        .progress-bar {
            border: 1px solid #ccc;
            height: 50px;
            width: 70%;
            margin-bottom: 10px;
            margin-right: 80px;
            position: relative; /* Tambahkan ini */
            border-radius: 5px;
        }

        .progress {
            background-color: #337ab7;
            height: 50px;
            position: absolute; /* Tambahkan ini */
            top: 0;
            left: 0;
            border-radius: 5px;
        }

        .percentage strong {
            text-align: left; /* Ubah menjadi "left" */
            margin-bottom: 0px;
            margin-top: 5px;
            margin-left: 105%; /* Tambahkan margin-left */
            font-family: 'Be Vietnam Pro';
            font-size: 30px;
            width: 224px;
height: 46px;


font-family: 'Be Vietnam Pro';
font-style: normal;
font-weight: 700;
        }

        .percentage p{
            margin-bottom: 20px;
            margin-top: -28px;
            margin-left: 115%;
            font-family: 'Be Vietnam Pro';
            font-size: 20px;
            font-weight: 700;
            width: 224px;
height: 46px;
font-style: normal;
        }

        .target-donation {
            text-align: left;
            margin-bottom: 40px;
            margin-top: -173px;
            font-family: 'Be Vietnam Pro';
            margin-left: 40%;
        }

        .target-donation p {
            margin-bottom: -50px; 
            width: 315px;
            height: 33px;
            font-family: 'Be Vietnam Pro';
            font-style: normal;
            font-weight: 500;
            font-size: 20px;
            line-height: 3.5%;
            /* identical to box height, or 33px */
            text-transform: capitalize;
            /* text */
            color: #919191;
        }

        .target-donation h1 {
            width: 392px;
            height: 65px;
            font-family: 'Be Vietnam Pro';
            font-style: normal;
            font-weight: 700;
            font-size: 40px;
            line-height: 173.5%;
            color: #181F1C;
        }

        
        .scrolling-text {
            
            margin-top: 30px;
          
            width: 100%;
            height: 50px;
            overflow: hidden;
        }

        .scrolling-text p {
            font-family: 'Be Vietnam Pro';
            margin-top: 80px;
            font-size: 18px;
            font-weight: 500;
            line-height: 100%;
            margin: 0;
            white-space: nowrap;
            animation: marquee 10s linear infinite;
        }

      
        @keyframes marquee {
        0% {
            transform: translateX(100%);
        }
        100% {
            transform: translateX(-100%);
        }
    }

    </style>
</head>
<body>
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
        
        </div>
        
    </div>
   

    
</body>
</html>
\\


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
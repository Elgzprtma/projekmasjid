<!DOCTYPE html>
<html>

<head>
    <title>Insert Page page</title>
</head>

<body>
    <center>
        <?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "masjidwik";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Koneksi database gagal: " . $conn->connect_error);
    }


        // Taking all 5 values from the form data(input)
        $nama = $_REQUEST['nama'];
        $id = $_REQUEST['id'];
        $paket = $_REQUEST['paket'];
        $kategori = $_REQUEST['kategori'];
        $nominal = $_REQUEST['nominal'];

        // We are going to insert the data into our sampleDB table
        $sql = "INSERT INTO sodakoh VALUES ('$nama',
            '$id','$paket','$kategori','$nominal')";

        // Check if the query is successful
        if(mysqli_query($conn, $sql)){
            echo "<h3>data stored in a database successfully."
                . " Please browse your localhost php my admin"
                . " to view the updated data</h3>";

            echo nl2br("\n$nama\n $id\n "
                . "$paket\n $kategori\n $nominal");
        } else{
            echo "ERROR: Hush! Sorry $sql. "
                . mysqli_error($conn);
        }

        // Close connection
        mysqli_close($conn);
        ?>
    </center>
</body>

</html>
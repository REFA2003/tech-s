<?php

require '../koneksi.php';

$username = $_POST["username"];
$password = $_POST["password"];

$query = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' AND password = '$password'");
$cek = mysqli_num_rows($query);

if($cek > 0){
    $data = mysqli_fetch_array($query);

if($data['role'] == "admin"){
    session_start();
    $_SESSION["username"] = $data["username"];
    $_SESSION["nama"] = $data["nama"];
    $_SESSION["role"] = $data["role"];
    echo "
        <script type='text/javascript'>
        alert('Selamat Datang Min :)')
        window.location='../admin/index.php'
        </script>
    ";
}else if($data['role'] == "user"){
    session_start();
    $_SESSION["username"] = $data["username"];
    $_SESSION["nama"] = $data["nama"];
    $_SESSION["role"] = $data["role"];
    echo "
        <script type='text/javascript'>
        alert('Anda Berhasil Login, Silahkan Belanja')
        window.location='../user/index.php'
        </script>
    ";
}

}else{
    echo "
        <script type='text/javascript'>
        alert('Username dan Password tidak ditemukan')
        window.location='index.php'
        </script>
    ";
}


?>
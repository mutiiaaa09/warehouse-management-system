<?php
session_start();
 
//panggil koneksi database
include "koneksi.db.php";

$pass = md5($_POST['password']);
$username = mysqli_escape_string($koneksi, $_POST['username']);
$password = mysqli_escape_string($koneksi, $pass);
$level = mysqli_escape_string($koneksi, $_POST['level']);

//cek username, terdaftar atau tidak
$cek_user = mysqli_query($koneksi, "SELECT *  FROM tuser WHERE username = '$username' and level='$level' ");
$user_valid = mysqli_fetch_array ($cek_user);
//uji jika username terdaftar
	if($user_valid){
		//cek username terdaftar
		//cek password sesuai tidak
		if($password == $user_valid['password']){
			//jika password sesuai
			//buat session
			session_start();
			$_SESSION['username'] = $user_valid['username'];
			$_SESSION['nama_lengkap'] = $user_valid['nama_lengkap'];
			$_SESSION['level'] = $user_valid['level'];
			
			//uji level user
			if($level == "Admin"){
				header('location: menuutama_Admin.php');
				exit;
			
			} elseif ($level == "Operator"){
				header('location: menuutama_Operator.php');
				exit;
				
			} elseif ($level == "Umum"){
				header('location: menuutama_Umum.php');
				exit;
				
			} 
		} else {
			echo "<script>alert('Maaf, Login Gagal, Password anda tidak sesuai!');
			window.location.href='index.php'</script>";
		}
	} else {
		echo "<script>alert('Maaf, Login Gagal, Username anda tidak terdaftar!');
		window.location.href='index.php'</script>";
	}        
?>
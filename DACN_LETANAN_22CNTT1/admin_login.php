<?php
session_start();

$conn = new mysqli("localhost", "root", "", "restaurant","3307");

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Lấy thông tin từ form
$username = $_POST['username'];
$password = md5($_POST['password']); // Mã hóa MD5

// Kiểm tra tài khoản admin
$sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $_SESSION['admin'] = $username;
    header("Location: admin_data.php");
} else {
    echo "<script>
        alert('Sai tài khoản hoặc mật khẩu!');
        window.location.href = 'login.html';
    </script>";
}

$conn->close();
?>

<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.html");
    exit();
}

$servername = "localhost";
$username = "root";
$password = "lactrym2k4";
$dbname = "restaurant";

$conn = new mysqli("localhost", "root", "", "restaurant","3307");

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Lấy danh sách đặt bàn
$sql = "SELECT * FROM reservations";
$result = $conn->query($sql);

echo "<h1>Danh sách đặt bàn</h1>";
if ($result->num_rows > 0) {
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Họ và Tên</th>
                <th>Số điện thoại</th>
                <th>Số khách</th>
                <th>Ngày đặt</th>
                <th>Thời gian</th>
                <th>Yêu cầu thêm</th>
            </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['fullname']}</td>
                <td>{$row['phone']}</td>
                <td>{$row['guests']}</td>
                <td>{$row['reservation_date']}</td>
                <td>{$row['reservation_time']}</td>
                <td>{$row['additional_request']}</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "Chưa có dữ liệu đặt bàn.";
}

$conn->close();
?>

<style>
body {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
    background: url("image/noen1.webp") no-repeat center center fixed;    
    background-size: cover; /* Đảm bảo ảnh phủ toàn màn hình */
    color: #000000; /* Màu chữ mặc định */
}

table {
    width: 80%; /* Chiều rộng bảng */
    margin: 20px auto; /* Căn giữa bảng */
    border-collapse: collapse; /* Bỏ khoảng cách giữa các ô */
    background-color: rgba(255, 255, 255, 0.9); /* Nền trắng mờ */
    border-radius: 10px; /* Bo tròn góc */
    overflow: hidden; /* Ẩn viền tràn */
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2); /* Đổ bóng */
}

table th, table td {
    padding: 10px 15px; /* Khoảng cách bên trong */
    text-align: left; /* Căn trái nội dung */
    border: 1px solid #ddd; /* Viền giữa các ô */
}

table th {
    background-color: #979999; /* Nền xám trắng cho tiêu đề */
    color: rgb(37, 33, 33); /* Chữ màu trắng */
    text-transform: uppercase; /* Viết hoa chữ */
    font-weight: bold;
}

table tr:nth-child(even) {
    background-color: #f2f2f2; /* Nền xám nhạt cho hàng chẵn */
}

table tr:hover {
    background-color: #f1c40f; /* Nền vàng nhạt khi hover */
}

h1 {
    text-align: center; /* Căn giữa tiêu đề */
    margin-top: 20px; /* Khoảng cách trên */
    color: black; /* Màu chữ tiêu đề */
    text-shadow: 2px 2px 4px rgba(57, 56, 56, 0.5); /* Hiệu ứng chữ bóng */
    e61717
}
</style>
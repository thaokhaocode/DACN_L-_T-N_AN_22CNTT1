<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Đặt bàn</title>
</head>
<body>
<?php
// Kết nối đến cơ sở dữ liệu
$conn = new mysqli("localhost", "root", "", "restaurant", 3307);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
?>
<?php
// Nhận dữ liệu từ form
if (isset($_POST['ADD'])){
$fullname = $_POST['fullname'];
$phone = $_POST['phone'];
$guests = $_POST['guests'];
$reservation_date = $_POST['date'];
$reservation_time = $_POST['time'];
$additional_request = $_POST['requests'];

// Chèn dữ liệu vào bảng reservations
$sql = "INSERT INTO reservations (fullname, phone, guests, reservation_date, reservation_time, additional_request) 
        VALUES ('$fullname', '$phone', '$guests', '$reservation_date', '$reservation_time', '$additional_request')";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Đặt bàn thành công!'); window.location.href='index.html';</script>";
} else {
    echo "Lỗi: " . $conn->error;
}

// Đóng kết nối
$conn->close();
}
?>
<div class="form-container">
        <form method="POST" action = "save_data.php">
            <div class="form-group">
                <label for="fullname">Họ và Tên:</label>
                <input type="text" id="fullname" name="fullname" placeholder="Nhập họ và tên" required>
            </div>
            <div class="form-group">
                <label for="phone">Số điện thoại:</label>
                <input type="text" name="phone" id="phone" placeholder="Nhập số điện thoại" required>
            </div>
            <div class="form-group">
                <label for="guests">Số khách:</label>
                <input type="number" id="guests" name="guests" placeholder="Nhập số lượng khách" min="1" required>
            </div>
            <div class="form-group">
                <label for="date">Ngày đặt:</label>
                <input type="date" id="date" name="date" required>
            </div>
            <div class="form-group">
                <label for="booking_time">Thời gian:</label>
                <input type="time" id="time" name="time" required>
            </div>
            <div class="form-group">
                <label for="note">Yêu cầu thêm (góp ý):</label>
                <textarea id="note" name="requests" placeholder="Nhập yêu cầu hay góp ý thêm (nếu có)" rows="3"></textarea>
            </div>
            <button type="submit" class="btn-submit" name="ADD">Đặt Ngay</button>
        </form>
</div>
</body>
</html>
<style>
    body {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
    background: url("image/backgroundtt.webp") no-repeat center center fixed;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh; /* Đặt chiều cao toàn màn hình */
}

.form-container {
    background-color: #ffffff; /* Nền trắng */
    padding: 20px 30px; /* Khoảng cách nội dung */
    border-radius: 10px; /* Bo tròn góc */
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* Hiệu ứng đổ bóng */
    width: 100%;
    max-width: 400px; /* Giới hạn chiều rộng */
}

.form-container h2 {
    text-align: center; /* Canh giữa tiêu đề */
    margin-bottom: 20px; /* Khoảng cách dưới */
    font-size: 24px; /* Cỡ chữ */
    color: #333; /* Màu chữ */
}

.form-group {
    margin-bottom: 15px; /* Khoảng cách giữa các ô */
}

label {
    display: block; /* Chuyển label thành dạng block */
    margin-bottom: 5px; /* Khoảng cách dưới label */
    font-size: 14px; /* Cỡ chữ */
    color: #555; /* Màu chữ */
}

input, textarea {
    width: 100%; /* Đầy chiều ngang form */
    padding: 10px; /* Khoảng cách bên trong */
    border: 1px solid #ddd; /* Viền nhạt */
    border-radius: 5px; /* Bo góc */
    font-size: 14px; /* Cỡ chữ */
    box-sizing: border-box; /* Gộp padding và width */
}

input:focus, textarea:focus {
    outline: none; /* Bỏ đường viền mặc định khi focus */
    border-color: #a6aaae; /* Viền màu xám khi focus */
    box-shadow: 0 0 4px rgba(0, 123, 255, 0.3); /* Hiệu ứng focus */
}

textarea {
    resize: none; /* Bỏ khả năng thay đổi kích thước */
}

.btn-submit {
    display: block;
    width: 100%; /* Đầy chiều ngang */
    background-color: #6f6f6f; /* Nền xám */
    color: white; /* Màu chữ */
    padding: 10px; /* Khoảng cách nội dung */
    font-size: 16px; /* Cỡ chữ */
    border: none; /* Bỏ viền */
    border-radius: 5px; /* Bo góc */
    cursor: pointer; /* Thay đổi con trỏ khi hover */
    margin-top: 10px;
}

.btn-submit:hover {
    background-color: #7a7c7c; /* Tông xám đậm hơn khi hover */
    transition: background-color 0.3s ease; /* Hiệu ứng chuyển màu */
}
</style>
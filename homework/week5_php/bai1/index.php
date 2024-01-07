<?php
// Khởi tạo biến để lưu trạng thái và thông báo
$status = "";
$message = "";

// Kiểm tra xem người dùng đã gửi dữ liệu chưa
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ biểu mẫu
    $hoTen = $_POST["hoTen"];
    $email = $_POST["email"];
    $binhLuan = $_POST["binhLuan"];

    // Kiểm tra họ tên
    if (empty($hoTen) || ctype_space($hoTen)) {
        $status = "error";
        $message = "Họ tên không được để trống hoặc chỉ chứa khoảng trắng.";
    }

    // Kiểm tra email
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $status = "error";
        $message = "Email không hợp lệ.";
    }

    // Nếu không có lỗi, hiển thị thông báo thành công
    else {
        $status = "success";
        $message = "Bình luận của bạn đã được ghi nhận.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Biểu mẫu nhập thông tin</title>
</head>
<body>
    <h2>Nhập thông tin</h2>
    <?php
    if ($status === "error") {
        echo '<p style="color: red;">' . $message . '</p>';
    } elseif ($status === "success") {
        echo '<p style="color: green;">' . $message . '</p>';
    }
    ?>
    <form method="post">
        <label for="hoTen">Họ tên:</label>
        <input type="text" name="hoTen" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <br>
        <label for="binhLuan">Bình luận:</label>
        <textarea name="binhLuan" rows="4" cols="50"></textarea>
        <br>
        <input type="submit" value="Gửi">
    </form>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
    <title>Tạo mã QR code</title>
    <style>
        body{
          display: flex;
		  align-items: center;
		  justify-content: center;
        }
        .form-input{
            margin-top: 20px;
            height: fit-content;
            width: fit-content;
            text-align: center;
            border: 3px solid #ccc;
            font-size: 20px;
        }
        .hien_thi_qr{
            margin-top: 20px;
            text-align: center;   
        }
    </style>
</head>
<body>
    <form method="post" class="form-input">
        <label style="color: blue;border-bottom: 2px dashed violet;">Form điền thông tin</label>
        <br>
        <br>
        <label for="hoTen">Họ và tên:</label>
        <input type="text" name="hoTen" required>
        <br>
        <label for="mssv">MSSV:</label>
        <input type="text" name="mssv" required>
        <br>
        <input type="submit" value="Tạo QR code">
    </form>
    
    <?php
    // Kiểm tra xem người dùng đã gửi thông tin chưa
    if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    ?>
    <?php
    // Lấy thông tin từ biểu mẫu
    $hoTen = $_POST["hoTen"];
    $mssv = $_POST["mssv"];

    // Tạo chuỗi chứa thông tin
    $thongTin = "Họ và tên: $hoTen\nMSSV: $mssv";

    // Sử dụng thư viện qrcode để tạo QR code
    include('./phpqrcode/qrlib.php'); // Đảm bảo rằng bạn đã tải thư viện qrcode và đặt nó trong thư mục cùng cấp với tệp PHP này

    // Tạo QR code và lưu nó vào một tệp PNG
    QRcode::png($thongTin, 'qrcode.png', QR_ECLEVEL_L, 4);
    ?>
    
    <div class="hien_thi_qr">
        <?php  echo '<img src="qrcode.png">'; ?>
    </div> 
<?php } ?>

</body>
</html>
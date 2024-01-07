<!DOCTYPE html>
<html>
<head>
    <title>Tính tuổi và số ngày chênh lệch</title>
</head>
<body>
    <h1>Tính tuổi và số ngày chênh lệch</h1>
    <form method="POST" action="">
        <label>Người 1:</label>
        <input type="text" name="name1" placeholder="Họ tên người 1" required>
        <input type="date" name="dob1" required><br>
        
        <label>Người 2:</label>
        <input type="text" name="name2" placeholder="Họ tên người 2" required>
        <input type="date" name="dob2" required><br>
        
        <input type="submit" value="Tính">
    </form>
    
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name1 = $_POST['name1'];
        $dob1 = new DateTime($_POST['dob1']);
        
        $name2 = $_POST['name2'];
        $dob2 = new DateTime($_POST['dob2']);
        
        // Tính tuổi
        $today = new DateTime();
        $age1 = $today->diff($dob1)->y;
        $age2 = $today->diff($dob2)->y;
        
        // Tính số ngày chênh lệch
        $diff = $dob1->diff($dob2);
        $daysDiff = $diff->format('%R%a');
        
        echo "<br>";
        echo "Tuổi của $name1 là $age1 tuổi. <br>";
        echo "Tuổi của $name2 là $age2 tuổi. <br>";
        echo "Số ngày chênh lệch giữa họ là $daysDiff ngày. <br>";
    }
    ?>
</body>
</html>
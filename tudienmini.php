<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Từ điển mini</title>
    <style>
        body {font-family: Arial; background: #f4f4f4; text-align: center;}
        form {margin-top: 50px;}
        input[type=text] {padding: 8px; width: 250px;}
        input[type=submit] {padding: 8px 15px; background: #007bff; color: white; border: none; cursor: pointer;}
        input[type=submit]:hover {background: #0056b3;}
        .result {margin-top: 30px; font-size: 18px;}
    </style>
</head>
<body>
    <h1>TỪ ĐIỂN MINI - Anh ⇄ Việt</h1>
    <form method="post">
        <input type="text" name="word" placeholder="Nhập từ cần tra..." required>
        <input type="submit" value="Tra nghĩa">
    </form>

    <?php
    // Kết nối MySQL
    $conn = mysqli_connect("localhost", "root", "", "tudien");
    if (!$conn) {
        die("<p style='color:red'>Không thể kết nối database!</p>");
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $word = trim($_POST["word"]);
        $word = mysqli_real_escape_string($conn, $word);

        // Tìm từ trong bảng
        $sql = "SELECT * FROM words WHERE english = '$word' OR vietnamese = '$word'";
        $result = mysqli_query($conn, $sql);

        echo "<div class='result'>";
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<p><b>{$row['english']}</b> ⇄ {$row['vietnamese']}</p>";
            }
        } else {
            echo "<p>Không tìm thấy từ '$word' trong từ điển.</p>";
        }
        echo "</div>";
    }

    mysqli_close($conn);
    ?>
</body>
</html>

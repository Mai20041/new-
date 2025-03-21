echo '<?php
function getDbConnection() {
    $host = "localhost";
    $dbname = "news_demo";
    $username = "root";
    $password = "150404"; // Thay bằng password MySQL của bạn nếu có

    try {
        $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    } catch (PDOException $e) {
        die("Connection failed: " . $e->getMessage());
        echo "Connection failed: " . $e->getMessage();
    }
}
?>' > db.php
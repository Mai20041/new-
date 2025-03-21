echo '<?php
require_once "db.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $title = $_POST["title"] ?? "";
    $content = $_POST["content"] ?? "";

    if (!empty($title) && !empty($content)) {
        try {
            $db = getDbConnection();
            $stmt = $db->prepare("INSERT INTO news (title, content) VALUES (:title, :content)");
            $stmt->execute(["title" => $title, "content" => $content]);
            header("Location: index.php");
            exit;
        } catch (PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    } else {
        echo "Vui lòng nhập đầy đủ tiêu đề và nội dung.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Thêm Tin Mới</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2>Thêm Tin Mới</h2>
        <form method="post">
            <div class="mb-3">
                <label class="form-label">Tiêu đề</label>
                <input type="text" name="title" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Nội dung</label>
                <textarea name="content" class="form-control" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Thêm</button>
            <a href="index.php" class="btn btn-secondary">Hủy</a>
        </form>
    </div>
</body>
</html>' > add_s.php


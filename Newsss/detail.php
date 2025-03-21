echo '<?php
require_once "db.php";

$id = $_GET["id"] ?? null;
if (!$id) {
    header("Location: index.php");
    exit;
}

$db = getDbConnection();
$stmt = $db->prepare("SELECT * FROM news WHERE id = :id");
$stmt->execute(["id" => $id]);
$news = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$news) {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Chi tiết Tin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2><?php echo htmlspecialchars($news["title"]); ?></h2>
        <p><strong>Ngày tạo:</strong> <?php echo date("d/m/Y H:i", strtotime($news["created_date"])); ?></p>
        <p><strong>Nội dung:</strong></p>
        <p><?php echo nl2br(htmlspecialchars($news["content"])); ?></p>
        <a href="index.php" class="btn btn-primary">Quay lại</a>
    </div>
</body>
</html>' > detail.php
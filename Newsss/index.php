echo '<?php
require_once "db.php";
$db = getDbConnection();
$stmt = $db->query("SELECT * FROM news ORDER BY created_date DESC");
$newsList = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>

    <title>Danh sách Tin tức</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <link href="styles.css" rel="stylesheet">
    <div class="container mt-4">
        <h2>Danh sách Tin tức</h2>
        <a href="add_news.php" class="btn btn-success mb-3">Thêm tin mới</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Tiêu đề</th>
                    <th>Ngày tạo</th>

                    <th>nội dung </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($newsList as $news): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($news["title"]); ?></td>
                        <td><?php echo date("d/m/Y", strtotime($news["created_date"])); ?></td>
                        <td><a href="detail.php?id=<?php echo $news["id"]; ?>" class="btn btn-info btn-sm">Xem chi tiết</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>' > index.php
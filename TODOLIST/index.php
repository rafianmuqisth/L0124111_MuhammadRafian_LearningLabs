<?php include('db.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f4; color: #333; }
        .container { max-width: 700px; margin: auto; padding: 20px; background: #fff; border-radius: 8px; }
        .task { display: flex; justify-content: space-between; padding: 10px; border: 1px solid #ddd; margin-top: 5px; border-radius: 5px; }
        .task.completed { text-decoration: line-through; color: #888; }
        .task-category { font-style: italic; }
    </style>
</head>
<body>

<div class="container">
    <h2>To-Do List</h2>
    <form action="add_task.php" method="POST">
        <input type="text" name="task" placeholder="Nama kegiatan" required>
        <select name="category">
            <option value="Work">Work</option>
            <option value="Personal">Personal</option>
            <option value="Study">Study</option>
        </select>
        <button type="submit">Tambah</button>
    </form>

    <h3>Daftar Kegiatan</h3>
    <?php
    $result = $conn->query("SELECT * FROM tasks ORDER BY created_at DESC");
    while ($row = $result->fetch_assoc()):
        $completed = $row['is_completed'] ? 'completed' : '';
    ?>
        <div class="task <?= $completed ?>">
            <span><?= htmlspecialchars($row['name']) ?> <span class="task-category">(<?= $row['category'] ?>)</span></span>
            <div>
                <a href="update_task.php?id=<?= $row['id'] ?>&toggle=1"><?= $row['is_completed'] ? 'Belum Selesai' : 'Selesai' ?></a>
                <a href="delete_task.php?id=<?= $row['id'] ?>" onclick="return confirm('Hapus kegiatan ini?')">Hapus</a>
            </div>
        </div>
    <?php endwhile; ?>
</div>

</body>
</html>

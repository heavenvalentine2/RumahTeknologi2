<?php
    session_start();
    require "functions.php";
    check_login();


    $title = "Add Article"; 
    require "header.php"; 
?>
<head>
</head>
<body>
<div class="container mt-4">
        <h2>Tambah Artikel Baru</h2>
        <form action="add_article_process.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="title" class="form-label">Title:</label>
                <input type="text" class="form-control" id="title" name="title">
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Content:</label>
                <textarea class="form-control" id="content" name="content"></textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Photo:</label>
                <input type="file" class="form-control" id="image" name="image">
            </div>
            <button type="submit" class="btn btn-dark" name="submit">Add</button>
        </form>
    </div>
</body>
</html>

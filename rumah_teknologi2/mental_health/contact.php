<?php
session_start();
require 'functions.php';
if (!isset($_SESSION["login"])) {
    redirect('login.php');
}

$query = "SELECT * FROM contact";
$data_contacts = read($query);

$title = "Chat";
require "header.php";
?>

<body>
    <div class="container mt-4">
        <div class="card border-0 shadow bg-body rounded mt-4 p-0">
            <section class="users">
                <header class="pb-3 card-header rounded-top p-3">
                    <div class="d-flex align-items-center">
                        <a href="index.php"><i class="col h3 bi bi-arrow-left ms-3 text-dark"></i></a>
                        <h4 class="d-flex justify-content-center text-center me-auto ms-5 fw-bold">Contacts</h4>
                        <div class="proffesion" id="navbarProffesion">
                            <div class="nav nav-expand-lg me-auto me-auto ms-5 gap-2">
                                <a href="#" class="nav-link text-bg-dark rounded bg-dark">Polisi</a>
                                <a href="#" class="nav-link text-bg-dark rounded bg-dark">Psikologi</a>
                                <a href="#" class="nav-link text-bg-dark rounded bg-dark">Firefighter</a>
                            </div>
                        </div>
                    </div>
                </header>
                <div class="details card p-2 m-3 border-0">
                    <?php if (!empty($data_contacts)) : ?>
                        <?php foreach ($data_contacts as $contacts) : ?>
                            <div class="card-body shadow rounded d-flex align-items-center my-3">
                                <div class="flex-shrink-0">
                                    <img src="https://picsum.photos/300/200" class="rounded-circle me-4 ms-2" alt="" style="width:60px; height:60px;">
                                </div>
                                <div class="flex-column">
                                    <h5 class="flex-grow-1 m-0"><?= $contacts['name'] ?></h5>
                                    <p class="flex-grow-1 m-0"><?= $contacts['profession'] ?></p>
                                    <p class="flex-grow-1 m-0"><?= $contacts['instance'] ?></p>
                                </div>
                                <div class="d-flex ms-auto details gap-3">
                                    <a href="chat_page.php"><i class="bi bi-chat-dots-fill h3 text-success" type="submit"></i></a>
                                    <?php if ($_SESSION['role'] == 'admin') : ?>
                                        <a href="contact_edit_process.php?id=<?= $contacts['id']; ?>"><i class="bi bi-pencil-square h3 text-secondary"></i></a>
                                        <a href="contact_delete_process.php?id=<?= $contacts['id']; ?>"><i class="bi bi-trash3-fill h3"></i></a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </section>
            <?php if ($_SESSION['role'] == 'admin') : ?>
                <a class="btn d-flex justify-content-end me-2 border-0" href="contact_add.php">
                    <i class="bi bi-plus-circle-fill h2"></i>
                </a>
            <?php endif; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
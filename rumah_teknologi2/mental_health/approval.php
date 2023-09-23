    <?php
    session_start();
    require 'functions.php';
    check_login();
    if ($_SESSION['role'] != 'admin') {
        redirect('index.php');
    }

    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>User Register Approval</title>
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <!-- Bootstrap Icons -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
        <!-- Custom CSS -->
        <link rel="stylesheet" href="assets/css/app.css">
        <link rel="stylesheet" href="assets/css/decor.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="manifest" href="smanifest.json" />
        <script src="assets/js/script.js"></script>
    </head>

    <body>
        <div class="mx-5 mt-2 ">
            <a href="index.php"><i class="col h3 bi bi-arrow-left mx-3 text-dark"></i></a>
        </div>
        <div class="container my-5">
            <div class="mb-5">
                <div class="h1">
                    User Register
                </div>

                <table class="table table-striped table-hover " id=" user">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">NIS</th>
                        <th scope="col">Name</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Action</th>
                    </tr>

                    <?php
                    $query = "SELECT * FROM user WHERE STATUS = 'pending' ORDER BY id ASC";
                    $result = mysqli_query($conn, $query);
                    $counter = 1;
                    while ($row = mysqli_fetch_array($result)) {
                    ?>
                        <tr class="align-content-center">
                            <td><?php echo $counter++; ?></td>
                            <td><?php echo $row['NIS']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['gender']; ?></td>
                            <td>
                                <form action="approval_process.php" method="POST" class="d-flex align-items-center">
                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                    <div class="input-group">
                                        <button class="btn btn-dark w-20" type="submit" name="approve">Approve</button>
                                        <button class="btn btn-danger w-20" type="submit" name="deny">Deny</button>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>

            <div class="mb-5">
                <div class=" h1">
                    User List
                </div>
                <table class="table table-striped table-hover">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">NIS</th>
                        <th scope="col">Name</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Role</th>
                        <th scope="col">Action</th>
                    </tr>

                    <?php
                    $query = "SELECT * FROM user WHERE STATUS != 'pending'ORDER BY id ASC";
                    $result = mysqli_query($conn, $query);
                    $counter = 1;

                    while ($row = mysqli_fetch_array($result)) {
                    ?>
                        <tr>
                            <td><?php echo $counter++; ?></td>
                            <td><?php echo $row['NIS']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['gender']; ?></td>
                            <td><?php echo $row['role']; ?></td>
                            <td>
                                <form action="update_status.php" method="POST" class="d-flex align-items-center">
                                    <div class="input-group w-95">
                                        <select class="form-select user-role-select" name="user_roles[]">
                                            <option value="professional" <?php if ($row['role'] == '') echo 'selected'; ?>>-</option>
                                            <option value="professional" <?php if ($row['role'] == 'professional') echo 'selected'; ?>>Professional</option>
                                            <option value="admin" <?php if ($row['role'] == 'admin') echo 'selected'; ?>>Admin</option>
                                            <option value="siswa" <?php if ($row['role'] == 'siswa') echo 'selected'; ?>>Siswa</option>
                                        </select>
                                        <input type="hidden" name="user_ids[]" value="<?php echo $row['id']; ?>">
                                        <input type="hidden" name="user_statuses[]" value="<?php echo $row['status']; ?>">

                                        <select class="form-select user-status-select" name="status" value="<?php echo $row['status']; ?>">
                                            <option value="approved" <?php if ($row['status'] == 'approved') echo 'selected'; ?>>approved</option>
                                            <option value="pending" <?php if ($row['status'] == 'pending') echo 'selected'; ?>>pending</option>
                                            <option value="deny" <?php if ($row['status'] == 'deny') echo 'selected'; ?>>deny</option>
                                        </select>
                                        <button type="submit" class="btn btn-dark">Submit</button>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>

            </div>

            <div class="mb-5">
                <div class=" h1">
                    List Laporan
                </div>
                <table class="table table-striped table-hover">
                    <tr>
                        <th scope="col" style="width:15%;">No</th>
                        <th scope="col" style="width:15%;">NIS</th>
                        <th scope="col" style="width:15%;">ID Report</th>
                        <th scope="col" style="width:15%;">Gender</th>
                        <th scope="col" style="width:15%;">Action</th>
                    </tr>

                    <?php
                    $query = "SELECT sos_report.*, user.NIS, user.id FROM sos_report INNER JOIN user ON (sos_report.outgoing_id = user.id) 
                        WHERE sos_report.status = 'pending'";
                    $result = mysqli_query($conn, $query);
                    $counter = 1;

                    while ($row = mysqli_fetch_array($result)) {
                    ?>
                        <tr>
                            <td><?php echo $counter++; ?></td>
                            <td><?php echo $row['NIS']; ?></td>
                            <td><?php echo $row['id_report']; ?></td>
                            <td><?php echo $row['gender']; ?></td>
                            <td>
                                <form action="assign_professional.php" method="POST">
                                    <div class="input-group">
                                        <input type="hidden" name="report_id" value="<?php echo $row['id_report']; ?>">
                                        <input type="hidden" name="outgoing_id" value="<?php echo $row['id']; ?>">
                                        <select class="form-select" name="assigned_professional">
                                            <option value="" selected>Select Professional</option>
                                            <?php
                                            if ($row['gender'] === 'male') {
                                                $professional_query = "SELECT * FROM user WHERE role = 'professional' AND gender = 'male'";
                                            } elseif ($row['gender'] === 'female') {
                                                $professional_query = "SELECT * FROM user WHERE role = 'professional' AND gender = 'female'";
                                            } else {
                                                $professional_query = "SELECT * FROM user WHERE role = 'professional'";
                                            }

                                            $professional_result = mysqli_query($conn, $professional_query);

                                            while ($professional_row = mysqli_fetch_array($professional_result)) {
                                                echo '<option value="' . $professional_row['id'] . '">' . $professional_row['name'] . '</option>';
                                            }
                                            ?>
                                        </select>
                                        <input type="hidden" name="id_professional" value="<?php echo $professional_row['id']; ?>">
                                        <button type="submit" class="btn btn-dark">Assign</button>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>

            </div>
        </div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    </body>

    </html>
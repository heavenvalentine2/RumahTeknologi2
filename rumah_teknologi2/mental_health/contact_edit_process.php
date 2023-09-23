<?php
session_start();
require "functions.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    redirect('contact.php');
}

$query = "SELECT * FROM contact WHERE id = $id";

$data_contacts = read($query);

$data_contacts[0]['name'];
$data_contacts[0]['number'];
$data_contacts[0]['instance'];
$data_contacts[0]['schedule_start'];
$data_contacts[0]['schedule_start'];
$data_contacts[0]['profession'];

?>

<?php
$title = "Contact";
require "header.php"; ?>
<body>

    <div class="container mt-5">
        <form action="contact_sv_edit_process.php" method="post">
            <input hidden name="id" value="<?= $id; ?>">

            <div class="input-group d-flex align-items-center gap-3 mb-3">
                <label class="form-label fs-5 fw-semibold" for="name" style="width:150px;">Nama</label>
                <input class=" form-control fw-semibold rounded" type="text" name="name" id="name" value="<?= $data_contacts[0]['name']; ?>" required>
            </div>

            <div class="input-group d-flex align-items-center gap-3 mb-3">
                <label class="form-label fs-5 fw-semibold" for="number" style="width:150px;">Nomer Telpon</label>
                <input class="form-control mb-2 fw-semibold rounded" type="text" name="number" id="number" value="<?= $data_contacts[0]['number']; ?>" required>
            </div>

            <div class="input-group d-flex align-items-center gap-3 mb-3">
                <label class="form-label fs-5 fw-semibold" for="instance" style="width:150px;">Instansi</label>
                <input class=" form-control mb-2 fw-semibold rounded" type="text" name="instance" id="instance" value="<?= $data_contacts[0]['instance']; ?>" required>
            </div>

            <div class="input-group d-flex align-items-center gap-3 mb-3">
                <label class="form-label fs-5 fw-semibold" for="schedule_start" style="width:150px;">Schedule Start</label>
                <input class="mb-2 fw-semibold rounded border-2 border" type="time" name="schedule_start" id="schedule_start" style="width: 100px; height:40px;" value="<?= date('h:i', strtotime($data_contacts[0]['schedule_start'])); ?>" required>

                <label class="form-label fs-5 fw-semibold" for="schedule_end" style="width:150px;">Schedule End</label>
                <input class="mb-2 fw-semibold rounded border-2 border" type="time" name="schedule_end" id="schedule_end" style="width: 100px; height:40px;" value="<?= date('h:i', strtotime($data_contacts[0]['schedule_end'])); ?>" required>
            </div>

            <div class="input-group d-flex align-items-center gap-3 mb-3">
                <div class="form-label fs-5 fw-semibold mt-3 mb-3" for="title" style="width:150px;">Profesi</div>
                <div class="nav nav-expand-lg me-auto me-auto gap-2">

                    <!-- id sama for harus sama biar isa kerja -->
                    <input type="radio" class="btn-check" name="profession" id="prof_polisi" autocomplete="off" value="Polisi" <?= $data_contacts[0]['profession'] == 'Polisi' ? 'checked' : '' ?>required>
                    <label class="btn btn-outline-success" for="prof_polisi">Polisi</label>

                    <input type="radio" class="btn-check" name="profession" id="prof_psi" autocomplete="off" value="Psikologi" <?= $data_contacts[0]['profession'] == 'Psikologi' ? 'checked' : '' ?>>
                    <label class="btn btn-outline-success" for="prof_psi">Psikologi</label>

                    <input type="radio" class="btn-check" name="profession" id="prof_fire" autocomplete="off" value="Firefighter" <?= $data_contacts[0]['profession'] == 'Firefighter' ? 'checked' : '' ?>>
                    <label class="btn btn-outline-success" for="prof_fire">Firefighter</label>
                </div>
            </div>
            <button class="form-control btn btn-dark mt-4" type="submit" name="submit" id="submit" value="submit">Submit</button>
        </form>

    </div>

    <!-- <script src="assets/js/contact_add.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>


</body>

</html>
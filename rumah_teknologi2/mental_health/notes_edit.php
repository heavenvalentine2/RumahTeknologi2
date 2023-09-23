<?php

session_start();
require_once "functions.php";
check_login();

if (isset($_GET['id_notes'])) 
{
    $id_notes = $_GET['id_notes'];
} 
else 
{
    $id_notes = 0;
}

$query = "SELECT * FROM notes WHERE id_notes = $id_notes ";

$data_notes = read($query);

$data_notes[0]['title'];
$data_notes[0]['content'];

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Notes</title>
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
  <script src="https://cdn.tiny.cloud/1/go1gmvr3e6uufl9x12htj42eseakthpxdjkkkvx0vfv8zvt1/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
</head>
<body>
    
  <div class="container">

  <form action="notes_edit_process.php" method="post">
    <input type="hidden" name="id_notes" value="<?= $id_notes; ?>">

    <label class="form-label mt-5 mb-1 fs-5 fw-semibold" for="title">Judul</label>
    
    <input class="form-control mt-3 mb-2 fw-semibold" type="text" name="title" id="title" value="<?=$data_notes[0]['title'];?>">
    
    <label class="form-label fs-5 fw-semibold mt-3 mb-3" for="catatan ">Catatan</label>

    <textarea class="form-control" name="content" id="content" value=""> <?=$data_notes[0]['content'];?>
    </textarea>

    <input type="hidden" name="id"  id= "id" value="<?php echo $_SESSION['id'];?>">

    <button class="form-button btn btn-dark mt-4" type="submit" name="submit" id="submit" value="submit">Submit</button>

  </form>

  </div>

<script>
  tinymce.init({
    selector: 'textarea',
    plugins: 'anchor autolink charmap codesample emoticons link lists  searchreplace table wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss',
    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
    tinycomments_mode: 'embedded',
    tinycomments_author: 'Author name',
  });
</script>
</body>

</html>


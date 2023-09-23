<?php
require_once "functions.php";
    
$id_notes  = $_GET['id_notes'];

$query = "DELETE FROM notes
          WHERE id_notes = $id_notes";
          
cud($query);

redirect('notes.php');

?>
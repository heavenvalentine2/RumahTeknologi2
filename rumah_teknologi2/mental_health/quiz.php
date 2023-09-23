<?php
// Connect to the database
$connection = mysqli_connect('localhost', 'username', 'password', 'quiz_questions');

// Check if the form has been submitted
if (isset($_POST['submit'])) {
  // Loop through each question and check the user's answer
  $questions = mysqli_query($connection, "SELECT * FROM quiz_questions");
  $correct_answers = 0;
  while ($row = mysqli_fetch_assoc($questions)) {
    $user_answer = $_POST['answer_' . $row['id']];
    if ($user_answer == $row['answer']) {
      $correct_answers++;
    }
  }

  // Display the user's score
  $total_questions = mysqli_num_rows($questions);
  $score = ($correct_answers / $total_questions) * 100;
  echo '<p>You scored ' . $score . '% on the quiz.</p>';
}
?>

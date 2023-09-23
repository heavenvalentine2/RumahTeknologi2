<form method="post" action="quiz.php">
  <h3>Quiz Questions</h3>
  <?php
  // Retrieve questions from the database
  $questions = mysqli_query($connection, "SELECT * FROM quiz_questions ORDER BY RAND()");

  // Loop through each question and display it in the form
  while ($row = mysqli_fetch_assoc($questions)) {
    echo '<p>' . $row['question'] . '</p>';
    echo '<input type="text" name="answer_' . $row['id'] . '" />';
  }
  ?>
  <br />
  <input type="submit" name="submit" value="Submit Answers" />
</form>

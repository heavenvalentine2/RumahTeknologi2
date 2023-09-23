CREATE TABLE quiz_results (
  id INT(11) NOT NULL AUTO_INCREMENT,
  question_id INT(11) NOT NULL,
  user_answer INT(11) NOT NULL,
  PRIMARY KEY (id)
);

// Define quiz data
var quiz = [
  {
    question: "What is the capital of France?",
    answers: [
      "New York",
      "Paris",
      "London",
      "Berlin"
    ],
    correctAnswer: 1
  },
  {
    question: "What is the largest planet in our solar system?",
    answers: [
      "Earth",
      "Venus",
      "Mars",
      "Jupiter"
    ],
    correctAnswer: 3
  },
  {
    question: "What is the highest mountain in the world?",
    answers: [
      "Mount Everest",
      "Mount Kilimanjaro",
      "Mount Rushmore",
      "Mount Fuji"
    ],
    correctAnswer: 0
  }
];

// Define global variables
var currentQuestion = 0;
var score = 0;

// Define DOM elements
var quizContainer = document.getElementById("quiz");
var progressBar = document.getElementById("progress-bar");
var submitButton = document.getElementById("submit");
var restartButton = document.getElementById("restart");

// Function to generate the HTML for a question
function generateQuestionHTML() {
  var questionData = quiz[currentQuestion];
  var answersHTML = "";

  for (var i = 0; i < questionData.answers.length; i++) {
    answersHTML += '<div class="answers"><input type="radio" id="answer' + i + '" name="answer" value="' + i + '"><label for="answer' + i + '">' + questionData.answers[i] + '</label></div>';
  }

  var questionHTML = '<div class="question">' + questionData.question + '</div>' + answersHTML;
  quizContainer.innerHTML = questionHTML;
}

// Function to update the progress bar
function updateProgressBar() {
  var progress = (currentQuestion + 1) / quiz.length * 100;
  progressBar.style.width = progress + "%";
}

// Function to handle when the user submits an answer
function submitAnswer() {
  var selectedAnswer = parseInt(document.querySelector('input[name="answer"]:checked').value);

  if (selectedAnswer === quiz[currentQuestion].correctAnswer) {
    score++;
  }

  currentQuestion++;

  if (currentQuestion < quiz.length) {
    generateQuestionHTML();
    updateProgressBar();
  } else {
    endQuiz();
  }
}

// Function to end the quiz
function endQuiz() {
  var quizHTML = '<div class="question">You got ' + score + ' out of ' + quiz.length + ' questions correct!</div>';
  quizContainer.innerHTML = quizHTML;
  submitButton.style.display = "none";
  restartButton.style.display = "block";
}

// Function to restart the quiz
function restartQuiz() {
  currentQuestion = 0;
  score = 0;
  generateQuestionHTML();
  updateProgressBar();
  submitButton.style.display = "block";
  restartButton.style.display = "none";
}

// Add event listeners to buttons
submitButton.addEventListener("click", submitAnswer);
restartButton.addEventListener("click", restartQuiz);

// Start the quiz
generateQuestionHTML();
updateProgressBar();

// Set the progress bar percentage (0-100)
function setProgress(percent) {
  var progressBar = document.querySelector('.progress-bar');
  var progressContainer = document.querySelector('.progress-container');
  var progressPercent = document.querySelector('.progress-percent');
  
  progressBar.style.width = percent + '%';
  progressPercent.innerHTML = percent + '%';
  progressContainer.setAttribute('data-progress', percent);
}

// Example usage: set the progress to 50%
setProgress(50);




// var progressBar = document.getElementById("myBar");
// var percent = 0;

// function updateProgressBar() {
//   percent++;
//   progressBar.style.width = percent + "%";
  
//   if (percent < 100) {
//     setTimeout(updateProgressBar, 10);
//   }
// }

// updateProgressBar();



// var questions = [
//   {
//     question: "What is the capital of France?",
//     choices: ["Paris", "Madrid", "Rome", "Berlin"],
//     answer: 0
//   },
//   {
//     question: "What is the highest mountain in the world?",
//     choices: ["Mount Everest", "Mount Kilimanjaro", "Mount Denali", "Mount Fuji"],
//     answer: 0
//   },
//   {
//     question: "Who painted the Mona Lisa?",
//     choices: ["Leonardo da Vinci", "Vincent van Gogh", "Pablo Picasso", "Michelangelo"],
//     answer: 0
//   }
// ];

// var currentQuestion = 0;
// var score = 0;
// var progressBar = document.getElementById("myBar");

// function displayQuestion() {
//   var q = questions[currentQuestion];
//   document.getElementById("question").innerHTML = q.question;

//   var choicesHtml = "";
//   for (var i = 0; i < q.choices.length; i++) {
//     choicesHtml += '<button onclick="checkAnswer(' + i + ')">' + q.choices[i] + '</button>';
//   }
//   document.getElementById("choices").innerHTML = choicesHtml;
// }

// function checkAnswer(choice) {
//   if (choice === questions[currentQuestion].answer) {
//     score++;
//   }
//   currentQuestion++;

//   if (currentQuestion < questions.length) {
//     displayQuestion();
//     updateProgressBar();
//   } else {
//     displayScore();
//   }
// }

// function displayScore() {
//   var html = "You got " + score + " out of " + questions.length + " correct!";
//   document.getElementById("question").innerHTML = html;
//   document.getElementById("choices").innerHTML = "";
//   document.getElementsByTagName("button")[0].innerHTML = "Restart";
//   currentQuestion = 0;
//   score = 0;
//   progressBar.style.width = "0%";
// }

// function nextQuestion() {
//   if (currentQuestion === questions.length) {
//     document.location.reload();
//   } else {
//     displayQuestion();
//     updateProgressBar();
//   }
// }

// function updateProgressBar() {
//   var percent = (currentQuestion / questions.length) * 100;
// }
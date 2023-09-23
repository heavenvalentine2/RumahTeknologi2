// Questions for the quiz
var quiz = [
    {
      question: "What is the capital of France?",
      options: ["Paris", "London", "New York", "Tokyo"],
      answer: "Paris"
    },
    {
      question: "What is the largest planet in our solar system?",
      options: ["Earth", "Venus", "Jupiter", "Mars"],
      answer: "Jupiter"
    },
    {
      question: "What is the smallest country in the world?",
      options: ["Vatican City", "Monaco", "Nauru", "Tuvalu"],
      answer: "Vatican City"
    }
  ];
  
  // Variables to keep track of current question and score
  var currentQuestion = 0;
  var score = 0;
  
  // DOM elements
  var quizContainer = document.getElementById("quiz-container");
  var questionElement = document.getElementById("question");
  var optionsContainer = document.getElementById("options-container");
  var submitButton = document.getElementById("submit-button");
  var progressBar = document.getElementById("progress-bar");
  var restartButton = document.getElementById("restart-button");
  
  // Function to generate HTML for current question
  function generateQuestionHTML() {
    var currentQuizQuestion = quiz[currentQuestion];
    questionElement.textContent = currentQuizQuestion.question;
  
    // Clear previous options from container
    optionsContainer.innerHTML = "";
  
    // Add options to container
    for (var i = 0; i < currentQuizQuestion.options.length; i++) {
      var optionButton = document.createElement("button");
      optionButton.classList.add("option");
      optionButton.textContent = currentQuizQuestion.options[i];
      optionsContainer.appendChild(optionButton);
  
      // Add event listener for when option is clicked
      optionButton.addEventListener("click", function(event) {
        var selectedAnswer = event.target.textContent;
        checkAnswer(selectedAnswer);
      });
    }
  }
  
  // Function to check if selected answer is correct
  function checkAnswer(selectedAnswer) {
    var currentQuizQuestion = quiz[currentQuestion];
    if (selectedAnswer === currentQuizQuestion.answer) {
      score++;
    }
  
    // Move on to next question or end quiz if all questions answered
    currentQuestion++;
    if (currentQuestion < quiz.length) {
      generateQuestionHTML();
    } else {
      endQuiz();
    }
  
    // Update progress bar
    updateProgressBar();
  }
  
  // Function to update progress bar
  function updateProgressBar() {
    var progressPercent = (currentQuestion / quiz.length) * 100;
    progressBar.style.width = progressPercent + "%";
  }
  
  // Function to handle when the user restarts the quiz
  function restartQuiz() {
    currentQuestion = 0;
    score = 0;
    generateQuestionHTML();
    updateProgressBar();
    submitButton.disabled = false;
    restartButton.style.display = "none";
  }
  
  // Function to handle when the quiz ends
  function endQuiz() {
    // Send final score to server
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "submit-score.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
      if (xhr.readyState === 4 && xhr.status === 200) {
        var response = JSON.parse(xhr.responseText);
        if (response.success) {
          quizContainer.innerHTML = '<div class="score">You got ' + score + ' out of ' + quiz.length + ' questions correct!</div>';
          submitButton.disabled = true;
          restartButton.style.display = "block";
        } else {
          alert("There was an error submitting your score. Please try again.");
        }
      }
    };
}

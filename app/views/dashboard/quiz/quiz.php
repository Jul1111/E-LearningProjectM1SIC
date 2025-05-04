<?php
use App\controllers\QuizzesController;
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
</head>
<body>
  <div class="dashboard">
    <div class="main">
      <?php if(isset($_GET['course'])): ?>
        <center><h3>Quiz sur le cours : <i><?= htmlspecialchars(QuizzesController::getCourseByChapterId($_GET['course'])[0]->getTitle()) ?></i></h3></center>
      <?php else: ?>
        <h3 style="margin-bottom: 30px;">Liste des quiz disponibles</h3>
      <?php endif; ?>

      <div class="<?php echo isset($_GET['course']) ? 'courses quiz-mode' : 'course-list'; ?>">
        <?php
        $quizzes = QuizzesController::getQuizzes();

        if (count($quizzes) === 0) {
          echo '<div class="course-item">Aucun quiz pour le moment.</div>';
        } else {
          if (isset($_GET['course'])) {
            $quizId = intval($_GET['course']);
            $questions = QuizzesController::getQuizQuestions($quizId);

            if (count($questions) === 0) {
              echo '<div class="course-item">Aucune question pour ce quiz.</div>';
            } else {
              echo '<div id="quiz-container">';
              foreach ($questions as $qIndex => $question) {
                echo '<div class="question-block" id="question-' . $qIndex . '" style="' . ($qIndex === 0 ? '' : 'display:none;') . '">';
                echo '<p><strong>Question ' . ($qIndex + 1) . ' :</strong><br>' . htmlspecialchars($question->getContent()) . '</p>';

                $answers = QuizzesController::getAnswersForQuestion($question->getId());
                shuffle($answers);

                foreach ($answers as $answer) {
                  $answerId = $answer->getId();
                  $isCorrect = $answer->isCorrect() ? '1' : '0';
                  $content = htmlspecialchars($answer->getContent());

                  echo "<label class='answer'>";
                  echo "<input type='radio' name='question_$qIndex' value='$answerId' data-correct='$isCorrect'>";
                  echo $content;
                  echo "</label>";
                }

                echo '<button onclick="handleValidation(' . $qIndex . ')" id="next-btn-' . $qIndex . '" disabled>Suivant</button>';
                echo '</div>';
              }
              echo '</div>';

              echo '<div id="quiz-result" style="display:none;">';
              echo '<h3 id="result-text"></h3>';
              echo '</div>';
            }
          } else {
            foreach ($quizzes as $quiz) {
              $course = QuizzesController::getCourseByChapterId($quiz->getChapterId())[0];
              echo '<div class="course-card">';
              echo '<div class="course-icon-wrapper"><div class="course-icon">🧠</div></div>';
              echo '<div class="course-info">';
              echo '<h4>Quiz : ' . htmlspecialchars($course->getTitle()) . '</h4>';
              echo '<p class="author">par L2Master</p>';
              echo '<p class="description">Ce quiz couvre les points essentiels du cours "<strong>' . htmlspecialchars($course->getTitle()) . '</strong>" pour tester vos connaissances.</p>';
              echo '<div class="meta">';
              echo '<span class="created-at">📅 Créé le ' . date('d/m/Y', strtotime($course->getCreatedAt())) . '</span>';
              echo '</div>';
              echo '</div>';
              echo '<div class="course-action">';
              echo '<a href="/quiz?course=' . $quiz->getId() . '" class="btn-view-course">Accéder au quiz</a>';
              echo '</div>';
              echo '</div>';
            }
          }
        }
        ?>
      </div>
    </div>
  </div>

  <script>
    let correctCount = 0;
    const totalQuestions = document.querySelectorAll('.question-block').length;

    document.querySelectorAll('input[type="radio"]').forEach(input => {
      input.addEventListener('change', function () {
        const index = this.name.split('_')[1];
        document.getElementById('next-btn-' + index).disabled = false;
      });
    });

    function handleValidation(qIndex) {
      const parent = document.getElementById('question-' + qIndex);
      const radios = parent.querySelectorAll('input[type="radio"]');

      radios.forEach(r => r.disabled = true);

      let selectedRadio = null;

      radios.forEach(r => {
        const answer = r.closest('.answer');
        answer.classList.remove('correct', 'incorrect');
        if (r.checked) {
          selectedRadio = r;
        }
      });

      radios.forEach(r => {
        const answer = r.closest('.answer');
        if (r.dataset.correct === '1') {
          answer.classList.add('correct');
          if (r === selectedRadio) {
            correctCount++;
          }
        } else if (r === selectedRadio) {
          answer.classList.add('incorrect');
        }
      });

      setTimeout(() => {
        goToNextQuestion(qIndex);
      }, 800);
    }

    function goToNextQuestion(currentIndex) {
      const current = document.getElementById('question-' + currentIndex);
      const next = document.getElementById('question-' + (currentIndex + 1));

      if (next) {
        current.style.display = 'none';
        next.style.display = 'block';
      } else {
        current.style.display = 'none';
        showFinalResult();
      }
    }

    function showFinalResult() {
      const resultContainer = document.getElementById('quiz-result');
      const resultText = document.getElementById('result-text');
      resultText.textContent = `Quiz terminé : ${correctCount}/${totalQuestions} réponse${correctCount > 1 ? 's' : ''} correcte${correctCount > 1 ? 's' : ''}`;
      resultContainer.style.display = 'block';

      const quizId = new URLSearchParams(window.location.search).get('course');

      fetch('/quiz', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: `action=save_result&quiz_id=${quizId}&score=${correctCount}`
      })
      .then(response => response.json())
      .then(data => {
        if (!data.success) {
          console.error('Erreur lors de la sauvegarde du score.');
        }
      })
      .catch(error => {
        console.error('Erreur AJAX :', error);
      });
    }
  </script>
</body>
</html>

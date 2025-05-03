<?php
  use App\controllers\QuizzesController;
?>

<!DOCTYPE html>
<html lang="fr">
<body>
  <div class="dashboard">
    <div class="main">
      <div class="courses">
        <h3>Liste des cours</h3>
        <?php
          $quizzes = QuizzesController::getQuizzes();

          // check courses length
          if (count($quizzes) === 0) {
            echo '<div class="course-item">Aucun quiz pour le moment.</div>';
          } else {
            foreach ($quizzes as $quiz) {
              echo '<div class="course-item">';
              echo '<p> Quiz sur le cours : <b>' . htmlspecialchars(QuizzesController::getCourseTitle($quiz->getChapterId())) . '</b></p>';
              // bouton tout à droite "accéder au quiz"
              echo '<div class="course-button">';
              echo '<a href="/quizz?course=' . $quiz->getId() . '">Accéder au quiz</a>';
              echo '</div>';
              echo '</div>';
            }
          }
        ?>
      </div>
    </div>
  </div>
</body>
</html>

<?php
  use App\controllers\CoursesController;
?>

<!DOCTYPE html>
<html lang="fr">
<body>
  <div class="dashboard">
    <div class="main">
    <h3>Liste des cours</h3>
      <div class="courses">
        <?php
          $courses = CoursesController::getCourses();

          // check courses length
          if (count($courses) === 0) {
            echo '<div class="course-item">Aucun cours pour le moment.</div>';
          } else {
            foreach ($courses as $course) {
              echo '<div class="course-item">';
              echo '<h4>' . htmlspecialchars($course->getTitle()) . '</h4>';
              echo '<p>' . htmlspecialchars($course->getDescription()) . '</p>';
              // bouton tout à droite "voir le cours"
              echo '<div class="course-button" style="margin-top: 10px;">';
              echo '<a href="/chapters?course=' . $course->getId() . '" class="btn-course">Voir le cours</a>';
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

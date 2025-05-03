<?php
  use App\controllers\CoursesController;
?>

<!DOCTYPE html>
<html lang="fr">
<body>
  <div class="dashboard">
    <div class="main">
      <div class="courses">
        <h3>Liste des cours</h3>
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
              echo '<div class="course-button">';
              echo '<a href="/chapters?course=' . $course->getId() . '">Voir le cours</a>';
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

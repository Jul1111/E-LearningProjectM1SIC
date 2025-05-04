<?php
use App\controllers\CoursesController;
?>

<!DOCTYPE html>
<html lang="fr">
<body>
  <div class="dashboard">
    <div class="main">
      <h3 style="margin-bottom: 30px;">Tous les cours disponibles</h3>
      <div class="course-list">
        <?php
          $courses = CoursesController::getCourses();

          if (count($courses) === 0) {
            echo '<div class="course-item">Aucun cours pour le moment.</div>';
          } else {
            foreach ($courses as $course) {
              echo '<div class="course-card">';
              echo '<div class="course-icon-wrapper"><div class="course-icon">📘</div></div>';
              echo '<div class="course-info">';
              echo '<h4>' . htmlspecialchars($course->getTitle()) . '</h4>';
              echo '<p class="author">par L2Master</p>';
              echo '<p class="description">' . htmlspecialchars($course->getDescription()) . '</p>';
              echo '<div class="meta">';
              echo '<span class="created-at">📅 Créé le ' . date('d/m/Y', strtotime($course->getCreatedAt())) . '</span>';
              echo '</div>';
              echo '</div>';
              echo '<div class="course-action">';
              echo '<a href="/chapters?course=' . $course->getId() . '" class="btn-view-course">Voir le cours</a>';
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

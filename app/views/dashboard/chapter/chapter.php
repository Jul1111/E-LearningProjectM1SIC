<?php
  use App\controllers\ChapterController;
?>

<!DOCTYPE html>
<html lang="fr">
<body>
  <div class="dashboard">
    <div class="main">
      <div class="courses">
        <h3>Liste des chapitres</h3>
        <?php
          $courseId = $_GET['course'] ?? -1;
          $chapters = ChapterController::getByCourseID($courseId);

          // check courses length
          if (count($chapters) === 0) {
            echo '<div class="course-item">Aucun chapitre pour le moment.</div>';
          } else {
            foreach ($chapters as $chapter) {
              echo '<div class="course-item">';
              echo '<h4>' . htmlspecialchars($chapter->getTitle()) . '</h4>';
              echo '<p>' . htmlspecialchars($chapter->getDescription()) . '</p>';
              echo '</div>';
            }
          }
        ?>
      </div>
    </div>
  </div>
</body>
</html>

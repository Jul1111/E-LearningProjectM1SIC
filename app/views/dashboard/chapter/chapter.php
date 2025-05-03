<?php
  use App\controllers\ChapterController;
?>

<!DOCTYPE html>
<html lang="fr">
<link rel="stylesheet" href="/resources/css/style.css">
<body>
  <div class="dashboard">
    <div class="main">
      <h3>Liste des chapitres</h3>
      <div class="courses">
        <?php
          $courseId = $_GET['course'] ?? -1;
          $chapters = ChapterController::getByCourseID($courseId);

         
         // Mappage des PDFs (mettre à jour selon le bon ID du cours)
         $pdfPaths = [
          1 => '/resources/pdf/Cours_Complet_Illustré_BCG.pdf',
          2 => '/resources/pdf/Cours_Complet_Illustré_BUDGETS.pdf',
          3 => '/resources/pdf/Cours_Complet_Illustré_ECARTS.pdf',
          4 => '/resources/pdf/Cours_Complet_Illustré_INVESTISSEMENT_1.pdf',
          5 => '/resources/pdf/Cours_Complet_Illustré_INVESTISSEMENT_2.pdf',
          6 => '/resources/pdf/Cours_Complet_Illustré_MPM.pdf',
        ];

          if (count($chapters) === 0) {
            echo '<div class="course-item">Aucun chapitre pour le moment.</div>';
          } else {
            foreach ($chapters as $chapter) {
              echo '<div class="course-item">';
              echo '<h4>' . htmlspecialchars($chapter->getTitle()) . '</h4>';
              echo '<p>' . htmlspecialchars($chapter->getDescription()) . '</p>';

              if (isset($pdfPaths[$courseId])) {
                $pdfPath = $pdfPaths[$courseId];
                echo '<div style="margin-top: 15px; max-height: 100vh; overflow: auto;">';
                echo '<embed src="' . $pdfPath . '#toolbar=0&navpanes=0&scrollbar=0" type="application/pdf" width="100%" style="border-radius: 8px; border: 1px solid #ccc; min-height: 600px;" />';
                echo '</div>';

              } else {
                echo '<p style="color: #888;">Aucun document PDF disponible pour ce cours.</p>';
              }

              echo '</div>';
            }
          }
        ?>
      </div>
    </div>
  </div>
</body>
</html>

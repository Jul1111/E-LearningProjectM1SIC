<div class="dashboard">
  <div class="main">
    <div class="stats-wrapper">
      <h2 class="stats-title">Vos statistiques générales</h2>
      <p class="stats-subtitle">Voici vos performances sur les quiz réalisés :</p>

      <div class="stat-cards">
        <div class="stat-box learn-orange">
          <small>Quiz complétés</small>
          <strong><?= $stats['completed'] ?></strong>
          <span><?= $stats['totalQuizzes'] ?> au total</span>
        </div>
        <div class="stat-box learn-blue">
          <small>Moyenne /20</small>
          <strong><?= $stats['avgScore20'] ?></strong>
          <span>basée sur <?= $stats['completed'] * 30 ?> questions</span>
        </div>
        <div class="stat-box learn-pink">
          <small>Progression</small>
          <strong><?= $stats['progress'] ?>%</strong>
          <span><?= $stats['totalQuizzes'] - $stats['completed'] ?> quiz restants</span>
        </div>
      </div>
      <div class="center-btn">
        <button class="keep-going"><a href="/quiz" style="text-decoration: none; color:white;">Continuer les quiz</a></button>
      </div>
    </div>
  </div>
</div>

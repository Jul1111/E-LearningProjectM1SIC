<div class="dashboard">
  <div class="main">
    <div class="welcome-box stats-wrapper">
      <div class="welcome-text">
        <h2>👋 Bonjour <?= $_SESSION['username'] ?> !</h2>
        <p>Ravi de vous revoir sur Learn2Master.</p>
      </div>
    </div>

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
        <a href="/courses" style="text-decoration: none; color:white;"><button class="keep-going">Voir les cours</button></a>
        <a href="/quiz" style="text-decoration: none; color:white;"><button class="keep-going">Faire les quiz</button></a>
      </div>
    </div>
  </div>
</div>

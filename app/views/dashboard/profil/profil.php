<!DOCTYPE html>
<html lang="fr">
<body>
  <div class="dashboard">
    <div class="main">
      <h1>Profil</h1>
      <div class="profile-container">
        <div class="profile-header">
          <img src="https://st3.depositphotos.com/6672868/13701/v/450/depositphotos_137014128-stock-illustration-user-profile-icon.jpg" alt="Avatar">
          <div class="profile-info">
            <h3><?= $_SESSION['username']; ?></h3>
            <p>Email : <?= $_SESSION['email']; ?></p>
            <p>Statut : <b><?= isset($_SESSION['role']) ? $_SESSION['role'] : '{{ user_role }}'; ?></b></p>
          </div>
        </div>
        <p><strong>Université :</strong> Université de Paris</p>
        <p><strong>Filière :</strong> Management & Stratégie</p>
        <p><strong>Date d'inscription :</strong> <?= date('d/m/Y', strtotime($_SESSION['created_at'])); ?></p>
        <button class="edit-button">Modifier le profil</button>
        <button class="edit-button"><a href="/reset_data" style="text-decoration: none; color:white;">Réinitialiser ses données</a></button>
        <?php if (isset($resetSuccess) && $resetSuccess): ?>
          <div style="color: green; margin-top: 20px;">
            Vos données ont été réinitialisées avec succès.
          </div>
        <?php endif; ?>

      </div>
    </div>

  </div>
</body>
</html>

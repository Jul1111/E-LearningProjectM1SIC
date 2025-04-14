<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profil - Learn2Master</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
      background-color: #f9f9f9;
    }
    .dashboard {
      display: flex;
      min-height: 100vh;
    }
    .sidebar {
      width: 220px;
      background-color: #fff;
      border-right: 1px solid #eee;
      padding: 20px;
    }
    .sidebar h2 {
      font-size: 18px;
      margin-bottom: 20px;
      color: #ff9900;
    }
    .sidebar a {
      display: block;
      margin-bottom: 12px;
      color: #333;
      text-decoration: none;
    }
    .main {
      flex-grow: 1;
      padding: 40px;
    }
    .profile-container {
      background-color: #fff;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 2px 4px rgba(0,0,0,0.05);
      max-width: 600px;
    }
    .profile-header {
      display: flex;
      align-items: center;
      gap: 20px;
      margin-bottom: 30px;
    }
    .profile-header img {
      width: 80px;
      height: 80px;
      border-radius: 50%;
    }
    .profile-info p {
      margin: 6px 0;
    }
    .edit-button {
      display: inline-block;
      background-color: #ff9900;
      color: #fff;
      padding: 10px 20px;
      border: none;
      border-radius: 8px;
      font-weight: bold;
      cursor: pointer;
      margin-top: 20px;
    }
  </style>
</head>
<body>
  <div class="dashboard">

    <div class="sidebar">
      <h2>Menu</h2>
      <a href="/dashboard"><i class="fas fa-chart-line"></i> Tableau de bord</a>
      <a href="/cours"><i class="fas fa-book"></i> Cours</a>
      <a href="/quiz"><i class="fas fa-question-circle"></i> Quiz</a>
      <a href="/logout"><i class="fas fa-sign-out-alt"></i> Déconnexion</a>
    </div>

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
      </div>
    </div>

  </div>
</body>
</html>

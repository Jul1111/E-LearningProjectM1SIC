<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard - Learn2Master</title>
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
    .sidebar, .rightbar {
      width: 220px;
      background-color: #fff;
      border-right: 1px solid #eee;
      padding: 20px;
    }
    .sidebar h2, .rightbar h2 {
      font-size: 18px;
      margin-bottom: 20px;
      color: #ff9900;
    }
    .sidebar a, .rightbar a {
      display: block;
      margin-bottom: 12px;
      color: #333;
      text-decoration: none;
    }
    .main {
      flex-grow: 1;
      padding: 40px;
    }
    .top-bar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 40px;
    }
    .profile {
      display: flex;
      align-items: center;
      gap: 10px;
    }
    .profile img {
      width: 40px;
      height: 40px;
      border-radius: 50%;
    }
    .courses {
      background: #fff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 2px 4px rgba(0,0,0,0.05);
    }
    .courses h3 {
      margin-bottom: 20px;
    }
    .course-item {
      padding: 12px 0;
      border-bottom: 1px solid #eee;
    }
    .course-item:last-child {
      border-bottom: none;
    }
  </style>
</head>
<body>
  <div class="dashboard">

    <div class="sidebar">
      <h2>Menu</h2>
      <a href="#"><i class="fas fa-user"></i> Profil</a>
      <a href="#"><i class="fas fa-book"></i> Cours</a>
      <a href="#"><i class="fas fa-question-circle"></i> Quiz</a>
      <a href="#"><i class="fas fa-sign-out-alt"></i> Déconnexion</a>
    </div>

    <div class="main">
      <div class="top-bar">
        <h1>Tableau de bord</h1>
        <div class="profile">
          <img src="https://via.placeholder.com/40" alt="Profil">
          <span>Nom de l'utilisateur</span>
        </div>
      </div>
      <div class="courses">
        <h3>Cours terminés</h3>
        <div class="course-item">Aucun cours complété pour le moment.</div>
      </div>
    </div>

    <div class="rightbar">
      <h2>Navigation</h2>
      <a href="/">Accueil</a>
      <a href="/formation">Formations</a>
      <a href="/contact">Contact</a>
      <a href="/contact">FAQ</a>
    </div>

  </div>
</body>
</html>

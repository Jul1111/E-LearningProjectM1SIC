<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard - Learn2Master</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../../resources/css/style_dash.css">
  <link rel="icon" href="../../resources/img/favicon.png" type="image/png">

  <nav class="navbar">
    <div class="navbar-left">
      <a href="/dashboard" style="text-decoration: none;"><h1 class="dashboard-title">Tableau de bord</h1></a>
    </div>

    <div class="navbar-center">
      <div class="dropdown">
        <div class="dropdown-toggle">
          <span class="title">Cours</span>
          <span class="arrow"></span>
        </div>
        <div class="dropdown-content">
          <a href="#"><i class="fas fa-exclamation-circle"></i> Mes cours</a>
          <a href="#"><i class="fas fa-question-circle"></i> Quiz</a>
          </div>
      </div>

      <div class="dropdown">
        <div class="dropdown-toggle">
          <span class="title">Navigation</span>
          <span class="arrow"></span>
        </div>
        <div class="dropdown-content">
          <a href="/">Accueil</a>
          <a href="/formation">Formations</a>
          <a href="/contact">Contact</a>
          <a href="/contact">FAQ</a>
        </div>
      </div>
    </div>

    <div class="navbar-right">
      <a href="/profil" class="profile-link">
        <div class="profile">
          <img src="https://st3.depositphotos.com/6672868/13701/v/450/depositphotos_137014128-stock-illustration-user-profile-icon.jpg" alt="Profil">
          <span><?= $_SESSION['username'] ?></span>
        </div>
      </a>
      <a href="/logout" class="logout-btn" title="Déconnexion">
        <i class="fas fa-sign-out-alt"></i> <span>Déconnexion</span>
      </a>
    </div>
  </nav>

  <script>
    document.querySelectorAll('.dropdown').forEach(dropdown => {
      let timeout;

      const showMenu = () => {
        clearTimeout(timeout);
        dropdown.classList.add('open');
      };

      const hideMenu = () => {
        timeout = setTimeout(() => {
          dropdown.classList.remove('open');
        }, 100); // délai avant disparition (ms)
      };

      dropdown.addEventListener('mouseenter', showMenu);
      dropdown.addEventListener('mouseleave', hideMenu);

      dropdown.querySelector('.dropdown-toggle').addEventListener('focus', showMenu);
      dropdown.querySelector('.dropdown-toggle').addEventListener('blur', hideMenu);
    });
  </script>
</head>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Créer un compte - Learn2Master</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <!-- Bootstrap & FontAwesome -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>
  

  <!-- Style personnalisé -->
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #f9f9f9;
      margin: 0;
    }

    .btn-orange {
      background-color: #ff9900;
      color: white;
    }

    .btn-orange:hover {
      background-color: #e08600;
      color: white;
    }

    .link-orange {
      color: #ff9900;
      text-decoration: none;
    }

    .link-orange:hover {
      color: #e08600;
      text-decoration: underline;
    }

    .logo-learn2master {
      font-size: 32px;
      font-weight: bold;
      color: #ff9900;
      text-align: center;
      margin-bottom: 10px;
    }

    .signup-card {
      border-radius: 1rem;
      overflow: hidden;
    }

    .signup-image {
      height: 100%;
      width: 100%;
      object-fit: cover;
      border-radius: 0 1rem 1rem 0;
    }

    @media (max-width: 991.98px) {
      .signup-image {
        border-radius: 0 0 1rem 1rem;
        height: 300px;
      }
    }
  </style>
</head>
<body>
<header style="background-color: #ffffff; padding: 20px 40px; display: flex; align-items: center; border-bottom: 1px solid #eee;">
<a href="/" class="logo" style="font-size: 24px; font-weight: bold; color: #ff9900; text-decoration: none;">
    📘 Learn2Master
  </a>
</header>
<section class="text-center text-lg-start" style="padding-bottom: 80px;">
  <div class="container py-5">
    <div class="row align-items-center signup-card shadow bg-white" style="margin-bottom: 80px;">

      <!-- Formulaire -->
      <div class="col-lg-6 p-5">
        <div class="logo-learn2master">📘 Learn2Master</div>
        <h2 class="fw-bold mb-4">Créer un compte</h2>

        <form method="post" action="/signup" onsubmit="return validatePasswords()">
          <div class="form-outline mb-4">
            <input type="text" id="username" name="username" placeholder="Nom d'utilisateur" class="form-control" required />
          </div>

          <div class="form-outline mb-4">
            <input type="email" id="email" name="email" placeholder="your@email.com" class="form-control" required />
          </div>

          <div class="form-outline mb-4">
            <input type="password" id="password" name="password" placeholder="Mot de passe" class="form-control" required />
          </div>

          <div class="form-outline mb-4">
            <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirmez le mot de passe" class="form-control" required />
          </div>

          <button type="submit" class="btn btn-orange btn-block w-100 mb-3">
            S’inscrire
          </button>

          <p class="mt-4">Déjà inscrit ? <a href="/login" class="link-orange">Se connecter</a></p>
        </form>

        <script>
          function validatePasswords() {
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirm_password').value;

            if (password !== confirmPassword) {
              alert('Les mots de passe ne correspondent pas.');
              return false;
            }
            return true;
          }
        </script>
            </div>

            <!-- Image grande à droite -->
            <div class="col-lg-6 d-none d-lg-block p-0">
        <img src="https://img.freepik.com/photos-premium/homme-etudiant-ordinateur-ville-pour-applications-universitaires-recherches-universitaires-informations-site-web-bourses-personne-africaine-heureuse-ordinateur-portable-tapant-etudiant-philosophie-langue-campus_590464-239211.jpg?semt=ais_country_boost&w=740"
             alt="Étudiant sur ordinateur"
             class="signup-image">
            </div>
          </div>
        </div>
      </section>

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

        <form method="post" action="/signUp">
          <div class="row">
            <div class="col-md-6 mb-4">
              <div class="form-outline">
                <input type="text" id="prenom" name="prenom" placeholder="Prénom" class="form-control" required />
              </div>
            </div>
            <div class="col-md-6 mb-4">
              <div class="form-outline">
                <input type="text" id="nom" name="nom" placeholder="Nom" class="form-control" required />               
              </div>
            </div>
          </div>

          <div class="form-outline mb-4">
            <input type="email" id="email" name="email" placeholder="your@email.com" class="form-control" required />
          </div>

          <div class="form-outline mb-4">
            <input type="password" id="password" name="password" placeholder="Mot de passe" class="form-control" required />
          </div>

          <div class="form-check d-flex justify-content-start mb-4">
            <input class="form-check-input me-2" type="checkbox" value="" id="newsletter"/>
            <label class="form-check-label" for="newsletter">
              Je souhaite recevoir la newsletter
            </label>
          </div>

          <button type="submit" class="btn btn-orange btn-block w-100 mb-3">
            S’inscrire
          </button>

          <div class="text-center">
            <p>Ou inscrivez-vous avec :</p>
            <button type="button" class="btn btn-link btn-floating mx-1">
              <i class="fab fa-facebook-f"></i>
            </button>
            <button type="button" class="btn btn-link btn-floating mx-1">
              <i class="fab fa-google"></i>
            </button>
            <button type="button" class="btn btn-link btn-floating mx-1">
              <i class="fab fa-twitter"></i>
            </button>
            <button type="button" class="btn btn-link btn-floating mx-1">
              <i class="fab fa-github"></i>
            </button>
          </div>

          <p class="mt-4">Déjà inscrit ? <a href="/login" class="link-orange">Se connecter</a></p>
        </form>
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

<!-- JS Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
<footer style="background-color: #ffffff; border-top: 1px solid #eee; padding: 60px 80px 40px 80px; font-family: 'Segoe UI', sans-serif;">
  <div style="display: flex; flex-wrap: wrap; justify-content: space-between; align-items: flex-start; gap: 40px;">

        <div style="flex: 1; min-width: 240px;">
        <div style="font-size: 32px; margin-bottom: 16px;">
            📘
        </div>
        <div style="margin-left: 12px;">
            <p style="margin: 6px 0; color: #1a1a1a; font-weight: 500;">
            <i class="fas fa-envelope" style="color: #1a1a1a; margin-right: 10px;"></i>contact@learn2master.fr
            </p>
            <p style="margin: 6px 0; color: #1a1a1a; font-weight: 500;">
            <i class="fas fa-phone-alt" style="color: #1a1a1a; margin-right: 10px;"></i>+33 1 23 45 67 89
            </p>
            <p style="margin: 6px 0; color: #1a1a1a; font-weight: 500;">
            <i class="fas fa-map-marker-alt" style="color: #1a1a1a; margin-right: 10px;"></i>Paris, France
            </p>
        </div>
        </div>

    <!-- Colonne centre -->
    <div style="flex: 1; min-width: 200px; text-align: center;">
      <h4 style="font-weight: bold; margin-bottom: 12px;">Navigation</h4>
      <div style="display: flex; justify-content: center; gap: 20px; flex-wrap: wrap;">
        <a href="/" style="color: #333; text-decoration: none;">Accueil</a>
        <a href="/formation" style="color: #333; text-decoration: none;">Formations</a>
        <a href="/apropos" style="color: #333; text-decoration: none;">À propos</a>
        <a href="/contact" style="color: #333; text-decoration: none;">Contact</a>
      </div>
    </div>

    <!-- Colonne droite -->
    <div style="flex: 1; min-width: 240px; text-align: right;">
      <h4 style="font-weight: bold; margin-bottom: 12px;">Réseaux sociaux</h4>
      <div style="display: flex; justify-content: flex-end; gap: 12px;">
        <a href="#" title="Facebook" style="color: #ff9900; font-size: 18px;"><i class="fab fa-facebook-f"></i></a>
        <a href="#" title="Twitter" style="color: #ff9900; font-size: 18px;"><i class="fab fa-twitter"></i></a>
        <a href="#" title="LinkedIn" style="color: #ff9900; font-size: 18px;"><i class="fab fa-linkedin-in"></i></a>
      </div>
    </div>
  </div>

  <!-- Bas de page -->
  <div style="text-align: center; margin-top: 30px; font-size: 14px; color: #777;">
    © 2025 Learn2Master. Tous droits réservés.
  </div>
</footer>
</html>

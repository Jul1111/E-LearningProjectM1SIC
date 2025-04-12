<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Connexion - Learn2Master</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <!-- Bootstrap & FontAwesome -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>

  <!-- Style personnalisé -->
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
      background-color: #f9f9f9;
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
    }
  </style>
</head>
<body>

<header style="background-color: #ffffff; padding: 20px 40px; display: flex; align-items: center; border-bottom: 1px solid #eee;">
  <a href="/" class="logo" style="font-size: 24px; font-weight: bold; color: #ff9900; text-decoration: none;">
    📘 Learn2Master
  </a>
</header>

<section class="vh-100" style="background-color: #f9f9f9;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card shadow" style="border-radius: 1rem;">
          <div class="row g-0">
            
            <!-- Colonne gauche avec logo -->
            <div class="col-md-6 col-lg-5 d-none d-md-flex justify-content-center align-items-center"
                 style="border-radius: 1rem 0 0 1rem; background-color: #fff;">
              <div class="logo-learn2master text-center">
                📘 Learn2Master
              </div>
            </div>

            <!-- Formulaire -->
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">

                <form method="post" action="/login">

                  <div class="d-flex align-items-center mb-3 pb-1">
                    <i class="fas fa-user-lock fa-2x me-3" style="color: #ff9900;"></i>
                    <span class="h1 fw-bold mb-0">Connexion</span>
                  </div>

                  <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Accédez à votre espace</h5>

                  <div class="form-outline mb-4">
                    <input type="email" id="email" name="email" placeholder="your@email.com" class="form-control form-control-lg" required />
                  </div>

                  <div class="form-outline mb-4">
                    <input type="password" id="password" name="password" placeholder="Mot de passe" class="form-control form-control-lg" required />
                  </div>

                  <div class="pt-1 mb-4">
                    <button class="btn btn-orange btn-lg btn-block w-100" type="submit">Se connecter</button>
                  </div>

                  <div class="mb-3 d-flex justify-content-between">
                    <a class="small text-muted" href="#">Mot de passe oublié ?</a>
                    <a class="small link-orange" href="/signup">Créer un compte</a>
                  </div>

                  <div class="text-muted small">
                    <a href="#" class="text-muted me-2">Conditions d’utilisation</a> |
                    <a href="#" class="text-muted ms-2">Politique de confidentialité</a>
                  </div>

                </form>

              </div>
            </div>
            <!-- Fin formulaire -->

          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- JS Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

<footer style="background-color: #ffffff; border-top: 1px solid #eee; padding: 40px 90px; font-family: 'Segoe UI', sans-serif;">
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

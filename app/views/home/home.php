<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Accueil - E-Learning</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background-color: #f9f9f9;
        }
        header {
            background-color: #ffffff;
            padding: 20px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #eee;
        }
        .logo {
            font-size: 24px;
            font-weight: bold;
            color: #ff9900;
        }
        nav a {
            margin: 0 15px;
            text-decoration: none;
            color: #333;
        }
        .cta-buttons a {
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }
        .btn-login {
            background-color: #ff9900;
            color: white;
            margin-left: 10px;
        }
        .btn-signup {
            border: 2px solid #ff9900;
            color: #ff9900;
        }
        .hero {
            padding: 80px 40px;
            text-align: center;
            background-color: #fff;
        }
        .hero h1 {
            font-size: 36px;
            margin-bottom: 20px;
        }
        .highlight {
            color: #ff9900;
        }
        .hero p {
            font-size: 18px;
            color: #555;
            margin-bottom: 30px;
        }
        .hero-buttons a {
            padding: 12px 25px;
            border-radius: 5px;
            text-decoration: none;
            margin: 0 10px;
        }
        .btn-primary {
            background-color: #ff9900;
            color: white;
        }
        .btn-secondary {
            background-color: #fff;
            color: #333;
            border: 2px solid #ccc;
        }
        .section {
            padding: 60px 40px;
            text-align: center;
            background-color: #fafafa;
        }
        a.cta-orange:hover {
    background-color: #e08600;
}
    </style>
</head>
<body>
    <header>
    <a href="/" class="logo" style="font-size: 24px; font-weight: bold; color: #ff9900; text-decoration: none;">
    📘 Learn2Master
  </a>
        <nav>
            <a href="/">Accueil</a>
            <a href="/formation">Formations</a>
            <a href="/apropos">À propos</a>
            <a href="/tarifs">Tarifs</a>
            <a href="/contact">Contact</a>
        </nav>
        <div class="cta-buttons">
            <a href="/signUp" class="btn-signup">Créer un compte</a>
            <a href="/login" class="btn-login">Se connecter</a>
        </div>
    </header>
<!-- Premier visuel -->
    <section class="hero">
        <h1><span class="highlight">Maîtrisez</span> votre avenir</h1>
        <p>Accédez à des fiches de révision claires, des quiz interactifs et des conseils pour réussir votre Master.</p>
        <div class="hero-buttons">
            <a href="/login" class="btn-primary">Commencer à réviser</a>
            <a href="/formation" class="btn-secondary">Voir les cours</a>
        </div>
    </section>

    <section class="section">
        <h2>Notre objectif</h2>
        <p>Vous aider à réussir vos examens grâce à un contenu de qualité, structuré et accessible à tout moment.</p>
    </section>

    <!-- Vidéo Youtube ou vidéo de présentation on verra -->
    <section class="section" style="background-color: #ffffff;">
    <div style="max-width: 900px; margin: 0 auto; border-radius: 12px; overflow: hidden; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);">
        <div style="position: relative; padding-bottom: 56.25%; height: 0;">
            <iframe
                src="https://www.youtube.com/embed/BBJa32lCaaY?si=iT473aFgS-LLq1aK"
                title="YouTube video player"
                style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; border: 0;"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                allowfullscreen
                referrerpolicy="strict-origin-when-cross-origin">
            </iframe>
        </div>
    </div>
</section>

<section class="section" style="background-color: #f5f5f5;">
    <div style="max-width: 1200px; margin: 0 auto;">

       
        <div style="text-align: center; margin-bottom: 30px;">
            <h2 style="margin-bottom: 10px;">Les bénéfices</h2>
            <p style="color: #666;">
                Apprenez mieux grâce à une plateforme pensée pour la réussite des étudiants en master.
            </p>
        </div>

        
        <div style="display: flex; justify-content: flex-end; margin-bottom: 30px;">
            <a href="/formation" style="
                background-color: #ff9900;
                color: white;
                font-weight: bold;
                font-family: 'Segoe UI', sans-serif;
                padding: 10px 18px;
                border: none;
                border-radius: 8px;
                text-decoration: none;
                font-size: 14px;
                transition: background-color 0.2s ease;
            ">
                Tout voir
            </a>
        </div>

        
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 20px;">

            <!-- Carte 1 -->
            <div style="background: #fff; border-radius: 16px; padding: 30px; position: relative; display: flex; flex-direction: column; justify-content: space-between; min-height: 240px;">
                <div>
                    <div style="position: absolute; top: 20px; right: 20px; font-size: 28px; font-weight: bold; color: #1a1a1a;">01</div>
                    <h4 style="margin-top: 40px; font-family: 'Segoe UI', sans-serif;">Planning flexible</h4>
                    <p style="color: #555;">Organisez vos révisions à votre rythme, selon vos contraintes personnelles ou pro.</p>
                </div>
                <div style="display: flex; justify-content: flex-end;">
                    <a href="/formation" style="background-color: #f7f7f7; padding: 10px; border-radius: 10px; cursor: pointer;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" viewBox="0 0 24 24">
                            <path d="M7 17L17 7M17 7H8M17 7V16" stroke="#ff9900" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Carte 2 -->
            <div style="background: #fff; border-radius: 16px; padding: 30px; position: relative; display: flex; flex-direction: column; justify-content: space-between; min-height: 240px;">
                <div>
                    <div style="position: absolute; top: 20px; right: 20px; font-size: 28px; font-weight: bold; color: #1a1a1a;">02</div>
                    <h4 style="margin-top: 40px; font-family: 'Segoe UI', sans-serif;">Cours conçus par des experts</h4>
                    <p style="color: #555;">Bénéficiez de contenus rédigés avec précision par des étudiants avancés et des enseignants.</p>
                </div>
                <div style="display: flex; justify-content: flex-end;">
                    <a href="/formation" style="background-color: #f7f7f7; padding: 10px; border-radius: 10px; cursor: pointer;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" viewBox="0 0 24 24">
                            <path d="M7 17L17 7M17 7H8M17 7V16" stroke="#ff9900" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Carte 3 -->
            <div style="background: #fff; border-radius: 16px; padding: 30px; position: relative; display: flex; flex-direction: column; justify-content: space-between; min-height: 240px;">
                <div>
                    <div style="position: absolute; top: 20px; right: 20px; font-size: 28px; font-weight: bold; color: #1a1a1a;">03</div>
                    <h4 style="margin-top: 40px; font-family: 'Segoe UI', sans-serif;">Quiz interactifs</h4>
                    <p style="color: #555;">Testez vos connaissances avec des quiz pratiques et des feedbacks instantanés.</p>
                </div>
                <div style="display: flex; justify-content: flex-end;">
                    <a href="/formation" style="background-color: #f7f7f7; padding: 10px; border-radius: 10px; cursor: pointer;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" viewBox="0 0 24 24">
                            <path d="M7 17L17 7M17 7H8M17 7V16" stroke="#ff9900" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>




</body>
</html>

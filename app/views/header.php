<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Accueil - E-Learning</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../resources/css/style.css">
    <link rel="icon" href="../../resources/img/favicon.png" type="image/png">
    <!-- Font Awesome pour les icônes -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>
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
            <?php if (isset($_SESSION["is_logged_in"]) ): ?>
                <a href="/dashboard" class="btn-login">Tableau de bord</a>
                <a href="/logout" class="btn-signup"><i class="fas fa-sign-out-alt"></i> Déconnexion</a></a>
            <?php else: ?>
                <a href="/signup" class="btn-signup">Créer un compte</a>
                <a href="/login" class="btn-login">Se connecter</a>
            <?php endif; ?>
        </div>
    </header>
</head>
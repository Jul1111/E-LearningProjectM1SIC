<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Confirmation de paiement - Learn2Master</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/resources/css/style.css">
  <style>
    .confirmation-success {
        background-color: #f9f9f9;
        padding: 80px 20px;
        text-align: center;
        animation: fadeIn 0.6s ease-out;
    }

    .confirmation-box {
        background-color: white;
        border-radius: 12px;
        padding: 40px 30px;
        max-width: 500px;
        margin: 0 auto;
        box-shadow: 0 4px 10px rgba(0,0,0,0.05);
    }

    .confirmation-box h1 {
        font-size: 28px;
        color: #1a1a1a;
        margin-bottom: 10px;
    }

    .confirmation-subtitle {
        color: #444;
        font-size: 16px;
        margin-bottom: 30px;
    }

    .highlight {
        font-weight: bold;
        color: #ff9900;
    }

    .confirmation-summary p {
        font-size: 16px;
        margin: 6px 0;
    }

    .confirmation-summary .total {
        font-size: 18px;
        font-weight: bold;
        margin-top: 16px;
    }

    .btn-orange.btn-large {
        margin-top: 30px;
        font-size: 16px;
        padding: 14px 30px;
        border-radius: 10px;
        background-color: #ff9900;
        color: white;
        font-weight: bold;
        text-decoration: none;
        display: inline-block;
    }

    .btn-orange.btn-large:hover {
        background-color: #e08600;
    }

    .checkmark {
        width: 60px;
        height: 60px;
        margin: 0 auto 25px;
        animation: pop 0.4s ease-out;
    }

    @keyframes pop {
        0% { transform: scale(0.3); opacity: 0; }
        80% { transform: scale(1.1); opacity: 1; }
        100% { transform: scale(1); }
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
  </style>
</head>
<body>
  <main class="confirmation-success">
    <div class="confirmation-box">
    <?php
      $plans = [
        'basic-mensuel' => ['label' => 'Offre Basique', 'price' => 4.90, 'type' => '/mois'],
        'premium-mensuel' => ['label' => 'Offre Premium', 'price' => 9.90, 'type' => '/mois'],
        'basic-annuel' => ['label' => 'Offre Basique', 'price' => 49.00, 'type' => '/an'],
        'premium-annuel' => ['label' => 'Offre Premium', 'price' => 99.00, 'type' => '/an'],
      ];

      $selectedPlan = $_GET['plan'] ?? '';

      if (array_key_exists($selectedPlan, $plans)) {
        $planLabel = $plans[$selectedPlan]['label'];
        $priceHT = $plans[$selectedPlan]['price'];
        $type = $plans[$selectedPlan]['type'];
        $tva = 0.20;
        $totalTTC = $priceHT * (1 + $tva);
    ?>

      <!-- ✅ Animated checkmark SVG -->
      <div class="checkmark">
        <svg viewBox="0 0 52 52">
          <circle cx="26" cy="26" r="25" fill="none" stroke="#ff9900" stroke-width="3"/>
          <path fill="none" stroke="#ff9900" stroke-width="3" d="M14 27l8 8 16-16" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
      </div>

      <h1>Merci pour votre inscription !</h1>
      <p class="confirmation-subtitle">
        Vous avez choisi : <span class="highlight"><?= htmlspecialchars($planLabel . ' ' . $type) ?></span>
      </p>

      <div class="confirmation-summary">
        <p><strong>Prix HT :</strong> <?= number_format($priceHT, 2, ',', ' ') ?> €</p>
        <p><strong>TVA (20%) :</strong> <?= number_format($priceHT * $tva, 2, ',', ' ') ?> €</p>
        <p class="total"><strong>Total TTC :</strong> <?= number_format($totalTTC, 2, ',', ' ') ?> €</p>
      </div>

      <a href="/dashboard" class="btn-orange btn-large">Accéder à mon espace</a>
    <?php } else { ?>
      <h1>Confirmation de paiement</h1>
      <p class="confirmation-subtitle">Aucune offre valide n'a été détectée.</p>
      <a href="/tarifs" class="btn-orange btn-large">Voir les offres</a>
    <?php } ?>
    </div>
  </main>
</body>
</html>

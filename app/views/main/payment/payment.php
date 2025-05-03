<?php
$plans = [
    'basic-mensuel' => ['label' => 'Offre Basique', 'price' => 4.90, 'type' => '/mois'],
    'premium-mensuel' => ['label' => 'Offre Premium', 'price' => 9.90, 'type' => '/mois'],
    'basic-annuel' => ['label' => 'Offre Basique', 'price' => 49.00, 'type' => '/an'],
    'premium-annuel' => ['label' => 'Offre Premium', 'price' => 99.00, 'type' => '/an'],
];

$selectedPlan = $_GET['plan'] ?? '';
if (!array_key_exists($selectedPlan, $plans)) {
    header("Location: /tarifs");
    exit();
}

$planLabel = $plans[$selectedPlan]['label'];
$priceHT = $plans[$selectedPlan]['price'];
$type = $plans[$selectedPlan]['type'];
$tva = 0.20;
$totalTTC = $priceHT * (1 + $tva);
?>

<div class="payment-wrapper">
  <!-- Partie gauche : formulaire -->
  <div class="container-left">
    <h1>Paiement</h1>
    <p class="plan">Offre sélectionnée : <?= htmlspecialchars($planLabel . ' ' . $type) ?></p>

    <form method="get" action="/confirmation">
    <input type="hidden" name="plan" value="<?= htmlspecialchars($selectedPlan) ?>">
      <div class="form-group">
        <label for="name">Nom complet</label>
        <input type="text" id="name" name="name" required>
      </div>
      <div class="form-group">
        <label for="card">Numéro de carte</label>
        <input type="text" id="card" name="card" required>
      </div>
      <div class="form-group">
        <label for="expiry">Date d’expiration</label>
        <input type="text" id="expiry" name="expiry" required>
      </div>
      <div class="form-group">
        <label for="cvv">CVV</label>
        <input type="text" id="cvv" name="cvv" required>
      </div>
      <button type="submit" class="btn-payer">Payer maintenant</button>
    </form>
  </div>

  <!-- Partie droite : panier -->
  <div class="container-right">
    <h2>Récapitulatif</h2>
    <p><strong>Offre :</strong> <?= htmlspecialchars($planLabel) ?> <?= $type ?></p>
    <p><strong>Prix HT :</strong> <?= number_format($priceHT, 2, ',', ' ') ?> €</p>
    <p><strong>TVA (20%) :</strong> <?= number_format($priceHT * $tva, 2, ',', ' ') ?> €</p>
    <hr>
    <p><strong>Total TTC :</strong> <?= number_format($totalTTC, 2, ',', ' ') ?> €</p>

  </div>
</div>

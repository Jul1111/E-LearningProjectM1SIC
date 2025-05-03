<!DOCTYPE html>
<html lang="fr">
<body>
<section style="padding: 60px 20px; background-color: #f9f9f9;">
  <h2 style="text-align: center; font-size: 32px; margin-bottom: 20px;">Nos Tarifs</h2>
  <p style="text-align: center; color: #555; max-width: 700px; margin: 0 auto 40px;">
    Choisissez la formule adaptée à vos besoins et à votre budget.
  </p>

  <!-- Toggle switch -->
  <div style="text-align: center; margin-bottom: 40px;">
    <button id="monthlyBtn" onclick="togglePricing('monthly')" style="cursor: pointer; padding: 10px 20px; margin-right: 10px; background-color: #ff9900; color: white; border: none; border-radius: 6px;">Mensuel</button>
    <button id="yearlyBtn" onclick="togglePricing('yearly')" style="cursor: pointer; padding: 10px 20px; background-color: white; color: #ff9900; border: 2px solid #ff9900; border-radius: 6px;">Annuel</button>
  </div>

  <!-- Cartes tarifs -->
  <div style="display: flex; flex-wrap: wrap; justify-content: center; gap: 30px; max-width: 1100px; margin: 0 auto;">

    <!-- Offre Basique -->
    <div style="background-color: white; border-radius: 16px; box-shadow: 0 4px 12px rgba(0,0,0,0.05); width: 320px; padding: 30px; text-align: center;">
      <h4 style="font-size: 20px; color: #1a1a1a;">Offre Basique</h4>
      <h2 id="basicPrice" style="color: #ff9900; font-size: 36px; margin: 20px 0;">4,90€/mois</h2>
      <p style="color: #555;">Accès aux essentiels de la plateforme</p>
      <ul style="list-style: none; padding: 0; text-align: left; color: #555;">
        <li style="margin-bottom: 12px;">✔️ Fiches de cours en management</li>
        <li style="margin-bottom: 12px;">✔️ Quiz d'entraînement par chapitre</li>
        <li style="margin-bottom: 12px;">✔️ Suivi des scores</li>
        <li style="margin-bottom: 12px;">✔️ Accès mobile/tablette</li>
        <li style="margin-bottom: 12px;">✖️ Cas pratiques & corrigés détaillés</li>
        <li style="margin-bottom: 12px;">✖️ Vidéos explicatives</li>
        <li style="margin-bottom: 0;">✖️ Communauté privée</li>
    </ul>

    <a id="chooseBasic" href="/payment?plan=basic-mensuel" style="margin-top: 20px; display: inline-block; background-color: #ff9900; color: white; padding: 12px 25px; border-radius: 8px; text-decoration: none; font-weight: bold;">
  Choisir
</a>

    </div>

    <!-- Offre Premium -->
    <div style="background-color: white; border-radius: 16px; box-shadow: 0 4px 12px rgba(0,0,0,0.05); width: 320px; padding: 30px; text-align: center;">
      <h4 style="font-size: 20px; color: #1a1a1a;">Offre Premium</h4>
      <h2 id="premiumPrice" style="color: #ff9900; font-size: 36px; margin: 20px 0;">9,90€/mois</h2>
      <p style="color: #555;">Débloquez tout le contenu disponible</p>
      <ul style="list-style: none; padding: 0; text-align: left; color: #555;">
        <li style="margin-bottom: 12px;">✔️ Fiches avancées & cas pratiques</li>
        <li style="margin-bottom: 12px;">✔️ Quiz + corrigés détaillés</li>
        <li style="margin-bottom: 12px;">✔️ Vidéos explicatives</li>
        <li style="margin-bottom: 12px;">✔️ Simulations d’examens</li>
        <li style="margin-bottom: 12px;">✔️ Accès communauté Learn2Master</li>
        <li style="margin-bottom: 0;">✔️ Suivi personnalisé</li>
    </ul>

    <a id="choosePremium" href="/payment?plan=premium-mensuel" style="margin-top: 20px; display: inline-block; background-color: #ff9900; color: white; padding: 12px 25px; border-radius: 8px; text-decoration: none; font-weight: bold;">
  Choisir
</a>

    </div>
  </div>
</section>

<!-- JavaScript -->
<script>
  function togglePricing(mode) {
    const basicPrice = document.getElementById("basicPrice");
    const premiumPrice = document.getElementById("premiumPrice");
    const btnMonthly = document.getElementById("monthlyBtn");
    const btnYearly = document.getElementById("yearlyBtn");
    const chooseBasic = document.getElementById("chooseBasic");
    const choosePremium = document.getElementById("choosePremium");

    if (mode === "monthly") {
      basicPrice.textContent = "4,90€/mois";
      premiumPrice.textContent = "9,90€/mois";
      chooseBasic.href = "/payment?plan=basic-mensuel";
      choosePremium.href = "/payment?plan=premium-mensuel";
      btnMonthly.style.backgroundColor = "#ff9900";
      btnMonthly.style.color = "white";
      btnYearly.style.backgroundColor = "white";
      btnYearly.style.color = "#ff9900";
    } else {
      basicPrice.textContent = "49€/an";
      premiumPrice.textContent = "99€/an";
      chooseBasic.href = "/payment?plan=basic-annuel";
      choosePremium.href = "/payment?plan=premium-annuel";
      btnMonthly.style.backgroundColor = "white";
      btnMonthly.style.color = "#ff9900";
      btnYearly.style.backgroundColor = "#ff9900";
      btnYearly.style.color = "white";
    }
  }

  // Initialiser par défaut
  togglePricing('monthly');
</script>

</script>

</body>
</html>
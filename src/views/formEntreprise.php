<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Formulaire de Don - Entreprise</title>
</head>

<body>
    <h1>Formulaire de Don pour Entreprise</h1>
    <form action="/projet-reçus-fiscaux/public/submitDonation" method="POST">
        <input type="hidden" name="typeDonateur" value="entreprise">

        <label for="denominationOrganisme">Dénomination de l'organisme :</label>
        <input type="text" id="denominationOrganisme" name="denominationOrganisme" required>

        <label for="numeroSIREN">Numéro SIREN :</label>
        <input type="text" id="numeroSIREN" name="numeroSIREN" required>

        <label for="adresseOrganisme">Adresse :</label>
        <textarea id="adresseOrganisme" name="adresseOrganisme" required></textarea>

        <label for="codePostalOrganisme">Code postal :</label>
        <input type="text" id="codePostalOrganisme" name="codePostalOrganisme" required>

        <label for="communeOrganisme">Commune :</label>
        <input type="text" id="communeOrganisme" name="communeOrganisme" required>

        <label for="paysOrganisme">Pays :</label>
        <input type="text" id="paysOrganisme" name="paysOrganisme" required>

        <label for="montantDonEntreprise">Montant du don (en euros) :</label>
        <input type="number" id="montantDonEntreprise" name="montantDonEntreprise" required>

        <label for="dateDonEntreprise">Date du don :</label>
        <input type="date" id="dateDonEntreprise" name="dateDonEntreprise" required>

        <button type="submit">Soumettre le formulaire</button>
    </form>
</body>

</html>
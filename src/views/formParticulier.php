<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Formulaire de Don - Particulier</title>
</head>

<body>
    <h1>Formulaire de Don pour Particulier</h1>
    <form action="/projet-reçus-fiscaux/public/submitDonation" method="POST">
        <input type="hidden" name="typeDonateur" value="particulier">

        <label for="nomDonateur">Nom :</label>
        <input type="text" id="nomDonateur" name="nomDonateur" required>

        <label for="prenomDonateur">Prénoms :</label>
        <input type="text" id="prenomDonateur" name="prenomDonateur" required>

        <label for="adresseDonateur">Adresse :</label>
        <textarea id="adresseDonateur" name="adresseDonateur" required></textarea>

        <label for="montantDon">Montant du don (en euros) :</label>
        <input type="number" id="montantDon" name="montantDon" required>

        <button type="submit">Soumettre le formulaire</button>
    </form>

</body>

</html>
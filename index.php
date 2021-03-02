<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Exo 196</title>
</head>
<body>
    <?php
    /**
     * 1. Importez le contenu du fichier user.sql dans une nouvelle base de données.
     * 2. Utilisez un des objets de connexion que nous avons fait ensemble pour vous connecter à votre base de données.
     *
     * Pour chaque résultat de requête, affichez les informations, ex:  Age minimum: 36 ans <br>   ( pour obtenir une information par ligne ).
     *
     * 3. Récupérez l'age minimum des utilisateurs.
     * 4. Récupérez l'âge maximum des utilisateurs.
     * 5. Récupérez le nombre total d'utilisateurs dans la table à l'aide de la fonction d'agrégation COUNT().
     * 6. Récupérer le nombre d'utilisateurs ayant un numéro de rue plus grand ou égal à 5.
     * 7. Récupérez la moyenne d'âge des utilisateurs.
     * 8. Récupérer la somme des numéros de maison des utilisateurs ( bien que ca n'ait pas de sens ).
     */

    // TODO Votre code ici, commencez par require un des objet de connexion que nous avons fait ensemble.
    require 'db.php';
    $db = DB::getInstance();
    $request = $db->prepare("SELECT MIN(age) as 'minimum' FROM exo_196_users.user");
    $request->execute();

    foreach ($request->fetchAll() as $user) { ?>
        <p>L'âge minimum est <?= $user['minimum'] ?></p>
    <?php }

    $request = $db->prepare("SELECT MAX(age) as 'maximum' FROM exo_196_users.user");
    $request->execute();

    foreach ($request->fetchAll() as $user) { ?>
    <p>L'âge maximum est <?= $user['maximum'] ?></p>
    <?php }

    $request = $db->prepare("SELECT COUNT(id) as 'user' FROM exo_196_users.user");
    $request->execute();

    foreach ($request->fetchAll() as $user) { ?>
    <p>Il y a <?= $user['user'] ?> utilisateurs pour le moment</p>
    <?php }

    $request = $db->prepare("SELECT COUNT(id) as 'numero' FROM exo_196_users.user WHERE numero >= 5");
    $request->execute();

    foreach ($request->fetchAll() as $user) { ?>
        <p>Il y a <?= $user['numero'] ?> utilisateur qui ont un numéro de rue plus grand ou égal à 5</p>
    <?php }

    $request = $db->prepare("SELECT AVG(age) as 'moyenne' FROM exo_196_users.user");
    $request->execute();

    foreach ($request->fetchAll() as $user) { ?>
        <p>La moyenne des âges des utilisateurs est de :  <?= $user['moyenne'] ?> ans</p>
    <?php }

    $request = $db->prepare("SELECT SUM(numero) as 'somme' FROM exo_196_users.user");
    $request->execute();

    foreach ($request->fetchAll() as $user) { ?>
        <p>La somme de tout les numéro de maison des utilisateurs est de :  <?= $user['somme'] ?></p>
    <?php } ?>
</body>
</html>


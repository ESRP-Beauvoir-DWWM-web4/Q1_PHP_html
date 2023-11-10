<?php

$title = "Liste des utilisateurs";
//! Nous appelons le fichier qui gère l'appel à la base de données
require 'inc/db.php';

//! Nous mettons en place une variable $success qui affichera un résultat si tout s'est bien passé
$success = null;
//! Nous mettons en place une condition qui fait en sorte de faire un certain traitement si le formulaire construit plus bas est bien soumit
if ( isset( $_POST["name"], $_POST["first_name"], $_POST["email"] ) ) {
    //! Je créer une variable qui contiendra la préparation de ma requête SQL : Le fait de préparer une requête securise le traitement de celle ci.

    //! Le fait de préparer la requête avec des paramètres sécurise le traitement et empeche les utilisateurs peut scrupuleux de pouvoir faire par le biais de l'url une injection SQL.
    $query = $pdo->prepare('UPDATE users SET name = :name, first_name = :first_name, email = :email WHERE id = :id');
    //! Ensuite on execute la requête 
    $query->execute([
        //! On applique à nos paramètres ce que contient notre formulaire
        'name' => $_POST["name"],
        'first_name' => $_POST["first_name"],
        'email' => $_POST["email"],
        'id' => $_GET['id'],
    ]);
    //! On renvoi un message par le biais de la variable $success si le traitement est réussi
    $success = "Les informations ont bien été mise à jour";
};

//! Pour pouvoir editer un utilisateur en particulier, il faut agir sur l'id
$query = $pdo->prepare('SELECT * FROM users WHERE id = :id');
//! Nous préparons la requête en appliquant un paramètre sur l'id
$query->execute([
    //! Nous executons la requête en apportant au paramètre "id" ce qui est contenu dans l'url de la page : "edit.php?id= int"
    'id' => $_GET['id']
]);
//! Nous gerons l'erreur eventuelle que la base de données pourrait nous renvoyer
if ( $query === false ) {
    var_dump($pdo->errorInfo());
    die('ERREUR SQL');
};

//! Je mets en place une variable qui appellera les données par le biais de la fonction fetch
$user = $query->fetch(PDO::FETCH_OBJ);

?>

<?php require 'partials/header.php' ?>
<!-- Content -->
<main>
    //! Nous mettons en place un formulaire avec la méthode POST
    <form action="" method="POST">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Nom : </label>
            //! Nous n'oublions pas de mettre un paramètre "name" qui contiendra le même nom que les colonnes de notre table "users"
            <input type="text" name="name" value="<?= $user->name ?>" class="form-control" id="exampleFormControlInput1" placeholder="">
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Prénom :</label>
            <input type="text" name="first_name" value="<?= $user->first_name ?>" class="form-control" id="exampleFormControlInput1" placeholder="">
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Adresse email :</label>
            <input type="text" name="email" value="<?= $user->email ?>" class="form-control" id="exampleFormControlInput1" placeholder="">
        </div>
        <button class="btn btn-success">Sauvegarder</button>
    </form>
    <?php if ( isset( $success ) ): ?>
        <div class="alert alert-success" role="alert">
            <?= $success ?>
        </div>
    <?php endif ?>
</main>
<!-- Content -->
<?php require 'partials/footer.php' ?>
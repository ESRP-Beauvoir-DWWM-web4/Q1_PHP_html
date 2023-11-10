<?php
//! Nous appelons le fichier qui gère l'appel à la base de données
require 'inc/db.php';

//! Nous mettons en place une variable $success qui affichera un résultat si tout s'est bien passé
$success = null;
//! Nous mettons en place une condition qui fait en sorte de faire un certain traitement si le formulaire construit plus bas est bien soumit
if ( isset( $_POST["name"], $_POST["first_name"], $_POST["email"] ) ) {
    //! Je créer une variable qui contiendra la préparation de ma requête SQL : Le fait de préparer une requête securise le traitement de celle ci.

    //! Le fait de préparer la requête avec des paramètres sécurise le traitement et empeche les utilisateurs peut scrupuleux de pouvoir faire par le biais de l'url une injection SQL.
    $query = $pdo->prepare('INSERT INTO users (name, first_name, email, password) VALUES (:name, :first_name, :email, :password)');
    //! Ensuite on execute la requête 
    $query->execute([
        //! On applique à nos paramètres ce que contient notre formulaire
        'name' => $_POST["name"],
        'first_name' => $_POST["first_name"],
        'email' => $_POST["email"],
        'password' => password_hash($_POST["password"], PASSWORD_DEFAULT),
    ]);
    //! On renvoi un message par le biais de la variable $success si le traitement est réussi
    $success = "L'utilisateur à bien été ajouté'";
};


?>
//! Comme pour les autres pages, nous appelons les fichiers header et footer
<?php require 'partials/header.php' ?>
<main>
    //! Nous mettons en place un formulaire avec la méthode POST
    <form action="" method="POST">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Nom : </label>
            //! Nous n'oublions pas de mettre un paramètre "name" qui contiendra le même nom que les colonnes de notre table "users"
            <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="">
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Prénom :</label>
            <input type="text" name="first_name" class="form-control" id="exampleFormControlInput1" placeholder="">
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Adresse email :</label>
            <input type="text" name="email"  class="form-control" id="exampleFormControlInput1" placeholder="">
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Mot de passe :</label>
            <input type="password" name="password" class="form-control" id="exampleFormControlInput1" placeholder="">
        </div>

        <button class="btn btn-success">Sauvegarder</button>
    </form>
    //! On mets en place une condition qui dit que si la variable $success existe on continue le traitement
    <?php if ( isset( $success ) ): ?>
        <div class="alert alert-success" role="alert">
            //! Nous appelons la variable $success dans une div bootstrap qui affichera un message en vert
            <?= $success ?>
        </div>
    <?php endif ?>
</main>
<?php require 'partials/footer.php' ?>
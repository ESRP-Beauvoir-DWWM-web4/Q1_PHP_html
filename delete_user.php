<?php
//! Nous appelons le fichier qui gère l'appel à la base de données
require 'inc/db.php';

//! Je mets en place une variable qui va préparer une requête en SQL en mettant en place des paramètres comme pour la création(create_user.php)
$query = $pdo->prepare('DELETE FROM users WHERE id = :id');
//! Ensuite on execute la requête 
$query->execute([
    //! On applique à notre paramètre "id" ce qui est contenu en url grâce à la variable globale "$_GET"
    'id' => $_GET['id']
]);

?>

<?php require 'partials/header.php' ?>
<main>
    <h1>L'utilisateur à bien été supprimé</h1>
    <a href="/5_Cours/Q1_PHP_html/liste_pdo.php">
        <button class="btn btn-warning">Retour à la liste des utilisateurs</button>
    </a>
</main>
<?php require 'partials/footer.php' ?>
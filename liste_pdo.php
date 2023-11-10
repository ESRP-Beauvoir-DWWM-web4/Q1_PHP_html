<?php

$title = "Liste des utilisateurs";
//! Nous appelons le fichier qui gère l'appel à la base de données
require 'inc/db.php';

//! Nous mettons en place une variable qui contiendra notre requête à la base de données
$query = $pdo->query('SELECT * FROM users');
//! Nous gerons l'erreur eventuelle que la base de données pourrait nous renvoyer
if ( $query === false ) {
    var_dump($pdo->errorInfo());
    die('ERREUR SQL');
};

//! Nous appelons une variable qui appelera les données par le biais de la fonction "fetchAll()" et par le paramètre "PDO::FETCH_OBJ" qui nous enverra les données sous formes d'objets
$users = $query->fetchAll(PDO::FETCH_OBJ);

?>

<?php require 'partials/header.php' ?>
<!-- Content -->
<main>
    <table class="table">
    <thead>
        <tr>
        <th scope="col">NOM</th>
        <th scope="col">PRENOM</th>
        <th scope="col">EMAIL</th>
        <th scope="col">ACTIONS</th>
        </tr>
    </thead>
    <tbody>
        //! Nous mettons en place une boucle "foreach" qui appelera chaques données de notre table "users"
        <?php foreach ( $users as $user ) : ?>
        <tr>
        //! Les données sont appelées comme des objets et la syntaxe d'appel se fait par une fleche simple "->"
        <th scope="row"><?= $user->name ?></th>
        <td><?= $user->first_name ?></td>
        <td><?= $user->email ?></td>
        <td>
            <a href="/5_Cours/Q1_PHP_html/edit.php?id=<?= $user->id ?>">
                <button class="btn btn-success">Editer</button>
            </a>
            <a href="/5_Cours/Q1_PHP_html/delete_user.php?id=<?= $user->id ?>">
                <button class="btn btn-danger">Supprimer</button>
            </a>
        </td>
        </tr>
        //! Nous fermons notre boucle
        <?php endforeach ?>
    </tbody>
    </table>
</main>
<!-- Content -->
<?php require 'partials/footer.php' ?>
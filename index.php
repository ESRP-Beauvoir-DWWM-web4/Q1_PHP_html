<?php
//! La variable "$title" servira à dynamiser le nom de nos pages dans les onglets du navigateur
$title = "Page d'accueil";

echo "<pre>";
//! Pour voir les données envoyer par le formulaire nous les appelons grâce à la variable globale "$_GET"
print_r($_GET);
//! Nous recevons un tableau contenant un index qui correspond au nom du formulaire et la donnée entrée dans celui-ci
echo "<pre>";

?>
//! Nous avons découper notre code, nous avons les données du "header" et du "footer" dans deux fichier différents, nous devons les appeler dans le fichier "index.php".
<?php require 'partials/header.php' ?>
<!-- Content -->
<main>
    <form action="/5_Cours/Q1_PHP_html/index.php" method="GET">
        //! Nous mettons en place un formulaire de type texte avec la methode "GET".
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Message</label>
            //! Nous donnons un paramètre "name" qui contiendra l'index des données récupérées dans la variable "$_GET".
            <input type="text" name="message" class="form-control" id="exampleFormControlInput1" placeholder="">
            //! Nous mettons en place un bouton de type "submit".
            <button class="btn btn-success" type="submit">Envoyer</button>
        </div>
    </form>
//! Nous allons afficher la réponse du formulaire dans une balise "h1", le seul problème est dans le fait que si le formulaire n'est pas soumis alors la balise "h1" enverra une erreur disant que l'index dans la variable $_GET n'existe pas.
    <h1>
        //! Dans ce cas nous mettons en place une condition qui fera en sorte que si la variable "$_GET["message"]" existe alors on continue le traitement.
        <?php if ( isset( $_GET["message"] ) ) : ?>
            <?= $_GET["message"] ?>
        <?php else : ?>
            Pas de messages pour le moment
        <?php endif ?>
    </h1>
</main>
<!-- Content -->
<?php require 'partials/footer.php' ?>


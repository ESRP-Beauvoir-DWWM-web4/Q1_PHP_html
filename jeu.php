<?php


$title = "Jeu";
//! La variable qui contient le chiffre à deviner
$aDeviner = 150;


/*

Créer une variable avec un chiffre à deviner
Mettez en place un formulaire comportant des nombres avec la methode GET
Mettez en place un système qui fait en sorte que lorsque vous soumettez le formulaire : 

    Un message orange apparaisse disant "Le chiffre entrer est trop petit
    Un message en rouge apparaisse disant "Le chiffre entrer est trop grand
    Un message en vert appraisse disant "BRAVO ! Vous avez trouver le chiffre ...

    INDICE POUR LES MESSAGES = Alert bootstrap

*/

?>

<?php require 'partials/header.php' ?>
<!-- Content -->
<main>
<div class="mt-5 mb-5">
    //! Nous mettons un simple formulaire en place avec la méthode "GET" qui affichera aussi le résultat dans l'url de la page
    <form action="/5_cours/Q1_PHP_html/checkbox.php" method="GET">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Entrez vôtre réponse :</label>
            <input type="number" name="chiffre" class="form-control" id="exampleFormControlInput1" placeholder="Entre 0 et 1000" value="">
            <button type="submit" class="btn btn-success mt-5">Valider</button>
        </div>
    </form>

    <div>
        <!--  -->
        //! Nous mettons en place une condition qui fait en sorte de faire un certain traitement si le formulaire construit plus bas est bien soumit
        <?php if ( isset( $_GET["chiffre"] ) ) : ?>
        <!--  -->
            //! Je mets en place une condition qui compare ce que l'on met dans le formulaire avec la variable contenant le chiffre à deviner. Ici on demande : Si ce que je rentre dans le formaulaire est plus grand que le chiffre à deviner alors on renvoi un message


            <?php if ( $_GET["chiffre"] > $aDeviner ) : ?>
            <!--  -->
                <div class="alert alert-danger" role="alert">
                    Le chiffre est trop grand.
                </div>
            <!--  -->
            //! Je mets en place une autre condition qui compare ce que l'on met dans le formulaire avec la variable contenant le chiffre à deviner. Ici on demande : Si ce que je rentre dans le formaulaire est plus petit que le chiffre à deviner alors on renvoi un message
            <?php elseif ( $_GET["chiffre"] < $aDeviner ) : ?>
                <div class="alert alert-warning" role="alert">
                    Le chiffre est trop petit.
                </div>
            <!--  -->
            <?php else : ?>
            //! Finalement on termine avec un "else" qui correspondra au fait que le chiffre entré dans formulaire est identique à celui du chiffre à deviner et on renvoi un message
                <div class="alert alert-success" role="alert">
                Bravo, vous avez deviner le chiffre <?= $aDeviner ?>.
                </div>
            <?php endif ?>
        <?php endif ?>
    </div>
</div>
</main>
<!-- Content -->
<?php require 'partials/footer.php' ?>
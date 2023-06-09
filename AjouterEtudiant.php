<?php
session_start();
if ($_SESSION["autoriser"] != "oui") {
    header("location:login.php");
    exit();
}
if (date("H") < 18)
    $bienvenue = "Bonjour et bienvenue " .
        $_SESSION["prenomNom"] .
        " dans votre espace personnel";
else
    $bienvenue = "Bonsoir et bienvenue " .
        $_SESSION["prenomNom"] .
        " dans votre espace personnel";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SCO-ENICAR Ajouter Etudiant</title>
    <!-- Bootstrap core CSS -->
    <link href="./assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap core JS-JQUERY -->
    <script src="./assets/dist/js/jquery.min.js"></script>
    <script src="./assets/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom styles for this template -->
    <link href="./assets/jumbotron.css" rel="stylesheet">

</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="index.php">SCO-Enicar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="index.php" id="dropdown01" data-toggle="dropdown" aria-expanded="false">Gestion des Groupes</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown01">
                        <a class="dropdown-item" href="afficherEtudiants.php">Lister tous les étudiants</a>
                        <a class="dropdown-item" href="afficherEtudiantsParClasse.php">Etudiants par Groupe</a>
                        <a class="dropdown-item" href="ajouterGroupe.php">Ajouter Groupe</a>
                        <a class="dropdown-item" href="modifierGroupe.php">Modifier Groupe</a>
                        <a class="dropdown-item" href="supprimerGroupe.php">Supprimer Groupe</a>

                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-expanded="false">Gestion des Etudiants</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown01">
                        <a class="dropdown-item" href="ajouterEtudiant.php">Ajouter Etudiant</a>
                        <a class="dropdown-item" href="chercherEtudiant.php">Chercher Etudiant</a>
                        <a class="dropdown-item" href="modifierEtudiant.php">Modifier Etudiant</a>
                        <a class="dropdown-item" href="supprimerEtudiant.php">Supprimer Etudiant</a>


                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-expanded="false">Gestion des Absences</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown01">
                        <a class="dropdown-item" href="saisirAbsence.php">Saisir Absence</a>
                        <a class="dropdown-item" href="etatAbsence.php">État des absences pour un groupe</a>
                    </div>
                </li>

                <li class="nav-item active">
                    <a class="nav-link" href="deconnexion.php">Se Déconnecter <span class="sr-only">(current)</span></a>
                </li>

            </ul>

            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="text" placeholder="Saisir un groupe" aria-label="Chercher un groupe">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Chercher Groupe</button>
            </form>
        </div>
    </nav>
    </br>
    </br>
    </br>
    </br>

    <main role="main">
        <div class="jumbotron">
            <div class="container">
                <h1 class="display-4">Ajouter un étudiant</h1>
                <p>Remplir le formulaire ci-dessous afin d'ajouter un étudiant!</p>
            </div>
        </div>


        <div class="container">
            <form id="myForm" method="POST">
                <div class="form-group">
                    <label for="nom">Nom:</label><br>
                    <input type="text" id="nom" name="nom" class="form-control" required /><br>
                </div>
                <div class="form-group">
                    <label for="prenom">Prenom:</label><br>
                    <input type="text" id="prenom" name="prenom" class="form-control" required /><br>
                </div>
                <div class="form-group">
                    <label for="cin">CIN:</label><br>
                    <input type="number" id="cin" name="cin" class="form-control" required /><br>
                </div>
                <div class="form-group">
                    <label for="pwd">Mot de passe:</label><br>
                    <input type="password" id="pwd" name="pwd" class="form-control" required /><br>
                </div>
                <div class="form-group">
                    <label for="cpwd">Confirmer Mot de passe:</label><br>
                    <input type="password" id="cpwd" name="cpwd" class="form-control" required /><br>
                </div>
                <div class="form-group">
                    <label for="email">E-mail:</label><br>
                    <input type="email" id="email" name="email" class="form-control" required /><br>
                </div>

                <div class="form-group">
                    <label for="classe">Classe:</label><br>
                    <input type="text" id="classe" name="classe" class="form-control" required /><br>
                </div>
                <div class="form-group">
                    <label for="adresse">Adresse:</label><br>
                    <input type="text" id="adresse" name="adresse" class="form-control" required /><br>
                </div>
                <button type="button" class="btn btn-primary btn-block" onclick="ajouter()">Ajouter</button>
            </form>
            <div id="demo"></div>
        </div>
    </main>


    <footer class="container">
        <p>&copy; ENICAR 2021-2022</p>
    </footer>

    <script>
        function ajouter() {
            var xmlhttp = new XMLHttpRequest();
            var url = "http://localhost/projetweb/ajouter.php";

            //Envoie Req
            xmlhttp.open("POST", url, true);

            form = document.getElementById("myForm");
            formdata = new FormData(form);
            console.log("formdata", formdata)
            xmlhttp.send(formdata);

            //Traiter Res

            xmlhttp.onreadystatechange = function() {
                console.log("done")
                if (this.readyState == 4 && this.status == 200) {
                    // alert(this.responseText);
                    if (this.responseText == "OK") {
                        console.log("done OK")
                        document.getElementById("demo").innerHTML = "L'ajout de l'étudiant a été bien effectué";
                        document.getElementById("demo").style.backgroundColor = "green";
                    } else {
                        console.log("done NOT OK")
                        document.getElementById("demo").innerHTML = "L'étudiant est déjà inscrit, merci de vérifier le CIN";
                        document.getElementById("demo").style.backgroundColor = "#fba";
                    }
                }
            }


        }
    </script>
</body>

</html>
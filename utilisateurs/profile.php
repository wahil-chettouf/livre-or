<?php
    require_once("../inc/config.php"); 
    if(!isset($_SESSION["login"])) {
        header("location: ".$pathLien."index.php");
        exit();
    } 
?>

<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>connexion</title>
    <link rel="stylesheet" href="<?php echo $pathLien?>assets/css/style.css">
</head>
<body>
    <div class="container">
        <header id="header">
            <nav>
                <ul class="menu">
                    <li class="box-lien"><a href="<?php echo $userPathLien?>index.php">acceuil</a></li>
                    <li class="box-lien"><a href="<?php echo $userPathLien?>livre-or.php">livre-or</a></li>
                    <li class="box-lien"><a href="<?php echo $userPathLien?>commentaire.php">commentaire</a></li>
                    <li class="box-lien"><a href="<?php echo $userPathLien?>profile.php">profile</a></li>
                    <li class="box-lien"><a href="<?php echo $pathLien?>inc/logout.php">logout</a></li>
                </ul>
            </nav>
        </header>
        
        <main class="content-page">
            <section class="">
                <h1>update profile page</h1>
                <!-- error message -->
                <span class="error"><?php echo isset($_SESSION["identifierErr"]) ? $_SESSION["identifierErr"] : ""?></span>

                <form action="<?php echo $userPathLien?>inc/edit_profile.php" method='post' class="form">
                    <label for="nLogin">nouveau login</label>
                    <input type="text" name="nLogin" id="nLogin" class="inp" minlength="3" maxlength="25" value="<?php echo $_SESSION["login"]->login?>"  required>
                    <!-- error message -->
                    <span class="error"><?php echo isset($_SESSION["nLoginErr"]) ? $_SESSION["nLoginErr"] : ""?></span>

                    <label for="nPassword">nouveau password</label>
                    <input type="password" name="nPassword" id="nPassword" class="inp" minlength="8" maxlength="25" value="<?php echo $_SESSION["login"]->password?>" required>
                    <!-- error message -->
                    <span class="error"><?php echo isset($_SESSION["nPasswordErr"]) ? $_SESSION["nPasswordErr"] : ""?></span>

                    <input type="submit" value="save change">
                </form>
            </section>
        </main>
    </div>
</body>
</html>
<!--  supprimer les variables session pour les erreurs  -->
<?php 
    if(isset($_SESSION["identifierErr"])) {
        unset($_SESSION["identifierErr"]);
    }

    if(isset($_SESSION["nLoginErr"], $_SESSION["nPasswordErr"])) {
        unset($_SESSION["nLoginErr"]);
        unset($_SESSION["nPasswordErr"]);
    }
?>
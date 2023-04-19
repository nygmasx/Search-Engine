<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>


<body>
    <form action="" method="GET">
        <input type="text" name="searchbar">
        <button type="submit" name="Rechercher" title="Envoyer"><img src="img.png" alt="" style = "width:10px; " /></button>
    </form>
    <?php

    require_once "connexion.php";
    $sql = "SELECT * FROM utilisateurs";

    if (isset($_GET['searchbar']) && !empty($_GET['searchbar'])) {
        $recherche = htmlspecialchars($_GET['searchbar']);
        $sql .= " WHERE Nom_Utilisateur LIKE '%$recherche%'";
    }
    
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $users = $stmt->fetchAll();
    $nbResultats = count($users);
    foreach($users as $user){
    ?>
        <div class="liste">
            <h3><?php echo $user['Prenom_Utilisateur'] . $user['Nom_Utilisateur'];?> </h5>
            <h5><?php echo $user['Email_Utilisateur'];?></h5>
        </div>
    <?php
    };

    if($nbResultats == 0){
        echo("<p> Votre recherche ne retourne rien. </p>");
    }
    ?>
</body>
</html>
<?php
include 'my_file_db.php';

$search = isset($_POST['search']) ? $_POST['search'] : '';

$names = [];
if ($search) {
    $names = rechercheNom($search);
}


$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="style.css" rel="stylesheet">
</head>
<body>
<header>
    <div class="topnav">
        <img id="logosite" src="./Assets/Logo/creation-logo-production-film-cinema_445285-211.avif" alt="logo du site">
        <a class="actives" href="my_file_home.php">Home</a>
        <a href="my_file_movie.php">Movie</a>
        <a href="my_file_membership.php">Membership</a>
        <a href="my_file_session.php">Session</a>
    </header>
    
    <main id="main3">        
        <div id="page3" class="page">
        <form method="post" action=""> 
        <input type="text" placeholder="Search Member..." name="search" value="<?= $search ?>">
        </form>
        <?php if (!empty($names)): ?>
            <h2>Résultats pour "<?= $search ?>" :</h2>
            <ul>
                <?php foreach ($names as $name): ?>
                    <li>
                    Nom: <strong><?= $name['firstname'] . ' ' . $name['lastname'] ?></strong><br> 
                    Adresse: <?php echo $name['address'] ?><br>
                    Ville: <?php echo $name['city'] . ' ' . $name['zipcode']?><br> 
                    <select name="" id="">

                        <option>Abonnement : <?php echo $name ['subscriptionName'] ?></option><br>
                    </select>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php elseif ($search): ?>
            <p>Aucun nom trouvé pour "<?= $search ?>".</p>
        <?php endif; ?>
    </div>
     
</main>


<script src="main.js"></script>
</body>
</html>
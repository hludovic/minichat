<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=test', 'root', 'caribou', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

if (($_POST['pseudo'] != '') and ($_POST['message'] != '')) {
    setcookie('pseudo', $_POST['pseudo'], time() + 3600);

    $request = $bdd->prepare('INSERT INTO `test`.`minichat` (`pseudo`, `message`) VALUES(?, ?)');
    $request->execute(array($_POST['pseudo'], $_POST['message']));
    header('Location: index.php');
} else {
    header('Location: index.php');
}
?>
<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=test', 'root', 'caribou', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
$cookie_pseudo = '';
if (isset($_COOKIE['pseudo'])) {
    $cookie_pseudo = $_COOKIE['pseudo'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minichat</title>
</head>
<body>
<h1>Minichat</h1>
Entrez votre message.
<form action="minichat_post.php" method="post">
    <table>
        <tr>
            <td>Pseudo : </td>
            <td><input type="text" name="pseudo" id="pseudo" value="<?php echo $cookie_pseudo ?>"></td>
        </tr>
        <tr>
            <td>Message : </td>
            <td><input type="text" name="message" id="message"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="Envoyer"></td>
        </tr>
    </table>
</form>
<br><br>
<?php
$response = $bdd->query('SELECT * FROM minichat ORDER BY id DESC LIMIT 0, 10');
while ($data = $response->fetch()) {
    echo '<p><strong>' . htmlspecialchars($data['pseudo']) . ' : </strong>';
    echo htmlspecialchars($data['message']) . '</p>';
}
?>
</body>
</html>
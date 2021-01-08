<?php
    session_start();
    try {
        $bdd = new PDO("mysql:host=localhost;dbname=becode;charset=utf8", "root", "root", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    } catch (Exception $e) {
        die("Erreur : " . $e->getMessage());
    }
    function getIp(){
        if(!empty($_SERVER['HTTP_CLIENT_IP'])){
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }else{
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }
    $email = "cara@pills.com";
    $pwd = "Ninja123";
    if (isset($_POST['email']) && isset($_POST['password']) && !empty($_POST['email']) && !empty($_POST['password'])) {
        $bool = true;
        $mailInputed = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

        $reponse =$bdd->query("SELECT mail, password FROM loginPage");
        while ($donnees = $reponse->fetch()) {
            if ($donnees['mail'] == $mailInputed && $donnees['password'] == $_POST['password']) {
                $_SESSION['email'] = $donnees['mail'];
                $_SESSION['password'] = $donnees['password'];
            }
        }

        date_default_timezone_set("Europe/Brussels");
        $fichier = "includes/log.txt";
        $text = "[".date("d M Y H:i:s")."] <".$_POST['email']."> ".$_POST['password']." " . getIp()."\n";
        file_put_contents($fichier, $text, FILE_APPEND | LOCK_EX);
    } else {
        $bool = false;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="flex center">
            <h1>My super website</h1>
            <h2>A website with backend AND frontend code!</h2>
    </header>
    <div id="logSign" class="flex">
        <button><a href="index.php">Log in</a></button>
        <button><a href="sign.php">Sign in</a></button>
    </div>
    <main class="flex center">

        <?php
            if ($_SESSION) {
                include("includes/profile.php");

            } else {
                include("includes/form.php");
            }
        ?>

    </main>
    <footer class="flex center">
        <p>Copyright | My super protected website</p>
    </footer>
</body>
</html>
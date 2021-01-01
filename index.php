<?php
    session_start();
    $email = "cara@pills.com";
    $pwd = "Ninja123";
    if (isset($_POST['email']) && isset($_POST['password']) && !empty($_POST['email']) && !empty($_POST['password'])) {
        $bool = true;
        $mailInputed = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        if ($mailInputed == $email && $_POST['password'] == $pwd) {
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['password'] = $_POST['password'];
        }
        date_default_timezone_set("Europe/Brussels");
        $fichier = "includes/log.txt";
        $text = "[".date("d M Y H:i:s")."] <".$_POST['email']."> ".$_POST['password']."\n";
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
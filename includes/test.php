<?php
    echo realpath('test.php');

    echo "<br>";
    echo PASSWORD_DEFAULT;
    echo "<br>";
    echo crypt('ninja', "enculé");
?>
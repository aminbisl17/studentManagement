<?php
// checkPaths.php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mailExists = file_exists(__DIR__ . '/../phpmailer/mail.php');
    $autoloadExists = file_exists(__DIR__ . '/../../../vendor/autoload.php');

    echo "<p>mail.php exists? " . ($mailExists ? 'true' : 'false') . "</p>";
    echo "<p>vendor/autoload.php exists? " . ($autoloadExists ? 'true' : 'false') . "</p>";
}
?>

<form method="post">
    <button type="submit">Check Paths</button>
</form>

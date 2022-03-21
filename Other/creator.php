<?php session_start(); ?>

<p>Írd be</p>
<form method="POST">
    Jelszó: <input type="text" name="password" id="password">
    <input type="submit" value="send">
</form>

<?php
if (isset($_POST["password"])) {
    
    function getSalt() {
        $charset = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789/\\][{}\'";:?.>,<!@#$%^&*()-_=+|';
        $randStringLen = 30;
        $randString = "";
        for ($i = 0; $i < $randStringLen; $i++) {
            $randString .= $charset[mt_rand(0, strlen($charset) - 1)];
        }
        return $randString;
    }

    $salt = getSalt();
    $_SESSION["salt"] = $salt;
    $_SESSION["saltcrypt"] = crypt($salt,"$6$");
    $_SESSION["pass"] = $_POST["password"];
    
}

if (isset($_SESSION["pass"])) {
    echo $_SESSION["salt"]."<br>";
    echo $_SESSION["saltcrypt"]."<br>";
    $_SESSION["actual"] = crypt($_SESSION["pass"],"$6$".$_SESSION["saltcrypt"]."$");
    echo $_SESSION["actual"]."<br>";
    echo "<br>";
}

?>

<p>Írd be</p>
<form method="POST">
    Jelszó: <input type="text" name="password2" id="password">
    <input type="submit" value="send">
</form>

<?php

if (isset($_POST["password2"])) {
    $check = crypt($_POST["password2"],"$6$".$_SESSION["saltcrypt"]."$");
    echo $check;
    echo "<br>";
    if ($check == $_SESSION["actual"]) {
        echo "<p>jó</p><br>";
    }
    else {
        echo "<p>szar</p><br>";
    }
}

?>

<br>
<a href="./?torles" style="color: red;">törlés</a>
<?php
    if (isset($_GET["torles"])) {
        session_unset(); 
		session_destroy();
        header("Location: ./Other");
    }
?>
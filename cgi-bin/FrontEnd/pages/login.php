<div class='flex-container'>
	<div id='row'>
		<div id='login_col1'>
        <div class="login">
            <h1>E-Penna</h1>
            <div class="login_all">
                <div class="login_head"></div>
                <div class="login_main">
                    <div class="login_content">
                        <form action="" method="post">
                            <div class="line">
                                <input type="text" name="" id="" placeholder="Felhasználónév">
                            </div>
                            <div class="line">
                                <input type="password" name="" id="" placeholder="Jelszó">
                            </div>
                            <div class="lower">
                            <p class="inline">
                                <!--<a href="./?p=forgot.php">Elfelejtettem a jelszavam</a>-->
                            </p>
                            <p class="inline">
                                <input type='submit' name='send' value='BEJELENTKEZÉS'>
                            </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
		<div id='login_col2'></div>
		<div id='login_col3'></div>
	</div>
</div>



<?php
    if (isset($_POST["send"])) {
        if (!isset($_SESSION["login"])) {
            $_SESSION["login"] = "login";
            $_SESSION["start"] = time();
            $_SESSION["expire"] = $_SESSION["start"] + (30 * 60);
            header("location: ./");
        }
    }
?>
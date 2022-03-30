<div class='flex-container'>
	<div id='row'>
		<div id='login_col1'>
        <div class="login">
            <img src="./FrontEnd/img/e-penna_logo.png" alt="E-Penna" style="height: 200px; width: auto;">
            <div class="login_all">
                <div class="login_head"></div>
                <div class="login_main">
                    <div class="login_content">
                        <form action="" method="post">
                            <div class="line">
                                <input type="text" name="fnev" id="fnev" placeholder="Felhasználónév">
                            </div>
                            <div class="line">
                                <input type="password" name="pw" id="pw" placeholder="Jelszó">
                            </div>
                            <div class="lower">
                            <p class="inline">
                                <!--<a href="./?p=forgot.php">Elfelejtettem a jelszavam</a>-->
                            </p>
                            <p class="inline">
                                <input type='submit' name='send' value='BEJELENTKEZÉS'>
                            </p>
                            </div>
                            <?php echo "<p id='kiiras'>".$kiiras."</p>"; ?>
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
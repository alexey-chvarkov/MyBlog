<?php use App\Application as Application; ?>

<h1>Parametrs settings</h1>

<form class="form-mini" method="post">
        <h2>Database</h2>
        <div class="inputbox">
            <span>MySQL server: </span>
            <input type="text" name="db_server" value="<?php echo Application::$Configuration->DBServer; ?>" />
        </div>
        <div class="inputbox">
            <span>Username: </span>
            <input type="text" name="db_user" value="<?php echo Application::$Configuration->DBUser; ?>" />
        </div>
        <div class="inputbox">
            <span>Password: </span>
            <input type="password" name="db_password" value="<?php echo Application::$Configuration->DBPassword; ?>" />
        </div>
        <div class="inputbox">
            <span>Database name: </span>
            <input type="text" name="db_name" value="<?php echo Application::$Configuration->DBName; ?>" />
        </div>
        <h2>Site</h2>
        <div class="inputbox">
            <span>Site name: </span>
            <input type="text" name="sitename" value="<?php echo Application::$Configuration->SiteName; ?>" />
        </div>
        <div class="inputbox">
            <span>Background: </span>
            <input type="text" name="background" value="<?php echo Application::$Configuration->Background; ?>" />
        </div>
        <div class="inputbox">
            <span>Admin page: </span>
            <input type="text" name="adminpage" value="<?php echo Application::$Configuration->AdminPage; ?>" />
        </div>
        <div class="inputbox">
            <span>Copyright: </span>
            <input type="text" name="copyright" value="<?php echo Application::$Configuration->Copyright; ?>" />
        </div>
        <div class="inputbox">
            <input name="set-parametrs" type="submit" value="Set parametrs" />
        </div>
</form>
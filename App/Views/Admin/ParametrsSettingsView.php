<?php use App\Application as Application; ?>

<h1>Parametrs settings</h1>

<form class="form-mini" method="post">
        <h2>Global</h2>
        <div class="inputbox icontainer">
            <span>Site name: </span>
            <input class="tbx" type="text" name="sitename" value="<?php echo Application::$Configuration->SiteName; ?>" />
        </div>
        <div class="inputbox icontainer">
            <span>Background: </span>
            <input class="tbx" type="text" name="background" value="<?php echo Application::$Configuration->Background; ?>" />
        </div>
        <div class="inputbox icontainer">
            <span>Admin page: </span>
            <input class="tbx" type="text" name="adminpage" value="<?php echo Application::$Configuration->AdminPage; ?>" />
        </div>
        <div class="inputbox icontainer">
            <span>Copyright: </span>
            <input class="tbx" type="text" name="copyright" value="<?php echo Application::$Configuration->Copyright; ?>" />
        </div>
        <div class="inputbox icontainer">
            <input class="btn-green" name="set-parametrs" type="submit" value="Set parametrs" />
        </div>
</form>
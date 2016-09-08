<h1>Settings</h1>
<form method="post">
    <div class="inputbox">
        <span>Mysql server: </span> <input type="text" name="dbserver" />
    </div>
    <div class="inputbox">
        <span>Username: </span> <input type="text" name="dbuser" />
    </div>
    <div class="inputbox">
        <span>Password: </span> <input type="password" name="password" />
    </div>
    <div class="inputbox">
        <span>Database: </span> <input type="text" name="dbname" />
    </div>
    <div class="inputbox">
        <input onclick="tryconnect()" type="button" value="Try connect"  />
        <input type="button" value="Set"  />
    </div>
</form>
<div style="clear:both"></div>
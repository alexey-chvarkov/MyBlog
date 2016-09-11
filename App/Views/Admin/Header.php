<?php  use App\Application as Application; ?>
<!DOCTYPE XHTML>
<html>
    <head>
        <title>Заголовок</title>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="author" content="">
        <link rel="stylesheet" href="assets/css/admin.css" />
    </head>
    <body>
        <div class="header">
            <h1>Admin panel: «<?php echo Application::$Configuration->SiteName; ?>»</h1>
            <a target="new" href="?p=main">Open Site</a>
            <div style="clear: both"></div>
        </div>
        <div class="col-small">
            <div>
            <h2>Management</h2>
                <ul>
                    <li>
                        <a href="?p=<?php echo Application::$Configuration->AdminPage; ?>&open=menu_manager">Menu</a>
                        <span><?php echo Application::$Database->MenuItems->count(); ?></span>
                    </li>
                    <li>
                        <a href="?p=<?php echo Application::$Configuration->AdminPage; ?>&open=side_manager">Side</a>
                        <span>2</span>
                    </li>
                    <li>
                        <a href="?p=<?php echo Application::$Configuration->AdminPage; ?>&open=page_manager">Pages</a>
                        <span>0</span>
                    </li>
                    <li>
                        <a href="?p=<?php echo Application::$Configuration->AdminPage; ?>&open=post_manager">Posts</a>
                        <span>4</span>
                    </li>
                </ul>
            </div>
            <div/>
            <h2>Settings</h2>
                <ul>
                    <li><a href="?p=<?php echo Application::$Configuration->AdminPage; ?>&open=parametrs_settings">Paraments</a></li>
                    <li><a href="?p=<?php echo Application::$Configuration->AdminPage; ?>&open=design_settings">Dessign</a></li>
                </ul>
            </div>
        </div>
        <div class="col-big">
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
        <link rel="stylesheet" href="assets/css/sys.css" />
        <script src="assets/js/adm.js"></script>
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
                    <li <?php if ($_GET['open'] == "menu_manager") echo "class='col-small-select-item'"; ?>>
                        <a href="?p=<?php echo Application::$Configuration->AdminPage; ?>&open=menu_manager">Menu
                            <span><?php echo Application::$Database->MenuItems->count(); ?></span>
                        </a>     
                    </li>
                </a>
                    <li <?php if ($_GET['open'] == "side_manager") echo "class='col-small-select-item'"; ?>>
                        <a href="?p=<?php echo Application::$Configuration->AdminPage; ?>&open=side_manager">Widgets
                            <span><?php echo Application::$Database->SideItems->count(); ?></span>
                        </a>
                    </li>
                    <li <?php if ($_GET['open'] == "page_manager") echo "class='col-small-select-item'"; ?>>
                        <a href="?p=<?php echo Application::$Configuration->AdminPage; ?>&open=page_manager">Pages
                            <span><?php echo Application::$Database->Pages->count(); ?></span>
                        </a>
                    </li>
                    <li>
                        <a href="?p=<?php echo Application::$Configuration->AdminPage; ?>&open=post_manager">Posts
                            <span><?php echo Application::$Database->Posts->count(); ?></span>
                        </a>
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
<?php  use App\Application as Application; ?>
<!DOCTYPE XHTML>
<html>
    <head>
        <title>Edit file: «<?php echo $_GET["file"] ?>»</title>
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
            <h1>Edit file: «<?php echo $_GET["file"] ?>»</h1>
            <a  target="new" href="?p=main"> Open site </a>
            <a style="margin-right: 15px;" href="?p=<?php echo Application::$Configuration->AdminPage; ?>"> Back to admin panel </a>
            <div style="clear: both"></div>
        </div>
        <div class="col-small" style="padding: 15px;">
            <input class="btn-green" style="width: 100%" name="editor-save" value="Save" type="submit" />
            <b>Catalogs and files</b><br/>
            <a href="?p=<?php echo Application::$Configuration->AdminPage; ?>&open=editor&file=<?php echo $_GET['file'].'/'.'..' ?>">..</a><br/>
            <?php 
                foreach ($this->items as $item): 
                    if ($item != "." && $item != ".."): 
            ?>
                        <a href="?p=<?php echo Application::$Configuration->AdminPage; ?>&open=editor&file=<?php echo $_GET['file'].'/'.$item ?>"><?php echo $item; ?></a><br/>
            <?php
                    endif; 
                endforeach; 
            ?>
        </div>
        <div class="col-big">
            <div style="padding: 10px;">
                <textarea id="content" class="tbx-code" name="content" cols="120" rows="37"><?php echo $this->content; ?></textarea>
            </div>
        </div>
    </body>
</html>
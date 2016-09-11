<?php use App\Application as Application; ?>
<!DOCTYPE XHTML>
<html>
    <head>
        <title>Заголовок</title>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="author" content="">
        <link rel="stylesheet" href="assets/css/main.css" />
        <link href="https://fonts.googleapis.com/css?family=Neucha" rel="stylesheet">
    </head>
    <body style="background: url('<?php echo Application::$Configuration->Background; ?>');">
        <div class="head">
            
            <nav class="menu">
            <h1><?php echo Application::$Configuration->SiteName; ?></h1>
                <ul>
                    <?php foreach($this->MenuItems as $MenuItem): ?>
                        <li><a href="<?php echo $MenuItem->getValue()->URL; ?>"><?php echo $MenuItem->getValue()->Title; ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </nav>
        </div>
        <div class="col-main">
            <div class ="content">
                <div class="col-small">
                    <div class="sidebar">
                        <?php foreach ($this->SideItems as $SideItem): ?>
                            <div class="sidebox">
                                <h3><?php echo $SideItem->getValue()->Title; ?></h3>
                                <div><?php echo $SideItem->getValue()->Content; ?></div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="col-big">
                    <div class="middlebar">
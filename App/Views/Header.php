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
    <body>
        <div class="head">
            
            <nav class="menu">
            <h1><?php echo Application::$Configuration->SiteName; ?></h1>
                <ul>
                    <?php foreach(Application::$Database->MenuItems as $MenuItem): ?>
                        <li><a href="<?php echo $MenuItem->getValue()->URL; ?>"><?php echo $MenuItem->getValue()->Title; ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </nav>
        </div>
        <div class="col-main">
            <div class ="content">
                <div class="col-small">
                    <div class="sidebar">
                        <div class="sidebox">
                            <h3>About</h3>
                            <span>Text Publishing is an independent, Melbourne-based publisher of literary fiction and non-fiction. Text won the Australian Book Industry Awards (ABIA) Small Publisher of the Year in 2012, 2013 and 2014.<span>
                        </div>
                        <div class="sidebox">
                            <h3>Most view</h3>
                            <div class="post-item">
                                <b>Why do we use it?</b><br />
                                <span>It is a long established fact that a reader will be distracted by the readable content of a page when looki...</span>
                            </div>
                            <div class="post-item">
                                <b>Where does it come from?</b><br />
                                <span>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical L...</span>
                            </div>
                            <div class="post-item">
                                <b>Where can I get some?</b><br />
                                <span>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration i...</span>
                            </div>
                        </div>
                        <div class="sidebox">
                            <h3>Tags</h3>
                            #lorem #newyear #fish #dog #information
                        </div>
                    </div>
                </div>
                <div class="col-big">
                    <div class="middlebar">

<script>
    document.write();
</script>

<html>
    <head>
        <title>Error: <?php echo $this->title; ?></title>
        <link rel="stylesheet" href="../App/Views/Main/Styles/Main.css" />
    </head>
    <body>
        <div class="errorbox">
            <h1>Error: <?php echo $this->title; ?></h1>
            <span><?php echo $this->description; ?></span>
            <hr />
            <span>File: <?php echo $this->file; ?><br/></span>
            <span>Line: <?php echo $this->line; ?><br/></span>
        </div>
    </body>
</html>
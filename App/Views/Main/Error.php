
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
            <?php if ($this->file || $this->line): ?>
                <hr />
            <?php endif; ?>
            <?php if ($this->file): ?>
                <span>File: <?php echo $this->file; ?><br/></span>
            <?php endif; ?>
            <?php if ($this->line): ?>
                <span>Line: <?php echo $this->line; ?><br/></span>
            <?php endif; ?>
        </div>
    </body>
</html>

<?php
exit;
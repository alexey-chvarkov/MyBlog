<?php
use App\Application as Application;
use App\Models\Post as Post;
?>

<h1>Last news</h1>
<?php foreach (Application::$Database->Posts as $Post): ?>
    <div class="post-item">
        <h2><?php echo $Post->getValue()->Title; ?></h2>
        <span><?php echo $Post->getValue()->Preview; ?></span>
        <br /><br />
        <span>Создано: <?php echo $Post->getValue()->DateCreated; ?> | Просмотрено: <?php echo $Post->getValue()->Views; ?></span>
        <a style="float: right;" href="?p=post&id=<?php echo $Post->getValue()->PostId; ?>">More</a>
    </div>
<?php endforeach; ?>
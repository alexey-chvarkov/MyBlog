<?php
use App\Application as Application;
use App\Models\Post as Post;
?>

<h2><?php echo $this->Post->getValue()->Title; ?></h2>
<span><?php echo $this->Post->getValue()->Content; ?></span>
<br /><br />
<span>Создано: <?php echo $this->Post->getValue()->DateCreated; ?> | Просмотрено: <?php echo $this->Post->getValue()->Views; ?></span>
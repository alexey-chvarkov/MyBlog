<?php
use App\Application as Application;
use App\Models\Page as Page;
?>

<h2><?php echo $this->Page->getValue()->Title; ?></h2>
<span><?php echo $this->Page->getValue()->Content; ?></span>

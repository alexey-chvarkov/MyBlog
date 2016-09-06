<div id="message<?php echo $this->hash ?>" class="messagebox mes<?php echo $this->color ?>">
    <div onclick="document.getElementById('message<?php echo $this->hash ?>').outerHTML = '';" class="messagecloser">&#10006;</div>
    <h1><?php echo $this->title ?></h1>
    <span><?php echo $this->content ?></span>
</div>

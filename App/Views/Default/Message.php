<div id="message<?php echo $this->Hash ?>" class="messagebox mes<?php echo $this->Color ?>">
    <div onclick="document.getElementById('message<?php echo $this->Hash ?>').outerHTML = '';" class="messagecloser">&#10006;</div>
    <h1><?php echo $this->Title ?></h1>
    <span><?php echo $this->Content ?></span>
</div>
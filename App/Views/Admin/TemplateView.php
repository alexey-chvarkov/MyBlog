<?php use App\Application as Application; ?>

<?php $Template = $this->getOpenTemplate(); ?>

<h1>Template «<?php echo $_GET["name"] ?>»</h1>
<div class="template-content-container left">
    <h2>Preview</h2>
    <img width="100%" src="<?php echo $Template->Preview; ?>">
    <h2>Actions</h2>
    <form style="margin-top: 10px;" method="post">
        <input class="btn-green" name="set_tepmlate" type="submit" value="Set default" />
        <input class="btn-red" name="del_tepmlate" type="submit" value="Delete" />
        <input class="btn-gray" onclick="history.back();" type="submit" value="Back" />
    </form>
</div>
<div class="template-content-container right">
    <h2>Information</h2>
    <p>
        <span class="sel-text">Description: </span>
        <span><?php echo $Template->Description; ?></span>
        <br/>
    </p>
    <p>
        <span class="sel-text">Site: </span>
        <a target="new" href="<?php echo $Template->Site; ?>"><?php echo $Template->Site; ?></a>
        <br/>
    </p>
    <p>
        <span class="sel-text">Copyright: </span>
        <span><?php echo $Template->Copyright; ?></span>
        <br/>
    </p>
    <h2>Files</h2>
</div>

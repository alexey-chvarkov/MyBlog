<?php use App\Application as Application; ?>

<div class="container">
    <h1>Change page</h1>
</div>
<form name="add_menu_item" method="post">
    <div class="icontainer">
        <span>Name: </span><input class="tbx" type="text"  name="name" value="<?php echo Application::$Database->Pages->getPageById($this->ChangePageId)->getValue()->Alias; ?>" />
    </div>
    <div class="icontainer">
        <span>Title: </span><input class="tbx" type="text"  name="title" value="<?php echo Application::$Database->Pages->getPageById($this->ChangePageId)->getValue()->Title; ?>" />
    </div>
    <div class="container" style="float: left;">     
        <input type="button" onclick="appendInContent('<h1></h1>')" class="btn-gray btn-size-small" value="H1" />
        <input type="button" onclick="appendInContent('<h2></h2>')" class="btn-gray btn-size-small" value="H2" />
        <input type="button" onclick="appendInContent('<h3></h3>')" class="btn-gray btn-size-small" value="H3" />
        <input type="button" onclick="appendInContent('<p align=\'left\'></p>')" class="btn-gray btn-size-small" value="⇐" />
        <input type="button" onclick="appendInContent('<p align=\'center\'></p>')" class="btn-gray btn-size-small" value="⇔" />
        <input type="button" onclick="appendInContent('<p align=\'right\'></p>')" class="btn-gray btn-size-small" value="⇒" />
        <input type="button" onclick="appendInContent('<b></b>')" class="btn-gray btn-size-small" value="B" />
        <input type="button" onclick="appendInContent('<i></i>')" class="btn-gray btn-size-small" value="I" />
        <input type="button" onclick="appendInContent('<o></o>')" class="btn-gray btn-size-small" value="O" />
        <input type="button" onclick="appendInContent('<s></s>')" class="btn-gray btn-size-small" value="S" />
        <input type="button" onclick="appendInContent('<a href=\'#\'>Title</a>')" class="btn-gray btn-size-small" value="URL" />
        <input type="button" onclick="appendInContent('<br/>')" class="btn-gray btn-size-small" value="↵" />
    </div>

    <div class="icontainer">
        <textarea id="content" class="tbx-code" name="content" cols="67" rows="16"><?php echo Application::$Database->Pages->getPageById($this->ChangePageId)->getValue()->Content; ?></textarea>
    </div>
    <div class="icontainer">
        <input name="page-save" class="btn-green" type="submit" value="✎ Save" />
        <input onclick="history.back();" class="btn-gray" type="submit" value="◄ Back" />
    </div>
</form>
<div style="clear: both"></div>
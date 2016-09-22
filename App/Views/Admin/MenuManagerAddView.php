<div class="container">
    <h1>Add new menu item</h1>
</div>
<form name="add_menu_item" method="post">
    <div class="icontainer">
        <span>Title: </span><input class="tbx" type="text" name="new_title" />
    </div>
    <div class="icontainer">
        <span>URL: </span><input class="tbx" type="text" name="new_url" />
    </div>
    <div class="icontainer">
        <input class="btn-green" name="menu-item-add" type="submit" value="Add item" />
        <input onclick="history.back();" class="btn-gray" name="back" type="button" value="Back" />
    </div>
    <div style="clear: both"></div>
</form>
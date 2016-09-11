<?php use App\Application as Application; ?>

<div class="container">
    <h1>Menu manager</h1>
</div>

<?php foreach (Application::$Database->MenuItems as $MenuItem): ?>

    <div class="menuitem">
        <form name="menu-item_<?php echo $MenuItem->getValue()->MenuItemId; ?>" method="post">
            <div class="menuitem-col">
                <?php if ($this->ChangeMenuItemId == $MenuItem->getValue()->MenuItemId): ?>
                    <input type="text" name="menu-item-title_<?php echo $MenuItem->getValue()->MenuItemId; ?>" value="<?php echo $MenuItem->getValue()->Title; ?>" />
                <?php else: ?>
                    <span><?php echo $MenuItem->getValue()->Title; ?></span>
                <?php endif; ?>
            </div>
            <div class="menuitem-col">
                <?php if ($this->ChangeMenuItemId == $MenuItem->getValue()->MenuItemId): ?>
                    <input type="text" name="menu-item-url_<?php echo $MenuItem->getValue()->MenuItemId; ?>" value="<?php echo $MenuItem->getValue()->URL; ?>" />
                <?php else: ?>
                    <a target="new" href="<?php echo $MenuItem->getValue()->URL; ?>"><?php echo $MenuItem->getValue()->URL; ?></a>
                <?php endif; ?>
            </div>
            <div class="menuitem-nav">
                <?php if ($this->ChangeMenuItemId == $MenuItem->getValue()->MenuItemId): ?>
                    <input name="menu-item-save_<?php echo $MenuItem->getValue()->MenuItemId; ?>" type="submit" value="✔" />
                <?php else: ?>
                    <input name="menu-item-change_<?php echo $MenuItem->getValue()->MenuItemId; ?>" type="submit" value="✎" />
                <?php endif; ?>
                <input name="menu-item-inc_<?php echo $MenuItem->getValue()->MenuItemId; ?>" type="submit" value="▲" />
                <input name="menu-item-dec_<?php echo $MenuItem->getValue()->MenuItemId; ?>" type="submit" value="▼" />
                <input name="menu-item-del_<?php echo $MenuItem->getValue()->MenuItemId; ?>" type="submit" value="✖" /> 
            </div>
        </form>
        <div style="clear: both"></div>
    </div>
<?php endforeach; ?>
<div class="container">
    <h1>Add new menu item</h1>
</div>
<form name="add_menu_item" method="post">
    <div class="container">
    <span>Title: </span><input type="text" name="new_title" />
    <span>URL: </span><input type="text" name="new_url" />
        <input name="menu-item-add" type="submit" value="Add item" style="margin-top: -4px;" />
    </div>
</form>

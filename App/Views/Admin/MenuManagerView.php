<?php use App\Application as Application; ?>

    <h1>Menu manager</h1>
<div class="container bot-shadow">
    <input id="all-check" onclick="mm_all_check_click();" style="margin-left: 13px;" type="checkbox" />
    <input class="btn-green" onclick="location = '?p=<?php echo Application::$Configuration->AdminPage; ?>&open=menu_manager_add'" name="nav_add" type="button" value="Add" />
    
    <form name="multi_active" method="post" style="float: right;">
        <input id="select-delete" class="btn-gray" style="float: right" onclick="" name="nav_del" type="button" value="Delete" />
    </form>
</div>
<div class="container box-scrolling">
    <?php  $index = 0; foreach (Application::$Database->MenuItems as $MenuItem): $index++; ?>
    <div name="menuitem" class="menuitem">
        <form id="menuitem<?php echo $index; ?>" name="menu-item_<?php echo $MenuItem->getValue()->MenuItemId; ?>" method="post">
            <div class="menuitem-col">
                <input id="menuitem-check<?php echo $index; ?>" onchange="mm_menuitem_check_onchange();" name="menu-item-select_<?php echo $MenuItem->getValue()->MenuItemId; ?>" type="checkbox" />
                <?php if ($this->ChangeMenuItemId == $MenuItem->getValue()->MenuItemId): ?>
                    <input class="tbx"  type="text" name="menu-item-title_<?php echo $MenuItem->getValue()->MenuItemId; ?>" value="<?php echo $MenuItem->getValue()->Title; ?>" />
                <?php else: ?>
                    <span><?php echo $MenuItem->getValue()->Title; ?></span>
                <?php endif; ?>
            </div>
            <div class="menuitem-col">
                <?php if ($this->ChangeMenuItemId == $MenuItem->getValue()->MenuItemId): ?>
                    <input class="tbx" type="text" name="menu-item-url_<?php echo $MenuItem->getValue()->MenuItemId; ?>" value="<?php echo $MenuItem->getValue()->URL; ?>" />
                <?php else: ?>
                    <a target="new" href="<?php echo $MenuItem->getValue()->URL; ?>"><?php echo $MenuItem->getValue()->URL; ?></a>
                <?php endif; ?>
            </div>
            <div class="menuitem-nav">
                <?php if ($this->ChangeMenuItemId == $MenuItem->getValue()->MenuItemId): ?>
                    <input class="btn-green" name="menu-item-save_<?php echo $MenuItem->getValue()->MenuItemId; ?>" type="submit" value="✔" />
                <?php else: ?>
                    <input class="btn-gray" name="menu-item-change_<?php echo $MenuItem->getValue()->MenuItemId; ?>" type="submit" value="✎" />
                <?php endif; ?>
                <input class="btn-gray" name="menu-item-inc_<?php echo $MenuItem->getValue()->MenuItemId; ?>" type="submit" value="▲" />
                <input class="btn-gray" name="menu-item-dec_<?php echo $MenuItem->getValue()->MenuItemId; ?>" type="submit" value="▼" />
                <input class="btn-red" name="menu-item-del_<?php echo $MenuItem->getValue()->MenuItemId; ?>" type="submit" value="✖" /> 
            </div>
        </form>
        <div style="clear: both"></div>
    </div>
    <?php endforeach; ?>
</div>

<?php use App\Application as Application; ?>

<h1>Menu manager</h1>
<form name="main_form" method="post">
    <div class="container bot-shadow">
        <input id="all-check" onclick="mm_all_check_click();" style="margin-left: 13px;" type="checkbox" />
        <input onclick="history.back();" class="btn-gray" name="back" type="button" value="◄ Back" />
        <input class="btn-green" onclick="location = '?p=<?php echo Application::$Configuration->AdminPage; ?>&open=menu_manager_add'" name="nav_add" type="button" value="✚ Add" />
        <input id="delete-selected" class="btn-gray" style="float: right" onclick="" name="menu-delete-selected" type="button" value="✖ Delete" />
    </div>

    <div class="container box-scrolling">
        <?php  $index = 0; foreach (Application::$Database->MenuItems as $MenuItem): $index++; ?>
        <div name="menuitem" class="menuitem">     
                <div class="menuitem-col">
                    <input id="menuitem-check<?php echo $index; ?>" onchange="mm_menuitem_check_onchange();" name="menu-item-select_<?php echo $MenuItem->getValue()->MenuItemId; ?>" type="checkbox" />
                    <?php if ($this->ChangeMenuItemId == $MenuItem->getValue()->MenuItemId): ?>
                        <input class="tbx"  type="text" name="menu-item-title_<?php echo $MenuItem->getValue()->MenuItemId; ?>" value="<?php echo $MenuItem->getValue()->Title; ?>" />
                    <?php else: ?>
                        <span><?php echo $MenuItem->getValue()->Title; ?></span>
                    <?php endif; ?>
                    <div style="clear: both"></div>
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

            <div style="clear: both"></div>
        </div>
        <?php endforeach; ?>
    </div>
</form>

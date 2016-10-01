<?php use App\Application as Application; ?>

<h1>Widget manager</h1>
<form name="main_form" method="post">
    <div class="container bot-shadow">
        <input id="all-check" onclick="ms_all_check_click();" style="margin-left: 13px;" type="checkbox" />
        <input onclick="history.back();" class="btn-gray" name="back" type="button" value="◄ Back" />
        <input class="btn-green" onclick="location = '?p=<?php echo Application::$Configuration->AdminPage; ?>&open=side_manager_add'" name="nav_add" type="button" value="✚ Add" />
        <input id="delete-selected" class="btn-gray" style="float: right" onclick="" name="side-delete-selected" type="button" value="✖ Delete" />
    </div>

    <div class="container box-scrolling">
        <?php  $index = 0; foreach (Application::$Database->SideItems as $SideItem): $index++; ?>
        <div name="sideitem" class="sideitem">     
                <div class="sideitem-col">
                    <input id="sideitem-check<?php echo $index; ?>" onchange="ms_sideitem_check_onchange();" name="side-item-select_<?php echo $SideItem->getValue()->SideItemId; ?>" type="checkbox" />
                    <?php if ($this->ChangeSideItemId == $SideItem->getValue()->SideItemId): ?>
                        <input class="tbx"  type="text" name="side-item-title_<?php echo $SideItem->getValue()->SideItemId; ?>" value="<?php echo $SideItem->getValue()->Title; ?>" />
                    <?php else: ?>
                        <span><?php echo $SideItem->getValue()->Title; ?></span>
                    <?php endif; ?>

                </div>
                <div class="sideitem-nav">
                    <?php if ($this->ChangeSideItemId == $SideItem->getValue()->SideItemId): ?>
                        <input class="btn-green" name="side-item-save_<?php echo $SideItem->getValue()->SideItemId; ?>" type="submit" value="✔" />
                    <?php else: ?>
                        <input class="btn-gray" name="side-item-change_<?php echo $SideItem->getValue()->SideItemId; ?>" type="submit" value="✎" />
                    <?php endif; ?>
                    <input class="btn-gray" name="side-item-inc_<?php echo $SideItem->getValue()->SideItemId; ?>" type="submit" value="▲" />
                    <input class="btn-gray" name="side-item-dec_<?php echo $SideItem->getValue()->SideItemId; ?>" type="submit" value="▼" />
                    <input class="btn-red" name="side-item-del_<?php echo $SideItem->getValue()->SideItemId; ?>" type="submit" value="✖" /> 
                </div>

            <div style="clear: both"></div>
        </div>
        <?php endforeach; ?>
    </div>
</form>

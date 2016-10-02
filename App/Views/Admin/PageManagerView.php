<?php use App\Application as Application; ?>

<h1>Page manager</h1>
<form name="main_form" method="post">
    <div class="container bot-shadow">
        <input id="all-check" onclick="mpg_all_check_click();" style="margin-left: 13px;" type="checkbox" />
        <input onclick="history.back();" class="btn-gray" name="back" type="button" value="◄ Back" />
        <input class="btn-green" onclick="location = '?p=<?php echo Application::$Configuration->AdminPage; ?>&open=page_manager_add'" name="nav_add" type="button" value="✚ Add" />
        <input id="delete-selected" class="btn-gray" style="float: right" onclick="" name="page-delete-selected" type="button" value="✖ Delete" />
    </div>

    <div class="container box-scrolling">
        <?php  $index = 0; foreach (Application::$Database->Pages as $Page): $index++; ?>
        <div name="page" class="page">     
                <div class="page-col">
                    <input id="page-check<?php echo $index; ?>" onchange="mpg_page_check_onchange();" name="page-select_<?php echo $Page->getValue()->PageId; ?>" type="checkbox" />
                    <?php if ($this->ChangePageId == $Page->getValue()->PageId): ?>
                        <input class="tbx"  type="text" name="page-title_<?php echo $Page->getValue()->PageId; ?>" value="<?php echo $Page->getValue()->Title; ?>" />
                    <?php else: ?>
                        <a target="new" href="?p=<?php echo $Page->getValue()->Alias; ?>"><?php echo $Page->getValue()->Title; ?></a>
                    <?php endif; ?>

                </div>
                <div class="page-nav">
                    <?php if ($this->ChangePageId == $Page->getValue()->PageId): ?>
                        <input class="btn-green" name="page-save_<?php echo $Page->getValue()->PageId; ?>" type="submit" value="✔" />
                    <?php else: ?>
                        <input class="btn-gray" name="page-change_<?php echo $Page->getValue()->PageId; ?>" type="submit" value="✎" />
                    <?php endif; ?>
                    <input class="btn-gray" name="page-inc_<?php echo $Page->getValue()->PageId; ?>" type="submit" value="▲" />
                    <input class="btn-gray" name="page-dec_<?php echo $Page->getValue()->PageId; ?>" type="submit" value="▼" />
                    <input class="btn-red" name="page-del_<?php echo $Page->getValue()->PageId; ?>" type="submit" value="✖" /> 
                </div>

            <div style="clear: both"></div>
        </div>
        <?php endforeach; ?>
    </div>
</form>
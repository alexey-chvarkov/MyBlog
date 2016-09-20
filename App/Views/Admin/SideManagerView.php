<?php use App\Application as Application; ?>

<h1>Side manager</h1>

<div class="container">
    <a href="?p=<?php echo Application::$Configuration->AdminPage; ?>&open=side_manager_add">Add new item</a>
</div>

<?php foreach (Application::$Database->SideItems as $SideItem): ?>
    <div class="sideitem">
        <form name="side-item_<?php echo $SideItem->getValue()->SideItemId; ?>" method="post">
            <div class="sideitem-col">
                <span><?php echo $SideItem->getValue()->Title; ?></span>
            </div>
            <div class="sideitem-nav">
                <input name="side-item-change_<?php echo $SideItem->getValue()->SideItemId; ?>" type="submit" value="✎" />
                <input name="side-item-inc_<?php echo $SideItem->getValue()->SideItemId; ?>" type="submit" value="▲" />
                <input name="side-item-dec_<?php echo $SideItem->getValue()->SideItemId; ?>" type="submit" value="▼" />
                <input name="side-item-del_<?php echo $SideItem->getValue()->SideItemId; ?>" type="submit" value="✖" /> 
            </div>
        </form>
        <div style="clear: both"></div>
    </div>
<?php endforeach; ?>
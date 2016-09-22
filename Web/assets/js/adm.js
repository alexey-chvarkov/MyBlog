//===== All Events ======

function opensite_click() {
    location = "/";
}

//Basic

function mm_count() {
    return document.getElementsByName("menuitem").length;
}

function mm_getValueCheckBox(id) {
    return document.getElementById("menuitem-check"+id).checked;
}

function mm_setValueCheckBox(id, value) {
    return document.getElementById("menuitem-check"+id).checked = value;
}

function mm_has_sellect() {
    for (var i = 1; i <= mm_count(); i++) 
        if (document.getElementById("menuitem-check"+i).checked)
            return true;
    return false;
}

function mm_active_panel() {
    document.getElementById("delete-selected").setAttribute("class", "btn-red");
    document.getElementById("delete-selected").setAttribute("type", "submit");
}

function mm_disactive_panel() {
    document.getElementById("delete-selected").setAttribute("class", "btn-gray");
    document.getElementById("delete-selected").setAttribute("type", "button");
}


//Events

function mm_all_check_click()
{
    for (var i = 1; i <= mm_count(); i++)
        mm_setValueCheckBox(i, document.getElementById("all-check").checked);
    mm_menuitem_check_onchange();
}

function mm_menuitem_check_onchange()
{
    if (mm_has_sellect())
        mm_active_panel();
    else
        mm_disactive_panel()
}
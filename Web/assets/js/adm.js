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



//Events

function mm_all_click()
{
    for (var i = 1; i <= mm_count(); i++)
        mm_setValueCheckBox(i, true);
}

function mm_inversed_click() {
    for (var i = 1; i <= mm_count(); i++)
        mm_setValueCheckBox(i, !mm_getValueCheckBox(i));
}

function mm_clear_click() {
    for (var i = 1; i <= mm_count(); i++)
        mm_setValueCheckBox(i, false);
}
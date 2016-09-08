

function tryconnect()
{
    $.ajax({
        type: 'GET',
        url: 'http://localhost/Vendor/MysqlDBModels/Web/index.php',
        data: { 
            type: "ajaxquery", 
            method: "settings_isconnect",
            dbserver: $('input[name="dbserver"]').val(),
            dbuser: $('input[name="dbuser"]').val(),
            password: $('input[name="password"]').val(),
            dbname: $('input[name="dbname"]').val()
        },
        success: function(data) {
            $("body").append(data);
        }
    });
}
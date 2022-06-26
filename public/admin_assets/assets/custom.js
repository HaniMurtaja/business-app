// alert('hi from custom');


$("#closeAlert").click(function(){
    hideAlert();
});
function showAlert(msg, status) {
    var alert = $('#alert');
    alert.removeClass();
    alert.addClass("alert show alert-" + status);
    $(".alert-text").html(msg);
//    alert.show();
    $(".scroll-to-top").click();
}
function hideAlert(){
    var alert = $('#alert');
    alert.removeClass();
    alert.addClass("hide");
}




function updateModal(title,btn_id ,url, data, width) {
    $('#update-title').html(title);
    $('#update-body').load(url, data);
    var footer = " <button type='button' class='btn red' data-dismiss='modal' id='updateCancel'>إلغاء</button>";
    $('#update-footer').html(footer);
    $("#update-dialog").removeClass();
    $("#update-dialog").addClass('modal-dialog');
    $("#update-dialog").css('width',width);
    $('#updateModal').modal();
}

function showConfirm(title, btn_id ,msg, width) {
    $('#confirm-title').html(title);
    $('#confirm-body').html(msg);
    var footer =
        " <button type='button' class='btn btn-info' data-bs-dismiss='modal' id='confirmCancel'>إلغاء</button>" +
        "<button type='button' class='btn btn-danger' id="+btn_id+">نعم</button>";
    $('#confirm-footer').html(footer);
    $("#confirm-dialog").removeClass();
    $("#confirm-dialog").addClass('modal-dialog');
    $("#confirm-dialog").addClass(width);
    $('#myConfirm').modal('show');
}

function showMsg(title,msg,status,width){ // show message only
    $("#msg-dialog").removeClass();
    $("#msg-dialog").addClass('modal-dialog');
    $("#msg-dialog").addClass(width);
    if(status == "success")
        var iconClass = "";
    else if(status == "danger")
        var iconClass = "";
    var msgBtn = $("#msgCancelBtn");
    msgBtn.removeClass();
    msgBtn.addClass('btn btn-'+status);
    // msgBtn.;

    $('#msg-title').html(title);
    $('#msg-body').html("<i class='"+iconClass+"' style='font-size: 25px;'></i>  "+msg);
    $('#MyMsg').modal('show');
}

function hideModal(){
    $("#modalCancel").click();
}
function hideConfirm(){
    // $("#confirmCancel").click(function () {
        $('#myConfirm').modal('hide');

    // });
}


function hideMsg(){
    $('#MyMsg').modal('hide');

    // $("#msgCancel").click();
}

//$("#infoOk").click(function(){
//    hideInfo();
//});
var tableToExcel = (function() {
    var uri = 'data:application/vnd.ms-excel;base64,'
        , template = '<html dir="rtl" xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>'
        , base64 = function(s) {
        return window.btoa(unescape(encodeURIComponent(s)))
    }
        , format = function(s, c) {
        return s.replace(/{(\w+)}/g, function(m, p) {
            return c[p];
        })
    }
    return function(table, name) {
        if (!table.nodeType)
            table = document.getElementById(table)
        var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}
        window.location.href = uri + base64(format(template, ctx))
    }
})()

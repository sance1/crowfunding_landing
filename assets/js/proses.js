
// LOCAL
var base_url = location.origin + "/crowfunding_landing";
var cdn_url = location.origin + "/crowfunding_cdn/cdn";

/*//ONLINE
var base_url = location.origin;
var cdn_url = "https://cdn.win-dana.com/cdn";*/

SetHegiht();
function SetHegiht(){
    $(".home").css("min-height", ($(window).height()-76)+"px");
    setTimeout(function(){
        SetHegiht();
    }, 250);
}

$('input').attr('autocomplete','off');
$('#FrmUserLogin input').attr('autocomplete','on');
if($("html").find(".select").hasClass("select")) {
    $(".select").select2({
        minimumResultsForSearch: -1
    });
}
$(".submit-search-header").click(function(){
    $("#header-search").submit();
});

var datanext = 0, dataprev = 0;
var request  = {"filter": {"kywd": ""}};
var act = "", getfunc = "", interval_total_chat;
var l = $(".ladda-button-submit").ladda();

$(".modal").on('show.bs.modal', function () {
    if($(this).hasClass("no-scroll")){

    } else {
        $(this).find(".modal-body").css({"position": "relative", "overflow-y": "scroll", "overflow-x": "hidden", "max-height": ($(window).height()-160)});
        if($(this).find(".modal-footer").hasClass("modal-footer")) {
            $(this).find(".modal-body").css({"position": "relative", "overflow-y": "scroll", "overflow-x": "hidden", "max-height": ($(window).height()-260)});
        }
        if($(this).attr("id").indexOf("modal-status-") != "-1"){
            $(this).find(".modal-body").css("overflow", "inherit");
        }
        if($(this).find("form").attr("id") != undefined){
            $(this).find(".modal-body").css("overflow-y", "scroll");
            if($(this).find("form").attr("id").indexOf("Status") != "-1"){
                $(this).find(".modal-body").css("overflow", "inherit");
            }
        }
        setTimeout(function(){
            $("body").removeClass("modal-open");
        }, 600);
    }
});

function number_add_zero(str, max) {
    str = str.toString();
    return str.length < max ? number_add_zero("0" + str, max) : str;
}

function lastday(y,m){
    return  new Date(y, m +1, 0).getDate();
}

$("html").on("keyup", ".input-uppercase", function() {
    $(this).val($(this).val().toUpperCase());
}).on("keydown", ".input-uppercase", function() {
    $(this).val($(this).val().toUpperCase());
});

function uploadfile(selectorform, successfunc, action) {
    successfunc = (typeof successfunc !== 'undefined') ?  successfunc : "";
    var formdata = $(selectorform).serialize() +"&act=uploaddata";
    var formaction = $(selectorform).attr("action");
    $.ajax({
        type : "post",
        url: base_url + formaction,
        data :formdata,
        cache : false,
        dataType: 'json',
        beforeSend: function() {
            l.ladda("start");
        },
        success : function(resp){
            l.ladda("stop");
            if(resp.IsError == false) {
                toastrshow("success", "File sukses upload", "Success");
                $(".responfilehidden").val(resp.Output);
                $("#FrmProsesExcel").submit();
            } else {
                toastrshow("warning", resp.Output, "Warning");
            }
        }
    });
}

function toastrshow(type, title, message) {
    message = (typeof message !== 'undefined') ?  message : "";
    toastr.options = {
        closeButton: true,
        progressBar: true,
        showMethod: "slideDown",
        positionClass: "toast-top-right",
        timeOut: 4000,
        onclick: null,
        showMethod: "fadeIn",
        hideMethod: "fadeOut",
    }
    switch(type) {
        case "success" : toastr["success"](title, message);  break;
        case "info"    : toastr["info"](title, message);     break;
        case "warning" : toastr["warning"](title, message);  break;
        case "error"   : toastr["error"](title, message);    break;
        default        : toastr["info"](title, message);     break;
    }
}

$('.table-responsive').on('show.bs.dropdown', function () {
    $('.table-responsive').css( "overflow", "inherit" );
});

$('.table-responsive').on('hide.bs.dropdown', function () {
    $('.table-responsive').css( "overflow", "auto" );
});
function GetDropdownLokasi(selected, kategori, successfunc, target, option_tambahan) {
    selected = (typeof selected !== 'undefined') ?  selected : "";
    successfunc = (typeof successfunc !== 'undefined') ?  successfunc : "";
    option_tambahan = (typeof option_tambahan !== 'undefined') ?  option_tambahan : "";
    var request_dropdown_lokasi  = {"filter": {"kywd": ""}};
    request_dropdown_lokasi["filter"]["option_tambahan"] = option_tambahan;
    request_dropdown_lokasi["filter"]["status"] = kategori;
    $.ajax({
        type: "POST",
        url: base_url + "/lokasi/ajax_lokasi",
        data: {act:"datadropdown", req:request_dropdown_lokasi},
        dataType: "JSON",
        tryCount: 0,
        retryLimit : 3,
        success: function(resp){
            if(target == "" || target == null || target == undefined){
                if(resp.lsdt && resp.lsdt != "undefined") {
                    if(typeof $(".select2.dropdown-lokasi").attr("multiple") !== typeof undefined && $(".select2.dropdown-lokasi").attr("multiple") !== false) {
                        var result  = resp.lsdt;
                    } else {
                        var result  = "<option value=''>Pilih Lokasi</option>";
                        result += resp.lsdt;
                    }
                    $(".dropdown-lokasi").html(result);
                    if(selected != "") {
                        $(".dropdown-lokasi").val(selected).trigger("change");
                    }
                    if(successfunc != "") {
                        successfunc(resp);
                    }
                }
                $(".select2.dropdown-lokasi").select2({
                    disabled: false
                });
                $(".loading-dropdown-lokasi").addClass("hidden");
            } else {
                if(resp.lsdt && resp.lsdt != "undefined") {
                    var result  = "<option value=''>Pilih Lokasi</option>";
                        result += resp.lsdt;
                    $(".dropdown-lokasi-"+target).html(result);
                    if(selected != "") {
                        $(".dropdown-lokasi-"+target).val(selected).trigger("change");
                    }
                    if(successfunc != "") {
                        successfunc(resp);
                    }
                }
                $(".select2.dropdown-lokasi-"+target).select2({
                    disabled: false
                });
                $(".loading-dropdown-lokasi-"+target).addClass("hidden");
            }
        },
        error: function(xhr, textstatus, errorthrown) {
            if(target == "" || target == null || target == undefined){
                $(".select2.dropdown-lokasi").select2({
                    disabled: true,
                    placeholder: "Periksa koneksi internet anda kembali",
                });
                $(".loading-dropdown-lokasi").addClass("hidden");
            } else {
                $(".select2.dropdown-lokasi-"+target).select2({
                    disabled: true,
                    placeholder: "Periksa koneksi internet anda kembali",
                });
                $(".loading-dropdown-lokasi-"+target).addClass("hidden");
            }
        }
    });
}
GetDropdownBank();
function GetDropdownBank(selected, kategori, successfunc, target, option_tambahan) {
    selected = (typeof selected !== 'undefined') ?  selected : "";
    successfunc = (typeof successfunc !== 'undefined') ?  successfunc : "";
    option_tambahan = (typeof option_tambahan !== 'undefined') ?  option_tambahan : "";
    var request_dropdown_bank  = {"filter": {"kywd": ""}};
    request_dropdown_bank["filter"]["option_tambahan"] = option_tambahan;
    request_dropdown_bank["filter"]["status"] = kategori;
    $.ajax({
        type: "POST",
        url: base_url + "/bank/ajax_bank",
        data: {act:"datadropdown", req:request_dropdown_bank},
        dataType: "JSON",
        tryCount: 0,
        retryLimit : 3,
        success: function(resp){
            if(target == "" || target == null || target == undefined){
                if(resp.lsdt && resp.lsdt != "undefined") {
                    if(typeof $(".select2.dropdown-bank").attr("multiple") !== typeof undefined && $(".select2.dropdown-bank").attr("multiple") !== false) {
                        var result  = resp.lsdt;
                    } else {
                        var result  = "";
                        result += resp.lsdt;
                    }
                    $(".dropdown-bank").html(result);
                    if(selected != "") {
                        $(".dropdown-bank").val(selected).trigger("change");
                    }
                    if(successfunc != "") {
                        successfunc(resp);
                    }
                }
                $(".select2.dropdown-bank").select2({
                    disabled: false
                });
                $(".loading-dropdown-bank").addClass("hidden");
            } else {
                if(resp.lsdt && resp.lsdt != "undefined") {
                    var result  = "";
                        result += resp.lsdt;
                    $(".dropdown-bank-"+target).html(result);
                    if(selected != "") {
                        $(".dropdown-bank-"+target).val(selected).trigger("change");
                    }
                    if(successfunc != "") {
                        successfunc(resp);
                    }
                }
                $(".select2.dropdown-bank-"+target).select2({
                    disabled: false
                });
                $(".loading-dropdown-bank-"+target).addClass("hidden");
            }
        },
        error: function(xhr, textstatus, errorthrown) {
            if(target == "" || target == null || target == undefined){
                $(".select2.dropdown-bank").select2({
                    disabled: true,
                    placeholder: "Periksa koneksi internet anda kembali",
                });
                $(".loading-dropdown-bank").addClass("hidden");
            } else {
                $(".select2.dropdown-bank-"+target).select2({
                    disabled: true,
                    placeholder: "Periksa koneksi internet anda kembali",
                });
                $(".loading-dropdown-bank-"+target).addClass("hidden");
            }
        }
    });
}
function GetDropdownProvinsi(selected, kategori, successfunc, target) {
    selected = (typeof selected !== 'undefined') ?  selected : "";
    successfunc = (typeof successfunc !== 'undefined') ?  successfunc : "";
    var request_dropdown_provinsi  = {"filter": {"kywd": ""}};
    request_dropdown_provinsi["filter"]["status"] = kategori;
    $.ajax({
        type: "POST",
        url: base_url + "/master_data/ajax_master_data_provinsi",
        data: {act:"datadropdown", req:request_dropdown_provinsi},
        dataType: "JSON",
        tryCount: 0,
        retryLimit : 3,
        success: function(resp){
            if(target == "" || target == null || target == undefined){
                if(resp.lsdt && resp.lsdt != "undefined") {
                    if(typeof $(".select2.dropdown-provinsi").attr("multiple") !== typeof undefined && $(".select2.dropdown-provinsi").attr("multiple") !== false) {
                        var result  = resp.lsdt;
                    } else {
                        var result  = "<option value=''>Pilih Provinsi</option>";
                        result += resp.lsdt;
                    }
                    $(".dropdown-provinsi").html(result);
                    if(selected != "") {
                        $(".dropdown-provinsi").val(selected).trigger("change");
                    }
                    if(successfunc != "") {
                        successfunc(resp);
                    }
                }
                $(".select2.dropdown-provinsi").select2({
                    disabled: false
                });
                $(".loading-dropdown-provinsi").addClass("hidden");
            } else {
                if(resp.lsdt && resp.lsdt != "undefined") {
                    var result  = "<option value=''>Pilih Provinsi</option>";
                        result += resp.lsdt;
                    $(".dropdown-provinsi-"+target).html(result);
                    if(selected != "") {
                        $(".dropdown-provinsi-"+target).val(selected).trigger("change");
                    }
                    if(successfunc != "") {
                        successfunc(resp);
                    }
                }
                $(".select2.dropdown-provinsi-"+target).select2({
                    disabled: false
                });
                $(".loading-dropdown-provinsi-"+target).addClass("hidden");
            }
        },
        error: function(xhr, textstatus, errorthrown) {
            if(target == "" || target == null || target == undefined){
                $(".select2.dropdown-provinsi").select2({
                    disabled: true,
                    placeholder: "Periksa koneksi internet anda kembali",
                });
                $(".loading-dropdown-provinsi").addClass("hidden");
            } else {
                $(".select2.dropdown-provinsi-"+target).select2({
                    disabled: true,
                    placeholder: "Periksa koneksi internet anda kembali",
                });
                $(".loading-dropdown-provinsi-"+target).addClass("hidden");
            }
        }
    });
}
function GetDropdownKota(selected, kategori, successfunc, target) {
    selected = (typeof selected !== 'undefined') ?  selected : "";
    successfunc = (typeof successfunc !== 'undefined') ?  successfunc : "";
    var request_dropdown_kota = {"filter": {"kywd": ""}};
    request_dropdown_kota["filter"]["id_provinsi"] = kategori;
    $.ajax({
        type: "POST",
        url: base_url + "/master_data/ajax_master_data_kota",
        data: {act:"datadropdown", req:request_dropdown_kota},
        dataType: "JSON",
        tryCount: 0,
        retryLimit : 3,
        success: function(resp){
            if(target == "" || target == null || target == undefined){
                if(resp.lsdt && resp.lsdt != "undefined") {
                    if(typeof $(".select2.dropdown-kota").attr("multiple") !== typeof undefined && $(".select2.dropdown-kota").attr("multiple") !== false) {
                        var result  = resp.lsdt;
                    } else {
                        var result  = "<option value=''>Pilih Kota/Kabupaten</option>";
                        result += resp.lsdt;
                    }
                    $(".dropdown-kota").html(result);
                    if(selected != "") {
                        $(".dropdown-kota").val(selected).trigger("change");
                    }
                    if(successfunc != "") {
                        successfunc(resp);
                    }
                }
                $(".select2.dropdown-kota").select2({
                    disabled: false
                });
                $(".loading-dropdown-kota").addClass("hidden");
            } else {
                if(resp.lsdt && resp.lsdt != "undefined") {
                    var result  = "<option value=''>Pilih Kota/Kabupaten</option>";
                        result += resp.lsdt;
                    $(".dropdown-kota-"+target).html(result);
                    if(selected != "") {
                        $(".dropdown-kota-"+target).val(selected).trigger("change");
                    }
                    if(successfunc != "") {
                        successfunc(resp);
                    }
                }
                $(".select2.dropdown-kota-"+target).select2({
                    disabled: false
                });
                $(".loading-dropdown-kota-"+target).addClass("hidden");
            }
        },
        error: function(xhr, textstatus, errorthrown) {
            if(target == "" || target == null || target == undefined){
                $(".select2.dropdown-kota").select2({
                    disabled: true,
                    placeholder: "Periksa koneksi internet anda kembali",
                });
                $(".loading-dropdown-kota").addClass("hidden");
            } else {
                $(".select2.dropdown-kota-"+target).select2({
                    disabled: true,
                    placeholder: "Periksa koneksi internet anda kembali",
                });
                $(".loading-dropdown-kota-"+target).addClass("hidden");
            }
        }
    });
}
function GetDropdownKecamatan(selected, kategori, successfunc, target) {
    selected = (typeof selected !== 'undefined') ?  selected : "";
    successfunc = (typeof successfunc !== 'undefined') ?  successfunc : "";
    var request_dropdown_kecamatan = {"filter": {"kywd": ""}};
    request_dropdown_kecamatan["filter"]["id_kota"] = kategori;
    $.ajax({
        type: "POST",
        url: base_url + "/master_data/ajax_master_data_kecamatan",
        data: {act:"datadropdown", req:request_dropdown_kecamatan},
        dataType: "JSON",
        tryCount: 0,
        retryLimit : 3,
        success: function(resp){
            if(target == "" || target == null || target == undefined){
                if(resp.lsdt && resp.lsdt != "undefined") {
                    if(typeof $(".select2.dropdown-kecamatan").attr("multiple") !== typeof undefined && $(".select2.dropdown-kecamatan").attr("multiple") !== false) {
                        var result  = resp.lsdt;
                    } else {
                        var result  = "<option value=''>Pilih Kecamatan</option>";
                        result += resp.lsdt;
                    }
                    $(".dropdown-kecamatan").html(result);
                    if(selected != "") {
                        $(".dropdown-kecamatan").val(selected).trigger("change");
                    }
                    if(successfunc != "") {
                        successfunc(resp);
                    }
                }
                $(".select2.dropdown-kecamatan").select2({
                    disabled: false
                });
                $(".loading-dropdown-kecamatan").addClass("hidden");
            } else {
                if(resp.lsdt && resp.lsdt != "undefined") {
                    var result  = "<option value=''>Pilih Kecamatan</option>";
                        result += resp.lsdt;
                    $(".dropdown-kecamatan-"+target).html(result);
                    if(selected != "") {
                        $(".dropdown-kecamatan-"+target).val(selected).trigger("change");
                    }
                    if(successfunc != "") {
                        successfunc(resp);
                    }
                }
                $(".select2.dropdown-kecamatan-"+target).select2({
                    disabled: false
                });
                $(".loading-dropdown-kecamatan-"+target).addClass("hidden");
            }
        },
        error: function(xhr, textstatus, errorthrown) {
            if(target == "" || target == null || target == undefined){
                $(".select2.dropdown-kecamatan").select2({
                    disabled: true,
                    placeholder: "Periksa koneksi internet anda kembali",
                });
                $(".loading-dropdown-kecamatan").addClass("hidden");
            } else {
                $(".select2.dropdown-kecamatan-"+target).select2({
                    disabled: true,
                    placeholder: "Periksa koneksi internet anda kembali",
                });
                $(".loading-dropdown-kecamatan-"+target).addClass("hidden");
            }
        }
    });
}

function validatedata(evt) {
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    return !(charCode > 31 && (charCode < 48 || charCode > 57));
}

function rupiah(number){
    if(number == null || number == ""){
        return 0;
    }
    number = number.toString().replace(".00", "");
    number = number.replace(".", "");
    var minus_return = "";
    if(number.indexOf("-") != -1){
        number = number.replace("-", "");
        minus_return = "-";
    }
    var inputan = Number(number);
    var number_string = inputan.toString(), sisa = number_string.length % 3, inputan = number_string.substr(0, sisa), ribuan = number_string.substr(sisa).match(/\d{3}/g); if (ribuan) { separator = sisa ? '.' : ''; inputan += separator + ribuan.join('.'); }
    return minus_return+inputan;
}

function backAway() {
    if(history.length === 1){
        history.back();
    } else {
        history.back();
    }
}

function loader(withtable, colspan) {
    colspan = (colspan != "") ? colspan : "10";
    withtable = (typeof withtable !== 'undefined') ?  withtable : false;
    var html  = '';
    if(withtable == true) html += "<tr><td style='padding: 10px !important;' colspan='"+colspan+"' class='text-center'>";
    html += '<center><img class="loading-gif-image" src="'+base_url+'/assets/images/loading-data.gif" alt="Loading ..."></center>';
    if(withtable == true) html += "</td>";
    return html;
}

function resetformvalue(selector) {
    $(selector).trigger("reset"); //Reset value di form. Kecuali Select2
    $(selector + " select").val("").trigger("change"); //Reset seluruh Select2 yang ada di form
}

function GetData(req, action, table, successfunc, colspan) {
    colspan = (colspan != "") ? colspan : "10";
    req = (typeof req !== 'undefined') ?  req : "";
    successfunc = (typeof successfunc !== 'undefined') ?  successfunc : "";
    act = (action != "") ? action : "listdatahtml";
    $(".datatable-"+table+" tbody").html(loader(true, colspan));
    $.ajax({
        type: "POST",
        url: base_url + pagename,
        data: {act:act, req:req},
        dataType: "JSON",
        tryCount: 0,
        retryLimit: 3,
        success: function(resp){
            if(resp.paging.Total != undefined) {
                $(".datatable-"+table+" tbody").html(resp.lsdt);
                pagination(resp.paging, table);
                if(successfunc != "") {
                    getfunc = successfunc;
                    successfunc(resp);
                }
            } else {
                $(".datatable-"+table+" tbody").html(resp.lsdt);
                $(".pagination-layout-"+table).addClass("d-none");
                if(successfunc != "") {
                    getfunc = successfunc;
                    successfunc(resp);
                }
            }
        },
        error: function(xhr, textstatus, errorthrown) {
            $(".datatable-"+table+" tbody").html("<tr><td style='padding: 20px !important;' colspan='"+colspan+"' class='text-center'><span class='badge badge-pill badge-warning'>Periksa koneksi internet anda kembali</span></td></tr>");
            $(".pagination-layout-"+table).addClass("d-none");
        }
    });
}

function GetDataById(id, successfunc, action, errorfunc) {
    successfunc = (typeof successfunc !== 'undefined') ?  successfunc : "";
    errorfunc = (typeof errorfunc !== 'undefined') ?  errorfunc : "";
    action = (typeof action !== 'undefined') ?  action : "getdatabyid";
    $.ajax({
        type: "POST",
        url: base_url + pagename,
        data: {"act":action, req:id},
        tryCount: 0,
        retryLimit: 3,
        success: function(resp){
            resp = JSON.parse(resp);
            if(resp.length == 0 || resp.data == "") {
                $(".modal").modal("hide");
                toastrshow("warning", "Data not found", "Warning");
                if(errorfunc != "") {
                    errorfunc();
                }
            } else {
                successfunc(resp);
            }
        },
        error: function(xhr, textstatus, errorthrown) {
            setTimeout(function(){
                $(".modal").modal("hide");
                toastrshow("warning", "Periksa koneksi internet anda kembali", "Warning");
                if(errorfunc != "") {
                    errorfunc();
                }
            }, 500);
        }
    });
}

function InsertData(selectorform, successfunc, errorfunc, nameaction) {
    successfunc = (typeof successfunc !== 'undefined') ?  successfunc : "";
    errorfunc = (typeof errorfunc !== 'undefined') ?  errorfunc : "";
    nameaction = (typeof nameaction !== 'insertdata') ?  nameaction : "";
    var formdata   = $(selectorform).serialize() +"&act="+nameaction;
    var formaction = $(selectorform).attr("action");
    $.ajax({
        type: "POST",
        url: base_url + formaction,
        data: formdata,
        dataType: "JSON",
        tryCount: 0,
        retryLimit: 3,
        beforeSend: function() {
            laddasubmit.ladda("start");
        },
        success: function(resp){
            laddasubmit.ladda("stop");
            if(resp.IsError != undefined) {
                if(resp.ErrorMessage[0].error != undefined) {
                    toastrshow("warning", resp.ErrorMessage[0].error, "Warning");
                } else {
                    toastrshow("warning", resp.ErrorMessage, "Warning");
                }
            } else {
                if(resp == 1 || resp == "1") {
                    toastrshow("success", "Data berhasil disimpan", "Success");
                    $(selectorform).parents(".modal").modal("hide"); //Tutup modal
                    if(successfunc != "") {
                        successfunc(resp);
                    }
                } else {
                    toastrshow("warning", "Data gagal disimpan", "Warning");
                }
            }
        },
        error: function(xhr, textstatus, errorthrown) {
            laddasubmit.ladda("stop");
            setTimeout(function(){
                $(".modal").modal("hide");
                toastrshow("warning", "Periksa koneksi internet anda kembali", "Warning");
            }, 500);
        }
    });
}

function UpdateData(selectorform, successfunc, errorfunc, action_func, alert_success) {
    successfunc = (typeof successfunc !== 'undefined') ?  successfunc : "";
    errorfunc = (typeof errorfunc !== 'undefined') ?  errorfunc : "";
    action_func = (typeof action_func !== 'undefined') ?  action_func : "updatedata";
    alert_success = (typeof alert_success !== 'undefined') ?  alert_success : "";
    var formdata   = $(selectorform).serialize() +"&act="+action_func;
    var formaction = $(selectorform).attr("action");
    $.ajax({
        type: "POST",
        url: base_url + formaction,
        data: formdata,
        dataType: "JSON",
        tryCount: 0,
        retryLimit: 3,
        beforeSend: function() {
            laddasubmit.ladda("start");
        },
        success: function(resp){
            laddasubmit.ladda("stop");
            if(resp.IsError != undefined) {
                if(resp.ErrorMessage[0].error != undefined) {
                    toastrshow("warning", resp.ErrorMessage[0].error, "Warning");
                } else {
                    toastrshow("warning", resp.ErrorMessage, "Warning");
                }
            } else {
                if(resp == 1 || resp == "1") {
                    if(alert_success == "") {
                        toastrshow("success", "Data berhasil disimpan", "Success");
                    } else {
                        if(alert_success == 1){

                        } else {
                            toastrshow("success", alert_success, "Success");
                        }
                    }
                    $(selectorform).parents(".modal").modal("hide"); //Tutup modal
                    if(successfunc != "") {
                        successfunc(resp);
                    }
                } else {
                    toastrshow("error", "Failed to save", "Warning");
                    if(errorfunc != "") {
                        errorfunc();
                    }
                }
            }
        },
        error: function(xhr, textstatus, errorthrown) {
            laddasubmit.ladda("stop");
            setTimeout(function(){
                $(".modal").modal("hide");
                toastrshow("warning", "Periksa koneksi internet anda kembali", "Warning");
            }, 500);
        }
    });
}

function DeleteData(selectorform, successfunc, errorfunc) {
    successfunc = (typeof successfunc !== 'undefined') ?  successfunc : "";
    errorfunc = (typeof errorfunc !== 'undefined') ?  errorfunc : "";
    var formdata   = $(selectorform).serialize() +"&act=deletedata";
    var formaction = $(selectorform).attr("action");
    $.ajax({
        type: "POST",
        url: base_url + formaction,
        data: formdata,
        dataType: "JSON",
        tryCount: 0,
        retryLimit: 3,
        beforeSend: function() {
            laddasubmit.ladda("start");
        },
        success: function(resp){
            laddasubmit.ladda("stop");
            if(resp == 1 || resp == "1") {
                toastrshow("success", "Data berhasil dihapus", "Success");
                $(selectorform).parents(".modal").modal("hide"); //Tutup modal
                if(successfunc != "") {
                    successfunc(resp);
                }
            } else {
                toastrshow("error", "Failed to delete", "Warning");
                if(errorfunc != "") {
                    errorfunc();
                }
            }
        },
        error: function(xhr, textstatus, errorthrown) {
            laddasubmit.ladda("stop");
            setTimeout(function(){
                $(".modal").modal("hide");
                toastrshow("warning", "Periksa koneksi internet anda kembali", "Warning");
            }, 500);
        }
    });
}

// START PAGINATION -------------------------------------------------------------------
function pagination(page, table) {
    var paginglayout = $(".pagination-layout-"+table);
    var infopage = page.InfoPage+" Records | "+page.JmlHalTotal+" Pages";
    
    paginglayout.removeClass("d-none");
    paginglayout.find("input[type='text']").val(Number(page.HalKe));
    paginglayout.find("div.info").html(infopage);
    if(page.IsNext == true) {
        paginglayout.find(".btn.next, .next-head").removeClass("disabled").removeAttr("disabled");
        paginglayout.find(".btn.last").removeClass("disabled").removeAttr("disabled");
        paginglayout.find(".btn.last").attr("lastpage", page.JmlHalTotal);
        datanext = (Number(page.HalKe) + 1);
    } else {
        paginglayout.find(".btn.next, .next-head").addClass("disabled").attr("disabled", "disabled");
        paginglayout.find(".btn.last").addClass("disabled").attr("disabled", "disabled");
        dataprev = 0;
    }
    if(page.IsPrev == true) {
        paginglayout.find(".btn.prev, .prev-head").removeClass("disabled").removeAttr("disabled");
        paginglayout.find(".btn.first").removeClass("disabled").removeAttr("disabled");
        dataprev = (Number(page.HalKe) - 1);
    } else {
        paginglayout.find(".btn.prev, .prev-head").addClass("disabled").attr("disabled", "disabled");
        paginglayout.find(".btn.first").addClass("disabled").attr("disabled", "disabled");
        dataprev = 0;
    }
}
function setpagination(page, table) {
    var paginglayout = $(".set-pagination-layout-"+table);
    var infopage = page.InfoPage+" Records | "+page.JmlHalTotal+" Pages";
    paginglayout.removeClass("d-none");
    paginglayout.find("input[type='text']").val(Number(page.HalKe));
    paginglayout.find("div.info").html(infopage);
    if(page.IsNext == true) {
        paginglayout.find(".btn.next").removeClass("disabled");
        paginglayout.find(".btn.last").removeClass("disabled");
        paginglayout.find(".btn.last").attr("lastpage", page.JmlHalTotal);
        datanext = (Number(page.HalKe) + 1);
    } else {
        paginglayout.find(".btn.next").addClass("disabled");
        paginglayout.find(".btn.last").addClass("disabled");
        dataprev = 0;
    }
    if(page.IsPrev == true) {
        paginglayout.find(".btn.prev").removeClass("disabled");
        paginglayout.find(".btn.first").removeClass("disabled");
        dataprev = (Number(page.HalKe) - 1);
    } else {
        paginglayout.find(".btn.prev").addClass("disabled");
        paginglayout.find(".btn.first").addClass("disabled");
        dataprev = 0;
    }
}
$(".btn.next").click(function() {
    var table = $(this).parent().parent().parent().parent().attr("class");
    var classdata = table.replace(/modal-footer set-pagination-layout-/g, "", table);
    table = table.replace(classdata, "", table);
    if(table == "modal-footer set-pagination-layout-"){
        pagename = $(this).parent().parent().parent().attr("pagename");
        request["Page"] = datanext;
        GetListGroup(request, act, classdata, getfunc);
    } else {
        pagename = $(this).parent().parent().parent().parent().parent().parent().attr("pagename");
        colspan = $(this).parent().parent().parent().parent().parent().parent().attr("data-colspan");
        var table = $(this).parent().parent().parent().parent().parent().parent().attr("class");
        table = table.replace(/pagination-layout-/g, "", table);
        request["Page"] = datanext;
        GetData(request, act, table, getfunc, colspan);
    }
});
$(".btn.prev").click(function() {
    var table = $(this).parent().parent().parent().parent().attr("class");
    var classdata = table.replace(/modal-footer set-pagination-layout-/g, "", table);
    table = table.replace(classdata, "", table);
    if(table == "modal-footer set-pagination-layout-"){
        pagename = $(this).parent().parent().parent().attr("pagename");
        request["Page"] = dataprev;
        GetListGroup(request, act, classdata, getfunc);
    } else {
        pagename = $(this).parent().parent().parent().parent().parent().parent().attr("pagename");
        colspan = $(this).parent().parent().parent().parent().parent().parent().attr("data-colspan");
        var table = $(this).parent().parent().parent().parent().parent().parent().attr("class");
        table = table.replace(/pagination-layout-/g, "", table);
        request["Page"] = dataprev;
        GetData(request, act, table, getfunc, colspan);
    }
});
$(".btn.first").click(function() {
    var table = $(this).parent().parent().parent().parent().parent().parent().attr("class");
    table = table.replace(/pagination-layout-/g, "", table);
    request["Page"] = 1;
    pagename = $(this).parent().parent().parent().parent().parent().parent().attr("pagename");
    colspan = $(this).parent().parent().parent().parent().parent().parent().attr("data-colspan");
    GetData(request, act, table, getfunc, colspan);
});
$(".btn.last").click(function() {
    var table = $(this).parent().parent().parent().parent().parent().parent().attr("class");
    table = table.replace(/pagination-layout-/g, "", table);
    request["Page"] = $(this).attr('lastpage');
    pagename = $(this).parent().parent().parent().parent().parent().parent().attr("pagename");
    colspan = $(this).parent().parent().parent().parent().parent().parent().attr("data-colspan");
    GetData(request, act, table, getfunc, colspan);
});
$(".limit").change(function() {
    var table = $(this).parent().parent().parent().parent().attr("class");
    table = table.replace(/pagination-layout-/g, "", table);
    var limit = $(this).val();
    pagename = $(this).parent().parent().parent().parent().attr("pagename");
    colspan = $(this).parent().parent().parent().parent().attr("data-colspan");
    request["Limit"] = limit;
    GetData(request, act, table, getfunc, colspan);
});
$("#FrmGotoPage").submit(function() {
    var table = $(this).parent().parent().parent().attr("class");
    table = table.replace(/pagination-layout-/g, "", table);
    var page = $(this).find("input[type='text']").val();
    request["Page"] = page;
    pagename = $(this).parent().parent().parent().attr("pagename");
    colspan = $(this).parent().parent().parent().attr("data-colspan");
    GetData(request, act, table, getfunc, colspan);
    return false;
});

$(".btn.next-head").click(function() {
    var table = $(this).parent().attr("class");
    table = table.replace(/btn-group pagination-layout-/g, "", table);
    request["Page"] = datanext;
    pagename = $(this).parent().attr("pagename");
    colspan = $(this).parent().attr("data-colspan");
    GetData(request, act, table, getfunc, colspan);
});
$(".btn.prev-head").click(function() {
    var table = $(this).parent().attr("class");
    table = table.replace(/btn-group pagination-layout-/g, "", table);
    request["Page"] = dataprev;
    pagename = $(this).parent().attr("pagename");
    colspan = $(this).parent().attr("data-colspan");
    GetData(request, act, table, getfunc, colspan);
});
// END PAGINATION ---------------------------------------------------------------------




var start_timer_tarik = true;
// LOGIN
var email_sign_up = "";
var modal_sign = $("#modal-sign");
var modal_daftar_penerbit = $("#modal-daftar-penerbit");
var modal_topup = $("#modal-topup");
var modal_after_topup = $("#modal-after-topup");
var modal_topup_bank = $("#modal-topup-bank");
var modal_tarik_saldo = $("#modal-tarik-saldo");
var modal_after_tarik_saldo = $("#modal-after-tarik-saldo");
var ladda_login = $(".form-user-login").find(".ladda-button-submit").ladda();
var ladda_sign_up = $(".form-user-sign-up").find(".ladda-button-submit").ladda();
var ladda_daftar_penerbit = $(".form-user-daftar-penerbit").find(".ladda-button-submit").ladda();
var ladda_verify = $(".form-user-verify").find(".ladda-button-submit").ladda();
var ladda_topup = $("#modal-topup").find(".ladda-button-submit").ladda();
var ladda_after_tarik_saldo = $("#modal-after-tarik-saldo").find(".ladda-button-submit").ladda();
modal_topup.find(".nominal").focus(function(){
    var nominal_topup = $(this).val().replace(/\./g,"");
    $(this).val(nominal_topup);
}).blur(function(){
    if($(this).val() <= 0){
        $(this).val("0");
    }
    if($.isNumeric($(this).val()) == false){
        $(this).val("0");
    } else {
        $(this).val(rupiah(parseFloat($(this).val())));
    }
});
modal_topup.find(".btn-nominal").click(function(){
    var nominal_topup = $(this).attr("value");
    modal_topup.find(".nominal").val(nominal_topup);
});
modal_tarik_saldo.find(".nominal").focus(function(){
    var nominal_tarik_saldo = $(this).val().replace(/\./g,"");
    $(this).val(nominal_tarik_saldo);
}).blur(function(){
    if($(this).val() <= 0){
        $(this).val("0");
    }
    if($.isNumeric($(this).val()) == false){
        $(this).val("0");
    } else {
        $(this).val(rupiah(parseFloat($(this).val())));
    }

    var tarik_saldo_saat_ini = parseInt($("#FrmTambahTarikSaldo").attr("saldo-saat-ini"));
    var tarik_nominal = $("#FrmTambahTarikSaldo").find(".nominal").val().replace(/\./g,"");
    if(tarik_nominal > tarik_saldo_saat_ini){
        $("#FrmTambahTarikSaldo").find(".nominal").val(rupiah(tarik_saldo_saat_ini));
    }
});
modal_after_tarik_saldo.find(".btn-kirim-kode, .btn-kirim-ulang").click(function(){
    modal_after_tarik_saldo.find(".btn-kirim-kode, .btn-kirim-ulang").addClass("d-none");
    modal_after_tarik_saldo.find(".div-kirim-kode").removeClass("d-none");
    modal_after_tarik_saldo.find(".btn-kirim-ulang").attr("disabled", "disabled").addClass("disabled");
    modal_after_tarik_saldo.find("input[name='form[kode_verifikasi]']").val("");
    start_timer_tarik = true;
    
    var timer_second = 60 * 0.5,
    display = document.querySelector("#time-tarik");
    startTimerTarikSaldo(timer_second, display);
    $.ajax({
        type: "POST",
        url: base_url + "/pemodal/ajax_pemodal",
        data: {act:"get_otp"},
        dataType: "JSON",
        tryCount: 0,
        retryLimit: 3,
        beforeSend: function() {
            ladda_topup.ladda("start");
        },
        success: function(resp){
            console.log(resp);
        },
        error: function(xhr, textstatus, errorthrown) {
            toastrshow("warning", "Periksa koneksi internet anda kembali", "Peringatan");
        }
    });
});
$(".btn-login").click(function(){
    modal_sign.find("input").val("");
    $(".form-user-verify").find(".email").val(email_sign_up);
    $(".nav-sign-up").find(".nav-link").removeClass("active");
    $(".nav-login").find(".nav-link").addClass("active");
    $("#tab-sign-up").removeClass("in").removeClass("active").removeClass("show");
    $("#tab-login").addClass("in").addClass("active").addClass("show");
    $("#modal-sign").modal("show");
});
$(".datatable-properti, .div-detail-properti").on("click", ".btn-login", function() {
    modal_sign.find("input").val("");
    $(".form-user-verify").find(".email").val(email_sign_up);
    $(".nav-sign-up").find(".nav-link").removeClass("active");
    $(".nav-login").find(".nav-link").addClass("active");
    $("#tab-sign-up").removeClass("in").removeClass("active").removeClass("show");
    $("#tab-login").addClass("in").addClass("active").addClass("show");
    $("#modal-sign").modal("show");
});
$(".btn-signup").click(function(){
    modal_sign.find("input").val("");
    $(".nav-login").find(".nav-link").removeClass("active");
    $(".nav-sign-up").find(".nav-link").addClass("active");
    $("#tab-login").removeClass("in").removeClass("active").removeClass("show");
    $("#tab-sign-up").addClass("in").addClass("active").addClass("show");
    $("#modal-sign").modal("show");
});
$(".btn-daftar-penerbit").click(function(){
    modal_daftar_penerbit.find("input").val("");
    $(".nav-daftar-penerbit").find(".nav-link").addClass("active");
    $("#nav-daftar-penerbit").addClass("in").addClass("active").addClass("show");
    $("#modal-daftar-penerbit").modal("show");
});
$(".btn-topup").click(function(){
    modal_topup.find("input").val("");
    $("#modal-topup").modal("show");
});
$(".btn-tarik-saldo").click(function(){
    verifikasi_input_value.val("");
    $(".verifikasi-pin .text-pin").text("Masukkan PIN Anda");
    $(".verifikasi-pin #verifikasi-enter").addClass("d-none");
    verifikasi_pin_user = "";
    verifikasi_pin_1 = "";
    $("#verifikasi-password-show").val("");
    $("#modal-verifikasi-pin").modal("show");
});
$(".checkbox-terms").change(function(){
    if($(this).is(":checked")) {
        $("#tab-sign-up").find(".btn-submit").removeClass("disabled").removeAttr("disabled");
    } else {
        $("#tab-sign-up").find(".btn-submit").addClass("disabled").attr("disabled", "disabled");
    }
});
$(".checkbox-terms-daftar-penerbit").change(function(){
    if($(this).is(":checked")) {
        $("#tab-daftar-penerbit").find(".btn-submit").removeClass("disabled").removeAttr("disabled");
    } else {
        $("#tab-daftar-penerbit").find(".btn-submit").addClass("disabled").attr("disabled", "disabled");
    }
});

$(".form-user-login").find(".btn-submit").click(function(){
    $(".form-user-login").submit();
});
$(".form-user-sign-up").find(".btn-submit").click(function(){
    $(".form-user-sign-up").submit();
});
$(".form-user-verify").find(".btn-submit").click(function(){
    $(".form-user-verify").submit();
});
$(".form-user-verify-daftar-penerbit").find(".btn-submit").click(function(){
    $(".form-user-verify-daftar-penerbit").submit();
});
$(".form-user-daftar-penerbit").find(".btn-submit").click(function(){
    $(".form-user-daftar-penerbit").submit();
});

function startTimerTarikSaldo(duration, display) {
    var timer = duration, minutes, seconds;
    var interval_tarik = setInterval(function () {
        if(start_timer_tarik == true){
            minutes = parseInt(timer / 60, 10);
            seconds = parseInt(timer % 60, 10);

            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;

            display.textContent = minutes + ":" + seconds;

            if (--timer < 0) {
                timer = duration;
                start_timer_tarik = false;
                setTimeout(function(){
                    start_timer_tarik = true;
                    modal_after_tarik_saldo.find(".btn-kirim-ulang").removeClass("d-none");
                }, 1000);
                clearInterval(interval_tarik);
            }
        }
    }, 1000);
}


var FormLogin = $(".form-user-login").validate({
    submitHandler: function(form) {
        var formdata = $(form).serialize() + "&captcha=" + "&act=login";
        $.ajax({
            type: "POST",
            url: base_url + "/pemodal/ajax_pemodal",
            data: formdata,
            dataType: "JSON",
            tryCount: 0,
            retryLimit: 3,
            beforeSend: function() {
                ladda_login.ladda("start");
            },
            success: function(resp){
                if(resp.IsError == false) {
                    location.reload();
                } else {
                    ladda_login.ladda("stop");
                    toastrshow("warning", resp.lsdt, "Peringatan");
                }
            },
            error: function(xhr, textstatus, errorthrown) {
                toastrshow("warning", "Login gagal, mohon periksa koneksi internet anda kembali", "Peringatan");
                ladda_login.ladda("stop");
            }
        });
    },
    errorPlacement: function (error, element) {
        if (element.parent(".input-group").length) { 
            error.insertAfter(element.parent());      // radio/checkbox?
        } else if (element.hasClass("select2") || element.hasClass("select")) {
            error.insertAfter(element.next("span"));  // select2
        } else {                                      
            error.insertAfter(element);               // default
        }
    }
});
var FormSignUp = $(".form-user-sign-up").validate({
    submitHandler: function(form) {
        var formdata = $(form).serialize() + "&captcha=" + "&act=signup";
        $.ajax({
            type: "POST",
            url: base_url + "/pemodal/ajax_pemodal",
            data: formdata,
            dataType: "JSON",
            tryCount: 0,
            retryLimit: 3,
            beforeSend: function() {
                ladda_sign_up.ladda("start");
            },
            success: function(resp){
                if(resp.IsError == false) {
                    email_sign_up = $(".form-user-sign-up").find(".email").val();
                    $(".form-user-verify").find(".email").val(email_sign_up);
                    $(".form-user-sign-up").addClass("d-none");
                    $(".form-user-verify").removeClass("d-none");
                } else {
                    ladda_sign_up.ladda("stop");
                    toastrshow("warning", resp.lsdt, "Peringatan");
                }
            },
            error: function(xhr, textstatus, errorthrown) {
                toastrshow("warning", "Sign Up gagal, mohon periksa koneksi internet anda kembali", "Peringatan");
                ladda_sign_up.ladda("stop");
            }
        });
    },
    errorPlacement: function (error, element) {
        if (element.parent(".input-group").length) { 
            error.insertAfter(element.parent());      // radio/checkbox?
        } else if (element.hasClass("select2") || element.hasClass("select")) {
            error.insertAfter(element.next("span"));  // select2
        } else {                                      
            error.insertAfter(element);               // default
        }
    }
});
var FormDaftarPenerbit = $(".form-user-daftar-penerbit").validate({
    submitHandler: function(form) {
        var formdata = $(form).serialize() + "&captcha=" + "&act=signup";
        $.ajax({
            type: "POST",
            url: base_url + "/penerbit/ajax_penerbit",
            data: formdata,
            dataType: "JSON",
            tryCount: 0,
            retryLimit: 3,
            beforeSend: function() {
                ladda_daftar_penerbit.ladda("start");
            },
            success: function(resp){
                if(resp.IsError == false) {
                    email_sign_up = $(".form-user-daftar-penerbit").find(".email").val();
                    $(".form-user-verify-daftar-penerbit").find(".email").val(email_sign_up);
                    $(".form-user-daftar-penerbit").addClass("d-none");
                    $(".form-user-verify-daftar-penerbit").removeClass("d-none");
                } else {
                    ladda_daftar_penerbit.ladda("stop");
                    toastrshow("warning", resp.lsdt, "Peringatan");
                }
            },
            error: function(xhr, textstatus, errorthrown) {
                toastrshow("warning", "Sign Up gagal, mohon periksa koneksi internet anda kembali", "Peringatan");
                ladda_daftar_penerbit.ladda("stop");
            }
        });
    },
    errorPlacement: function (error, element) {
        if (element.parent(".input-group").length) { 
            error.insertAfter(element.parent());      // radio/checkbox?
        } else if (element.hasClass("select2") || element.hasClass("select")) {
            error.insertAfter(element.next("span"));  // select2
        } else {                                      
            error.insertAfter(element);               // default
        }
    }
});
var FormVerify = $(".form-user-verify").validate({
    submitHandler: function(form) {
        var formdata = $(form).serialize() + "&captcha=" + "&act=verify_email";
        $.ajax({
            type: "POST",
            url: base_url + "/pemodal/ajax_pemodal",
            data: formdata,
            dataType: "JSON",
            tryCount: 0,
            retryLimit: 3,
            beforeSend: function() {
                ladda_verify.ladda("start");
            },
            success: function(resp){
                if(resp.IsError == false) {
                    window.location.href = base_url + "/user/verifikasi.html";
                } else {
                    ladda_verify.ladda("stop");
                    toastrshow("warning", resp.lsdt, "Peringatan");
                }
            },
            error: function(xhr, textstatus, errorthrown) {
                toastrshow("warning", "Verifikasi gagal, mohon periksa koneksi internet anda kembali", "Peringatan");
                ladda_verify.ladda("stop");
            }
        });
    },
    errorPlacement: function (error, element) {
        if (element.parent(".input-group").length) { 
            error.insertAfter(element.parent());      // radio/checkbox?
        } else if (element.hasClass("select2") || element.hasClass("select")) {
            error.insertAfter(element.next("span"));  // select2
        } else {                                      
            error.insertAfter(element);               // default
        }
    }
});
var FormVerifyDaftarPenerbit = $(".form-user-verify-daftar-penerbit").validate({
    submitHandler: function(form) {
        var formdata = $(form).serialize() + "&captcha=" + "&act=verify_email";
        $.ajax({
            type: "POST",
            url: base_url + "/penerbit/ajax_penerbit",
            data: formdata,
            dataType: "JSON",
            tryCount: 0,
            retryLimit: 3,
            beforeSend: function() {
                ladda_verify.ladda("start");
            },
            success: function(resp){
                if(resp.IsError == false) {
                    window.location.href = base_url + "/user/verifikasi_penerbit.html";
                } else {
                    ladda_verify.ladda("stop");
                    toastrshow("warning", resp.lsdt, "Peringatan");
                }
            },
            error: function(xhr, textstatus, errorthrown) {
                toastrshow("warning", "Verifikasi gagal, mohon periksa koneksi internet anda kembali", "Peringatan");
                ladda_verify.ladda("stop");
            }
        });
    },
    errorPlacement: function (error, element) {
        if (element.parent(".input-group").length) { 
            error.insertAfter(element.parent());      // radio/checkbox?
        } else if (element.hasClass("select2") || element.hasClass("select")) {
            error.insertAfter(element.next("span"));  // select2
        } else {                                      
            error.insertAfter(element);               // default
        }
    }
});
$("[name='form[otp]']").inputmask({"mask": "9 9 9 9 9 9"});
$("#modal-sign").find("input").keyup(function(e){
    if(e.keyCode == 13){
        $("."+$(this).attr("target-form")).submit();
    }
});
modal_after_topup.find(".copy-clipboard").click(function(){
    var copyText = document.getElementById("va-topup");
    copyText.select();
    copyText.setSelectionRange(0, 99999);
    document.execCommand("copy");
});
modal_topup_bank.find(".copy-clipboard").click(function(){
    var copyText = document.getElementById("va-bank-topup");
    copyText.select();
    copyText.setSelectionRange(0, 99999);
    document.execCommand("copy");
});
modal_topup.find(".topup-bank").click(function(){
    $("#modal-topup").modal("hide");
    $("#modal-topup-bank").modal("show");
});
function SimpanTambahTopUp(){
    var topup_penghasilan_per_tahun = parseInt($("#FrmTambahTopUp").attr("penghasilan-per-tahun"));
    var topup_saldo_saat_ini = parseInt($("#FrmTambahTopUp").attr("saldo-saat-ini"));
    console.log(topup_penghasilan_per_tahun);
    console.log(topup_saldo_saat_ini);
    var topup_max_nominal = parseInt((5*topup_penghasilan_per_tahun/100).toFixed(0));
    var topup_setelah_nominal = $("#FrmTambahTopUp").find(".nominal").val();
    topup_setelah_nominal = (parseInt(topup_setelah_nominal.replace(/\./g, "", topup_setelah_nominal))+topup_saldo_saat_ini);
    if(topup_penghasilan_per_tahun >= 500000000){
        topup_max_nominal = (10*topup_penghasilan_per_tahun/100).toFixed(0);
    }
    if(topup_setelah_nominal > topup_max_nominal){
        toastrshow("warning", "Batas maksimal Total Investasi dan Total Dana anda adalah "+rupiah(topup_max_nominal)+", mohon masukkan nominal tidak lebih dari batas tersebut", "Peringatan");
    } else {
        $("#FrmTambahTopUp").submit();
    }
}
var FrmTambahTopUp = $("#FrmTambahTopUp").validate({
    submitHandler: function(form) {
        var formdata = $(form).serialize() + "&act=topup";
        $.ajax({
            type: "POST",
            url: base_url + "/pemodal/ajax_pemodal",
            data: formdata,
            dataType: "JSON",
            tryCount: 0,
            retryLimit: 3,
            beforeSend: function() {
                ladda_topup.ladda("start");
            },
            success: function(resp){
                ladda_topup.ladda("stop");
                if(resp.IsError != undefined) {
                    if(resp.ErrorMessage[0].error != undefined) {
                        toastrshow("warning", resp.ErrorMessage[0].error, "Warning");
                    } else {
                        toastrshow("warning", resp.ErrorMessage, "Warning");
                    }
                } else {
                    modal_after_topup.find(".metode-pembayaran").text(resp.metode_pembayaran);
                    modal_after_topup.find(".metode-pembayaran-isi").text(resp.va);
                    modal_after_topup.find(".total-pembayaran").text("Rp "+rupiah(resp.nominal));
                    modal_after_topup.find(".tgl-expired").text(moment(resp.expired_at).format("DD MMM YYYY HH:mm:ss"));
                    modal_after_topup.find(".no-transaksi").text(resp.no_transaksi);
                    modal_after_topup.find("#va-topup").val(resp.va);
                    $("#modal-topup").modal("hide");
                    $("#modal-after-topup").modal("show");
                }
            },
            error: function(xhr, textstatus, errorthrown) {
                toastrshow("warning", "Periksa koneksi internet anda kembali", "Peringatan");
                ladda_topup.ladda("stop");
            }
        });
    },
    errorPlacement: function (error, element) {
        if (element.parent(".input-group").length) { 
            error.insertAfter(element.parent());      // radio/checkbox?
        } else if (element.hasClass("select2") || element.hasClass("select")) {
            error.insertAfter(element.next("span"));  // select2
        } else {                                      
            error.insertAfter(element);               // default
        }
    }
});
function SimpanTambahTarikSaldo(){
    var tarik_saldo_saat_ini = parseInt($("#FrmTambahTarikSaldo").attr("saldo-saat-ini"));
    var tarik_nominal = $("#FrmTambahTarikSaldo").find(".nominal").val();
    tarik_nominal = parseInt(tarik_nominal.replace(/\./g, "", tarik_nominal));
    if(tarik_nominal > tarik_saldo_saat_ini){
        toastrshow("warning", "Batas maksimal Tarik Saldo anda adalah "+rupiah(tarik_saldo_saat_ini)+", mohon masukkan nominal kurang dari batas tersebut", "Peringatan");
    } else {
        modal_after_tarik_saldo.find(".btn-kirim-kode").removeClass("d-none");
        modal_after_tarik_saldo.find(".div-kirim-kode").addClass("d-none");
        $("#FrmTambahTarikSaldo").submit();
    }
}
var FrmTambahTarikSaldo = $("#FrmTambahTarikSaldo").validate({
    submitHandler: function(form) {
        modal_after_tarik_saldo.find(".saldo-ditarik").text("Rp "+rupiah(modal_tarik_saldo.find("input[name='form[nominal]']").val().replace(/\./g, "", modal_tarik_saldo.find("input[name='form[nominal]']").val())));
        modal_after_tarik_saldo.find("input[name='form[nominal]']").val(rupiah(modal_tarik_saldo.find("input[name='form[nominal]']").val().replace(/\./g, "", modal_tarik_saldo.find("input[name='form[nominal]']").val())));
        modal_after_tarik_saldo.find("input[name='form[password]']").val("");
        // modal_after_tarik_saldo.find("[name='form[nominal]']").text(resp.metode_pembayaran);
        $("#modal-tarik-saldo").modal("hide");
        $("#modal-after-tarik-saldo").modal("show");
    },
    errorPlacement: function (error, element) {
        if (element.parent(".input-group").length) { 
            error.insertAfter(element.parent());      // radio/checkbox?
        } else if (element.hasClass("select2") || element.hasClass("select")) {
            error.insertAfter(element.next("span"));  // select2
        } else {                                      
            error.insertAfter(element);               // default
        }
    }
});

function SimpanSubmitTarikSaldo(){
    $("#FrmSubmitTarikSaldo").submit();
}
var FrmSubmitTarikSaldo = $("#FrmSubmitTarikSaldo").validate({
    submitHandler: function(form) {
        var formdata = $(form).serialize() + "&captcha=" + "&act=submit_tarik_saldo";
        $.ajax({
            type: "POST",
            url: base_url + "/pemodal/ajax_pemodal",
            data: formdata,
            dataType: "JSON",
            tryCount: 0,
            retryLimit: 3,
            beforeSend: function() {
                ladda_after_tarik_saldo.ladda("start");
            },
            success: function(resp){
                if(resp.IsError == false) {
                    setTimeout(function(){
                        location.reload();
                    }, 250);
                } else {
                    ladda_after_tarik_saldo.ladda("stop");
                    toastrshow("warning", resp.lsdt, "Peringatan");
                }
            },
            error: function(xhr, textstatus, errorthrown) {
                toastrshow("warning", "Penarikan Saldo gagal, mohon periksa koneksi internet anda kembali", "Peringatan");
                ladda_after_tarik_saldo.ladda("stop");
            }
        });
    },
    errorPlacement: function (error, element) {
        if (element.parent(".input-group").length) { 
            error.insertAfter(element.parent());      // radio/checkbox?
        } else if (element.hasClass("select2") || element.hasClass("select")) {
            error.insertAfter(element.next("span"));  // select2
        } else {                                      
            error.insertAfter(element);               // default
        }
    }
});

var pin_verifikasi = $("#modal-verifikasi-pin");
var verifikasi_pin_user = "";
var verifikasi_pin_1 = "";
var verifikasi_pin_2 = "";
var form_pembelian = "";
var pin_reset = $("#modal-reset-pin");
var otp_verifikasi = $("#modal-verifikasi-otp");
var pin_edit = $("#modal-edit-pin");
const verifikasi_input_value = $(".verifikasi-pin #verifikasi-password");
const input_value = $(".pin #verifikasi-2-password");
$(".verifikasi-pin #verifikasi-password, .verifikasi-pin #verifikasi-password-show").focus(function() {
    $(this).blur();
});
pin_verifikasi.find(".verifikasi-pin .calc").click(function() {
    let value = $(this).val();
    field_1(value);
});
function field_1(value) {
    console.log((verifikasi_input_value.val() + value).length);
    if((verifikasi_input_value.val() + value).length >= 6){
        $(".verifikasi-pin #verifikasi-enter").removeClass("d-none");
    } else {
        $(".verifikasi-pin #verifikasi-enter").addClass("d-none");
    }
    if((verifikasi_input_value.val() + value).length <= 6){
        verifikasi_input_value.val(verifikasi_input_value.val() + value);
    }
    console.log(verifikasi_input_value.val().length);
    var total_input = "";
    for(var x_data = 1; x_data <= verifikasi_input_value.val().length; x_data++){
        total_input += "x ";
    }
    for(var x2_data = 1; x2_data <= (6-verifikasi_input_value.val().length); x2_data++){
        total_input += "_ ";
    }
    console.log("-"+total_input.substr(total_input.length - 1)+"-");
    if(total_input.substr(total_input.length - 1) == " "){
        total_input = total_input.slice(0,-1);
    }
    $("#verifikasi-password-show").val(total_input);
}
$(".verifikasi-pin #verifikasi-clear").click(function() {
    verifikasi_input_value.val("");
    $(".verifikasi-pin #verifikasi-enter").addClass("d-none");
    verifikasi_pin_1 = "";
    $("#verifikasi-password-show").val("");
});
$(".pin #verifikasi-2-enter").addClass("d-none");
$(".pin #verifikasi-2-password, .pin #verifikasi-2-password-show").focus(function() {
    $(this).blur();
});
pin_edit.find(".pin .calc").click(function() {
    let value = $(this).val();
    field_2(value);
});
function field_2(value) {
    console.log((input_value.val() + value).length);
    if((input_value.val() + value).length >= 6){
        $(".pin #verifikasi-2-enter").removeClass("d-none");
    } else {
        $(".pin #verifikasi-2-enter").addClass("d-none");
    }
    if((input_value.val() + value).length <= 6){
        input_value.val(input_value.val() + value);
    }
    console.log(input_value.val().length);
    var total_input = "";
    for(var x_data = 1; x_data <= input_value.val().length; x_data++){
        total_input += "x ";
    }
    for(var x2_data = 1; x2_data <= (6-input_value.val().length); x2_data++){
        total_input += "_ ";
    }
    console.log("-"+total_input.substr(total_input.length - 1)+"-");
    if(total_input.substr(total_input.length - 1) == " "){
        total_input = total_input.slice(0,-1);
    }
    $("#verifikasi-2-password-show").val(total_input);
}
$(".pin #verifikasi-2-clear").click(function() {
    if(verifikasi_pin_1 == ""){
        input_value.val("");
        $(".pin #verifikasi-2-enter").addClass("d-none");
        verifikasi_pin_1 = "";
    } else {
        input_value.val("");
        $(".pin #verifikasi-2-enter").addClass("d-none");
        verifikasi_pin_2 = "";
    }
    $("#verifikasi-2-password-show").val("");
});
$(".btn-ulang-pin").click(function(){
    $(".btn-ulang-pin").addClass("d-none");
    input_value.val("");
    $(".pin #verifikasi-2-password-show").val("");
    $(".pin .text-pin").text("Masukkan PIN Baru");
    $(".pin #verifikasi-2-enter").addClass("d-none");
    verifikasi_pin_1 = "";
    verifikasi_pin_2 = "";
});
$(".btn-lupa-pin").click(function(){
    pin_reset.find("input[name='form[password]']").val("");
    $("#modal-properti-pembelian, #modal-verifikasi-pin").modal("hide");
    $("#modal-reset-pin").modal("show");
});
$(".pin #verifikasi-2-enter").click(function() {
    if(verifikasi_pin_1 == ""){
        verifikasi_pin_1 = input_value.val();
        input_value.val("");
        $("#verifikasi-2-password-show").val("");
        $(".pin .text-pin").text("Masukkan Ulang PIN Baru");
        $(".pin #verifikasi-2-enter").addClass("d-none");
        $(".btn-ulang-pin").removeClass("d-none");
    } else {
        verifikasi_pin_2 = input_value.val();
        if(verifikasi_pin_1 != verifikasi_pin_2){
            toastrshow("warning", "Masukkan PIN Verifikasi dengan benar!", "Warning");
        } else {
            $.ajax({
                type: "POST",
                url: base_url + "/user/ajax_user",
                data: {act:"new_pin", req:verifikasi_pin_1},
                dataType: "JSON",
                tryCount: 0,
                retryLimit : 3,
                success: function(resp){
                    if(resp.IsError != undefined) {
                        if(resp.ErrorMessage[0].error != undefined) {
                            toastrshow("warning", resp.ErrorMessage[0].error, "Warning");
                        } else {
                            toastrshow("warning", resp.ErrorMessage, "Warning");
                        }
                    } else {
                        if(resp == 1 || resp == "1") {
                            toastrshow("success", "Data berhasil disimpan", "Success");
                            location.reload();
                        } else {
                            toastrshow("warning", "Data gagal disimpan", "Warning");
                        }
                    }
                },
                error: function(xhr, textstatus, errorthrown) {
                    toastrshow("warning", "Periksa koneksi internet anda kembali", "Warning");
                }
            });
        }
        console.log(verifikasi_pin_1);
        console.log(verifikasi_pin_2);
    }
});

var FrmResetPIN = $("#FrmResetPIN").validate({
    submitHandler: function(form) {
        laddasubmit = $("#FrmResetPIN").find(".ladda-button-submit").ladda();
        UpdateData(form, function(resp) {
            otp_verifikasi.find("input[name='form[otp]']").val("");
            $("#modal-verifikasi-otp").modal("show");
        }, "", "reset_pin", "1");
    },
    errorPlacement: function (error, element) {
        if (element.parent(".input-group").length) { 
            error.insertAfter(element.parent());      // radio/checkbox?
        } else if (element.hasClass("select2") || element.hasClass("select")) {
            error.insertAfter(element.next("span"));  // select2
        } else {                                      
            error.insertAfter(element);               // default
        }
    }
});

var FrmVerifikasiOTP = $("#FrmVerifikasiOTP").validate({
    submitHandler: function(form) {
        laddasubmit = $("#FrmVerifikasiOTP").find(".ladda-button-submit").ladda();
        UpdateData(form, function(resp) {
            input_value.val("");
            $(".pin .text-pin").text("Masukkan PIN Baru");
            $(".pin #enter").addClass("d-none");
            verifikasi_pin_1 = "";
            verifikasi_pin_2 = "";
            $("#modal-edit-pin").modal("show");
        }, "", "verifikasi_otp", "1");
    },
    errorPlacement: function (error, element) {
        if (element.parent(".input-group").length) { 
            error.insertAfter(element.parent());      // radio/checkbox?
        } else if (element.hasClass("select2") || element.hasClass("select")) {
            error.insertAfter(element.next("span"));  // select2
        } else {                                      
            error.insertAfter(element);               // default
        }
    }
});
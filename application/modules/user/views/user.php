<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <meta name="description" content="Copas Fun" />
        <meta name="keywords" content="Copas Fun">
        <meta name="author" content="Web-Izul" />
        <title>User</title>
        <link rel="shortcut icon" href="<?php echo base_url("assets/media/image/favicon.png"); ?>" />
        <link rel="stylesheet" href="<?php echo base_url("assets/vendors/bundle.css"); ?>" type="text/css" />
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="<?php echo base_url("assets/vendors/prism/prism.css"); ?>" type="text/css" />
        <link rel="stylesheet" href="<?php echo base_url("assets/css/app.min.css"); ?>" type="text/css" />
        <link rel="stylesheet" href="<?php echo base_url("assets/plugins/@fortawesome/fontawesome-free/css/all.min.css"); ?>" type="text/css">
        <link rel="stylesheet" href="<?php echo base_url("assets/plugins/select2/select2.min.css"); ?>" type="text/css">
        <link rel="stylesheet" href="<?php echo base_url("assets/plugins/select2/select2-bootstrap.min.css"); ?>" type="text/css">
        <link rel="stylesheet" href="<?php echo base_url("assets/plugins/ladda/ladda-themeless.min.css"); ?>" type="text/css">
        <link rel="stylesheet" href="<?php echo base_url("assets/plugins/toastr/toastr.min.css"); ?>" type="text/css">
        <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap-datepicker.min.css"); ?>" type="text/css">
        <link rel="stylesheet" href="<?php echo base_url("assets/css/custom.css?n=").$this->config->item("tahun_assets"); ?>" type="text/css">
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"); ?>"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"); ?>"></script>
        <![endif]-->
    </head>
    <body class="scrollable-layout">
        <div class="preloader">
            <div class="preloader-icon"></div>
            <span>Loading...</span>
        </div>
        <div class="layout-wrapper">
            <?php $this->load->view("other/header"); ?>
            <div class="content-wrapper">
                <?php $this->load->view("other/sidebar"); ?>
                <div class="content-body">
                    <div class="content">
                        <div class="page-header">
                            <div class="row">
                                <div class="content-header-right col-md-4">
                                    <h3><i class="icon-header" data-feather="user"></i> User</h3>
                                </div>
                                <div class="content-header-right col-md-8">
                                    <div class="form-group float-right div-header-button">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-tambah-user" title="Add Data"><i class="fa fa-plus"></i></button>
                                        <button type="button" class="btn btn-primary" data-toggle="collapse" data-target=".filter" title="Filter Data"><i class="fa fa-filter"></i></button>
                                        <button type="button" class="btn btn-primary" onclick="location.reload();"><i class="fa fa-sync-alt" title="Refresh"></i></button>
                                        <div class="btn-group pagination-layout-user" pagename="/user/ajax_user" data-colspan="4" role="group" aria-label="Basic example">
                                            <button type="button" disabled class="btn btn-primary disabled prev-head"><i class="fa fa-chevron-left"></i></button>
                                            <button type="button" disabled class="btn btn-primary disabled next-head"><i class="fa fa-chevron-right"></i></button>
                                        </div>
                                    </div>
                                    <div class="form-group float-right div-header-search">
                                        <form id="FrmSearch">
                                            <div class="input-group input-search">
                                                <input type="text" class="form-control kywd" placeholder="Search (Name, Email)" title="Search (Name, Email)" aria-describedby="basic-addon2">
                                                <div class="input-group-append">
                                                    <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card m-b-30">
                                    <div class="card-body filter collapse show">
                                        <form id="FrmFilter" role="form">
                                            <div class="panel-body row">
                                                <div class="col-md-3 col-sm-6">
                                                    <div class="form-group">
                                                        <label>Sort by</label>
                                                        <select style="width: 100%;" class="form-control select sort">
                                                            <option value="id desc">Default</option>
                                                            <option value="name asc">Name [A-Z]</option>
                                                            <option value="name desc">Name [Z-A]</option>
                                                            <option value="email asc">Email [A-Z]</option>
                                                            <option value="email desc">Email [Z-A]</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table datatable-user table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th style="width: 50px;" class="text-center">Action</th>
                                                    <th style="width: 40px;" class="text-center">Photo</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td colspan="4" style="padding: 10px !important;">
                                                        <center>
                                                            <img class="loading-gif-image" src="<?php echo base_url("assets/images/loading-data.gif") ?>" alt="Loading ...">
                                                        </center>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="card-footer div-pagination-bottom">
                                        <div class="pagination-layout-user d-none" pagename="/user/ajax_user" data-colspan="4">
                                            <div class="row">
                                                <div class="col-md-4 col-xs-8">
                                                    <form id="FrmGotoPage">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <button type="button" disabled class="btn btn-primary disabled first"><i class="fa fa-step-backward"></i></button>
                                                                <button type="button" disabled class="btn btn-primary disabled prev"><i class="fa fa-chevron-left"></i></button>
                                                            </div>
                                                            <input type="text" class="form-control text-center" aria-describedby="basic-addon2" onkeypress="return validatedata(event);" value="1">
                                                            <div class="input-group-append">
                                                                <button type="button" disabled class="btn btn-primary disabled next"><i class="fa fa-chevron-right"></i></button>
                                                                <button type="button" disabled class="btn btn-primary disabled last"><i class="fa fa-step-forward"></i></button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="col-sm-6 d-none d-sm-none d-sm-none d-lg-block">
                                                    <div class="form-group">
                                                        <div class="info text-right info-paging">1 - 10 from 100 Data | 1 Halaman</div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-2 d-none d-sm-none d-sm-none d-lg-block">
                                                    <div class="form-group">
                                                        <select class="form-control select limit float-right">
                                                            <option value="10" selected>10</option>
                                                            <option value="20">20</option>
                                                            <option value="30">30</option>
                                                            <option value="40">40</option>
                                                            <option value="50">50</option>
                                                            <option value="100">100</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php $this->load->view("other/footer"); ?>
                </div>
            </div>
        </div>
        <?php $this->load->view("user/modal/user_tambah"); ?>
        <?php $this->load->view("user/modal/user_edit"); ?>
        <?php $this->load->view("user/modal/user_password"); ?>
        <?php $this->load->view("user/modal/user_hapus"); ?>
        <script src="<?php echo base_url("assets/js/moment.min.js"); ?>"></script>
        <script src="<?php echo base_url("assets/vendors/bundle.js"); ?>"></script>
        <script src="<?php echo base_url("assets/vendors/prism/prism.js"); ?>"></script>
        <script src="<?php echo base_url("assets/js/app.min.js"); ?>"></script>
        <script src="<?php echo base_url("assets/js/bootstrap-datepicker.js"); ?>"></script>
        <script src="<?php echo base_url("assets/plugins/validate/jquery.validate.min.js"); ?>"></script>
        <script src="<?php echo base_url("assets/plugins/select2/select2.full.js"); ?>"></script>
        <script src="<?php echo base_url("assets/plugins/toastr/toastr.min.js"); ?>"></script>
        <script src="<?php echo base_url("assets/plugins/ladda/spin.min.js"); ?>"></script>
        <script src="<?php echo base_url("assets/plugins/ladda/ladda.min.js"); ?>"></script>
        <script src="<?php echo base_url("assets/plugins/ladda/ladda.jquery.min.js"); ?>"></script>
        <script src="<?php echo base_url("assets/js/proses.js?n=").$this->config->item("tahun_assets"); ?>"></script>
        <script>
            var post_gambar  = {"form": {"Base64": ""}};
            $(document).ready(function(){
                GetDataTable();
            });

            function GetDataTable(){
                var kywd = $("#FrmSearch").find(".kywd").val(), sort = $("#FrmFilter").find(".sort").val();
                request["Page"] = 1;
                request["Sort"] = sort;
                request["Search"] = kywd;
                pagename = "/user/ajax_user";
                target_table = "user";
                GetData(request,"listdatahtml",target_table,function(resp){
                    $(".datatable-user").on("click", ".zoom-photo", function() {
                        window.open($(this).find("img").attr("src"), "", "width=800,height=400");
                    });
                }, 4);
                return false;
            }

            $("#FrmSearch").submit(function() {
                GetDataTable();
                return false;
            });
            $("#FrmFilter .sort").change(function(){
                GetDataTable();
            });

            function SimpanTambahUser(){
                $("#FrmTambahUser").submit();
            }
            function SimpanEditUser(){
                $("#FrmEditUser").submit();
            }
            function SimpanPasswordUser(){
                $("#FrmPasswordUser").submit();
            }

            var user_baru = $("#modal-tambah-user");
            var user_edit = $("#modal-edit-user");
            var user_password = $("#modal-password-user");
            var user_hapus = $("#modal-hapus-user");
            $("#modal-tambah-user").on('show.bs.modal', function () {
                if(($("#modal-tambah-user").data('bs.modal') || {})._isShown){

                } else {
                    user_baru.find(".hapus-photo").click();
                    user_baru.find("input[name='form[name]'], input[name='form[email]'], input[name='form[password]']").val("");
                    $("#modal-tambah-user").on('shown.bs.modal', function () {
                        user_baru.find("input[name='form[name]']").focus();
                    });
                }
                
            });
            $("html").on("click", ".edit-user", function() {
                user_edit.find(".hapus-photo").click();
                $("#modal-edit-user .modal-title").text("Edit User : User");
                user_edit.find(".loading-gif-image").removeClass("d-none");
                user_edit.find(".after-loading").addClass("d-none");
                $("#modal-edit-user").modal("show");
                var id_update = $(this).attr("data-id");
                user_edit.find(".id_hidden").val(id_update);
                pagename = "/user/ajax_user";
                GetDataById(id_update, function(resp) {
                    var resp = resp.data[0];
                    user_edit.find("input[name='form[name]']").val(resp.name);
                    user_edit.find("input[name='form[email]']").val(resp.email);
                    if(resp.photo == "" || resp.photo == null){
                    } else {
                        user_edit.find(".detail-photo, .strip-photo, .hapus-photo").removeClass("d-none");
                        user_edit.find(".photo, .loading-photo").addClass("d-none");
                        user_edit.find("input[name='form[photo]']").val(resp.photo);
                    }
                    user_edit.find(".loading-gif-image").addClass("d-none");
                    user_edit.find(".after-loading").removeClass("d-none");
                    user_edit.find("input[name='form[name]']").focus();
                    $("#modal-edit-user .modal-title").text("Edit User : " + resp.name);
                });
            });
            $("html, #FrmEditUser").on("click", ".password-user", function() {
                $("#modal-password-user .modal-title").text("Edit User : User");
                user_password.find(".loading-gif-image").removeClass("d-none");
                user_password.find(".after-loading").addClass("d-none");
                $("#modal-password-user").modal("show");
                var id_update = $(this).attr("data-id");
                user_password.find(".id_hidden").val(id_update);
                pagename = "/user/ajax_user";
                GetDataById(id_update, function(resp) {
                    var resp = resp.data[0];
                    user_password.find("input[name='form[password]']").val("");
                    user_password.find(".loading-gif-image").addClass("d-none");
                    user_password.find(".after-loading").removeClass("d-none");
                    user_password.find("input[name='form[password]']").focus();
                    $("#modal-password-user .modal-title").text("Edit User : " + resp.name);
                });
            });
            $("html").on("click", ".hapus-user", function() {
                $("#modal-hapus-user .modal-title").text("Delete User : User");
                user_hapus.find(".loading-gif-image").removeClass("d-none");
                user_hapus.find(".after-loading").addClass("d-none");
                $("#modal-hapus-user").modal("show");
                var id_update = $(this).attr("data-id");
                user_hapus.find(".id_hidden").val(id_update);
                pagename = "/user/ajax_user";
                GetDataById(id_update, function(resp) {
                    var resp = resp.data[0];
                    user_hapus.find(".loading-gif-image").addClass("d-none");
                    user_hapus.find(".after-loading").removeClass("d-none");
                    $("#modal-hapus-user .modal-title").text("Delete User : " + resp.name);
                });
            });

            var FrmTambahUser = $("#FrmTambahUser").validate({
                submitHandler: function(form) {
                    laddasubmit = user_baru.find(".ladda-button-submit");
                    InsertData(form, function(resp) {
                        GetDataTable();
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
            var FrmEditUser = $("#FrmEditUser").validate({
                submitHandler: function(form) {
                    laddasubmit = user_edit.find(".ladda-button-submit");
                    UpdateData(form, function(resp) {
                        GetDataTable();
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
            var FrmPasswordUser = $("#FrmPasswordUser").validate({
                submitHandler: function(form) {
                    laddasubmit = user_password.find(".ladda-button-submit");
                    UpdateData(form, function(resp) {
                        GetDataTable();
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
            var FrmHapusUser = $("#FrmHapusUser").validate({
                submitHandler: function(form) {
                    laddasubmit = user_hapus.find(".ladda-button-submit");
                    DeleteData(form, function(resp) {
                        GetDataTable();
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

            user_baru.find(".photo").change(function() {
                var selector = $(this);
                if (this.files && this.files[0]) {
                    var tipefile = this.files[0].type.toString();
                    var filename = this.files[0].name.toString();
                    var tipe = ['image/png',  'image/x-png', 'image/jpeg', 'image/pjpeg'];
                    if(tipe.indexOf(tipefile) == -1) {
                        $(this).val("");
                        toastrshow("warning", "Incorrect format, select files with png/jpg/jpeg format", "Warning");
                        return;
                    }
                    if((this.files[0].size / 1024) < 2048){
                        var FR = new FileReader();
                        FR.addEventListener("load", function(e) {
                            //var base64 = e.target.result;
                            var base64 = e.target.result.replace("data:"+tipefile+";base64,", '');
                            var ext = filename.split(".").pop();
                            post_gambar["form"]["Base64"] = base64;
                            post_gambar["form"]["Ext"] = ext;
                            console.log(post_gambar);
                            $.ajax({
                                type: "POST",
                                url: base_url + "/tool/ajax_tool",
                                data: {act:"upload_file", form:post_gambar},
                                dataType: "JSON",
                                tryCount: 0,
                                retryLimit: 3,
                                beforeSend: function(){
                                    user_baru.find(".photo_hidden").val("");
                                    user_baru.find(".photo").addClass("d-none");
                                    user_baru.find(".loading-photo").removeClass("d-none");
                                },
                                success: function(respon_file){
                                    if(respon_file.IsError != undefined) {
                                        if(respon_file.ErrorMessage[0].error != undefined) {
                                            toastrshow("warning", respon_file.ErrorMessage[0].error, "Warning");
                                        } else {
                                            toastrshow("warning", respon_file.ErrorMessage, "Warning");
                                        }
                                    } else {
                                        user_baru.find(".photo_hidden").val(respon_file.Output);
                                        user_baru.find(".detail-photo, .strip-photo, .hapus-photo").removeClass("d-none");
                                        user_baru.find(".photo").addClass("d-none");
                                        user_baru.find(".loading-photo").addClass("d-none");
                                    }
                                },
                                error: function(xhr, textstatus, errorthrown) {
                                    toastrshow("warning", "Periksa koneksi internet anda kembali", "Warning");
                                    user_baru.find(".hapus-photo").click();
                                    user_baru.find(".loading-photo").addClass("d-none");
                                }
                            });
                        }); 
                        FR.readAsDataURL(this.files[0]);
                    } else {
                        $(this).val("");
                        toastrshow("warning", "The maximum file size 2 MB", "Warning");
                    }
                }
            });
            user_baru.find(".hapus-photo").click(function(){
                user_baru.find(".photo_hidden").val("");
                user_baru.find(".detail-photo, .strip-photo, .hapus-photo").addClass("d-none");
                user_baru.find(".photo").val("").trigger("change");
                user_baru.find(".photo").removeClass("d-none");
            });
            user_baru.find(".detail-photo").click(function(){
                window.open("<?php echo base_url("assets/cdn/"); ?>"+user_baru.find(".photo_hidden").val(), "", "width=800,height=400");
            });
            user_edit.find(".photo").change(function() {
                var selector = $(this);
                if (this.files && this.files[0]) {
                    var tipefile = this.files[0].type.toString();
                    var filename = this.files[0].name.toString();
                    var tipe = ['image/png',  'image/x-png', 'image/jpeg', 'image/pjpeg'];
                    if(tipe.indexOf(tipefile) == -1) {
                        $(this).val("");
                        toastrshow("warning", "Incorrect format, select files with png/jpg/jpeg format", "Warning");
                        return;
                    }
                    if((this.files[0].size / 1024) < 2048){
                        var FR = new FileReader();
                        FR.addEventListener("load", function(e) {
                            //var base64 = e.target.result;
                            var base64 = e.target.result.replace("data:"+tipefile+";base64,", '');
                            var ext = filename.split(".").pop();
                            post_gambar["form"]["Base64"] = base64;
                            post_gambar["form"]["Ext"] = ext;
                            console.log(post_gambar);
                            $.ajax({
                                type: "POST",
                                url: base_url + "/tool/ajax_tool",
                                data: {act:"upload_file", form:post_gambar},
                                dataType: "JSON",
                                tryCount: 0,
                                retryLimit: 3,
                                beforeSend: function(){
                                    user_edit.find(".photo_hidden").val("");
                                    user_edit.find(".photo").addClass("d-none");
                                    user_edit.find(".loading-photo").removeClass("d-none");
                                },
                                success: function(respon_file){
                                    if(respon_file.IsError != undefined) {
                                        if(respon_file.ErrorMessage[0].error != undefined) {
                                            toastrshow("warning", respon_file.ErrorMessage[0].error, "Warning");
                                        } else {
                                            toastrshow("warning", respon_file.ErrorMessage, "Warning");
                                        }
                                    } else {
                                        user_edit.find(".photo_hidden").val(respon_file.Output);
                                        user_edit.find(".detail-photo, .strip-photo, .hapus-photo").removeClass("d-none");
                                        user_edit.find(".photo").addClass("d-none");
                                        user_edit.find(".loading-photo").addClass("d-none");
                                    }
                                },
                                error: function(xhr, textstatus, errorthrown) {
                                    toastrshow("warning", "Periksa koneksi internet anda kembali", "Warning");
                                    user_edit.find(".hapus-photo").click();
                                    user_edit.find(".loading-photo").addClass("d-none");
                                }
                            });
                        }); 
                        FR.readAsDataURL(this.files[0]);
                    } else {
                        $(this).val("");
                        toastrshow("warning", "The maximum file size 2 MB", "Warning");
                    }
                }
            });
            user_edit.find(".hapus-photo").click(function(){
                user_edit.find(".photo_hidden").val("");
                user_edit.find(".detail-photo, .strip-photo, .hapus-photo").addClass("d-none");
                user_edit.find(".photo").val("").trigger("change");
                user_edit.find(".photo").removeClass("d-none");
            });
            user_edit.find(".detail-photo").click(function(){
                window.open("<?php echo base_url("assets/cdn/"); ?>"+user_edit.find(".photo_hidden").val(), "", "width=800,height=400");
            });
        </script>
    </body>
</html>
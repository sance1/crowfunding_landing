<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Obsido - Verifikasi</title>
        <link rel="icon" href="<?php echo base_url("assets/icons/favicon.png"); ?>" type="image/png" sizes="16x16" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="description" content="Obsido" />
        <meta name="keywords" content="Obsido Keywords">
        <meta name="author" content="Web-Izul" />
        <link href="<?php echo base_url("assets/css/bootstrap.min.css"); ?>" rel="stylesheet" type="text/css" media="all" />
        <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet" />
        <link rel="stylesheet" href="<?php echo base_url("assets/css/animate.css"); ?>" />
        <link rel="stylesheet" href="<?php echo base_url("assets/css/owl.carousel.css"); ?>" />
        <link rel="stylesheet" href="<?php echo base_url("assets/css/owl.theme.css"); ?>" />
        <link rel="stylesheet" href="<?php echo base_url("assets/css/ionicons.min.css"); ?>" />
        <link rel="stylesheet" href="<?php echo base_url("assets/plugins/@fortawesome/fontawesome-free/css/all.min.css"); ?>">
        <link rel="stylesheet" href="<?php echo base_url("assets/plugins/@line-awesome/css/line-awesome.css"); ?>">
        <link rel="stylesheet" href="<?php echo base_url("assets/plugins/select2/select2.min.css"); ?>">
        <link rel="stylesheet" href="<?php echo base_url("assets/plugins/select2/select2-bootstrap.min.css"); ?>">
        <link rel="stylesheet" href="<?php echo base_url("assets/plugins/ladda/ladda-themeless.min.css"); ?>">
        <link rel="stylesheet" href="<?php echo base_url("assets/plugins/toastr/toastr.min.css"); ?>">
        <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap-datepicker.min.css"); ?>">
        <link href="<?php echo base_url("assets/css/style.css"); ?>" rel="stylesheet" type="text/css" media="all" />
        <link rel="stylesheet" href="<?php echo base_url("assets/css/custom.css?n=").$this->config->item("tahun_assets"); ?>">
        <style>
            .file-upload {
              background-color: #ffffff;
              width: 300px;
              margin: 0 auto;
              padding: 20px;
            }

            .file-upload-btn {
              width: 100%;
              margin: 0;
              color: #fff;
              background: #2B8FED;
              border: none;
              padding: 10px;
              border-radius: 4px;
              border-bottom: 4px solid #0084FF;
              transition: all .2s ease;
              outline: none;
              text-transform: uppercase;
              font-weight: 700;
            }

            .file-upload-btn:hover {
              background: #0084FF;
              color: #ffffff;
              transition: all .2s ease;
              cursor: pointer;
            }

            .file-upload-btn:active {
              border: 0;
              transition: all .2s ease;
            }

            .file-upload-content {
              display: none;
              text-align: center;
            }

            .file-upload-input {
              position: absolute;
              margin: 0;
              padding: 0;
              width: 100%;
              height: 100%;
              outline: none;
              opacity: 0;
              cursor: pointer;
            }

            .image-upload-wrap {
              margin-top: 20px;
              border: 4px dashed #2B8FED;
              position: relative;
            }

            .image-dropping,
            .image-upload-wrap:hover {
              background-color: #c4e2ff;
              border: 4px dashed #ffffff;
            }

            .image-title-wrap {
              padding: 0 15px 15px 15px;
              color: #222;
            }

            .drag-text {
              text-align: center;
            }

            .drag-text h3 {
              font-weight: 100;
              text-transform: uppercase;
              color: #0084FF;
              padding: 60px 0;
            }

            .file-upload-image {
              max-height: 200px;
              max-width: 200px;
              margin: auto;
              padding: 20px;
            }

            .remove-image {
              width: 200px;
              margin: 0;
              color: #fff;
              background: #cd4535;
              border: none;
              padding: 10px;
              border-radius: 4px;
              border-bottom: 4px solid #b02818;
              transition: all .2s ease;
              outline: none;
              text-transform: uppercase;
              font-weight: 700;
            }

            .remove-image:hover {
              background: #c13b2a;
              color: #ffffff;
              transition: all .2s ease;
              cursor: pointer;
            }

            .remove-image:active {
              border: 0;
              transition: all .2s ease;
            }

            #grad1 {
                background-color: : #9C27B0;
                background-image: none;
            }

            #msform {
                text-align: center;
                position: relative;
                margin-top: 20px
            }

            #msform fieldset .form-card {
                background: white;
                border: 0 none;
                border-radius: 0px;
                padding: 20px 40px 30px 40px;
                box-sizing: border-box;
                width: 94%;
                margin: 0 3% 20px 3%;
                position: relative
            }

            #msform fieldset {
                background: white;
                border: 0 none;
                border-radius: 0.5rem;
                box-sizing: border-box;
                width: 100%;
                margin: 0;
                padding-bottom: 20px;
                position: relative
            }

            #msform fieldset:not(:first-of-type) {
                display: none
            }

            #msform fieldset .form-card {
                text-align: left;
                color: #9E9E9E
            }
            .card {
                z-index: 0;
                border: none;
                border-radius: 0.5rem;
                position: relative
            }

            .fs-title {
                font-size: 25px;
                color: #2C3E50;
                margin-bottom: 10px;
                font-weight: bold;
                text-align: left
            }

            #progressbar {
                margin-bottom: 30px;
                overflow: hidden;
                color: lightgrey
            }

            #progressbar .active {
                color: #000000
            }

            #progressbar li {
                list-style-type: none;
                font-size: 12px;
                width: 33.33%;
                float: left;
                position: relative
            }

            #progressbar #personal_information:before {
                font-family: "Font Awesome 5 Free";
                content: "\f007"
            }

            #progressbar #data_bank:before {
                font-family: "Font Awesome 5 Free";
                content: "\f007"
            }

            #progressbar #foto_ktp:before {
                font-family: "Font Awesome 5 Free";
                content: "\f007"
            }

            #progressbar #selfie_ktp:before {
                font-family: "Font Awesome 5 Free";
                content: "\f007"
            }

            #progressbar #foto_npwp:before {
                font-family: "Font Awesome 5 Free";
                content: "\f007"
            }

            #progressbar #selfie_npwp:before {
                font-family: "Font Awesome 5 Free";
                content: "\f007"
            }

            #progressbar #upload_data:before {
                font-family: "Font Awesome 5 Free";
                content: "\f09d"
            }

            #progressbar li:before {
                width: 50px;
                height: 50px;
                line-height: 45px;
                display: block;
                font-size: 18px;
                color: #ffffff;
                background: lightgray;
                border-radius: 50%;
                margin: 0 auto 10px auto;
                padding: 2px
            }

            #progressbar li:after {
                content: '';
                width: 100%;
                height: 2px;
                background: lightgray;
                position: absolute;
                left: 0;
                top: 25px;
                z-index: -1
            }

            #progressbar li.active:before,
            #progressbar li.active:after {
                background: skyblue
            }

            .radio-group {
                position: relative;
                margin-bottom: 25px
            }

            .radio {
                display: inline-block;
                width: 204;
                height: 104;
                border-radius: 0;
                background: lightblue;
                box-shadow: 0 2px 2px 2px rgba(0, 0, 0, 0.2);
                box-sizing: border-box;
                cursor: pointer;
                margin: 8px 2px
            }

            .radio:hover {
                box-shadow: 2px 2px 2px 2px rgba(0, 0, 0, 0.3)
            }

            .radio.selected {
                box-shadow: 1px 1px 2px 2px rgba(0, 0, 0, 0.1)
            }

            .fit-image {
                width: 100%;
                object-fit: cover
            }
            .shadow{
                -webkit-box-shadow: 0px 0px 15px -2px #000000; 
                box-shadow: 0px 0px 15px -2px #000000;
            }
            input.form-control{
                height: 38px;
            }
            @media only screen and (max-width: 550px) {
                .form-card{
                    padding-left: 10px !important;
                    padding-right: 10px !important;
                }
            }
        </style>
    </head>
    <body>
        <div class="wrapper">
            <?php $this->load->view("other/header_landing"); ?>
            <div id="main" class="main">
                <div class="home mt-3">
                    <div class="container">
                        <div class="row row-resize-item">
                            <!-- MultiStep Form -->
                            <div class="container-fluid" id="grad1">
                                <div class="row justify-content-center mt-0">
                                    <div class="col-12 text-center p-3 mt-3 mb-2">
                                        <div class="card px-0 pt-4 pb-0 mt-3 mb-3 shadow">
                                            <h1 class="bold">Verifikasi Identitas Penerbit</h1>
                                            <p style="max-width: 735px; margin: 0px auto; padding: 0px 10px;">Sesuai dengan peraturan & ketentuan OJK, kami membutuhkan perusahaan anda. Kami menjamin data dan identitas anda tidak akan kami sebarluaskan. Apabila saat mengaakanu kendala, anda dapat menghubungi kami melalui live chat</p>
                                            <div class="row ml-0 mr-0">
                                                <div class="col-md-12 mx-0">
                                                    <form id="msform" class="font-default form-penerbit" method="POST" action="/penerbit/ajax_penerbit">
                                                        <ul id="progressbar" class="d-none d-md-block">
                                                            <li class="active" id="personal_information"><strong>Personal Information</strong></li>
                                                            <li id="data_bank"><strong>Data Bank</strong></li>
                                                            <li id="upload_data"><strong>Unggah Data</strong></li>
                                                        </ul>
                                                        <fieldset>
                                                            <div class="form-card fieldset-1">
                                                                <h2 class="fs-title mb-3">Personal Information</h2>
                                                                <div class="row">
                                                                    <div class="col-xl-4 col-lg-6">
                                                                        <div class="form-group">
                                                                            <label class="form-control-label text-dark">Nama Perusahaan</label>
                                                                            <input type="text" class="form-control input-uppercase" placeholder="Nama Perusahaan" maxlength="100" name="form[nama_perusahaan]">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="form-control-label text-dark">NPWP Perusahaan</label>
                                                                            <input type="text" class="form-control" placeholder="NPWP (Nomor Pokok Wajib Pajak)" maxlength="30" name="form[npwp]">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="form-control-label text-dark">Nama Penanggung Jawab</label>
                                                                            <input type="text" class="form-control input-uppercase" placeholder="Nama (Sesuai KTP)" maxlength="100" name="form[nama_penanggung_jawab]">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="form-control-label text-dark">NIK Penanggung Jawab</label>
                                                                            <input type="text" class="form-control" placeholder="NIK (Nomor Induk KTP)" maxlength="16" name="form[nik_penanggung_jawab]" onkeypress="return validatedata(event);">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xl-4 col-lg-6">
                                                                        <div class="form-group">
                                                                            <label class="form-control-label text-dark">Provinsi</label>
                                                                            <select style="width: 100%;" class="form-control select2 dropdown-provinsi" name="form[id_provinsi]">
                                                                                <option value="">Pilih Provinsi</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="form-control-label text-dark">Kota/Kabupaten</label>
                                                                            <select style="width: 100%;" class="form-control select2 dropdown-kota" name="form[id_kota]">
                                                                                <option value="">Pilih Kota</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="form-control-label text-dark">No Telepon Perusahaan</label>
                                                                            <div class="input-group">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text kode-telepon" id="basic-addon1" style="border: 1px solid #ced4da; padding-top: 6px;">-</span>
                                                                                </div>
                                                                                <input type="hidden" name="form[kode_telepon]">
                                                                                <input type="text" class="form-control" placeholder="No Telepon Perusahaan" aria-label="No Telepon Perusahaan" aria-describedby="basic-addon1" maxlength="20" name="form[no_telepon]" onkeypress="return validatedata(event);">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="form-control-label text-dark">Kecamatan</label>
                                                                            <select style="width: 100%;" class="form-control select2 dropdown-kecamatan" name="form[id_kecamatan]">
                                                                                <option value="">Pilih Kecamatan</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xl-4 col-lg-6">
                                                                        <div class="form-group">
                                                                            <label class="form-control-label text-dark">Kelurahan</label>
                                                                            <input type="text" class="form-control input-uppercase" placeholder="Kelurahan" maxlength="30" name="form[kelurahan]">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="form-control-label text-dark">Alamat Lengkap</label>
                                                                            <textarea type="text" class="form-control input-uppercase" placeholder="Alamat Lengkap" maxlength="255" name="form[alamat_lengkap]" style="padding-top: 5px !important;"></textarea>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="form-control-label text-dark">Jabatan</label>
                                                                            <select style="width: 100%;" class="form-control select" name="form[jabatan]">
                                                                                <option value="DIREKTUR">DIREKTUR</option>
                                                                                <option value="KOMISARIS">KOMISARIS</option>
                                                                                <option value="MANAJER">MANAJER</option>
                                                                                <option value="LAINNYA">LAINNYA</option>
                                                                            </select>
                                                                            <input type="text" class="form-control input-uppercase mt-1 input-jabatan-lainnya d-none" placeholder="Jabatan" maxlength="30" name="form[jabatan_lainnya]">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <a class="btn btn-primary bold next action-button text-white disabled" disabled>Lanjut</a>
                                                        </fieldset>
                                                        <fieldset>
                                                            <div class="form-card fieldset-2">
                                                                <h2 class="fs-title mb-3">Data Bank</h2>
                                                                <div class="row">
                                                                    <div class="col-xl-4 col-lg-6">
                                                                        <div class="form-group">
                                                                            <label class="form-control-label text-dark">Nomor Rekening Perusahaan</label>
                                                                            <input type="text" class="form-control input-uppercase" placeholder="Nomor Rekening Perusahaan" maxlength="100" name="form[nomor_rekening_bank]" onkeypress="return validatedata(event);">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="form-control-label text-dark">Nama Pemilik Rekening Bank</label>
                                                                            <input type="text" class="form-control input-uppercase" placeholder="Nama Pemilik Rekening Bank" maxlength="100" name="form[nama_pemilik_rekening_bank]">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="form-control-label text-dark">Nama Bank</label>
                                                                            <select style="width: 100%;" class="form-control select" name="form[nama_bank]">
                                                                                <option value="BRI">BRI</option>
                                                                                <option value="MANDIRI">MANDIRI</option>
                                                                                <option value="BCA">BCA</option>
                                                                                <option value="BNI">BNI</option>
                                                                                <option value="BTN">BTN</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="form-control-label text-dark">Nama Cabang Bank</label>
                                                                            <input type="text" class="form-control input-uppercase" placeholder="Nama Cabang Bank" maxlength="100" name="form[nama_cabang_bank]">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6 d-none d-xl-block offset-xl-2">
                                                                        <center>
                                                                            <img src="<?php echo base_url("assets/images/email_kyc_bank.png"); ?>" style="max-width: 320px;">
                                                                        </center>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <a class="btn btn-default bold previous action-button-previous">Kembali</a>
                                                            <a class="btn btn-primary bold next action-button text-white disabled" disabled>Lanjut</a>
                                                        </fieldset>
                                                        <fieldset>
                                                            <div class="form-card fieldset-3">
                                                                <h2 class="fs-title mb-3">Unggah Data</h2>
                                                                <div class="row">
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group">
                                                                            <label class="form-control-label text-dark">Unggah Siup</label>
                                                                            <input type="file" class="form-control" name="form[unggah_siup]">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="form-control-label text-dark">Unggah NIB</label>
                                                                            <input type="file" class="form-control" name="form[unggah_nib]">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="form-control-label text-dark">Unggah NPWP Perusahaan</label>
                                                                            <input type="file" class="form-control" name="form[unggah_npwp_perusahaan]">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="form-control-label text-dark">Unggah KTP Penganggung Jawab</label>
                                                                            <input type="file" class="form-control" name="form[unggah_ktp_penanggung_jawab]">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="form-control-label text-dark">Unggah KTP Direksi</label>
                                                                            <br><i style="font-style: italic; font-size: 13px;">Harap mengunggah seluruh KTP Direksi dalam 1 file yang sama</i>
                                                                            <input type="file" class="form-control" style="margin-top: 3px;" name="form[unggah_ktp_direksi]">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="form-control-label text-dark">Unggah KTP Komisaris</label>
                                                                            <br><i style="font-style: italic; font-size: 13px;">Harap mengunggah seluruh KTP Komisaris dalam 1 file yang sama</i>
                                                                            <input type="file" class="form-control" style="margin-top: 3px;" name="form[unggah_ktp_komisaris]">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="form-control-label text-dark">Akta Pendirian Perusahaan</label>
                                                                            <input type="file" class="form-control" style="margin-top: 3px;" name="form[unggah_akta_pendirian_perusahaan]">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="form-control-label text-dark">Akta Perubahan Anggaran Dasar Terakhir</label>
                                                                            <input type="file" class="form-control" style="margin-top: 3px;" name="form[unggah_akta_perubahan_anggaran_dasar_terakhir]">
                                                                        </div>
                                                                        <!-- <center>
                                                                            <div class="file-upload">
                                                                                <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Add Image</button>

                                                                                <div class="image-upload-wrap">
                                                                                    <input class="file-upload-input" type="file" onchange="readURL(this);" accept="image/*" />
                                                                                    <div class="drag-text">
                                                                                        <h3>Drag and drop a file or select add Image</h3>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="file-upload-content">
                                                                                    <img class="file-upload-image" src="#" alt="your image" />
                                                                                    <div class="image-title-wrap">
                                                                                        <button type="button" onclick="removeUpload()" class="remove-image">Remove <span class="image-title">Uploaded Image</span></button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </center> -->
                                                                    </div>
                                                                    <div class="col-lg-6 d-none d-xl-block">
                                                                        <center>
                                                                            <img src="<?php echo base_url("assets/images/upload.png"); ?>" style="max-width: 320px;">
                                                                        </center>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <a class="btn btn-default bold previous action-button-previous">Kembali</a>
                                                            <a class="btn btn-primary bold btn-finish text-white ladda-button ladda-button-submit disabled" disabled data-style="slide-up">Kirim Verifikasi</a>
                                                            <input type="hidden" name="form[id]" value="<?php echo $this->session->userdata("user_penerbit")->id; ?>">
                                                        </fieldset>
                                                    </form>
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
        <script type="text/javascript" src="<?php echo base_url("assets/js/moment.min.js"); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url("assets/js/jquery-2.1.1.js"); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url("assets/js/popper.min.js"); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.min.js"); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url("assets/js/jquery.validate.min.js"); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url("assets/js/plugins.js"); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url("assets/js/custom.js"); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap-datepicker.js"); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url("assets/plugins/validate/jquery.validate.min.js"); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url("assets/plugins/select2/select2.full.js"); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url("assets/plugins/toastr/toastr.min.js"); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url("assets/plugins/ladda/spin.min.js"); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url("assets/plugins/ladda/ladda.min.js"); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url("assets/plugins/ladda/ladda.jquery.min.js"); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url("assets/plugins/Inputmask-5.x/dist/jquery.inputmask.js"); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url("assets/plugins/webcamjs/webcam.min.js"); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url("assets/js/proses.js?n=").$this->config->item("tahun_assets"); ?>"></script>
        <script>
            $(".select2.dropdown-kota").select2({
                disabled: true,
                placeholder: "Pilih Provinsi terlebih dahulu",
            }).val("").trigger("change");
            $(".select2.dropdown-kecamatan").select2({
                disabled: true,
                placeholder: "Pilih Kota/Kabupaten terlebih dahulu",
            }).val("").trigger("change");
            GetDropdownProvinsi();
            $(".dropdown-provinsi").on("select2:select", function(e) {
                if($(this).val()==""){
                    $(".select2.dropdown-kota").select2({
                        disabled: true,
                        placeholder: "Pilih Provinsi terlebih dahulu",
                    }).val("").trigger("change");
                    $(".select2.dropdown-kecamatan").select2({
                        disabled: true,
                        placeholder: "Pilih Kota/Kabupaten terlebih dahulu",
                    }).val("").trigger("change");
                } else {
                    $(".select2.dropdown-kota").select2({
                        disabled: true,
                        placeholder: "Loading...",
                    }).val("").trigger("change");
                    GetDropdownKota("", $(this).val(),"");
                }
                $(".select2.dropdown-kecamatan").select2({
                    disabled: true,
                    placeholder: "Pilih Kota/Kabupaten terlebih dahulu",
                }).val("").trigger("change");
            });
            $(".dropdown-kota").on("select2:select", function(e) {
                if($(this).val()==""){
                    $(".select2.dropdown-kecamatan").select2({
                        disabled: true,
                        placeholder: "Pilih Kota/Kabupaten terlebih dahulu",
                    }).val("").trigger("change");
                    $(".kode-telepon").text("-");
                    $("[name='form[kode_telepon]']").val("");
                } else {
                    $(".select2.dropdown-kecamatan").select2({
                        disabled: true,
                        placeholder: "Loading...",
                    }).val("").trigger("change");
                    GetDropdownKecamatan("", $(this).val(),"");
                    $(".kode-telepon").text($("option:selected", this).attr("kode-telepon"));
                    $("[name='form[kode_telepon]']").val($("option:selected", this).attr("kode-telepon"));
                }
                $(".select2.dropdown-kecamatan").select2({
                    disabled: true,
                    placeholder: "Pilih Kota/Kabupaten terlebih dahulu",
                }).val("").trigger("change");
            });

            $("[name='form[npwp]']").inputmask({"mask": "99.999.999.9-999.999"});
            $(".datepicker-tgl-lahir").datepicker({
                    autoclose: true,
                    format: 'dd M yyyy'
                });
            $(document).ready(function(){
                var current_fs, next_fs, previous_fs; //fieldsets
                var opacity;

                $(".next").click(function(){

                current_fs = $(this).parent();
                next_fs = $(this).parent().next();

                //Add Class Active
                $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

                //show the next fieldset
                next_fs.show();
                //hide the current fieldset with style
                current_fs.animate({opacity: 0}, {
                step: function(now) {
                // for making fielset appear animation
                opacity = 1 - now;

                current_fs.css({
                'display': 'none',
                'position': 'relative'
                });
                next_fs.css({'opacity': opacity});
                },
                duration: 600
                });
                });

                $(".previous").click(function(){

                current_fs = $(this).parent();
                previous_fs = $(this).parent().prev();

                //Remove class active
                $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

                //show the previous fieldset
                previous_fs.show();

                //hide the current fieldset with style
                current_fs.animate({opacity: 0}, {
                step: function(now) {
                // for making fielset appear animation
                opacity = 1 - now;

                current_fs.css({
                'display': 'none',
                'position': 'relative'
                });
                previous_fs.css({'opacity': opacity});
                },
                duration: 600
                });
                });

                $('.radio-group .radio').click(function(){
                $(this).parent().find('.radio').removeClass('selected');
                $(this).addClass('selected');
                });

                $(".submit").click(function(){
                return false;
                })

            });


            function readURL(input) {
              if (input.files && input.files[0]) {

                var reader = new FileReader();

                reader.onload = function(e) {
                  $('.image-upload-wrap').hide();

                  $('.file-upload-image').attr('src', e.target.result);
                  $('.file-upload-content').show();

                  $('.image-title').html(input.files[0].name);
                };

                reader.readAsDataURL(input.files[0]);

              } else {
                removeUpload();
              }
            }

            function removeUpload() {
              $(".file-upload-input").val("");
              $('.file-upload-input').replaceWith($('.file-upload-input').clone());
              $('.file-upload-content').hide();
              $('.image-upload-wrap').show();
                $(".fieldset-3").parent().find(".btn-finish").attr("disabled", "disabled").addClass("disabled");
            }
            $('.image-upload-wrap').bind('dragover', function () {
                $('.image-upload-wrap').addClass('image-dropping');
            });
            $('.image-upload-wrap').bind('dragleave', function () {
                $('.image-upload-wrap').removeClass('image-dropping');
            });


            $(".btn-finish").click(function(){
                $(".form-penerbit").submit()
            })
            var FrmPemodal = $(".form-penerbit").validate({
                submitHandler: function(form) {
                    laddasubmit = $("html").find(".ladda-button-submit");
                    UpdateData(form, function(resp) {
                        window.location.href = "https://penerbit.obsido.co.id";
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

            $(".penghasilan-per-tahun").focus(function(){
                var penghasilan_per_tahun = $(this).val().replace(/\./g,"");
                $(this).val(penghasilan_per_tahun);
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


            $(".fieldset-1").on("change", "input, select, textarea", function() {
                $(".fieldset-1").parent().find(".action-button").attr("disabled", "disabled").addClass("disabled");
                // admin_password.find("input[name='form[password]']").val("");
                if($("[name='form[nama_perusahaan]']").val() == "" || $("[name='form[npwp]']").val() == "" || $("[name='form[nama_penanggung_jawab]']").val() == "" || $("[name='form[nik_penanggung_jawab]']").val() == "" || $("[name='form[alamat_lengkap]']").val() == "" || $("[name='form[jabatan]']").val() == "" || $("[name='form[id_provinsi]']").val() == "" || $("[name='form[id_kota]']").val() == "" || $("[name='form[id_kecamatan]']").val() == "" || $("[name='form[kelurahan]']").val() == "" || $("[name='form[no_telepon]']").val() == ""){
                    $(".fieldset-1").parent().find(".action-button").attr("disabled", "disabled").addClass("disabled");
                } else {
                    if($("[name='form[npwp]']").val().replace(/\./g,"").replace(/\-/g,"").replace(/\_/g,"").length < 15){
                        toastrshow("warning", "Mohon periksa NPWP kembali", "Peringatan");
                    } else {
                        $(".fieldset-1").parent().find(".action-button").removeAttr("disabled").removeClass("disabled");
                    }
                }
            });
            $(".fieldset-2").on("change", "input, select", function() {
                if($("[name='form[nomor_rekening_bank]']").val() == "" || $("[name='form[nama_pemilik_rekening_bank]']").val() == "" || $("[name='form[nama_cabang_bank]']").val() == "" || $("[name='form[nama_bank]']").val() == ""){
                    $(".fieldset-2").parent().find(".action-button").attr("disabled", "disabled").addClass("disabled");
                } else {
                    $(".fieldset-2").parent().find(".action-button").removeAttr("disabled").removeClass("disabled");
                }
            });
            $(".fieldset-3").on("change", "input", function() {
                if($("[name='form[unggah_siup]']").val() && $("[name='form[unggah_nib]']").val() && $("[name='form[unggah_npwp_perusahaan]']").val() && $("[name='form[unggah_ktp_penanggung_jawab]']").val() && $("[name='form[unggah_ktp_direksi]']").val() && $("[name='form[unggah_ktp_komisaris]']").val() && $("[name='form[unggah_akta_pendirian_perusahaan]']").val() && $("[name='form[unggah_akta_perubahan_anggaran_dasar_terakhir]']").val()){
                    $(".fieldset-3").parent().find(".btn-finish").removeAttr("disabled").removeClass("disabled");
                } else {
                    $(".fieldset-3").parent().find(".btn-finish").attr("disabled", "disabled").addClass("disabled");
                }
            });
            $(".action-button").click(function(){
                $("html").scrollTop(0);
            });
            $(".action-button-previous").click(function(){
                $("html").scrollTop(0);
            });

            $("[name='form[jabatan]']").change(function(){
                $("[name='form[jabatan_lainnya]']").val("");
                if($(this).val() == "LAINNYA"){
                    $(".input-jabatan-lainnya").removeClass("d-none");
                } else {
                    $(".input-jabatan-lainnya").addClass("d-none");
                }
            });
        </script>
    </body>
</html>
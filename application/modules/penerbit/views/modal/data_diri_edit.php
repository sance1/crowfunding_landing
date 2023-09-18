<div class="modal fade" id="modal-edit-data-diri" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Pengaturan - Data Pribadi</h5>
                <button type="button" class="close white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="FrmEditDataDiri" class="form-horizontal" role="form" method="POST" action="/pemodal/ajax_pemodal">
                    <center>
                        <img class="loading-gif-image" src="<?php echo base_url("assets/images/loading-data.gif") ?>" alt="Loading ...">
                    </center>
                    <div class="row after-loading d-none">
                        <div class="col-xl-4 col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label text-dark">Status Perkawinan</label>
                                <select style="width: 100%;" class="form-control select" name="form[status_perkawinan]">
                                    <option value="BELUM KAWIN">BELUM KAWIN</option>
                                    <option value="KAWIN">KAWIN</option>
                                    <option value="CERAI HIDUP">CERAI HIDUP</option>
                                    <option value="CERAI MATI">CERAI MATI</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label text-dark">Pekerjaan</label>
                                <select style="width: 100%;" class="form-control select" name="form[pekerjaan]">
                                    <option value="PELAJAR">PELAJAR</option> 
                                    <option value="PENGUSAHA">PENGUSAHA</option> 
                                    <option value="PEGAWAI SWASTA">PEGAWAI SWASTA</option> 
                                    <option value="PEGAWAI NEGERI SIPIL (PNS)">PEGAWAI NEGERI SIPIL (PNS)</option> 
                                    <option value="IBU RUMAH TANGGA">IBU RUMAH TANGGA</option> 
                                    <option value="LAINNYA">LAINNYA</option> 
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label text-dark">Penghasilan Per Tahun</label>
                                <input type="text" class="form-control penghasilan-per-tahun" placeholder="Penghasilan Per Tahun" maxlength="19" name="form[penghasilan_per_tahun]" onkeypress="return validatedata(event);">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label text-dark">Sumber Penghasilan</label>
                                <select style="width: 100%;" class="form-control select" name="form[sumber_penghasilan]">
                                    <option value="GAJI">GAJI</option>
                                    <option value="HASIL USAHA">HASIL USAHA</option>
                                    <option value="HASIL INVESTASI">HASIL INVESTASI</option>
                                    <option value="DARI SUAMI/ISTRI">DARI SUAMI/ISTRI</option>
                                    <option value="DARI ORANG TUA/ANAK">DARI ORANG TUA/ANAK</option>
                                    <option value="LAINNYA">LAINNYA</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label text-dark">Alamat Lengkap</label>
                                <textarea type="text" class="form-control input-uppercase" placeholder="Alamat Lengkap" maxlength="255" name="form[alamat_lengkap]" style="padding-top: 5px !important;"></textarea>
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
                                <label class="form-control-label text-dark">Kecamatan</label>
                                <select style="width: 100%;" class="form-control select2 dropdown-kecamatan" name="form[id_kecamatan]">
                                    <option value="">Pilih Kecamatan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label text-dark">Kelurahan</label>
                                <input type="text" class="form-control input-uppercase" placeholder="Kelurahan" maxlength="30" name="form[kelurahan]">
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label text-dark">Nomor Rekening</label>
                                <input type="text" class="form-control input-uppercase" placeholder="Nomor Rekening" maxlength="100" name="form[nomor_rekening_bank]" onkeypress="return validatedata(event);">
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
                    </div>
                    <input type="hidden" class="id_hidden" name="form[id]" value="" placeholder="id_data">
                </form>
            </div>
            <div class="modal-footer after-loading d-none">
                <button class="btn btn-light" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary ladda-button ladda-button-submit" onclick="SimpanEditDataDiri();" data-style="slide-up">Simpan Prubahan</button>
            </div>
        </div>
    </div>
</div>
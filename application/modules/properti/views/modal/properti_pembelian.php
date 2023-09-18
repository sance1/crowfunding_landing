<?php
    $saldo = 0;
    if($this->session->userdata("user")){
        $saldo = $this->session->userdata("user")->saldo;
    }
    $biaya_admin = $this->session->userdata("biaya_admin");
?>
<div class="modal fade" id="modal-properti-pembelian" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Pembayaran</h5>
                <button type="button" class="close white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="FrmPropertiPembelian" class="form-horizontal" role="form" method="POST" action="/transaksi/ajax_transaksi">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-control-label text-dark">Sisa Saldo Anda</label>
                                <input readonly type="text" class="form-control sisa-saldo text-right" placeholder="Sisa Saldo Anda" maxlength="19" style="height: 38px;" value="<?php echo $this->foglobal->rupiah($saldo); ?>">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label text-dark">Masukkan Lembar Saham</label>
                                <input required type="number" min="1" id="txtLembarSaham" class="form-control sisa-saldo text-right" placeholder="Masukkan Lembar Saham" name="form[total_saham]" onkeypress="return validatedata(event);" style="height: 38px;">
                                <div id="txtSisaSaham"></div>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label text-dark">Total Investasi</label>
                                <input readonly type="text" class="form-control text-right" placeholder="Total Investasi" maxlength="19" name="form[nominal]" style="height: 38px;">
                                <label class="float-right text-danger mt-1" style="font-size: 12px; font-weight: bold;">Biaya Admin : <?php echo $this->foglobal->rupiah($biaya_admin, true); ?></label>
                            </div>
                            <div class="form-group mt-4">
                                <label class="form-control-label text-dark">Total Pembayaran</label>
                                <input readonly type="text" class="form-control text-right total-pembayaran" placeholder="Total Pembayaran" maxlength="19" style="height: 38px;">
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="form[id_properti]">
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-light" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary ladda-button ladda-button-submit" onclick="checkLembarSaham();" data-style="slide-up">Konfirmasi</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function checkLembarSaham(){
        var getLembarSaham = parseInt($("#txtLembarSaham").val());
        var getSahamTerkumpul = <?php echo $properti->total_saham_terkumpul ?>;

        var getPerLembar = <?php echo $properti->total_per_lembar ?>;        
        var countSaham = getLembarSaham + getSahamTerkumpul;
        console.log(getPerLembar);
        console.log(countSaham);
        if(getPerLembar >= countSaham){
            SimpanPropertiPembelian();
        }else{
            var sisaSaham = getPerLembar - getSahamTerkumpul;
            var content="";
            content += `<label class="float-right text-danger mb-2 mt-1" style="font-size: 12px; font-weight: bold;">Tersisa ${sisaSaham.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")} Lembar Saham</label>`;
            $("#txtSisaSaham").html(content); 
        }

    }
</script>
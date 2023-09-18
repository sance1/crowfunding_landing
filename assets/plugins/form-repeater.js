var FormRepeater = function () {

    return {
        //main function to initiate the module
        init: function () {
            $('.mt-repeater').each(function(){
                $(this).repeater({
                    show: function () {
                        $(this).slideDown();
                        // MATA PELAJARAN
                        mapel_baru.find(".btnTambah").click(function() {
                            var index_repeat = mapel_baru.find(".n1").parents(".mt-repeater-item").index();
                            index_before_plus = index_repeat ;
                            index_repeat = index_repeat + 1;
                            mapel_baru.find(".mt-repeater-item:nth-child("+index_repeat+") .n1").focus();
                            if(index_repeat == 1){
                                mapel_baru.find(".mt-repeater-item:nth-child("+index_repeat+") .n2").val("100");
                                mapel_baru.find(".mt-repeater-item:nth-child("+index_repeat+") .predikat").val("A");
                            }
                            if(mapel_baru.find(".mt-repeater-item:nth-child("+index_before_plus+") .predikat").val() == "A"){
                                mapel_baru.find(".mt-repeater-item:nth-child("+index_repeat+") .predikat").val("A-");
                            }
                            if(mapel_baru.find(".mt-repeater-item:nth-child("+index_before_plus+") .predikat").val() == "A-"){
                                mapel_baru.find(".mt-repeater-item:nth-child("+index_repeat+") .predikat").val("B+");
                            }
                            if(mapel_baru.find(".mt-repeater-item:nth-child("+index_before_plus+") .predikat").val() == "B+"){
                                mapel_baru.find(".mt-repeater-item:nth-child("+index_repeat+") .predikat").val("B");
                            }
                            if(mapel_baru.find(".mt-repeater-item:nth-child("+index_before_plus+") .predikat").val() == "B"){
                                mapel_baru.find(".mt-repeater-item:nth-child("+index_repeat+") .predikat").val("B-");
                            }
                            if(mapel_baru.find(".mt-repeater-item:nth-child("+index_before_plus+") .predikat").val() == "B-"){
                                mapel_baru.find(".mt-repeater-item:nth-child("+index_repeat+") .predikat").val("C+");
                            }
                            if(mapel_baru.find(".mt-repeater-item:nth-child("+index_before_plus+") .predikat").val() == "C+"){
                                mapel_baru.find(".mt-repeater-item:nth-child("+index_repeat+") .predikat").val("C");
                            }
                            if(mapel_baru.find(".mt-repeater-item:nth-child("+index_before_plus+") .predikat").val() == "C"){
                                mapel_baru.find(".mt-repeater-item:nth-child("+index_repeat+") .predikat").val("C-");
                            }
                            if(mapel_baru.find(".mt-repeater-item:nth-child("+index_before_plus+") .predikat").val() == "C-"){
                                mapel_baru.find(".mt-repeater-item:nth-child("+index_repeat+") .predikat").val("D");
                            }
                        });
                        mapel_baru.find(".mt-repeater-delete").click(function(){
                            setTimeout(function(){
                                if( mapel_baru.find(".mt-repeater-item").size() == 0){
                                    mapel_baru.find(".btnTambah").click();
                                }
                            }, 500);
                        });
                        mapel_baru.find(".n1").change(function(){
                            var index_repeat = $(this).parents(".mt-repeater-item").index();
                            index_repeat = index_repeat + 1;
                            if(parseInt(mapel_baru.find('.mt-repeater-item:nth-child('+index_repeat+') .n1').val())<=0){
                                mapel_baru.find('.mt-repeater-item:nth-child('+index_repeat+') .n1').val(0);
                            }
                            if(parseInt(mapel_baru.find('.mt-repeater-item:nth-child('+index_repeat+') .n1').val())>=100){
                                mapel_baru.find('.mt-repeater-item:nth-child('+index_repeat+') .n1').val(99);
                                mapel_baru.find('.mt-repeater-item:nth-child('+index_repeat+') .n2').val(100);
                            }
                            if(parseInt(mapel_baru.find('.mt-repeater-item:nth-child('+index_repeat+') .n1').val())>=parseInt(mapel_baru.find('.mt-repeater-item:nth-child('+index_repeat+') .n2').val())){
                                mapel_baru.find('.mt-repeater-item:nth-child('+index_repeat+') .n2').val(mapel_baru.find('.mt-repeater-item:nth-child('+index_repeat+') .n1').val()*1+1);
                            }
                        });
                        mapel_baru.find(".n2").change(function(){
                            var index_repeat = $(this).parents(".mt-repeater-item").index();
                            index_repeat = index_repeat + 1;
                            if(parseInt(mapel_baru.find('.mt-repeater-item:nth-child('+index_repeat+') .n2').val())<=0){
                                mapel_baru.find('.mt-repeater-item:nth-child('+index_repeat+') .n1').val(0);
                                mapel_baru.find('.mt-repeater-item:nth-child('+index_repeat+') .n2').val(1);
                            }
                            if(parseInt(mapel_baru.find('.mt-repeater-item:nth-child('+index_repeat+') .n2').val())>=101){
                                mapel_baru.find('.mt-repeater-item:nth-child('+index_repeat+') .n1').val(99);
                                mapel_baru.find('.mt-repeater-item:nth-child('+index_repeat+') .n2').val(100);
                            }
                            if(parseInt(mapel_baru.find('.mt-repeater-item:nth-child('+index_repeat+') .n1').val())>=parseInt(mapel_baru.find('.mt-repeater-item:nth-child('+index_repeat+') .n2').val())){
                                mapel_baru.find('.mt-repeater-item:nth-child('+index_repeat+') .n1').val(mapel_baru.find('.mt-repeater-item:nth-child('+index_repeat+') .n2').val()*1-1);
                            }
                        });
                        mapel_edit.find(".btnTambah").click(function() {
                            var index_repeat = mapel_edit.find(".n1").parents(".mt-repeater-item").index();
                            index_before_plus = index_repeat ;
                            index_repeat = index_repeat + 1;
                            mapel_edit.find(".mt-repeater-item:nth-child("+index_repeat+") .n1").focus();
                            if(index_repeat == 1){
                                mapel_edit.find(".mt-repeater-item:nth-child("+index_repeat+") .n2").val("100");
                                mapel_edit.find(".mt-repeater-item:nth-child("+index_repeat+") .predikat").val("A");
                            }
                            if(mapel_edit.find(".mt-repeater-item:nth-child("+index_before_plus+") .predikat").val() == "A"){
                                mapel_edit.find(".mt-repeater-item:nth-child("+index_repeat+") .predikat").val("A-");
                            }
                            if(mapel_edit.find(".mt-repeater-item:nth-child("+index_before_plus+") .predikat").val() == "A-"){
                                mapel_edit.find(".mt-repeater-item:nth-child("+index_repeat+") .predikat").val("B+");
                            }
                            if(mapel_edit.find(".mt-repeater-item:nth-child("+index_before_plus+") .predikat").val() == "B+"){
                                mapel_edit.find(".mt-repeater-item:nth-child("+index_repeat+") .predikat").val("B");
                            }
                            if(mapel_edit.find(".mt-repeater-item:nth-child("+index_before_plus+") .predikat").val() == "B"){
                                mapel_edit.find(".mt-repeater-item:nth-child("+index_repeat+") .predikat").val("B-");
                            }
                            if(mapel_edit.find(".mt-repeater-item:nth-child("+index_before_plus+") .predikat").val() == "B-"){
                                mapel_edit.find(".mt-repeater-item:nth-child("+index_repeat+") .predikat").val("C+");
                            }
                            if(mapel_edit.find(".mt-repeater-item:nth-child("+index_before_plus+") .predikat").val() == "C+"){
                                mapel_edit.find(".mt-repeater-item:nth-child("+index_repeat+") .predikat").val("C");
                            }
                            if(mapel_edit.find(".mt-repeater-item:nth-child("+index_before_plus+") .predikat").val() == "C"){
                                mapel_edit.find(".mt-repeater-item:nth-child("+index_repeat+") .predikat").val("C-");
                            }
                            if(mapel_edit.find(".mt-repeater-item:nth-child("+index_before_plus+") .predikat").val() == "C-"){
                                mapel_edit.find(".mt-repeater-item:nth-child("+index_repeat+") .predikat").val("D");
                            }
                        });
                        mapel_edit.find(".n1").change(function(){
                            var index_repeat = $(this).parents(".mt-repeater-item").index();
                            index_repeat = index_repeat + 1;
                            if(parseInt(mapel_edit.find('.mt-repeater-item:nth-child('+index_repeat+') .n1').val())<=0){
                                mapel_edit.find('.mt-repeater-item:nth-child('+index_repeat+') .n1').val(0);
                            }
                            if(parseInt(mapel_edit.find('.mt-repeater-item:nth-child('+index_repeat+') .n1').val())>=100){
                                mapel_edit.find('.mt-repeater-item:nth-child('+index_repeat+') .n1').val(99);
                                mapel_edit.find('.mt-repeater-item:nth-child('+index_repeat+') .n2').val(100);
                            }
                            if(parseInt(mapel_edit.find('.mt-repeater-item:nth-child('+index_repeat+') .n1').val())>=parseInt(mapel_edit.find('.mt-repeater-item:nth-child('+index_repeat+') .n2').val())){
                                mapel_edit.find('.mt-repeater-item:nth-child('+index_repeat+') .n2').val(mapel_edit.find('.mt-repeater-item:nth-child('+index_repeat+') .n1').val()*1+1);
                            }
                        });
                        mapel_edit.find(".n2").change(function(){
                            var index_repeat = $(this).parents(".mt-repeater-item").index();
                            index_repeat = index_repeat + 1;
                            if(parseInt(mapel_edit.find('.mt-repeater-item:nth-child('+index_repeat+') .n2').val())<=0){
                                mapel_edit.find('.mt-repeater-item:nth-child('+index_repeat+') .n1').val(0);
                                mapel_edit.find('.mt-repeater-item:nth-child('+index_repeat+') .n2').val(1);
                            }
                            if(parseInt(mapel_edit.find('.mt-repeater-item:nth-child('+index_repeat+') .n2').val())>=101){
                                mapel_edit.find('.mt-repeater-item:nth-child('+index_repeat+') .n1').val(99);
                                mapel_edit.find('.mt-repeater-item:nth-child('+index_repeat+') .n2').val(100);
                            }
                            if(parseInt(mapel_edit.find('.mt-repeater-item:nth-child('+index_repeat+') .n1').val())>=parseInt(mapel_edit.find('.mt-repeater-item:nth-child('+index_repeat+') .n2').val())){
                                mapel_edit.find('.mt-repeater-item:nth-child('+index_repeat+') .n1').val(mapel_edit.find('.mt-repeater-item:nth-child('+index_repeat+') .n2').val()*1-1);
                            }
                        });
                    },
                    hide: function (deleteElement) {
                        $(this).slideUp(deleteElement);
                        console.log($(this));
                        setTimeout(function(){
                            var tot_frm = $(".mt-repeater-item").size();
                            if(tot_frm == 0){
                                $(".btnTambah").click();
                            }
                        }, 500);
                    },

                    ready: function (setIndexes) {

                    }

                });
            });
        }

    };

}();

jQuery(document).ready(function() {
    FormRepeater.init();
});

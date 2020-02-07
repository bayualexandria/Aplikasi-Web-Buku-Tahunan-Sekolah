$(document).ready(function(){
    $('#id_ukuran').change(function(){
        var id=$(this).val();
        $.ajax({
            url:"<?= base_url('Pemesanan/get_sub_bahan'); ?>",
            method:"POST",
            data:{id:id},
            async:true,
            dataType:'json',
            success:function(data){

                var html ='';
                var i;
                for (i =0; i < data.length; i++) {
                    html += '<option value='+ data[i].id +'>'+ data[i].bahan_kertas +'</option>';
                    
                }
                $('#id_bahan').html(html);
            }
        });
        return false;
    });
});
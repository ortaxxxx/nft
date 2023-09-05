(function ($) {
    "use strict";
    var base_url = $("#base_url").val();
 
     $(".klay_network_active").on("click", function(){
        
        let net = $(this).attr("id"); 
        let postdata = {};
            postdata['network'] = net;

        $('.active_now_btn').html('<button class="btn btn-danger" disabled>Please Wait <i class="fa fa-spinner fa-spin"></i></button>');
        $.ajax({
            url: base_url+'/backend/klay_network/activate/',
            type: 'POST',
            dataType: 'JSON',
            data: postdata,
            success: function (res) {  
                if(res.status == 'success'){
                    sweetAlert('success', res.msg);
                    $('.active_now_btn').html('');
                    setInterval(()=>{
                        location.href = base_url+'/backend/nft/nft_setup';
                    }, 2000);
                    
                }
                else{
                    $('.active_now_btn').html(' <a href="javascript:;" id="'+net+'" class="btn btn-danger eth_network_active">Active now</a>');
                }
            },
        
        });
        
    });

    $(".eth_network_inactive").on("click", function(){
        let net = $(this).attr("id");
        console.log(net); 
    });
     

}(jQuery));

$(document).ready(function () {
     // hiển thị form      

    $(".btn-sign-in").click(function () { 
        $(".sign_up").removeClass('open');
        $(".sign_in").addClass('open');
        $(".notify").addClass('open');
        let str = 'Hãy điền đầy đủ thông tin !';
        $(".notify").find('.noti').html(str);
        
    });
    $(".js_close").click(function () { 
        $(".sign_up").removeClass('open');
        $(".sign_in").removeClass('open');
        $(".notify").removeClass('open');
    });
    $(".btn-sign-up").click(function () { 
        $(".sign_in").removeClass('open');
        $(".sign_up").addClass('open');
        $(".notify").addClass('open');
        let str = 'Hãy điền đầy đủ thông tin !';
        $(".notify").find('.noti').html(str);
    });
    $(".btn-update").click(function () { 
        $(".update").addClass('open');
        
    });
    $(".js_close").click(function () { 
        $(".update").removeClass('open');
        
    });
    $(".btn_order").click(function () { 
        $(".order").addClass('open');
        
    });
    $(".btn-open-rating").click(function () { 
        $(".rating").addClass('open');
        
    });
    $(".js_close").click(function () { 
        $(".order").removeClass('open');
        $(".rating").removeClass('open');
        
    });

    

    // hiển thị lịch sử mua hàng


    $(".btn_detail_open").click(function () { 
        let parent_tr = $(this).parents('.div-bill');
        parent_tr.find(".bill_detail").addClass('open');
        parent_tr.find(".btn_detail_open").addClass('move');
        parent_tr.find(".btn_detail_close").addClass('open');
    });
    $(".btn_detail_close").click(function () { 
         let parent_tr = $(this).parents('.div-bill');
         parent_tr.find(".bill_detail").removeClass('open');
         parent_tr.find(".btn_detail_open").removeClass('move');
         parent_tr.find(".btn_detail_close").removeClass('open');
    });
    
    $(".btn_detail-ok_open").click(function () { 
         let parent_tr = $(this).parents('.div-bill');
         parent_tr.find(".bill_detail-ok").addClass('open');
         parent_tr.find(".btn_detail-ok_open").addClass('move');
         parent_tr.find(".btn_detail-ok_close").addClass('open');
    });
    $(".btn_detail-ok_close").click(function () { 
         let parent_tr = $(this).parents('.div-bill');
         parent_tr.find(".bill_detail-ok").removeClass('open');
         parent_tr.find(".btn_detail-ok_open").removeClass('move');
         parent_tr.find(".btn_detail-ok_close").removeClass('open');
    });
    $(".btn_detail-ko_open").click(function () { 
         let parent_tr = $(this).parents('.div-bill');
         parent_tr.find(".bill_detail-ko").addClass('open');
         parent_tr.find(".btn_detail-ko_open").addClass('move');
         parent_tr.find(".btn_detail-ko_close").addClass('open');
    });
    $(".btn_detail-ko_close").click(function () { 
         let parent_tr = $(this).parents('.div-bill');
         parent_tr.find(".bill_detail-ko").removeClass('open');
         parent_tr.find(".btn_detail-ko_open").removeClass('move');
         parent_tr.find(".btn_detail-ko_close").removeClass('open');
    });
    $(".btn_detail-ship_open").click(function () { 
         let parent_tr = $(this).parents('.div-bill');
         parent_tr.find(".bill_detail-ship").addClass('open');
         parent_tr.find(".btn_detail-ship_open").addClass('move');
         parent_tr.find(".btn_detail-ship_close").addClass('open');
    });
    $(".btn_detail-ship_close").click(function () { 
         let parent_tr = $(this).parents('.div-bill');
         parent_tr.find(".bill_detail-ship").removeClass('open');
         parent_tr.find(".btn_detail-ship_open").removeClass('move');
         parent_tr.find(".btn_detail-ship_close").removeClass('open');
    });
});
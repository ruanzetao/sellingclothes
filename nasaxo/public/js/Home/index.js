
// create by namnh
function detailProduct($id){
    newUrl = url +'/product?id='+$id;
    window.open(newUrl,'_blank');
}
// lấy danh sách products
function GetProducts(){
    GetHomeWithParam();
    var _token = $('meta[name="_token"]').attr('content');
    urlAjax = url +'/GetViewProducts';
    $.ajax({
        url: urlAjax,
        type:"POST",
        data:{'_token':_token,'bestSeller':pageProduct.bestSeller.value,'pageList':pageProduct.pageList.value,'numberRecord':pageProduct.numberRecord.value,'productCategory':pageProduct.productCategory.value,'nameProduct':pageProduct.nameProduct.value},
        success: function($re){
            divProduct =  $('#productList');
            if($(divProduct)!=null && $(divProduct).length>0){
                $('#productList').append($re);
            }
        }
    });
}
// kiểm tra login
function CheckLogin($result){
    var _token = $('meta[name="_token"]').attr('content');
    urlAjax = url +'/checklogin';
    $.ajax({
        url: urlAjax,
        type:"POST",
        data:{'_token':_token,'0':1,'1':2},
    })
    .done(function($re){
        if($re == '1'){
            $result(true);
        }else{
            $result(false);
        }
    })
    .fail(function(){
        $result(false);
    });
}
// thêm vào giỏ hàng
function addToCart($element){
    $($element).off('click').on('click',function(){
        $idProduct = $(this).data('id');
        $nameProduct = $(this).data('name');
        CheckLogin(function($result){
            if($result){
                var _token = $('meta[name="_token"]').attr('content');
                // alert($idProduct);
                $.ajax({
                    type: 'POST',
                    url: url + '/cart/add',
                    data: {'_token': _token, 'productId':$idProduct},
                })
                .done(function($re) {//nêu thành công
                    if($re =='0'){ 
                        $.notify('Xảy ra lỗi!',{
                            globalPosition: 'bootom left',
                            className: 'error',
                        });
                        return;
                    }
                    // hiển thị thông báo cho người dùng
                    $.notify($nameProduct,{
                        globalPosition: 'bootom left',
                        className: 'success',
                    });
                })
                .fail(function() {
                    console.log("error add to cart");
                });

            }
            else{
                alert('Vui lòng đăng nhập!');
            }
        });
    });
}
// trở về trang home với thuôc tính
function GetHomeWithParam(){
    divProduct =  $('#productList');
    if($(divProduct)==null || $(divProduct).length<=0 ){
        document.getElementById("frmPage").submit();
        return;
    }
}
function clear(isInput=true){
    if(isInput){
        $('#txtSearch').val('');
    }
    pageProduct.pageList.value=0;
    pageProduct.bestSeller.value=0;
    pageProduct.numberRecord.value=12;
    pageProduct.productCategory.value='';
    pageProduct.nameProduct.value ='';
}
function loadScript(){
    var modelContent =$('#homeModal .modal-body');
    // scroll button back to top
    $(window).scroll(function(){
        if($(this).scrollTop() > 400){
            $('#scroll').fadeIn();
        }else{
            $('#scroll').fadeOut();
        }
    });
    // easing scroll
    $('#scroll').off("click").on('click',function(){
        $("html, body").animate({
            scrollTop : 4},
            500,'easeOutQuint');
    });
    // thực hiện gọi form về login
    $('#btnLogin').off("click").on('click',function(){
        var urlAjax=url+'/login';
        $.ajax({
            type:'GET',
            url: urlAjax,
            cache: false,
            success: function($data){
                $(modelContent).html($data);
            }
        });
    });
    // thực hiện tìm kiếm sản phẩm với tên
    $('#btnSearch').off("click").on('click',function(){
        if($('#productList')!=null)
        {
            $('#productList').html('');
        }
        clear(false);
        pageProduct.nameProduct.value = $('#txtSearch').val();
        GetProducts();
    });
    // khi nhấp enter trên thanh tìm kiếm
    $('#txtSearch').off("click").on('keypress',function(e){
        if (e.which == 13) {
            $('#btnSearch').click();
        }
    });
    // LẤY DANH SÁCH THEO MỤC
    $('.category-home').off("click").on('click',function(){
        if($('#productList').length>0){
            $('#productList').html('');
        }
        clear(true);
        pageProduct.productCategory.value=$(this).data('category');
        GetProducts();
    });
    // lay danh sach best seller
    $('#btnBestSeller').off("click").on('click',function(){
        if($('#productList').length>0){
            $('#productList').html('');
        }
        clear();
        pageProduct.bestSeller.value='1';
        GetProducts();
    });
    // logout
    $('#btnLogout').off("click").on('click',function(){
        var _token = $('meta[name="_token"]').attr('content');
        var urlAjax=url+'/login/out';
        $.ajax({
            type:'POST',
            url: urlAjax,
            cache: false,
            data: {'_token':_token},
            success: function($re){
                $('#accountHome').html($re);
                window.location.href=url;
            }
        });
    });
    // profile
    $('#btnProfile').off("click").on('click',function(){
        CheckLogin(function($result){
            if($result){
                // đi tới trang giỏ hàng
                window.location.href=url +'/account';
            }else{
                // thông báo vui lòng đăng nhập
                alert('Vui lòng đăng nhập!');
            }
        });
    });
    // gôt cart
    $('#btnCart').off("click").on('click',function(){
        CheckLogin(function($result){
            if($result){
                // đi tới trang giỏ hàng
                window.location.href=url +'/cart';
            }else{
                // thông báo vui lòng đăng nhập
                alert('Vui lòng đăng nhập!');
            }
        });
    });
}
$(document).ready(function(){
    // lây danh sách products
    pageProduct = {
        'pageList' :document.getElementById('pageList-frm'),
        'numberRecord' :document.getElementById('numberRecord-frm'),
        'productCategory' :document.getElementById('productCategory-frm'),
        'nameProduct' :document.getElementById('nameProduct-frm'),
        'bestSeller': document.getElementById('bestSeller-frm'),
    }
    loadScript();
});

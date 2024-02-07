 /**=====================
     Quantity 2 js
==========================**/
 $(".addcart-button").click(function () {
     $(this).next().addClass("open");
     $(".add-to-cart-box .qty-input").val('1');
     addToCart($(this).val(),1);
     Toast.fire({
        icon: "success",
        title: "Added To Cart",
        showCloseButton: true,
    });
 });

 $('.add-to-cart-box').on('click', function () {
     var $qty = $(this).siblings(".qty-input");
     var currentVal = parseInt($qty.val());
     if (!isNaN(currentVal)) {
         $qty.val(currentVal + 1);
     }
 });

 $('.qty-left-minus').on('click', function () {
     var $qty = $(this).siblings(".qty-input");
     var _val = $($qty).val();
     if (_val == '1') {
         var _removeCls = $(this).parents('.cart_qty');
         $(_removeCls).removeClass("open");
         Toast.fire({
            icon: "error",
            title: "Product Remove From Cart",
            showCloseButton: true,
        });
     }
     var currentVal = parseInt($qty.val());
     if (!isNaN(currentVal) && currentVal > 0) {
         $qty.val(currentVal - 1);
         addToCart($(this).siblings(".qty-input").attr('data-id'),$qty.val());
     }
 });

 $('.qty-right-plus').click(function () {
     if ($(this).prev().val() < 9) {
         $(this).prev().val(+$(this).prev().val() + 1);
         addToCart($(this).prev().attr('data-id'),$(this).prev().val());
     }
 });

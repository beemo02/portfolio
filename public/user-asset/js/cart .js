function addToCart(productId){
    $.ajax({
        url: addCart,
        method: 'POST',
        data: {
            'product_id' : productId,
            'quantity' : 1
        },

        success : function(response){
            if(response.success){
                updateCartCount();
            }
        }
    })
}

function updateCartCount() {
    $.ajax({
        url: cartCount,
        method: 'GET',
        success: function(response) {
            $('#cart-count').text(response.count);
        }
    });
}

$(document).ready(function() {
    updateCartCount();
});
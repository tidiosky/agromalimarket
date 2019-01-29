$('.like').on('click',function (event) {
    event.preventDefault();
    productId = event.target.parentNode.parentNode.dataset['product_id'];
    var isLke = event.target.previousElementSibling == null

    $.ajax({
        url : urlLike,
        method : "POST",
        data : {isLke: isLke, productId : productId}
    })
        .done(function () {
            event.target.innerText = isLke ? event.target.innerText == 'Like' ? 'You like this product' : 'Like' : event.target.innerText == 'Dislike' ? 'You dont like this product' : 'Dislike';
            if (isLke) {
                event.target.nextElementSibling.innerText = 'Dislike'
            }
        })
});
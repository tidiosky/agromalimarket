var postId = 0;
var postBodyElement = 0;
$('.post').find('.interaction').find('.edit').on('click',function (event) {
    event.preventDefault();
    postBodyElement = event.target.parentNode.parentNode.childNodes[1];
    var postBody = postBodyElement.textContent;
    postId = event.target.parentNode.parentNode.dataset['postid'];
    $('#post-body').val(postBody);
    $('#edit-modal').modal()
});
$('#modal-save').on('click',function () {
    $.ajax({
        method: 'POST',
        url: url,
        data: { body:  $('#post-body').val(),PostId: postId, _token: token}
    })
        .done(function (msg) {
            $(postBodyElement).text(['new_body']);
            $('#edit-modal').modal('hide')
        })
});
// $('.post').find('.interaction').find('.edit').on('click',function (e) {
//     e.preventDefault();
//     var postBody = e.target.parentNode.parentNode.childNodes[1].textContent;
//     $('#post-body').val(postBody);
//     $('#edit-modal').modal();
//
// });
//
//
// $('#modal-save').on('click',function () {
//     $.ajax(
//         {
//             url: url,
//             method: "POST",
//             data: {data: $('#post-body').val(), postId: '',_token: token}
//         }
//     )
// .done(function (msg) {
//         console.log(msg['message']);
//     });
// });
$('.like').on('click',function (e) {
    e.preventDefault();
    var isLike = e.target.previousElementSibling == null ;
    postId = event.target.parentNode.parentNode.dataset['postid'];
    $.ajax({
        method: "POST",
        url: urlLike,
        data: {isLike:isLike,PostId: postId, _token: token}
    })
        .done(function () {
            e.target.innerText = isLike ? e.target.innerText === 'Like' ? 'Vous aimez ce post' : 'Aimer' : e.target.innerText === "J'aime pas" ? "Vous n'aimez plus ce post" : "J'aime pas";
            if (!isLike) {
                "Aimer" === e.target.previousElementSibling.innerText;
            } else {
                "J'aime pas" === e.target.nextElementSibling.innerText;
            }
        })
    ;
});
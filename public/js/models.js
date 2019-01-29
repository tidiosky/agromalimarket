const qs = $('#q');
qs.on('keyup',function () {
    const query = $(this).val();
    if (query.length > 0) {
        $.ajax({
            url : path_url_search_prod,
            method : "GET",
            data : {q:query},
            beforeSend: function () {
                $('#spinner').show();
            },
            success : function (data) {
                $('#spinner').hide();
                $('#searchList').html(data).show();
            }
        });
    }else {
        $('#searchList').hide();
    }
});
//Comment ajax

const $submit = $('#submit');
$submit.click(function () {

    const $body = $('#body').val();
    $submit.prop('disabled',true);
    // const item = $(this);
    // const id = item.attr("id");
    if ($body == '') {
        $('#response').html("<span class='text-danger'>Veuillez renseigné votre commentaire</span>");
        $submit.prop('disabled',false);
    }
    else {
        $.post(
            path_url_comment,
            $('#comment_form').serialize(),
            function (data) {
                $('form').trigger("reset");
                $('#response').fadeIn().html(data);
                $submit.prop('disabled',false);
                setTimeout(function () {
                    $('#response').load(path_url_comment).fadeOut("slow")
                }, 5000)
            }
        )
    }
});

//modal product

// (function () {
//
//     $('.pro_mymodal').popover({
//         title:fetchData,
//         html: true,
//     });
//     function fetchData() {
//         var fetch_data = '';
//         var item = $(this);
//         var id = item.attr("id");
//         $.ajax({
//             url: "/product-modal/" +id,
//             method: "GET",
//             async: false,
//             data: {id:id},
//             success: function (data) {
//                 fetch_data = data;
//             }
//         });
//         return fetch_data;
//     }
//
// })();

$('.modal_pro').click('click',function () {
    var fetch_data = '';
    var item = $(this);
    var id = item.attr("id");
    $.ajax({
        url: "/product-modal/" +id,
        method: "GET",
        async: false,
        data: {id:id},
        success: function (data) {
            fetch_data = data;
        }
    });
    return fetch_data;
});
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('#add-more-categorie').on('click', function () {
    $('#categorie-show').modal();
});
//*****************Insert categorie***********
$('.btn-save-categorie').on('click', function (e) {
    e.preventDefault();
    let name = $('#name').val();
    $.post(url_cat, {name:name}, function (data) {
        $('#categorie_id').append($('<option/>', {
             value : data.id,
             text : data.name
        }));
        $('#name').val("");
    });
    $(this).trigger('reset');

});
//***********Product name***************
$('#add-more-product_name').click(function () {
    let categories = $('#categorie_id option');
    let categorie = $('#form-name-create').find('#categorie_id');
    $(categorie).empty();
    $.each(categories, function (i, cat) {
        $(categorie).append($('<option/>', {
            value : $(cat).val(),
            text : $(cat).text()
        }));
    });
    $('#product_name-show').modal();
});
//******************Insert product name-----------
$('#form-name-create').on('submit', function (e) {
    e.preventDefault();
    let data = $(this).serialize();
    let url = $(this).attr('action');
    $.post(url,data, function (data) {
        $('#nom').append($('<option/>', {
            value: data.product_name,
            text : data.product_name
        }));
    });
    $(this).trigger('reset');
});
//*************************************
$('#form-product-create #categorie_id').on('change', function () {
    let categorie_id = $(this).val();
    let nom = $('#nom');
    $(nom).empty();
    $.get(url_get_product_name, { categorie_id : categorie_id }, function (data) {
        console.log(data);
        $.each(data, function (i,l) {
            $(nom).append($('<option/>', {
                value: l.product_name,
                text: l.product_name
            }));
        });

    });
});
//==============Photo=============


$('#browse_file').on('click', function () {
    $('#photo').click();
});

function showFile(fileInput, img, showName) {
    if (fileInput.files[0]) {
        let reader = new FileReader();
        reader.onload = function (e) {
            $(img).attr('src', e.target.result);
        };
        reader.readAsDataURL(fileInput.files[0]);
    }
    $(showName).text(fileInput.files[0].name)
}

$('#photo').on('change', function (e) {
    showFile(this, '#showPhoto')
});
//====================Comment product============

// $('#comment_form-product').on('submit', function (e) {
//     e.preventDefault();
//     let data = $(this).serialize();
//     let response = $('#response-comment');
//     let url = $(this).attr('action');
//     $.post(url,data, function (data) {
//         response.append({
//             text: data.body
//         });
//         console.log(data)
//     });
//     $(this).trigger('reset');
// });
///////////////


function randomData() {
    now = new Date(+now + oneDay);
    value = value + Math.random() * 21 - 10;
    return {
        name: now.toString(),
        value: [
            [now.getFullYear(), now.getMonth() + 1, now.getDate()].join('/'),
            Math.round(value)
        ]
    }
}

var data = [];
var now = +new Date(1997, 9, 3);
var oneDay = 24 * 3600 * 1000;
var value = Math.random() * 1000;
for (var i = 0; i < 1000; i++) {
    data.push(randomData());
}

option = {
    title: {
        text: 'Diagramme'
    },
    tooltip: {
        trigger: 'axis',
        formatter: function (params) {
            params = params[0];
            var date = new Date(params.name);
            return date.getDate() + '/' + (date.getMonth() + 1) + '/' + date.getFullYear() + ' : ' + params.value[1];
        },
        axisPointer: {
            animation: false
        }
    },
    xAxis: {
        type: 'time',
        splitLine: {
            show: false
        }
    },
    yAxis: {
        type: 'value',
        boundaryGap: [0, '100%'],
        splitLine: {
            show: false
        }
    },
    series: [{
        name: '模拟数据',
        type: 'line',
        showSymbol: false,
        hoverAnimation: false,
        data: data
    }]
};

setInterval(function () {

    for (var i = 0; i < 5; i++) {
        data.shift();
        data.push(randomData());
    }

    myChart.setOption({
        series: [{
            data: data
        }]
    });
}, 1000);

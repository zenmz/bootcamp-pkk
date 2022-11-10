$.ajax({
    type: "get",
    url: "/wilayah",
    dataType: "json",
    success: function (response) {
        response.map((value) => {
            $('#provinces').append($('<option>', {
                value: value.id,
                text: value.name
            }));
        })
    }
});


function daerah(jenis, id) {
    let dr

    if (jenis == 'provinces') {
        dr = 'regencies'
    } else if (jenis == 'regencies') {
        dr = 'districts'
    } else if (jenis == 'districts') {
        dr = 'villages'
    }
    $.ajax({
        type: "get",
        url: `https://www.emsifa.com/api-wilayah-indonesia/api/${dr}/${id}.json`,
        dataType: "json",
        success: function (response) {
            console.log(response);
            $(`#${dr}`).children().remove()
            response.map((value) => {
                $(`#${dr}`).append($('<option>', {
                    value: value.id,
                    text: value.name
                }));
            })
        }
    });
}

$('#bayar').click(function (e) {
    e.preventDefault();

    $.ajax({
        type: "get",
        url: "midtrans",
        data: {
            id: 'Sy006',
            harga: 100000,
            metode: 'bca_va'
        },
        dataType: "json",
        success: function (response) {
            snap.pay(response, {
                // Optional
                onSuccess: function (result) {
                    console.log(result);
                },
                // Optional
                onPending: function (result) {
                },
                // Optional
                onError: function (result) {
                }
            });
        }
    });
});

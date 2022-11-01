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

const daerah = ()=>{}

function daerah(jenis, id) {
    let dr

    if (jenis == 'provinces') {
        dr = 'regencies'
    }else if (jenis == 'regencies') {
        dr = 'districts'
    }else if (jenis == 'districts') {
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

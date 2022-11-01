@extends('template')


@section('js')
<script>
    $.ajax({
        type: "get"
        , url: "wilayah"
        , dataType: "json"
        , success: function(response) {
            console.log(response);

            let q = objJsonResp[response.data]

            console.log(q);
        }
    });

</script>
@endsection

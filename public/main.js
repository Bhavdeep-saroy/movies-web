$(document).ready(function() {
    $('#formsubmit').on('submit', function(event) {
        event.preventDefault();
        $.ajax({
            url: "{{ url('api/insert') }}", // Adjust this line to point to the correct URL
            type: 'post',
            data: new FormData(this),
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function(json) {
                if (json['status']) {
                    alert('ok report');
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert('Error: ' + thrownError);
            }
        });
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});
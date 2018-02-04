$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).on('click', '.beer-destroy', function(){
        var destroy_id = $(this).data('id');
        $('#form-destroy-'+destroy_id).submit()
    });

    $(document).on('click', '.brewery-destroy', function(){
        var destroy_id = $(this).data('id');
        $('#form-destroy-'+destroy_id).submit()
    });
    $(document).on('click', '.beer_type-destroy', function(){
        var destroy_id = $(this).data('id');
        $('#form-destroy-'+destroy_id).submit()
    });
});
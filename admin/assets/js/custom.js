$(document).ready(function () {

    $('.delete_product_btn').click(function (e) {
        e.preventDefault();
        
        var id = $(this).val();
        //alert(id);

        swal({
            title: "Are you sure ?",
            text: "Once Deleted , you will not be able to recover this data",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => 
        {
            if (willDelete) 
            {
                $.ajax({
                    method: "POST",
                    url: "code.php",
                    data: {
                        'product_id':id,
                        'delete_product_btn':true
                            },
                    success: function(response) 
                    {
                        if (response == 200)
                        {
                            swal("Success!!","Product deleted successfully","success");
                        }
                        else if( response == 500)
                        {
                            swal("Error","Something went wrong!!", "error" );
                        }
                    }
                        });
            }
            else {
                swal("Your data file is still safe man.?!?!");
            }

        });
    });



});
$(document).ready(function() {
           
      var url  = "http://localhost/web_developer/learn_laravel/koibento/public/admin/";

        $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });

        $('.updateStatus').click( function(event) {
            event.preventDefault();
         
            var str_id = $(this).attr('id');
         
            id = str_id.slice(7);
            $.ajax({

                type: "GET",
                url: url +"updateStatus/"+ id ,
               

                success: function (data) {
                    $("#item-"+id).remove();
                },
                error: function (data) {
                    console.log('Error : ',update_order_html);
                }
            });
        });

        $('.deleteProduct').click( function(event) {

            event.preventDefault();
            var r = confirm("Bạn chắc chắn muốn xóa sản phầm này?");

            if(r == true){
              
                var str_id = $(this).attr('id');
              
                id = str_id.slice(7);

                $.ajax({

                    type: "GET",
                    url: url +"product/delete/"+ id ,
                   

                    success: function (data) {
                        $("#item-"+id).remove();
                    },
                    error: function (data) {
                        console.log('Error : ',data);
                    }
                });
            }
            
        });

      
        $('.deleteCategory').click( function(event) {

            event.preventDefault();
            var r = confirm("Bạn chắc chắn muốn xóa loại sản phẩm này?");

            if(r == true){
              
                var str_id = $(this).attr('id');
              
                id = str_id.slice(7);

                $.ajax({

                    type: "GET",
                    url: url +"category/delete/"+ id ,
                   

                    success: function (data) {
                        $("#item-"+id).remove();
                    },
                    error: function (data) {
                        console.log('Error : ',data);
                    }
                });
            }
            
        });


        $('.deleteUser').click( function(event) {

            event.preventDefault();
            var r = confirm("Bạn chắc chắn muốn xóa người dùng này?");

            if(r == true){
              
                var str_id = $(this).attr('id');
              
                id = str_id.slice(7);

                $.ajax({

                    type: "GET",
                    url: url +"user/deleteUser/"+ id ,
                   

                    success: function (data) {
                        $("#item-"+id).remove();
                    },
                    error: function (data) {
                        console.log('Error : ',data);
                    }
                });
            }
            
        });
});
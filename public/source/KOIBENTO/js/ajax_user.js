$(document).ready(function() {
            
    var url  = "http://localhost/web_developer/learn_laravel/koibento/public/user/";

   

        $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
        
        // execute add to cart in product
        $('.add_to_cart').click( function(event) {
            event.preventDefault();

            

            var id = $(this).data('id');
         
            $.ajax({

            type: "GET",
            url: url +"cart/add_cart/"+ id ,
           

            success: function (data) {
              
                $('#quanity').text(data['totalQty']);

            },
            error: function (data) {
                console.log('Error : ',data);
            }
            });
        });

         // execute add to cart in product detail
        $("#add-to-cart").click(function(event){
            event.preventDefault();
          
            var id = $(this).data('id');
                
          
            var quanity = $(".add_more_product").val();
            alert(quanity);
                   
            $.ajax({

                type: "GET",
                url: url +"cart/add_cart/" +id,
                dataType: "json",
                data : {quanity : quanity},
                
                   
                success: function (response) {
                  
                 $('#quanity').text(response['totalQty']);
                   
                },
                error: function (response) {
                    console.log('Error : ',response);
                }
            });
           
          
        });

        // catch event when quanity input change to add to cart
        $(".cart_quantity").change(function(event){
            event.preventDefault();

            var str_id = $(this).attr('id');
            id = str_id.slice(14);
            var qty = $("#cart_quantity-"+id).val();
         
           
          

            $.ajax({

                type: "GET",
                url: url +"cart/updateCart/" +id+"/"+qty,
             

                success: function (data) {
                  
                   
                    $("#cart_quantity-"+id).val(data['qty']);
                    $("#total_price-"+id).text(data['price']);               
                    $('#quanity').text(data['totalQty']);
                    $('#subTotal').text(data['totalPrice']);
                    $('#totalPrice').text(data['totalPrice']);
                   
                },
                error: function (data) {
                    console.log('Error : ',data);
                }
            });
           
          
        });

        // catch event when up button change to add to cart
        $(".up").click(function(event){
            event.preventDefault();

            var str_id = $(this).attr('id');
            id = str_id.slice(3);
            var qty = $("#cart_quantity-"+id).val();
            qty =parseInt(qty) + 1;
           
          

            $.ajax({

                type: "GET",
                url: url +"cart/updateCart/" +id+"/"+qty,
             

                success: function (data) {
                  
                   
                    $("#cart_quantity-"+id).val(data['qty']);
                    $("#total_price-"+id).text(data['price']);               
                    $('#quanity').text(data['totalQty']);
                    $('#subTotal').text(data['totalPrice']);
                    $('#totalPrice').text(data['totalPrice']);
                   
                },
                error: function (data) {
                    console.log('Error : ',data);
                }
            });
           
          
        });
        // catch event when down button change to add to cart
        $(".down").click(function(event){
            event.preventDefault();

            var str_id = $(this).attr('id');
            id = str_id.slice(5);
            var qty = $("#cart_quantity-"+id).val();

            if(qty > 1){
                qty =parseInt(qty) - 1;

                $.ajax({

                    type: "GET",
                    url: url +"cart/updateCart/" +id+"/"+qty,
                 

                    success: function (data) {
                     
                        $("#cart_quantity-"+id).val(data['qty']);
                        $("#total_price-"+id).text(data['price']);               
                        $('#quanity').text(data['totalQty']);
                        $('#subTotal').text(data['totalPrice']);
                        $('#totalPrice').text(data['totalPrice']);
                        
                    },
                    error: function (data) {
                        console.log('Error : ',data);
                    }
                });
            }
                     
          
        });

        // execute to delete item from cart

         $(".removeCart").click(function(event){
            event.preventDefault();
        
            var str_id = $(this).attr('id');
            id = str_id.slice(7);
          
             var r = confirm("Bạn chắc chắn muốn xóa sản phầm này?");
          
            if(r ==true){
                $.ajax({

                        type: "GET",
                        url: url +"cart/delete_cart/" +id,
                     

                        success: function (data) {
                          
                           
                            $("#item-"+id).remove();
                            $('#quanity').text(data['totalQty']);
                            $('#subTotal').text(data['totalPrice']);
                            $('#totalPrice').text(data['totalPrice']);
                           
                        },
                        error: function (data) {
                            console.log('Error : ',data);
                        }
                });
            }
                               
        });

        // caculate fee ship when user has a address and logged in
        if($("#address").val()){
          

            
              
            var address = $("#address").val();   
             
            
            $.ajax({

                type: "GET",
                url: url +"cart/feeShip/" + address,
             

                success: function (data) {
                                     
                   
                if(data['fee']){

                   
                   $("#feeShip").text(data['fee']);
                    $("#fee_ship").val(data['fee']);
                   
                   var price =$("#demoPrice").text() ;
                
                   var totalPrice = parseInt(data['fee']) + parseInt(price);
                   
                   $("#total_price").text(totalPrice);
                   
                  

                }else{

                 }
                   
                },
                error: function (data) {
                    console.log('Error : ',data);
                }
            });
            
        }
        // caculate fee ship when don't log in
        $("#address").change(function(event){
             event.preventDefault();

           
            
               
             var address = $("#address").val();   
              
            
             $.ajax({

                 type: "GET",
                 url: url +"cart/feeShip/" + address,
              

                 success: function (data) {
                                      
                    if(data['fee']){

                                           
                        
                        $("#feeShip").text(data['fee']);
                        $("#fee_ship").val(data['fee']);

                      
                        var price =$("#demoPrice").text() ;
                       
                        var totalPrice = parseInt(data['fee']) + parseInt(price);
                        
                        $("#total_price").text(totalPrice);
                     
                        
                    }else{
                        window.location =  url+'page-error-403';
                    }
                   
                     
                    
                 },
                 error: function (data) {
                     console.log('Error : ',data);
                 }
             });
            
           
        });

});
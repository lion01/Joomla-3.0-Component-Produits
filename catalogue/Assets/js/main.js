$(document).ready(function(){
                  var item; 
                  $('.add').click(function(event){
                                  
                                  event.preventDefault();
                                  item = $(this);
                                  //start xhr request//
                                  
                                  var randomToken = Math.random('10','100');
                                  $.get($(this).attr('href')+ '&?token=' + randomToken,function(data) {
                                        $(location).attr('href','index.php');
                                        alert(data.message);
                                        },"json");
                                  return false;
                                
                                         
                               
                                  /*$.post({
                                         url : "index.php?addpanier&id="+item,
                                         type : "post",
                                         success : function(addItem) {
                                         alert("?addpanier&id="+item);
                                         },
                                          error:function(){
                                         alert('error');
                                         }
                                         
                                  
                                  });*/
                    });
                   /***
                        quantité produits
                    ***/
                  $('.delproducts').click(function(event){
                                  
                                  event.preventDefault();
                                
                                  //start xhr request//
                                  
                                  var randomToken = Math.random('10','100');
                                 
                                  $.get($(this).attr('href')+ '&?token=' + randomToken,function(data) {
                                        $(location).attr('href','?panier&token='+randomToken);
                                        alert(data.message);
                                        },"json");
                                  return false;
                                   
    
    
                  });
                  /***
                      on change select quantity **/
                  $('.selquantity').change(function(){
                                     alert("quantité");
                                           var randomToken = Math.random('10,100');
                                           var quantity = $(this).val();
                                           $.get('?addquantity&id='+$(this).attr('id')+'&number='+quantity+'&?token=' + randomToken,function(data) {
                                                 $(location).attr('href','?panier&token='+randomToken);
                                                 alert(data.message);
                                                 },"json");
                                           
                                           return false;
                                           console.log("quantité"+$(this).val());
                                           
                                           });
                });
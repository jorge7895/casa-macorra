$(function(){
 //funcion de jquery
    

    $('.buttonmodal').mouseenter(function(){
        if($(this).attr('data-id') != null){
            id = $(this).attr('data-id'); 
        }else{
            id = 0;
        }
        console.log(id);
        
        $(this).click(function (){
            console.log(id);
            $('#modal'+id).modal('show')
                       .find('#modalContent'+id)
                       .load($(this).attr('value'));
         });
    });
});
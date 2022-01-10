$(function(){

    $('#create_form').on('submit' , function(e){
      e.preventDefault();

      $.ajax({
        url:$(this).attr('action'),
        method:$(this).attr('method'),
        data:new FormData(this),
        type:'POST',
        dataType:'json',
        processData: false,
        contentType: false,
        cache: false,
        beforeSend:function()
        {
            $(document).find('span.error-text').text('');
        },
        success:function(data){
            if(data.status == 0 )
            {
                $.each(data.error, function(prefix , val){
                    $('span'+prefix+'_error').text(val[0]);
                });
            }else{
                $('#create_form')[0].reset();
                alert(data.msg);

            }
        }
        });
    });

    

});
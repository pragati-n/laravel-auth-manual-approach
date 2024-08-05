
jQuery(document).on("submit","#frm_login",function(e){
    e.preventDefault();
    var form = $(this);
    var actionUrl = '/authenticate';

    $.ajaxSetup({
        headers: {
           'X-CSRF-TOKEN': jQuery(form).find('input[name="_token"]').val()
        }
    });
    
    $.ajax({
        type:"POST",
        url:actionUrl,
        data:form.serialize(),
        success:function(data)
        {
            if(data.status =='success')
            {
            console.log(data)
            console.log('data.redirect_url')
            console.log(data.redirect_url)
                window.location.href = data.redirect_url;
            }
            else
            {
                $('#login_error').show().html(data.error_msg);
            }
        },
        error:function(data){
           
        }
    })
});


jQuery(document).on("submit","#frm_register",function(e){
    e.preventDefault();
    var form = $(this);
    var actionUrl = '/register';

    $.ajaxSetup({
        headers: {
           'X-CSRF-TOKEN': jQuery(form).find('input[name="_token"]').val()
        }
    });

    $.ajax({
        type:"POST",
        url:actionUrl,
        data:form.serialize(),
        success:function(data){
            location.href = '/login';
        },
        error:function(response){
          
            $('#register_error').show().html(response['responseText']);
        }
    })
});

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




jQuery(document).on("click",'#btn_delete',function(e){
    e.preventDefault();
    list_form = jQuery(this).closest('form')
    id = jQuery(this).attr('data-attr');
    console.log(list_form)
    console.log(jQuery(list_form).find('input[name="_token"]').val())
    $.ajaxSetup({
        headers: {
           'X-CSRF-TOKEN': jQuery(list_form).find('input[name="_token"]').val()
        }
     });
    jQuery.ajax({

        type:"POST",
        url:"/posts/"+id,
        data:{
            _method: "DELETE",
        },
        success:function(response){
            $('.error_msg').html('<div class="alert alert-success"> '+response+'</div>');
           //$(list_form).find('tr').remove()
            console.log($(list_form).parents('tr'))
        }
    });
});

jQuery(document).on("click","#btn_save",function(e){

    e.preventDefault();
    list_form = jQuery(this).closest('form');
    obj = jQuery(this);
    $.ajaxSetup({
        headers: {
           'X-CSRF-TOKEN': jQuery(list_form).find('input[name="_token"]').val()
        }
     });
    
    jQuery.ajax({

        type:"POST",
        url:"/save_post1",
        data:{
            //jQuery(list_form).serialize()
            'id':jQuery(list_form).find('input[name="post_id"]').val(),
            'post_name':jQuery(list_form).find('input[name="post_name"]').val(),
            'post_detail':jQuery(list_form).find('textarea[name="post_detail"]').val(),
            'post_edit':jQuery(list_form).find('input[name="_method"]').val(),
        },
        success:function(response){
           $('.error_msg').html('<div class="alert alert-success"> '+response.message+'</div>');
          
            console.log(response);
        },
        error: function(response) {
            $('.error_msg').html('<div class="alert alert-danger"> '+response.statusText+'</div>');
            console.log("===block");
            console.log(response.statusText);
        }
    });

})
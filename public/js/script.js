
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
        success:function(data){
            console.log("response =" +data)
        }
    })
});
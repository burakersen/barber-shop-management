$(document).ready(function(){
    $.ajax_register = function(formData) {
        $.ajax({
            type: "POST",
            url:  "/barbershop/ajax_data",
            data: formData,
            processData: false,
            contentType: false,
            dataType: "json",
            success: function(response) {
                if(response.status=='success') 
                    $.swallSuccess(response.title, response.text);
                else
                    $.swallError(response.title, response.text);
            }
        });
    }

    $.ajax_signin = function(formData) {
        $.ajax({
            type: "POST",
            url:  "/barbershop/ajax_data",
            data: formData,
            processData: false,
            contentType: false,
            dataType: "json",
            success: function(response) {
                if(response.status=='success'){
                    setTimeout(function(){ location.reload(); }, 1000);
                    $.swallSuccess(response.title, response.text);
                }
                else
                    $.swallError(response.title, response.text);
            }
        });
    }

    $.ajax_admin_signin = function(formData) {
        $.ajax({
            type: "POST",
            url:  "/barbershop/ajax_data",
            data: formData,
            processData: false,
            contentType: false,
            dataType: "json",
            success: function(response) {
                if(response.status=='success'){
                    setTimeout(function(){ location.reload(); }, 1000);
                    $.swallSuccess(response.title, response.text);
                }
                else
                    $.swallError(response.title, response.text);
            }
        });
    }

    $.ajax_barber_signin  = function(formData) {
        $.ajax({
            type: "POST",
            url:  "/barbershop/ajax_data",
            data: formData,
            processData: false,
            contentType: false,
            dataType: "json",
            success: function(response) {
                if(response.status=='success'){
                    setTimeout(function(){ location.reload(); }, 1000);
                    $.swallSuccess(response.title, response.text);
                }
                else
                    $.swallError(response.title, response.text);
            }
        });
    }

    $.timeSlots = function(date, b_id) {
        $.ajax({
            type: "POST",
            url:  "/barbershop/ajax_data",
            dataType: "json",
            data:{operation:"timeSlots", date:date, b_id:b_id},
            success: function(response) {
                if(response.status=='success'){
                    $("#time").html(response.item); 
                    $('#reservationFormModal').modal('show');
                }
            }
        });
    }

    $.ajax_make_reservation = function(formData){
        $.ajax({
            type: "POST",
            url:  "/barbershop/ajax_data",
            data: formData,
            processData: false,
            contentType: false,
            dataType: "json",
            success: function(response) {
                $('#reservationFormModal').modal('hide');
                if(response.status=='success')
                    $.swallSuccess(response.title, response.text);
                else
                    $.swallError(response.title, response.text);
            }
        });
    }

});
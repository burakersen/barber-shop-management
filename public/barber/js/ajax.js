$(document).ready(function(){
    $.day_detatil = function(date, b_id) {
        $.ajax({
            type: "POST",
            url:  "/barbershop/barber/ajax_data",
            dataType: "json",
            data:{operation:"barber_dayDetail", date:date, b_id:b_id},
            success: function(response) {
                if(response.status=='success'){
                    $("#time").html(response.item); 
                    $('#reservationFormModal').modal('show');
                }
            }
        });
    }
});
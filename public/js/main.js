$(document).ready(function(){
    $("#registerForm").submit(function(event){
        $.ajax_register(new FormData(this));
        event.preventDefault();
    });

    $("#signinForm").submit(function(event){
        $.ajax_signin(new FormData(this));
        event.preventDefault();
    });

    $("#signinAdminForm").submit(function(event){
        $.ajax_admin_signin(new FormData(this));
        event.preventDefault();
    });

    $("#signinBarberForm").submit(function(event){
        $.ajax_barber_signin(new FormData(this));
        event.preventDefault();
    });

    

    $("#reservationForm").submit(function(event) {
        $.ajax_make_reservation(new FormData(this)); 
        event.preventDefault();
    });
    

    const timeInput = $('#timeInput');
    const times = $('.times');
    const date = $('#date');
    const dateInput = $('#dateInput');


    $('.book').click(function(event){
        event.preventDefault();
        var href = $(this).attr('href').split('=');

        var date_href = href[1].split('&')[0];
        var b_id_href = href[2];

        timeInput.val('');
        date.html(date_href);
        dateInput.val(date_href);

        $.timeSlots(date_href, b_id_href);
    });

    $("body").on("click", ".times", function() {
        let item = $(this);

        times.removeClass('activeTime');

        timeInput.val(item.text());
        item.addClass('activeTime');
    });
});
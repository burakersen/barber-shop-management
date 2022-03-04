$(document).ready(function(){
    $('.barber-see').click(function(event){
        event.preventDefault();
        var href = $(this).attr('href').split('=');

        var date_href = href[1].split('&')[0];
        var b_id_href = href[2];

        $('#timeInput').val('');
        $('#date').html(date_href);
        $('#dateInput').val(date_href);

        $.day_detatil(date_href, b_id_href);
    });
});
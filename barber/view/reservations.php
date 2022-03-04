<?php require barber_view('static/header'); ?>

<div class="container">                       
    <div class="row">
        <div class="col-12">
            <?=buildBarberCalendar($month, $year, session('barber_login'))?>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="reservationFormModal" tabindex="-1" role="dialog" aria-labelledby="reservationFormModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Reservation : <span id="date"></span></h5>
                <button type="button" class="close btn btn-danger" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <div id="time" class="row mt-2"></div>
        </div>
    </div>  
</div>
<!-- Modal -->

<?php require barber_view('static/footer'); ?>
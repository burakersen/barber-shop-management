<?php require view('static/header'); ?>

<?php if($visibleBarbers) : ?>
    <div class="container d-flex flex-wrap">
        <?php foreach($barbers as $barber): ?>
            <div class="card mx-3 mb-3" style="width: 18rem;">
                <img class="card-img-top" src="<?=public_url().'img/barber.svg'?>" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title"><?=$barber['name'] ?></h5>
                    <?php if(session('c_id')): ?>
                        <a href="<?=site_url().'reservation?barber='.$barber['b_id']?>" class="btn btn-primary">Make Reservation</a>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php else: ?> 
<div class="container">                       
    <div class="row">
        <div class="col-12">
            <?=buildCalendar($month, $year, $barber['b_id'])?>
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
            <form action="" method="post" id="reservationForm">
                <input type="hidden" name="operation" value="makeReservation">
                <input type="hidden" name="b_id" value="<?=$barber['b_id']?>">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="dateInput">Date</label>
                                <input type="text" readonly name="date" id="dateInput" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="timeInput">Time</label>
                                <input type="text" readonly name="time" id="timeInput" class="form-control" required placeholder="Please Select From Bottom">
                            </div>
                            <div class="form-group">
                                <label for="nameInput">Barber Name</label>
                                <input type="text" readonly name="name" id="nameInput" class="form-control" placeholder="<?=$barber['name']?>">
                            </div>
                            <div class="form-group">
                                <label for="serviceInput">Services</label>
                                <select id="serviceInput" name="s_id" class="form-control" required>
                                    <?php foreach($services as $service): ?>
                                    <option value="<?=$service['s_id']?>"><?=$service['name']?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Select Time</label>
                                <div id="time" class="row mt-2"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>  
</div>
<!-- Modal -->
<?php endif; ?> 
<?php require view('static/footer'); ?>
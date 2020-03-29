
<div class="modal" id="modalCalendar" tabindex="-1" role="dialog" aria-labelledby="titleModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h3 class="modal-title" id="titleModal">titelModal</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div id="message"></div>
                <form id="formEvent">
                    <div class="form-group row">
                        <label for="title" class="col-sm-4 col-form-label">Tisch Nummer</label>
                        <div class="col-sm-8">
                            <input type="text" name="title" class="form-control" id="title" readonly >
                            <input type="hidden" name="id">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-4 col-form-label">Name</label>
                        <div class="col-sm-8">
                            <input type="text" name="name" class="form-control" id="name" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="start" class="col-sm-4 col-form-label">Anfangs Datum</label>
                        <div class="col-sm-8">
                            <input type="text" name="start" class="form-control date-time" data-mask="00/00/0000 00-00-00"  id="start"readonly >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="end" class="col-sm-4 col-form-label">End Datum</label>
                        <div class="col-sm-8">
                            <input type="text" name="end" class="form-control date-time" data-mask="00/00/0000 00-00-00" id="end" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="NumberOfPeople" class="col-sm-4 col-form-label">Personen</label>
                        <div class="col-sm-8">
                            <input type="text" name="NumberOfPeople" class="form-control" id="NumberOfPeople" readonly >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="phone" class="col-sm-4 col-form-label">Telefon</label>
                        <div class="col-sm-8">
                            <input type="text" name="phone" class="form-control" id="phone" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-4 col-form-label">Email</label>
                        <div class="col-sm-8">
                            <input type="email" name="email" class="form-control" id="email" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="color"  class="col-sm-4 col-form-label">Tischfarbe</label>
                        <div class="col-sm-8">
                            <input type="color" name="color" class="form-control w-25" id="color" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="description" class="col-sm-4 col-form-label">Bemerkung</label>
                        <div class="col-sm-8">
                            <textarea name="description" id="description" cols="30" rows="4" readonly></textarea>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger deleteEvent">Delete</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>

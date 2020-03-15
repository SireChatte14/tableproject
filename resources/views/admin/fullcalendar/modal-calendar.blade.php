
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
                <form id="formEvent">
                    <div class="form-group row">
                        <label for="title" class="col-sm-4 col-form-label">Name</label>
                        <div class="col-sm-8">
                            <input type="text" name="title" class="form-control" id="title" >
                            <input type="text" name="id">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="start" class="col-sm-4 col-form-label">von</label>
                        <div class="col-sm-8">
                            <input type="text" name="start" class="form-control date-time" id="start" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="end" class="col-sm-4 col-form-label">bis</label>
                        <div class="col-sm-8">
                            <input type="text" name="end" class="form-control date-time" id="end" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="color" class="col-sm-4 col-form-label">Tisch</label>
                        <div class="col-sm-8">
                            <input type="color" name="color" class="form-control" id="color" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="description" class="col-sm-4 col-form-label">Bemerkung</label>
                        <div class="col-sm-8">
                            <textarea name="description" id="description" cols="30" rows="4"></textarea>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger deleteEvent">Delete</button>
                <button type="button" class="btn btn-primary saveEvent">Save</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>

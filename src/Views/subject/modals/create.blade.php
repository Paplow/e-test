<div class="modal fade" id="create_subject">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"
                        aria-hidden="true">&times;
                </button>
                <h4 class="modal-title">Create Subject</h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('subject.store') }}" method="post" role="form" id="subject_form">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Subject Name">
                    </div>
                    <div class="form-group">
                        <label for="time">Time</label>
                        <input type="text" class="form-control" name="time" id="time" placeholder="Time in minutes">
                        <span class="help-block">Time in minutes (e.g 20 for 20 minutes) and so on.</span>
                    </div>
                    <div class="form-group">
                        <label for="desc">Description</label>
                        <textarea class="form-control" name="desc" id="desc"
                                  maxlength="255" placeholder="Description"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary"
                        onclick="document.getElementById('subject_form').submit();">Create</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
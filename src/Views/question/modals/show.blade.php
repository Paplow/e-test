<div class="modal fade" id="create_question">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"
                        aria-hidden="true">&times;
                </button>
                <h4 class="modal-title">Create Question</h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('question.store', $subject->slug) }}" method="post" role="form" id="question_form">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="type">Types</label>
                        <select class="form-control" name="type" id="type" required>
                            <option value="">-- Pick one --</option>
                            <option value="text">Text</option>
                            <option value="radio">Radio</option>
                            <option value="checkbox">Checkbox</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="question">Question</label>
                        <input class="form-control" name="question" id="question"
                               maxlength="255" placeholder="Question">
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary"
                        onclick="document.getElementById('question_form').submit();">Create</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

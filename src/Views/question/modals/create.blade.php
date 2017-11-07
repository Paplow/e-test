<div class="modal fade" id="create_option">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"
                        aria-hidden="true">&times;
                </button>
                <h4 class="modal-title">Create Options</h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('option.store', $question->id) }}" method="post" role="form" id="option_form">
                    {{ csrf_field() }}

                    @if($question->type !== 'text')
                        <div class="form-group">
                            <label for="a">A</label>
                            <input type="text" class="form-control" name="a" id="a" placeholder="Option A">
                        </div>
                        <div class="form-group">
                            <label for="b">B</label>
                            <input type="text" class="form-control" name="b" id="b" placeholder="Option B">
                        </div>
                        <div class="form-group">
                            <label for="c">C</label>
                            <input type="text" class="form-control" name="c" id="c" placeholder="Option C">
                        </div>
                    @endif
                    <div class="form-group">
                        <label for="answer">Answer</label>
                        <input type="text" class="form-control" name="answer" id="answer"
                               placeholder="{{ ($question->type !== 'text') ? 'A or B or C or A,B' : 'The exact answer' }}">
                        @if($question->type !== 'text')
                            <span class="help-block">Input "A,B" if the answers are two options like in the case of radio button.</span>
                        @endif
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary"
                        onclick="document.getElementById('option_form').submit();">Create</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
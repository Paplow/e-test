@extends('e-test::layouts.app')
@section('title', $subject->name)
@section('content')
    <!-- Header -->
    <section class="section header">
        <h1 class="bigtitle">{{ $subject->name }}</h1>
        <h5>You have <b>{{ $subject->duration }}minutes</h5>
    </section>

    <!-- Content -->
    <main class="main" role="main">

        <section class="section">
            <div class="container">
                <div class="row">
                    <article class="contact-form clearfix">
                        <div class="col-sm-10 col-sm-offset-1">
                        <form action="{{ route('test.finish', $subject->slug) }}" id="myForm" role="form" data-toggle="validator" method="post"
                              accept-charset="utf-8">
                            {{ csrf_field() }}
                            <!-- SmartWizard html -->
                            <div id="smartwizard">
                                <ul>
                                    @foreach($subject->questions as $question)
                                        <li><a href="#step-{{ $question->id }}">Qst.{{ $question->id }}<br/>
                                                {{--<small>Answer</small>--}}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                                    <div>
                                        @foreach($subject->questions as $question)
                                        <div id="step-{{ $question->id }}">
                                            <h2>{{ $question->question }}</h2>
                                            <div id="form-step-{{ $question->id }}" role="form" data-toggle="validator">
                                                <div class="form-group">
                                                    @if($question->type === 'text')
                                                        <textarea class="form-control" name="{{ $question->id }}" id="answer"
                                                                  rows="2" placeholder="Write your answer..." maxlength="1000"
                                                                  required autofocus></textarea>
                                                    @elseif($question->type === 'radio')
                                                        <label>
                                                            <input type="{{ $question->type }}" name="{{ $question->id }}"
                                                                   id="a" value="a"> {{ $question->option->a }}
                                                        </label> <br>
                                                        <label>
                                                            <input type="{{ $question->type }}" name="{{ $question->id }}"
                                                                   id="b" value="b"> {{ $question->option->b }}
                                                        </label> <br>
                                                        <label>
                                                            <input type="{{ $question->type }}" name="{{ $question->id }}"
                                                                   id="c" value="c"> {{ $question->option->c }}
                                                        </label>
                                                    @else
                                                        <label>
                                                            <input type="{{ $question->type }}" name="{{ $question->id }}[]"
                                                                   id="a" value="a"> {{ $question->option->a }}
                                                        </label> <br>
                                                        <label>
                                                            <input type="{{ $question->type }}" name="{{ $question->id }}[]"
                                                                   id="b" value="b"> {{ $question->option->b }}
                                                        </label> <br>
                                                        <label>
                                                            <input type="{{ $question->type }}" name="{{ $question->id }}[]"
                                                                   id="c" value="c"> {{ $question->option->c }}
                                                        </label>
                                                    @endif
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>

                                        </div>
                                        @endforeach
                                    </div>
                            </div>
                        </form>
                        </div>
                    </article>
                </div>
            </div>
        </section>
    </main>

@endsection
@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {

            // Toolbar extra buttons
            var btnFinish = $('<button></button>').text('Finish')
                .addClass('btn btn-info')
                .on('click', function () {
                    if (!$(this).hasClass('disabled')) {
                        var elmForm = $("#myForm");
                        if (elmForm) {
                            elmForm.validator('validate');
                            var elmErr = elmForm.find('.has-error');
                            if (elmErr && elmErr.length > 0) {
                                alert('Oops we still have error in the form');
                                return false;
                            } else {
                                elmForm.submit();
                                return false;
                            }
                        }
                    }
                });
            var btnCancel = $('<button></button>').text('Cancel')
                .addClass('btn btn-danger')
                .on('click', function () {
                    $('#smartwizard').smartWizard("reset");
                    $('#myForm').find("input, textarea").val("");
                });

            // Smart Wizard
            $('#smartwizard').smartWizard({
                selected: 0,
                theme: 'dots',
                transitionEffect: 'fade',
                toolbarSettings: {
                    toolbarPosition: 'bottom',
                    toolbarExtraButtons: [btnFinish/*, btnCancel*/]
                },
                anchorSettings: {
                    markDoneStep: true, // add done css
                    markAllPreviousStepsAsDone: true, // When a step selected by url hash, all previous steps are marked done
                    removeDoneStepOnNavigateBack: true, // While navigate back done step after active step will be cleared
                    enableAnchorOnDoneStep: true // Enable/Disable the done steps navigation
                }
            });

            $("#smartwizard").on("leaveStep", function (e, anchorObject, stepNumber, stepDirection) {
                var elmForm = $("#form-step-" + stepNumber);
                // stepDirection === 'forward' :- this condition allows to do the form validation
                // only on forward navigation, that makes easy navigation on backwards still do the validation when going next
                if (stepDirection === 'forward' && elmForm) {
                    elmForm.validator('validate');
                    var elmErr = elmForm.children('.has-error');
                    if (elmErr && elmErr.length > 0) {
                        // Form validation failed
                        return false;
                    }
                }
                return true;
            });

            $("#smartwizard").on("showStep", function (e, anchorObject, stepNumber, stepDirection) {
                // Enable finish button only on last step
                if (stepNumber == 3) {
                    $('.btn-finish').removeClass('disabled');
                } else {
                    $('.btn-finish').addClass('disabled');
                }
            });

        });
    </script>
@endsection
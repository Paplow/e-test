@extends('e-test::layouts.app')
@section('title', $subject->name)
@section('content')
    <!-- Header -->
    <section class="section header">
        <h1 class="bigtitle">{{ $subject->name }}</h1>
        <h5>Manage questions for {{ $subject->name }} here.</h5>
    </section>

    <!-- Content -->
    <main class="main" role="main">

        <section class="section content">
            <div class="container">
                <div class="row">
                    <article class="contact-form clearfix">
                        <div class="col-sm-2">
                            <div class="btn-group-vertical">
                                <a href="{{ route('subject.index') }}" class="btn btn-default">&laquo; Back</a>
                                <a class="btn btn-primary" data-toggle="modal" href="#create_question">Add Question</a>
                            </div>
                        </div>
                        <div class="col-sm-10">
                            <table class="table table-striped table-hover" id="subject-show-table">
                                <thead>
                                <tr>
                                    <th>Questions</th>
                                    <th>Type</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="3">No records yet!</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </article>
                </div>
            </div>
        </section>

    </main>

    @include('e-test::question.modals.show')
@endsection
@section('scripts')
    <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
    <script>
        $('#subject-show-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route("subject.showData", $subject->slug) }}',
            columns: [
                {data: 'question', name: 'question'},
                {data: 'type', name: 'type'},
                {data: 'options', name: 'options', 'orderable': false, 'searchable': false}
            ]
        });
    </script>
@endsection

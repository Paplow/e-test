@extends('e-test::layouts.app')
@section('title', $subject->name.' users')
@section('content')
    <!-- Header -->
    <section class="section header">
        <h1 class="bigtitle">{{ $subject->name }} Users</h1>
        <h5>Every user that wrote {{ $subject->name }} test</h5>
    </section>

    <!-- Content -->
    <main class="main" role="main">

        <section class="section">
            <div class="container">
                <div class="row">
                    <article class="contact-form clearfix">
                        <div class="col-sm-2">
                            <div class="btn-group-vertical">
                                <a href="{{ route('subject.index') }}" class="btn btn-default">&laquo; Back</a>
                            </div>
                        </div>
                        <div class="col-sm-10">
                            <table class="table table-striped table-hover" id="answer-show-table">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>E-mail</th>
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
@endsection
@section('scripts')
    <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
    <script>
        $('#answer-show-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route("answer.indexData", $subject->slug) }}',
            columns: [
                {data: 'name', name: 'name'},
                {data: 'email', name: 'email'},
                {data: 'options', name: 'options', 'orderable': false, 'searchable': false}
            ]
        });
    </script>
@endsection

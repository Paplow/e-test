@extends('e-test::layouts.app')
@section('title', 'Manage Courses / Subjects')
@section('content')
    <!-- Header -->
    <section class="section header">
        <h1 class="bigtitle">Manage Subjects</h1>
        <h5>Manage all subjects here.</h5>
    </section>

    <!-- Content -->
    <main class="main" role="main">
        <section class="section">
            <div class="container">
                <div class="row">
                    <article class="contact-form clearfix">
                        <div class="col-sm-2">
                            <div class="btn-group-vertical">
                                <a href="{{ route('e-test.index') }}" class="btn btn-default">&laquo; Back</a>
                                <a class="btn btn-primary" data-toggle="modal" href="#create_subject">Add Subject</a>
                            </div>
                        </div>
                        <div class="col-sm-10">
                            <table class="table table-striped table-hover" id="subject-table">
                                <thead>
                                <tr>
                                    <th>Subjects</th>
                                    <th>Duration</th>
                                    <th>Date</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="4">No records yet!</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </article>
                </div>
            </div>
        </section>

    </main>

    @include('e-test::subject.modals.create')
@endsection
@section('scripts')
    <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
    <script>
        $('#subject-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route("subject.indexData") }}',
            columns: [
                {data: 'name', name: 'name'},
                {data: 'duration', name: 'duration'},
                {data: 'date', name: 'date'},
                {data: 'options', name: 'options', 'orderable': false, 'searchable': false}
            ]
        });
    </script>
@endsection

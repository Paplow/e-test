@extends('e-test::layouts.app')
@section('title', $question->question)
@section('content')
    <!-- Header -->
    <section class="section header">
        <h1 class="bigtitle">{{ $question->question }}</h1>
        <h5>Manage options for {{ $question->question }}</h5>
    </section>

    <!-- Content -->
    <main class="main" role="main">

        <section class="section">
            <div class="container">
                <div class="row">
                    <article class="contact-form clearfix">
                        <div class="col-sm-2">
                            <div class="btn-group-vertical">
                                <a href="{{ route('subject.show', $subject->slug) }}" class="btn btn-default">&laquo; Back</a>
                                @if(empty($question->option))
                                    <a class="btn btn-primary" data-toggle="modal" href="#create_option">
                                        Add {{ ($question->type !== 'text') ? 'Options' : 'Answer' }}</a>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-10">
                            <table class="table table-striped table-hover">
                                <thead>
                                <tr>
                                    @if($question->type !== 'text')
                                        <th>Option A</th>
                                        <th>Option B</th>
                                        <th>Option C</th>
                                    @endif
                                    <th>Answer</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @if($question->type !== 'text')
                                            <td>{{ $question->option->a ?? '' }}</td>
                                            <td>{{ $question->option->b ?? '' }}</td>
                                            <td>{{ $question->option->c ?? '' }}</td>
                                        @endif
                                        <td>{{ ucfirst($question->option->answer ?? 'None') }}</td>
                                        <td>
                                            <a href="#" data-toggle="tooltip" data-placement="top" title="Edit">
                                                <span class="glyphicon glyphicon-edit"></span></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </article>
                </div>
            </div>
        </section>

    </main>

    @include('e-test::question.modals.option')
@endsection

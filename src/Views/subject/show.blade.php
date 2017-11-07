@extends('e-test::layouts.app')
@section('title', $subject->name)
@section('content')
    <!-- Header -->
    <div class="contact-us">
        <header class="site-header" role="banner">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <hgroup class="title-group">
                            <h1 class="bigtitle">{{ $subject->name }}</h1>
                            <h4>Manage questions for {{ $subject->name }}</h4>
                        </hgroup>
                    </div>
                </div>
            </div>
        </header>
    </div>

    <!-- Content -->
    <main class="main" role="main">

        <!-- Contact Form / Address -->
        <section class="section contact">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <!-- Contact Form -->
                        <article class="contact-form clearfix">
                            <div class="col-sm-2">
                                <div class="btn-group-vertical">
                                    <a href="{{ route('subject.index') }}" class="btn btn-default">&laquo; Back</a>
                                    <a class="btn btn-primary" data-toggle="modal" href="#create_question">Add Question</a>
                                </div>
                            </div>
                            <div class="col-sm-9 col-sm-offset-1">
                                <table class="table table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th>Questions</th>
                                        <th>Type</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($questions as $question)
                                        <tr>
                                            <td>{{ $question->question }}</td>
                                            <td>{{ $question->type }}</td>
                                            <td>
                                                <a href="{{ route('question.show', [$subject->slug, $question->id]) }}" data-toggle="tooltip" data-placement="top" title="Add options">
                                                    <span class="glyphicon glyphicon-plus"></span></a> &middot;
                                                <a href="#" data-toggle="tooltip" data-placement="top" title="Edit">
                                                    <span class="glyphicon glyphicon-edit"></span></a> &middot;
                                                <a href="#" data-toggle="tooltip" data-placement="top" title="View">
                                                    <span class="glyphicon glyphicon-remove"></span></a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3">No records yet!</td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </section>

    </main>

    @include('e-test::subject.modals.show')
@endsection

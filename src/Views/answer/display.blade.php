@extends('layouts.master')
@section('title', $user->getFullName().' scores')
@section('content')
    <!-- Header -->
    <div class="contact-us">
        <header class="site-header" role="banner">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <hgroup class="title-group">
                            <h1 class="bigtitle">{{ $user->getFullName() }} Scores</h1>
                            <h4>{{ $user->getFullName() }} test scores</h4>
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
                            <div class="col-sm-2 hidden-xs">
                                <div class="btn-group-vertical">
                                    <a href="{{ route('answer.index') }}" class="btn btn-default">&laquo; Back</a>
                                </div>
                            </div>
                            <div class="col-sm-9 col-sm-offset-1">
                                <table class="table table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th>Question</th>
                                        <th>Answer</th>
                                        <th>Correct</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($subject->questions as $question)
                                        <tr>
                                            <td>{{ $question->question }}</td>
                                            <td>{{ $question->option->answer }}</td>
                                            <td>
                                                @if(strtolower($question->option->answer()->latest('id')->first()->answer) == strtolower($question->option->answer))
                                                    <span style="color: forestgreen" class="glyphicon glyphicon-ok"></span>
                                                @else
                                                    <span style="color: indianred" class="glyphicon glyphicon-remove"></span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href=""><span class="glyphicon glyphicon-edit"></span></a> &middot;
                                                <a href=""><span class="glyphicon glyphicon-remove"></span></a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4">No records yet!</td>
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
@endsection

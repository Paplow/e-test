@extends('e-test::layouts.app')
@section('title', $user->getFullName().' scores')
@section('content')
    <!-- Header -->
    <section class="section header">
        <h1 class="bigtitle">{{ $user->getFullName() }}'s Score</h1>
        <h5>{{ $user->getFullName() }} test scores</h5>
    </section>

    <!-- Content -->
    <main class="main" role="main">

        <section class="section contact">
            <div class="container">
                <div class="row">
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
                                        <td>{{ $question->option->answer ?? 'None' }}</td>
                                        <td>
                                            @if($question->option &&
                                            (strtolower($question->option->answer()->latest('id')->first()->answer) == strtolower($question->option->answer)))
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
        </section>

    </main>
@endsection

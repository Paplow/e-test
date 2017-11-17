@extends('e-test::layouts.app')
@section('title', 'E-Test Dashboard')
@section('content')
    <!-- Header -->
    <div class="contact-us">
        <header class="site-header" role="banner">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <hgroup class="title-group">
                            <h1 class="bigtitle">E-Test Dashboard</h1>
                            <h4>Manage all Courses/Subjects here.</h4>
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
                    <div class="col-md-8 col-md-offset-2">
                        <!-- Contact Form -->
                        <article class="contact-form clearfix">
                            <div class="col-sm-6">
                                <div class="iconbox">
                                    <i class="icon icon-book"></i>
                                    <div class="box">
                                        <a href="{{ route('subject.index') }}"><h4 class="title">Test Subject</h4></a>
                                        <p>Manage all test subjects here.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="iconbox">
                                    <i class="icon icon-new-message"></i>
                                    <div class="box">
                                        <a href="{{ route('answer.index') }}"><h4 class="title">Test Answer</h4></a>
                                        <p>Manage all test answer here.</p>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </section>

    </main>
@endsection

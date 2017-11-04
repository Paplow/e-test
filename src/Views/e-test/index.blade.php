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
                                <a href="{{ route('subject.index') }}">
                                    <div class="iconbox">
                                        <i class="icon icon-book"></i>
                                        <div class="box">
                                            <h4 class="title">Courses/Subject</h4>
                                            <p>Views/Manage all Courses/Subject here.</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-6">
                                <a href="#">
                                    <div class="iconbox">
                                        <i class="icon icon-help"></i>
                                        <div class="box">
                                            <h4 class="title">Questions</h4>
                                            <p>Manage questions here.</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </section>

    </main>
@endsection

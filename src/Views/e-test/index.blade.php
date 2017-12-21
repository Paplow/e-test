@extends('e-test::layouts.app')
@section('title', 'E-Test Dashboard')
@section('content')
    <!-- Header -->
    <section class="section header">
        <h1 class="bigtitle">E-Test Dashboard</h1>
        <h5>The Admin dashboard for e-test package.</h5>
    </section>

    <!-- Content -->
    <main class="main" role="main">

        <section class="section content">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <article class="contact-form clearfix">
                            <div class="col-sm-12">
                                <div class="iconbox">
                                    <i class="icon icon-book"></i>
                                    <div class="box">
                                        <a href="{{ route('subject.index') }}"><h4 class="title">Test Subject</h4></a>
                                        <p>Manage all test subjects here.</p>
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

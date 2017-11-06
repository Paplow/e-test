<!-- Footer -->
<footer class="footer" role="contentinfo">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="social-list">
                    <li><a href="#" class="icon icon-facebook"></a></li>
                    <li><a href="#" class="icon icon-twitter"></a></li>
                    <li><a href="#" class="icon icon-pinterest"></a></li>
                    <li><a href="#" class="icon icon-flickr"></a></li>
                    <li><a href="#" class="icon icon-dribbble"></a></li>
                    <li><a href="#" class="icon icon-behance"></a></li>
                </ul>
                <nav class="foter-navbar" role="navigation">
                    <ul class="footer-nav" role="menubar">
                        <li role="menuitem"><a href="{{ route('job-application.index') }}">Apply for a Job</a></li>
                        <li role="menuitem"><a href="{{ route('about') }}">About</a></li>
                        <li role="menuitem"><a href="{{ route('contact') }}">Contact</a></li>
                    </ul>
                </nav>
                <p class="copyright">&copy; <time datetime="2017">2017</time> {{ config('app.name') }}, All Rights Reserved.</p>
            </div>
        </div>
    </div>
</footer>

<!-- Scripts
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<script src="{{ asset('vendor/e-test/js/app.js') }}"></script>
@include('e-test::extras.sweetalert2')
<script src="{{ asset('vendor/e-test/js/vendor/jquery.appear.js') }}"></script>
<script src="{{ asset('vendor/e-test/js/vendor/slick.min.js') }}"></script>
<script src="{{ asset('vendor/e-test/js/vendor/jquery.countTo.js') }}"></script>
<script src="{{ asset('vendor/e-test/js/vendor/jquery.parallax.min.js') }}"></script>
<script src="{{ asset('vendor/e-test/js/vendor/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('vendor/e-test/js/main.js') }}"></script>

</body>
</html>
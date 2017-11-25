{{--For eTestify Notification--}}
@if (session()->has('etestify') && !empty(session()->get('etestify')))
    <script type="text/javascript">
        $(document).ready(function () {
            swal({
                title: "{{ ucfirst(session()->get('level')) }}!",
                text: "{!! session()->get('message') !!}",
                type: "{{ session()->get('level') }}",
                confirmButtonText: 'OK'
            });
        });
    </script>
@endif

{{--For Displaying Default Notifications--}}
@if (session()->has('errors'))
    <script type="text/javascript">
        $(document).ready(function () {
            swal({
                title: "Oops!",
                html: "<ul style='list-style-type: none'>@foreach ($errors->all() as $message) <li>{{ $message }}</li> @endforeach</ul>",
                type: "error",
                confirmButtonText: 'OK'
            });
        });
    </script>
@endif

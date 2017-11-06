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

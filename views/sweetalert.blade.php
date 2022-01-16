@if (Session::has('sweetalert.alert'))
    <script>
        let config = {!! Session::pull('sweetalert.alert') !!}
        Swal.fire(config)
    </script>
@endif

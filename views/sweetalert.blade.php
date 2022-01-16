@if (Session::has('sweetalert.alert'))
    <script>
        @if (Session::has('sweetalert.content'))
        let config = {!! Session::pull('sweetalert.alert') !!}
            let
        content = document.createElement('div');
        content.insertAdjacentHTML('afterbegin', config.content);
        config.content = content;
        swal(config);
        @else
        swal({!! Session::pull('sweetalert.alert') !!});
        @endif
    </script>
@endif

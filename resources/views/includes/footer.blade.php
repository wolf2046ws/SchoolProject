
@yield('js')

    <script>
        window.jQuery || document.write("<script src='{{ asset('js/jquery.min.js') }}'><\/script>'")
    </script>

    <script src="{{ asset('js/popper.min.js') }}" ></script>
    <script src="{{ asset('js/bootstrap.min.js')}}" ></script>
    <script src="{{ asset('js/feather.min.js') }}"></script>

    <script>
      feather.replace()
    </script>

    <script src="{{ asset('js/dashboard.js') }}"></script>

<!DOCTYPE html>
<html lang="en" dir="ltr">
        <head>
            @include('includes.head')
        </head>
    <body>

        <div class="container">

            <header>
                @include('includes.navbar')
            </header>

            <div>
                @yield('content')
            </div>

            <footer>
                @include('includes.footer')
            </footer>
        </div> <!-- end container -->

    </body>
</html>

<!DOCTYPE html>
<html lang="en" dir="ltr">
        <head>
            @include('includes.head')
        </head>
    <body>

        <div class="container-fluid">


                @include('includes.navbar')
        

            <div>
                @include('includes.messages')
                @yield('content')
            </div>

            <footer>
                @include('includes.footer')
            </footer>
        </div> <!-- end container -->

    </body>
</html>

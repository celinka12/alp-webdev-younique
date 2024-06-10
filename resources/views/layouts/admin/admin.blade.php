<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.admin.components.head')
</head>

<body>
    <div class="wrapper">
        @include('layouts.admin.components.sidebar')

        <div class="main">

            @include('layouts.admin.components.navbar')

            @include('layouts.admin.components.alert')

            <main class="content">
                <div class="container-fluid p-0">
                    @yield('content')
                </div>
            </main>

           @include('layouts.admin.components.footer')
        </div>
    </div>

    @include('layouts.admin.components.script')
</body>

</html>

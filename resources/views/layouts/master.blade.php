<html>
<head>
    <title>App Name - @yield('title')</title>
</head>
<body>
<div class="header">
    @include('partials.main_menu')
</div>
<div class="container">
    @yield('content', 'default value')
</div>

<div class="sidebar">
    @section('sidebar')
        <h2>this is the master sidebar</h2>
    @show
</div>
</body>
</html>
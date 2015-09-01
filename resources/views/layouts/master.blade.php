<html>
<head>
    <title>App Name - @yield('title')</title>
</head>
<body>
<div class="header">

</div>
<div class="container">
    @yield('content', 'default value')
</div>

<div class="sidebar">
    @section('sidebar')
        this is the master sidebar
    @show
</div>
</body>
</html>
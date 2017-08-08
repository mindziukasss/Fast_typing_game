<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <meta charset="UTF-8">
    @include('style')
    <title>Typing game</title>

</head>
<body>



@yield('content')



</body>

@include('scripts')
</html>
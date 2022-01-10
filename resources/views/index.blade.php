<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home Page</title>
</head>
<body>
    <h1>Welcome back : {{Auth::user()->name}}</h1>

    <img src="storage/images/{{Auth::user()->id.'/'.Auth::user()->avatar}}" alt="avatar" width="40">
</body>
</html>
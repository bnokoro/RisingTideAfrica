<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" >
</head>
<body>
    <form method="post" enctype="multipart/form-data" action="/">

    @csrf
    <input type="file" name="file">

    <button type="submit">Submit</button>
</form>
</body>
</html>
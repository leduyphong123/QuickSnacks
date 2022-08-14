<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
   <h1> Hello {{$emaill->email}}</h1>
  <h3>Change your password <a href="http://127.0.0.1:8000/admin/newPassword/{{$emaill->email}}/{{$emaill->password}}"> HERE</a></h3>
</body>
</html>


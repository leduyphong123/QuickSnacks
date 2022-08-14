<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact Form</title>
</head>
<body>
    <h1>Contact Message</h1>
    <p>Name : {{$details['inputName']}}</p>
    <p>Email : {{$details['inputEmail']}}</p>
    <p>Phone : {{$details['inputPhone']}}</p>
    <p>Message : {{$details['inputContent']}}</p>
</body>
</html>
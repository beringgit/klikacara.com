<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
{!! Form::open(['method' => 'POST', 'enctype' => 'multipart/form-data', 'action'  => 'UploadController@uploadPost']) !!}
    {!! Form::file('fileUpload', null, ['multiple' => true]) !!}
    {!! Form::submit('upload!') !!}
{!! Form::close() !!}
</body>
</html>
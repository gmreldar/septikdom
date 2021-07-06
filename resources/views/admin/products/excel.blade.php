@extends('layouts.app')

@section('content')
    <div class="content">
        <form name="form1" action="/public/excel/index.php" enctype="multipart/form-data" method="post">
            <input type="text" name="host" value="{{ env('DB_HOST', '127.0.0.1') }}" hidden/> </br>
            <input type="text" name="user" value="{{ env('DB_USERNAME', 'forge') }}" hidden/> </br>
            <input type="text" name="pass" value="{{ env('DB_PASSWORD', '') }}" hidden/> </br>
            <input type="text" name="db" value="{{ env('DB_DATABASE', 'forge') }}" hidden/> </br>

            <input type="file" name="path" title="Выберите файл"/> </br>
            </br>
            <input type="submit" name="button"/> </br>

        </form>
    </div>


@endsection

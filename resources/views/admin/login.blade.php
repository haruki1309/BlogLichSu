<html>
    <head>
        <meta charset="utf-8">
        <title>Đăng nhập</title>
        <link rel="stylesheet" href="{{asset('css/admin/login.css')}}">
        <link href="https://fonts.googleapis.com/css?family=Alegreya+SC" rel="stylesheet">
    </head>
    <body>
        <form method="post">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <h1>ADMIN</h1>
            <input placeholder="Tên đăng nhập" type="text" required="" name="username">
            <input placeholder="Mật khẩu" type="password" required="" name="password">
            <button type="submit">Đăng nhập</button>
        </form>
    </body>
</html>
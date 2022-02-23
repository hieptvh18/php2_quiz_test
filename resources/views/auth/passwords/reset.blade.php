{{-- form tạo lại mk mới --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Quên mật khẩu</title>
</head>
<body>
    <div class="container">
        <h2>Tạo lại mật khẩu mới</h2>
        <form action="" method="POST">
            <div class="form-group">
                <label for="">Mật khẩu mới</label>
                <input type="text" name="password_new" placeholder="*********" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Nhập lại mật khẩu mới</label>
                <input type="text" name="password_confirm" placeholder="*********" class="form-control">
            </div>
            <button class="btn btn-info" type="submit">Confirm</button>
        </form>
    </div>
</body>
</html>
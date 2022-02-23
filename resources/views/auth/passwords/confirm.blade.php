{{-- form nhập mã code từ mail quên password --}}
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
        <h2>Nhập mã xác nhận từ email của bạn</h2>
        <form action="" method="POST">
            <div class="form-group">
                <label for="">Mã code</label>
                <input type="text" name="code" placeholder="Nhập mã code" class="form-control">
            </div>
            <button class="btn btn-info" type="submit">Submit</button>
        </form>
    </div>
</body>
</html>
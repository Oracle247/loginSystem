<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Authentication</title>
</head>
<body class="">
    <h2>Login</h2>
    <form action="{{route('login')}}" method="POST">
        @if(Session::has('success'))
            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>
        @endif
        @if(Session::has('fail'))
            <div class="alert alert-danger">
                {{Session::get('fail')}}
            </div> 
        @endif
        @csrf
        <div class="form-group">
            <label for="">Email</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Email">
            <span>@error('email') {{$message}} @enderror</span>
        </div>
        <div class="form-group">
            <label for="">Password</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
            <span>@error('password') {{$message}} @enderror</span>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Login</button>
        </div>
        <br>
        <a href="register">Dont have an account? Register Here.</a>
    </form>
</body>
</html>
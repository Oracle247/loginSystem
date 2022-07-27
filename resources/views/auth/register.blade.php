<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Authentication</title>
</head>
<body class="">
    <h2>Register</h2>
    <form action="{{route('register')}}" method="POST">
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
            <label for="">name</label>
            <input type="text" class="form-control" name="name" id="text" placeholder="Enter full name" value="{{old('name')}}">
            <span>@error('name') {{$message}} @enderror</span>
        </div>
        <div class="form-group">
            <label for="">Email</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Enter email" value="{{old('email')}}">
            <span>@error('email') {{$message}} @enderror</span>
        </div>
        <div class="form-group">
            <label for="">Password</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Enter password" value="{{old('password')}}">
            <span>@error('password') {{$message}} @enderror</span>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Register</button>
        </div>
        <br>
        <a href="login">already have an account ? login Here</a>
    </form>
</body>
</html>
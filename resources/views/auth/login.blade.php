<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href="assets/css/login.css" rel="stylesheet">

    <title>Login Page</title>
</head>

<body>
    <div class="box">
        @if (session()->has('message'))
            <div class="text-success">
                {{ session()->get('message') }}
            </div>
        @endif
 

    <div class="logo1">
        <img src="/assets/img/logo.png">
        <h2>Login</h2>
        <form action="{{ route('login-custom') }}" method="POST">
            @csrf
            <div class="inputBox">
                <input type="text" name="pen" required onkeyup="this.setAttribute('value', this.value);"
                    value="">
                <label>Your PENd</label>
            </div>

            <div class="inputBox">
                <input type="password" name="password" required value=""
                    onkeyup="this.setAttribute('value', this.value);" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                    title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
                <label>PASSWORD</label>
            </div>
            <input type="submit" name="sign-in" value="Log In">
        </form>
        <br>
        <div class="d-flex justify-content-center" style="font-weight: bold;">
            <a href="{{ route('register-user') }}"> Haven't registered yet ? </a>
        </div>
    </div>
</body>

</html>

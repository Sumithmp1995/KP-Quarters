<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href="assets/css/login.css" rel="stylesheet">
    <link href="assets/css/bootstrap.css" rel="stylesheet">

    <title>Registration </title>
</head>

<body>
    <div class="box">
        <div class="logo1">
            <img src="/assets/img/logo.png">
            <h2>Registration</h2>
            <form action=" {{ route('register-custom') }}" method="POST">
                @csrf
                <div class="inputBox">
                    <input type="text" name="name" required onkeyup="this.setAttribute('value', this.value);"
                        value={{ old('name') }}>
                    @error('name')
                        <p class="text-red-500 text-xs mt-1"> {{ $message }}</p>
                    @enderror
                    <label>NAME </label>
                </div>

                <div class="inputBox">
                    <input type="text" name="pen" required onkeyup="this.setAttribute('value', this.value);"
                        value="{{ old('pen') }}" pattern="\d{6,6}" title="PEN Should be 6 Digits length">
                    @error('pen')
                        <p class="text-red-500 text-xs mt-1"> {{ $message }}</p>
                    @enderror
                    <label>PEN </label>
                </div>

                <div class="inputBox">
                    <input type="password" name="password" id="myInput" required value=""
                        onkeyup="this.setAttribute('value', this.value);" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                        title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
                    <i class="fa-solid fa-eye" id="eye" onclick="showPassword()"> </i>
                    @error('password')
                        <p class="text-red-500 text-xs mt-1"> {{ $message }}</p>
                    @enderror
                    <label>PASSWORD</label>
                </div>

                <div class="inputBox">
                    <input type="password" name="password_confirmation" required value=""
                        onkeyup="this.setAttribute('value', this.value);" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                        title=" Entered Password does not match, Re-enter Password">
                    @error('password_confirmation')
                        <p class="text-danger"> {{ $message }}</p>
                    @enderror
                    <label for="password_confirmation"> RE-TYPE PASSWORD </label>
                </div>

                <div class="mb-2 dropright">
                    <select name="mother_unit" class="form-select col-md-12"
                        onkeyup="this.setAttribute('value', this.value);" required>
                        <option selected value=""> SELECT YOUR MOTHER UNIT</option>
                        @foreach ($motherUnits as $motherUnit)
                            <option value="{{ $motherUnit->mother_unit }}"> {{ $motherUnit->mother_unit }}</option>
                        @endforeach
                    </select>
                </div>
                <input type="submit" name="sign-up" value="Sign up">
            </form>

            <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                <a href="{{ route('login') }}"> already registered ?</a>
            </div>
        </div>
    </div>


    <!-- show password script -->
    <script>
        function myFunction() {
            var x = document.showPassword("myInput");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>

</body>
</html>

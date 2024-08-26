<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="{{asset('css/login.css')}}" />
</head>
<body>
    <div class="form-structor">
        <form action="{{ route('login/authenticate') }}" method="POST">
            @csrf
        <div class="signup">
            <h2 class="form-title" id="signup"><span>or</span>Sign up</h2>
            <div class="form-holder">
                <input type="text" name= "nama" class="input" placeholder="Name" />
                <input type="email" name="email" class="input" placeholder="Email" />
                <input type="password" name="password" class="input" placeholder="Password" />
            </div>
            <button class="submit-btn">Sign up</button>
        </div>
        </form>

        <form action="{{ route('login/register') }}" method="POST">
            @csrf
        <div class="login slide-up">
            <div class="center">
                <h2 class="form-title" id="login"><span>or</span>Log in</h2>
                <div class="form-holder">
                    <input type="email" name="email" class="input" placeholder="Email" />
                    <input type="password" name="password" class="input" placeholder="Password" />
                </div>
                <button class="submit-btn">Log in</button>
            </div>
        </div>
        </form>
    </div>
    <script src="{{asset('js/login.js')}}"></script>
</body>
</html>
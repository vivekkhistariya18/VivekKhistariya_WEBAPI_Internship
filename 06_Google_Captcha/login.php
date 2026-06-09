<!DOCTYPE html>
<html>
<head>
    <title>Login Form</title>

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:Arial, sans-serif;
        }

        body{
            height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
            background:#f4f4f4;
        }

        .login-box{
            width:350px;
            background:#fff;
            padding:30px;
            border-radius:10px;
            box-shadow:0 0 10px rgba(0,0,0,0.2);
        }

        .login-box h2{
            text-align:center;
            margin-bottom:20px;
        }

        .form-group{
            margin-bottom:15px;
        }

        .form-group input{
            width:100%;
            padding:10px;
            border:1px solid #ccc;
            border-radius:5px;
        }

        button{
            width:100%;
            padding:10px;
            background:#007bff;
            color:#fff;
            border:none;
            border-radius:5px;
            cursor:pointer;
            font-size:16px;
        }

        button:hover{
            background:#0056b3;
        }

        .msg{
            text-align:center;
            margin-top:10px;
            color:red;
        }
    </style>
</head>
<body>

<div class="login-box">

    <h2>Login</h2>

    <form action="login_process.php" method="post">

        <div class="form-group">
            <input type="text" name="username" placeholder="Username" required>
        </div>

        <div class="form-group">
            <input type="password" name="password" placeholder="Password" required>
        </div>

        <div class="form-group">
            <div class="g-recaptcha"
                 data-sitekey="6LeoGhMtAAAAAPF8fSywiaDDrs-evEZZ7P6lg1hW">
            </div>
        </div>

        <button type="submit">Login</button>

    </form>

</div>

</body>
</html>
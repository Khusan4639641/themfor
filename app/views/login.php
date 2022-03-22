<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="stylesheet" href="/web/assets/styles/login.css">
</head>
<body>
<form method="POST" action="<?=$url?>/login">
    <section>
        <div class="box">
            <div class="form">
                <h2>Login</h2>
                <form action="">
                    <div class="inputBx">
                        <input  id="email" placeholder="имя пользователя..." class="form-control is-invalid @enderror" name="email" required autocomplete="email" autofocus>
                        <img src="/web/assets/images/user.png" style="width:30px;" alt="">
                    </div>
                    <span class="invalid-feedback" role="alert" style="color:red;font-weight:bold;"><?=$errorLogin;?></span><br/>
                    <div class="inputBx">
                        <input id="password" type="password" placeholder="password..." class="form-control is-invalid @enderror" name="password" required autocomplete="current-password">
                        <img src="/web/assets/images/padlock.png" style="width:30px;" alt="">
                    </div>
                    <h6>No robot</h6>
                    <span class="invalid-feedback" role="alert" style="display:inline-block;color:red;font-weight:bold;width: 100%;text-align: right;border: 1px rgba(0,0,0,0) solid"><?=$_SESSION['errorCaptcha'];?></span><br/>
                    <div style="display: flex;">
                        <div class="text-center">
                            <img style="border: 3px solid #ad2dff; padding: 4px;" src="/bootstrap/captcha.php" />
                        </div><br/>
                        <div class='inputBx'>
                            <input class='form-control' style='width:90%;padding-left:0px;margin:7px  10px;text-align:center;' type='text' id='align' onkeyup='Align()' name='norobot' autocomplete='off'>
                            <span class='focus-input100' data-placeholder='Captcha'></span>
                        </div>
                    </div>
                    <span class="invalid-feedback" role="alert" style="color:red;font-weight:bold;"><?=$errorPass;?></span><br/>
                    <div class="inputBx">
                        <input type="submit" value="login"/>
                    </div>
                </form>
            </div>
        </div>
    </section>
</form>
</body>
</html>
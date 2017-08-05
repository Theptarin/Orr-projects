<!DOCTYPE html>
<html >
    <head>
        <meta charset="UTF-8">
        <title>Bootstrap Snippet: Login Form</title>
        <link href="http://10.1.16.4/Orr-projects/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet prefetch" type="text/css"/>
        <link href="http://10.1.16.4/Orr-projects/assets/stylesheet/css/login.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div class="wrapper">
            <form class="form-signin">       
                <h2 class="form-signin-heading">Please login</h2>
                <input type="text" class="form-control" name="username" placeholder="Email Address" required="" autofocus="" />
                <input type="password" class="form-control" name="password" placeholder="Password" required=""/>      
                <label class="checkbox">
                    <input type="checkbox" value="remember-me" id="rememberMe" name="rememberMe"> Remember me
                </label>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>   
            </form>
        </div>
    </body>
</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/login.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div id="form-header" class="col-12">
                <h1 id="title">Login Now</h1>
            </div>
        </div>
        <div class="row">
            <div id="form-tagline" class="col-md-4">
                <div class="form-tagline">
                    <i class="fa fa-lock fa-5x"></i>
                    <h2>Welcome Back!</h2>
                    <p id="description" class="lead">Enter your details to access your account</p>
                </div>
            </div>
            <div id="form-content" class="col-md-8">
                <form id="login-form" method="POST" action="login_action.php"> 
                    <div class="row form-group">
                        <div class="col-sm-3">
                            <label id="email-label" class="control-label" for="email">*Email:</label>
                        </div>
                        <div class="input-group col-sm-9">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon-name"><i
                                        class="fa fa-envelope"></i></span>
                            </div>
                            <input id="txt_email" type="email" class="form-control"
                                placeholder="Please Enter Your Email" name="txt_email" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-3">
                            <label id="password-label" class="control-label" for="password">*Password:</label>
                        </div>
                        <div class="input-group col-sm-9">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon-mail"> <i
                                        class="fa fa-eye-slash toggle-icon" id="togglePassword"></i></span>
                            </div>
                            <input type="password" class="form-control" id="txt_password"
                                placeholder="Please Enter Your Password" name="txt_password" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 submit-button">
                        </div>
                        <div class="col-sm-6 submit-button">
                            <button type="submit" id="submit" name="submit" class="btn btn-default">Login</button>
                            <button type="reset" id="reset" name="reset" class="btn btn-default">Cancel</button>
                        </div>

                    </div>
                </form> 
            </div>
        </div>
    </div>
    <!-- toggle logic -->
    <script>
        const toggle = document.getElementById("togglePassword");
        const password = document.getElementById("txt_password");
        toggle.addEventListener("click", () => {
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);
            toggle.classList.toggle("fa-eye-slash");
            toggle.classList.toggle("fa-eye");
        });
    </script>
</body>

</html>
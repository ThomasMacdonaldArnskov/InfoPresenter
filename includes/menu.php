<!-- The general navigation menu or in other words the buttons without icons... -->
<nav class="navbar navbar-inverse navbar-fixed-top navbar-custom">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li><a class="hidden-custom-semismall menu-header" href="index.php">INFOPRESENTER</a></li>
                <li><a href="index.php#about">About</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span>
                        Sign Up</a></li>
                <li><a href="#" data-toggle="modal" data-target="#login"><span
                                class="glyphicon glyphicon-log-in"></span> Login</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- The modal overlay when you press on the login button! -->
<div class="container">
    <!-- Modal -->
    <div class="modal fade" id="login" role="dialog">
        <div class="modal-dialog modal-sl">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <img src="img/avatar_tmp.png" class="avatar">
                </div>
                <div class="modal-body">
                    <div class="loginmodal-container">

                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input id="username" type="text" class="form-control" name="username"
                                       placeholder="Username" maxlength="25" required>
                            </div>

                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                <input id="password" type="password" class="form-control" name="password"
                                       placeholder="Password" maxlength="50" required>
                            </div>
                            <br/>
                            <button type="submit" class="login-modal-btn" name="login_submit">Login</button>
                        </form>

                        <!--<form method="post" action="<?php //echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                            <input type="text" placeholder="Enter Username" name="username" maxlength="50" required>
                            <input type="password" placeholder="Enter Password" name="password" maxlength="50" required>
                        </form> -->
                        <!--<input type="checkbox" checked="checked" class="login-modal-remember-me-btn"> Remember me -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- The modal overlay when you press on the sign up button! -->
<!-- Removed for ajax purposes when signing in
<div class="container">

    <div class="modal fade" id="signup" role="dialog">
        <div class="modal-dialog modal-sl">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <img src="img/avatar_tmp.png" class="avatar">
                </div>
                <div class="modal-body">
                    <div class="loginmodal-container">

                        <form method="post" action="/WebPresenter/register_complete.php">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input id="username" type="text" class="form-control" name="username"
                                       placeholder="Username" maxlength="25" onchange="checkValidity(this.value)" required>
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                <input id="password" type="password" class="form-control" name="password"
                                       placeholder="Password" maxlength="50" required>
                            </div>
                            <br />
                            <button type="submit" class="login-modal-btn" name="register_submit">Signup</button>
                        </form>


                        <!-- <form method="post" action="/WebPresenter/register_complete.php">
                            <input type="text" placeholder="Enter Username" name="username" maxlength="50" required>
                            <       input type="password" placeholder="Enter Password" name="password" maxlength="50" required>
                            <button type="submit" class="login-modal-btn" name="register_submit">Signup</button>
                            <p>*Note that the bla bla bla</p>
                        </form> -->


<!-- </div>
</div>
</div>
</div>
</div>
</div> -->

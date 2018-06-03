<!doctype html>
<html lang="en">
    <head>
        <meta name="description" content="">
        <meta name="author" content="">
        <title>E-STNK | Digital</title>
        <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="bower_components/bootstrap/dist/css/jumbotron.css" rel="stylesheet">

        <link href="bower_components/Font-Awesome/web-fonts-with-css/css/fontawesome-all.min.css" rel="stylesheet">
    </head>

    <body>
        <nav class="navbar navbar-expand-md navbar-light fixed-top" style="background-color: #e3f2fd;">
            <a class="navbar-brand" href="index.html">
                <img src="bower_components/bootstrap/assets/brand/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top" alt="">
                e-STNK
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Dashboard <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About Product</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact Us</a>
                    </li>
                </ul>
                <div class="text-right">
                    <div class="btn btn-sm btn-primary" onclick="window.location = 'login.php';" title="Login User !"><span class="fas fa-user-lock"></span></div>
                </div>
            </div>
        </nav>

        <main role="main">
            <div class="jumbotron">
                <div class="container">
                    <h1 class="display-3">Login Page</h1>
                    <form action="do_login.php" method="post">
                        <table class="table table-bordered table-primary table-hover">
                            <tr>
                                <td>Username</td>
                                <td>:</td>
                                <td><input
                                        type="text"
                                        name="username"
                                        id="username"
                                        class="form-control"
                                        placeholder="Please input username in here ...."
                                        maxlength="20"
                                        autofocus></td>
                            </tr>
                            <tr>
                                <td>Password</td>
                                <td>:</td>
                                <td><input
                                        type="password"
                                        name="password"
                                        id="password"
                                        class="form-control"
                                        placeholder="Please input password in here ...."></td>
                            </tr>
                            <tr>
                                <td colspan="2" align="right"><button
                                        type="reset"
                                        class="btn btn-sm btn-danger">Clear! <span class="fas fa-redo-alt"></span></button></td>
                                <td><button
                                        type="submit"
                                        class="btn btn-sm btn-success">Login! <span class="fas fa-lock-open"></span></button></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>

        </main>

        <footer class="container fixed-bottom">
            <p>&copy; e-STNK Corps. 2018 - 2019</p>
        </footer>

        <script src="bower_components/jquery/dist/jquery.min.js"></script>
        <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    </body>
</html>

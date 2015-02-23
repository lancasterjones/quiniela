<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"><head>
    <title>The Shaaaaampions</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="description" content="This is a default index page for a new domain."/>
    <style type="text/css">
    body {font-size:10px; color:#777777; font-family:arial; text-align:center;}
        h1 {font-size:64px; color:#FFF; margin: 70px 0 50px 0; background-color: black}
    .container {
      position: fixed;
      top: 0;
      bottom: 0;
      right: 0;
      left: 0;
      height: 100%;
      width: 100%;
      margin: auto;
      background-color: #000
    }
    .container img {
      width:100%
    }
    h1 {
     position: fixed;
    top: 0;
    bottom: 0;
    right: 0;
    left: 0;
    height: 123px;
    width: auto;
    margin: auto;
    }
    </style>
</head>

<body>
    <div class="container"><img src="/img/shampionsbg.jpg" alt="Shampions"/></div>
    <h1><a href="/login.php">Login</a></h1>
    <?php
    include_once 'includes/db_connect.php';
    include_once 'includes/functions.php';

    sec_session_start();

    if (login_check($mysqli) == true) {
        $logged = 'in';
    } else {
        $logged = 'out';
    }
    ?>
    <!DOCTYPE html>
    <html>
        <head>
            <title>Secure Login: Log In</title>
            <link rel="stylesheet" href="styles/main.css" />
            <script type="text/JavaScript" src="js/sha512.js"></script>
            <script type="text/JavaScript" src="js/forms.js"></script>
        </head>
        <body>
            <?php
            if (isset($_GET['error'])) {
                echo '<p class="error">Error Logging In!</p>';
            }
            ?>
            <form action="includes/process_login.php" method="post" name="login_form">
                Email: <input type="text" name="email" />
                Password: <input type="password"
                                 name="password"
                                 id="password"/>
                <input type="button"
                       value="Login"
                       onclick="formhash(this.form, this.form.password);" />
            </form>

    <?php
            if (login_check($mysqli) == true) {
                            echo '<p>Currently logged ' . $logged . ' as ' . htmlentities($_SESSION['username']) . '.</p>';

                echo '<p>Do you want to change user? <a href="includes/logout.php">Log out</a>.</p>';
            } else {
                            echo '<p>Currently logged ' . $logged . '.</p>';
                            echo "<p>If you don't have a login, please <a href='register.php'>register</a></p>";
                    }
    ?>
        </body>
    </html>




    ?>
</body>

</html>

<?php session_start();
?>
<!DOCTYPE html>
<html lang="en">

<!--Database -->
<?php
include 'Registration/Google.php';
?>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script
  src="https://kit.fontawesome.com/64d58efce2.js"
  crossorigin="anonymous"
  ></script>
  <link rel="stylesheet" href="Registration/css/style.css?v=<?php echo time(); ?>" />
  <title>Sign in & Sign up Form</title>

  <style media="screen">
  .logo-img {
    width: min(50vw, 200px);
    width: 80px;
    margin-bottom:15px;
  }
  </style>
</head>
<body>
  <div class="container">
    <div class="forms-container">
      <div class="c1">
        <img id="image" src="images/cover.jpg" alt="">
      </div>
      <div class="signin-signup">
        <form method="POST" class="sign-in-form">
          <?php include 'Registration/mema.php'; ?>
          <img src="images/logo.png" class="logo-img">
          <h2 class="title">Sign in</h2>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" name="users" placeholder="User ID" />
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" name="passs" placeholder="Password" />
          </div>
          <button class="btn solid" name="logs">Sign In</button>
          <p class="social-text">Or Sign in with Google</p>
          <div class="social-media">

            <a href="<?php echo $client->createAuthUrl(); ?>" class="social-icon">
              <i class="fab fa-google"></i>
            </a>

          </div>
        </form>
        <form method="post" class="sign-up-form">
          <?php include 'Registration/register.php'; ?>
          <h2 class="title">Sign up</h2>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="First Name" name = "fname" />
          </div>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="Middle Name" name = "mname" />
          </div>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="Last Name" name = "lname" />
          </div>
          <div class="input-field">
          <i class="fas fa-user"></i>

            <select class="gender" name="gender">
            <option value disabled selected> Select your Gender</option>
            <option value="Female">Female</option>
            <option value="Male">Male</option>
            <option value="Prefer not to say">Prefer not to say</option>
          </select>
          </div>
          <div class="input-field">
            <i class="fas fa-envelope"></i>
            <input type="email" placeholder="Email Address" name="email" />
          </div>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="Phone Number" class= "input-number" name="number" />
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="date" placeholder="Birthday" name="bday"/>
          </div>
          <button  name="regs">SIGN UP</button>

        </form>
      </div>
    </div>

    <div class="panels-container">
      <div class="panel left-panel">
        <div class="content">
          <h3>FEIS: Faculty Evaluation Information System</h3>
          <p>

          </p>
          <button class="btn transparent" id="sign-up-btn">
            Sign up
          </button>
        </div>
        <img src="img/log.svg" class="image" alt="" />
      </div>
      <div class="panel right-panel">
        <div class="content">
          <h3>One of us ?</h3>
          <p>

          </p>
          <button class="btn transparent" id="sign-in-btn">
            Sign in
          </button>
        </div>
        <img src="img/register.svg" class="image" alt="" />
      </div>
    </div>
  </div>

  <script src="Registration/app.js"></script>
</body>
</html>

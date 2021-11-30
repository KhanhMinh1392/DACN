<?php
    include ('../page/connect.php');
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="icon" href="../img/fav-icon.png" type="image/x-icon" />
    <link rel="stylesheet" href="../css/login.css" />
    <title>Sign in & Sign up Form</title>
  </head>
  <body>
  <div id="fb-root"></div>
  <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v12.0&appId=1026708278186391&autoLogAppEvents=1" nonce="jvd8jJLI"></script>

<!--  <script>-->
<!--      window.fbAsyncInit = function() {-->
<!--          FB.init({-->
<!--              appId      : '1026708278186391',-->
<!--              cookie     : true,                     // Enable cookies to allow the server to access the session.-->
<!--              xfbml      : true,                     // Parse social plugins on this webpage.-->
<!--              version    : 'v2.5'           // Use this Graph API version for this call.-->
<!--          });-->
<!---->
<!--          FB.getLoginStatus(function(response) {   // Called after the JS SDK has been initialized.-->
<!--              statusChangeCallback(response);        // Returns the login status.-->
<!--          });-->
<!---->
<!--          function statusChangeCallback(response) {  // Called with the results from FB.getLoginStatus().-->
<!--              // The current login status of the person.-->
<!--              if (response.status === 'connected') {   // Logged into your webpage and Facebook.-->
<!--                  alert('Bạn đã đăng nhập thành công')-->
<!--              } else {                                 // Not logged into your webpage or we are unable to tell.-->
<!--                  // alert('Bạn đã đăng nhập thất bại')-->
<!--              }-->
<!--          }-->
<!---->
<!---->
<!--          function checkLoginState() {               // Called when a person is finished with the Login Button.-->
<!--              FB.getLoginStatus(function(response) {   // See the onlogin handler-->
<!--                  statusChangeCallback(response);-->
<!--              });-->
<!--          }-->
<!---->
<!---->
<!--      };-->
<!---->
<!--      function testAPI() {                      // Testing Graph API after login.  See statusChangeCallback() for when this call is made.-->
<!--          console.log('Welcome!  Fetching your information.... ');-->
<!--          FB.api('/me', function(response) {-->
<!--              console.log('Successful login for: ' + response.name);-->
<!--              document.getElementById('status').innerHTML =-->
<!--                  'Thanks for logging in, ' + response.name + '!';-->
<!--          });-->
<!--      }-->
<!---->
<!--  </script>-->

  <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form action="../PHPfile/Signin.php" class="sign-in-form" method="post">
            <input type="hidden" name="callbackSignin" value="<?php echo $_SERVER["PHP_SELF"]?>">
            <h2 class="title">Đăng Nhập</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Username" name="username" required/>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" name="password" required/>
            </div>
            <input type="submit" value="Login" class="btn solid" />
            <p class="social-text">Forgot your <a href="#">password</a>?</p>

            <div class="social-media">
              <div href="#" class="social-icon">
                <i class="fab fa-facebook-f"></i>
<!--                  <fb:login-button scope="public_profile,email" onlogin="checkLoginState();">-->
<!--                  </fb:login-button>-->
              </div>
              <a href="#" class="social-icon">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
          </form>
          <form action="../PHPfile/Signup.php" class="sign-up-form" method="post">
            <h2 class="title">Đăng Ký</h2>
            <div class="input-field">
                <input type="hidden" name="callbackSignup" value="<?php echo $_SERVER["PHP_SELF"]?>">
                <i class="fas fa-user"></i>
                <input type="text" placeholder="Username" name="username" required />
            </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" placeholder="Email" name="email" required />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" name="password" required />
            </div>
            <input type="submit" class="btn" value="Sign up" />
            <p class="social-text">Or Sign up with social platforms</p>
            <div class="social-media">
              <a href="#" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
          </form>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>Đăng kí tài khoản</h3>
            <p>
              Đăng kí tài khoản để được những ưu đãi của shop giành cho khách
            </p>
            <button class="btn transparent" id="sign-up-btn">
              Sign up
            </button>
          </div>
          <img src="../img/cake-feature/cakepink.png" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>Đăng nhập</h3>
            <p>
              Quay lại trang đăng nhập để đăng nhập tài khoản. Để có thể mua bánh
            </p>
            <button class="btn transparent" id="sign-in-btn">
              Sign in
            </button>
          </div>
          <img src="../img/cake-feature/cakeblack.png" class="image" alt="" />
        </div>
      </div>
    </div>
    <script src="../js/app.js"></script>
  </body>
</html>

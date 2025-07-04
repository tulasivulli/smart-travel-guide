<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>SmartTravel - Register & Login</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
  <link rel="stylesheet" href="login.css" />
</head>
<body>
  <div class="container" id="signup" style="display:none;">
    <h2 class="brand-title">SmartTravel</h2>
    <h1 class="form-title">Register</h1>
    <form method="post" action="register.php">
      <div class="input-group">
        <i class="fas fa-user"></i>
        <input type="text" name="fName" id="fName" placeholder="First Name" required />
        <label for="fName">First Name</label>
      </div>
      <div class="input-group">
        <i class="fas fa-user"></i>
        <input type="text" name="lName" id="lName" placeholder="Last Name" required />
        <label for="lName">Last Name</label>
      </div>
      <div class="input-group">
        <i class="fas fa-envelope"></i>
        <input type="email" name="email" id="email" placeholder="Email" required />
        <label for="email">Email</label>
      </div>
      <div class="input-group">
        <i class="fas fa-lock"></i>
        <input type="password" name="password" id="password" placeholder="Password" required />
        <label for="password">Password</label>
      </div>
      <input type="submit" class="btn" value="Sign Up" name="signUp" />
    </form>
    <div class="links">
      <p>Already Have an Account?</p>
      <button id="signInButton">Sign In</button>
    </div>
  </div>

  <div class="container" id="signIn">
    <h2 class="brand-title">SmartTravel</h2>
    <h1 class="form-title">Sign In</h1>
    <form method="post" action="register.php">
      <div class="input-group">
        <i class="fas fa-envelope"></i>
        <input type="email" name="email" id="email" placeholder="Email" required />
        <label for="email">Email</label>
      </div>
      <div class="input-group">
        <i class="fas fa-lock"></i>
        <input type="password" name="password" id="password" placeholder="Password" required />
        <label for="password">Password</label>
      </div>
      <!-- <p class="recover">
        <a href="#">Recover Password</a>
      </p> -->
      <input type="submit" class="btn" value="Sign In" name="signIn" />
    </form>
    <div class="links">
      <p>Don't have an account yet?</p>
      <button id="signUpButton">Sign Up</button>
    </div>
  </div>

  <script>
    const signUpButton = document.getElementById("signUpButton");
    const signInButton = document.getElementById("signInButton");
    const signUpContainer = document.getElementById("signup");
    const signInContainer = document.getElementById("signIn");

    signUpButton.addEventListener("click", () => {
      signUpContainer.style.display = "block";
      signInContainer.style.display = "none";
    });

    signInButton.addEventListener("click", () => {
      signInContainer.style.display = "block";
      signUpContainer.style.display = "none";
    });
  </script>
</body>
</html>

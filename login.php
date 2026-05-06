<?php
$invalid = 0;

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    include 'C:\xampp\htdocs\25CSR256\Day1\connect.php';

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM register WHERE Email='$email' AND Password='$password'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $num = mysqli_num_rows($result);

        if ($num > 0) 
        {
            echo "<script>
                    alert('Logged in successfully');
                    window.location.href='index.php';
                  </script>";
        } 
        else
        {
            $invalid = 1;
        }
    }
}
?>

<html>
<head>
  <title>Login | Statesphere</title>

  <script>
    function formValidation() {
        let email = document.forms["form1"]["email"].value;
        let password = document.forms["form1"]["password"].value;

        if (email == "") {
            alert("Email must be filled out");
            return false;
        }

        if (password == "") {
            alert("Password must be filled out");
            return false;
        }

        return true;
    }
  </script>

  <style>
    :root {
      --primary: #074272;
      --secondary: #2474d0;
      --dark: #0c1e2d;
      --light: #f4f4f9;
    }

    body {
      font-family: "Segoe UI", sans-serif;
      margin: 0;
      background: linear-gradient(135deg, var(--dark), var(--primary));
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      color: #333;
    }

    .container {
      background: #fff;
      padding: 40px 35px;
      border-radius: 15px;
      box-shadow: 0 8px 20px rgba(0,0,0,0.2);
      width: 100%;
      max-width: 400px;
      animation: fadeIn 0.8s ease-in-out;
    }

    .container h2 {
      text-align: center;
      margin-bottom: 25px;
      color: var(--primary);
      font-size: 1.8rem;
    }

    .input-group {
      margin-bottom: 20px;
    }

    .input-group label {
      display: block;
      margin-bottom: 6px;
      font-weight: 600;
      color: var(--dark);
    }

    .input-group input {
      width: 100%;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 8px;
      font-size: 15px;
      transition: all 0.3s;
    }

    .input-group input:focus {
      outline: none;
      border-color: var(--secondary);
      box-shadow: 0 0 6px rgba(36,116,208,0.5);
    }

    .login-btn {
      width: 100%;
      padding: 14px;
      background: var(--secondary);
      border: none;
      color: white;
      font-size: 16px;
      border-radius: 8px;
      cursor: pointer;
      font-weight: bold;
      transition: all 0.3s;
    }

    .login-btn:hover {
      background: #05507a;
      transform: translateY(-2px);
    }

    .login-footer {
      text-align: center;
      margin-top: 18px;
    }

    .login-footer a {
      color: var(--secondary);
      text-decoration: none;
      font-weight: bold;
    }

    .login-footer a:hover {
      text-decoration: underline;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }
  </style>
</head>

<body>

<?php
if($invalid){
    echo "<script>alert('Invalid Credentials');</script>";
}
?>

<div class="container">
  <h2>Login</h2>

  <form id="form1" name="form1" action="login.php" method="POST" onsubmit="return formValidation()">

    <div class="input-group">
      <label>Email Address</label>
      <input type="email" name="email" placeholder="Enter your email" required>
    </div>

    <div class="input-group">
      <label>Password</label>
      <input type="password" name="password" placeholder="Enter your password" required>
    </div>

    <button type="submit" class="login-btn">Login</button>
  </form>

  <div class="login-footer">
    <p>Don’t have an account? <a href="register.php">Register</a></p>
  </div>
</div>

</body>
</html>
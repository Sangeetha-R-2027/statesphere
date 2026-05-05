<?php
$registered = 0;
$userexists = 0;

// FORM SUBMIT
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'C:\xampp\htdocs\25CSR256\Day1\connect.php';

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm = $_POST['confirm'];


        // CHECK USER EXISTS
        $sql = "SELECT * FROM register WHERE Email='$email'";
        $result = mysqli_query($conn, $sql);

    if ($result) 
        {
        $num = mysqli_num_rows($result);
        

        if ($num > 0) {
            $userexists = 1;
            
        } else {

            $sql = "INSERT INTO register (Name, Email, Password,confirm)
                    VALUES ('$name', '$email', '$password','$confirm')";

            $result = mysqli_query($conn, $sql);

            if ($result)
            {
                $registered = 1;
                
            } 
            else 
            {
                die(mysqli_error($conn));
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register | Statesphere</title>
    <script>
function formValidation() {
  let name = document.forms["form2"]["name"].value;
  let email = document.forms["form2"]["email"].value;
  let password = document.forms["form2"]["password"].value;
  let confirm = document.forms["form2"]["confirm"].value;

  // Name check
  if (name == "") {
    alert("Name must be filled out");
    return false;
  }

  // Email check
  if (email == "") {
    alert("Email must be filled out");
    return false;
  }

  // Password check
  if (password == "") {
    alert("Password must be filled out");
    return false;
  }

  // Confirm password check
  if (confirm == "") {
    alert("Confirm your password");
    return false;
  }

  // Password match check
  if (password !== confirm) {
    alert("Passwords do not match");
    return false;
  }

  return true;
}

// Reset form
function newFunction(){
  document.getElementById("form2").reset();
}
</script>
    <style>
        body {
            font-family: "Segoe UI", sans-serif;
            margin: 0;
            background: linear-gradient(135deg, #0c1e2d, #074272);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            width: 100%;
            max-width: 350px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #074272;
        }

        .input-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: 600;
        }

        input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }

        button {
            width: 100%;
            padding: 12px;
            background: #2474d0;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        .msg {
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            font-size: 14px;
        }

        .error { background: #f8d7da; color: #721c24; }
        .success { background: #d4edda; color: #155724; }
    </style>
</head>

<body>
<div class="container">
    <h2>Register</h2>
    <?php
    if ($userexists) {
        echo "<div class='error-msg'>User already exists</div>";
    }
    if ($registered) {
        echo "<div class='success-msg'>Signed up successfully</div>";
    }
    ?>
    <form name="form2" id="form2" action="register.php" method="POST" onsubmit="return formValidation()">
        <div class="input-group">
            <label>Full Name</label>
            <input type="text" name="name" id="name" required>
        </div>

        <div class="input-group">
            <label>Email</label>
            <input type="email" name="email" id="email" required>
        </div>

        <div class="input-group">
            <label>Password</label>
            <input type="password" name="password" id="password" required>
        </div>

        <div class="input-group">
            <label>Confirm Password</label>
            <input type="password" name="confirm" id="confirm" required>
        </div>

        <button type="submit">Register</button>
    </form>

    <p style="text-align:center;">
        Already have an account? <a href="login.php">Login</a>
    </p>
</div>
</body>
</html>
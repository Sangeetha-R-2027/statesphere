<!-- registartion -->
<html lang="en">
<head>
    <title>Register | Disaster Management</title>
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
      margin-bottom: 18px;
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

    .register-btn {
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

    .register-btn:hover {
      background: #05507a;
      transform: translateY(-2px);
    }

    .register-footer {
      text-align: center;
      margin-top: 18px;
    }

    .register-footer a {
      color: var(--secondary);
      text-decoration: none;
      font-weight: bold;
    }

    .register-footer a:hover {
      text-decoration: underline;
    }

    /* Error / Success box */
    .error-msg {
      background: #f8d7da;
      color: #721c24;
      padding: 10px;
      border-radius: 6px;
      font-size: 14px;
      margin-bottom: 15px;
      display: none;
    }

    .success-msg {
      background: #d4edda;
      color: #155724;
      padding: 10px;
      border-radius: 6px;
      font-size: 14px;
      margin-bottom: 15px;
      display: none;
    }

    /* Animations */
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }
  </style>
</head>
<body>

  <div class="container">
    <h2>📝 Register</h2>
    <form id="registerForm">
      <div id="errorBox" class="error-msg"></div>
      <div id="successBox" class="success-msg"></div>

      <div class="input-group">
        <label for="fullname">Full Name</label>
        <input type="text" id="fullname" name="fullname" placeholder="Enter your full name" required>
      </div>

      <div class="input-group">
        <label for="email">Email Address</label>
        <input type="email" id="email" name="email" placeholder="Enter your email" required>
      </div>

      <div class="input-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Enter password" required>
      </div>

      <div class="input-group">
        <label for="confirm">Confirm Password</label>
        <input type="password" id="confirm" name="confirm" placeholder="Confirm password" required>
      </div>

      <button type="submit" class="register-btn">Register</button>
    </form>

    <div class="register-footer">
      <p>Already have an account? <a href="login.html">Login</a></p>
    </div>
  </div>

  <!-- Firebase Script -->
  <script type="module">
    import { initializeApp } from "https://www.gstatic.com/firebasejs/12.2.1/firebase-app.js";
    import { getAuth, createUserWithEmailAndPassword } 
      from "https://www.gstatic.com/firebasejs/12.2.1/firebase-auth.js";

    // ✅ Firebase config
    const firebaseConfig = {
      apiKey: "AIzaSyBKB8n6TK2RQdDFWe6IwOhBUUJ1-Qe33U0",
      authDomain: "disaster-backend.firebaseapp.com",
      projectId: "disaster-backend",
      storageBucket: "disaster-backend.firebasestorage.app",
      messagingSenderId: "269165254748",
      appId: "1:269165254748:web:0db4f196bee794cd532e99",
      measurementId: "G-HLSZ73HW8H"
    };

    const app = initializeApp(firebaseConfig);
    const auth = getAuth(app);

    // 🔹 Register Handler
    const registerForm = document.getElementById("registerForm");
    const errorBox = document.getElementById("errorBox");
    const successBox = document.getElementById("successBox");

    registerForm.addEventListener("submit", async (e) => {
      e.preventDefault();

      const fullName = document.getElementById("fullname").value.trim();
      const email = document.getElementById("email").value.trim();
      const password = document.getElementById("password").value.trim();
      const confirm = document.getElementById("confirm").value.trim();

      if (password !== confirm) {
        errorBox.style.display = "block";
        errorBox.textContent = "❌ Passwords do not match!";
        successBox.style.display = "none";
        return;
      }

      try {
        await createUserWithEmailAndPassword(auth, email, password);
        errorBox.style.display = "none";
        successBox.style.display = "block";
        successBox.textContent = "✅ Registration successful!";
        setTimeout(() => {
          window.location.href = "login.html";
        }, 1500);
      } catch (error) {
        errorBox.style.display = "block";
        errorBox.textContent = "❌ " + error.message;
        successBox.style.display = "none";
      }
    });
  </script>
</body>
</html>
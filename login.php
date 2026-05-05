<!-- login -->
<html>
<head>
  <title>Login | Statesphere</title>
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

    /* Error message */
    .error-msg {
      background: #f8d7da;
      color: #721c24;
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
    <h2>&#x1F510; Login</h2>
    <form id="loginForm">
      <div id="errorBox" class="error-msg"></div>

      <div class="input-group">
        <label for="email">Email Address</label>
        <input type="email" id="email" name="email" placeholder="Enter your email" required>
      </div>

      <div class="input-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Enter your password" required>
      </div>

      <button type="submit" class="login-btn" onclick="window.location.href='map.html'" target="_self">Login</button>
    </form>

    <div class="login-footer">
      <p>Don’t have an account? <a href="register.html">Register</a></p>
    </div>
  </div>

  <!-- Firebase Script -->
  <script type="module">
    const name=["rithniha23@gmail.com","sangeetha2027@gmail.com","subaranjani007@gmail.com"]
    document.getElementById("email").innerHTML = name;
    const password=["rithni123","sangee2027","suba123"]
    document.getElementById("password").innerHTML = password;

    import { initializeApp } from "https://www.gstatic.com/firebasejs/12.2.1/firebase-app.js";
    import { getAuth, signInWithEmailAndPassword } 
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

    // 🔹 Login Handler
    const loginForm = document.getElementById("loginForm");
    const errorBox = document.getElementById("errorBox");

    loginForm.addEventListener("submit", async (e) => {
      e.preventDefault();
      const email = document.getElementById("email").value.trim();
      const password = document.getElementById("password").value.trim();

      try {
        await signInWithEmailAndPassword(auth, email, password);
        errorBox.style.display = "none";
        alert("✅ Logged in successfully!");
        window.location.href = "dashboard.html"; 
      } catch (error) {
        errorBox.style.display = "block";
        errorBox.textContent = "❌ " + error.message;
      }
    });
  </script>
</body>
</html>
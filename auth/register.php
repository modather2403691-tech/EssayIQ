
<?php
session_start();

$conn = new mysqli("localhost", "root", "", "essayiq");

if ($conn->connect_error) {
    die("Database connection failed. Please try again later.");
}

$conn->set_charset("utf8mb4");

$error = "";
$name = "";
$email = "";
$role = "student";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = trim($_POST["name"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $password = $_POST["password"] ?? "";
    $confirmPassword = $_POST["confirm_password"] ?? "";
    $role = $_POST["role"] ?? "student";

    if (strlen($name) < 2) {
        $error = "Please enter a valid name (at least 2 characters).";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Please enter a valid email address.";
    } elseif (strlen($password) < 8) {
        $error = "Password must be at least 8 characters.";
    } elseif ($password !== $confirmPassword) {
        $error = "Passwords do not match.";
    } elseif (!in_array($role, ["student", "instructor"], true)) {
        $error = "Please select a valid account type.";
    } else {
        $check = $conn->prepare(
            "SELECT id FROM users WHERE email = ? LIMIT 1"
        );

        $check->bind_param("s", $email);
        $check->execute();
        $check->store_result();

        if ($check->num_rows > 0) {
            $error = "This email is already registered.";
        } else {
            $hashedPassword = password_hash(
                $password,
                PASSWORD_DEFAULT
            );

            $stmt = $conn->prepare(
                "INSERT INTO users (name, email, password, role)
                 VALUES (?, ?, ?, ?)"
            );

            $stmt->bind_param(
                "ssss",
                $name,
                $email,
                $hashedPassword,
                $role
            );

            if ($stmt->execute()) {
                $stmt->close();
                $check->close();
                $conn->close();

                header("Location: login.php?registered=1");
                exit;
            } else {
                $error = "Registration failed. Please try again.";
            }

            $stmt->close();
        }

        $check->close();
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | EssayIQ</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Space+Grotesk:wght@500;600;700&display=swap" rel="stylesheet">

<link rel="stylesheet" href="../assets/css/auth.css?v=1">
    <style>
        .auth-logo {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            color: #f6f8ff;
            text-decoration: none;
            font-family: 'Space Grotesk', sans-serif;
            font-size: 27px;
            font-weight: 600;
        }

        .auth-logo svg {
            width: 38px;
            height: 38px;
            flex-shrink: 0;
        }

        .auth-logo b {
            color: #22d3ee;
        }

        .login-brand p {
            color: #9aadd0;
            margin-top: 7px;
        }

        .register-card {
            width: 100%;
            max-width: 600px;
            padding: 35px 48px;
            box-sizing: border-box;
            background: linear-gradient(
                145deg,
                rgba(10, 30, 76, .96),
                rgba(3, 12, 42, .98)
            );
            border: 1px solid #087dff;
            border-radius: 23px;
            box-shadow: 0 0 22px rgba(0, 119, 255, .2);
        }

        .register-card h1 {
            color: #f6f8ff;
            font-size: 30px;
            margin: 0 0 8px;
        }

        .register-card label {
            display: block;
            color: #f4f7ff;
            font-size: 14px;
            font-weight: 600;
            margin: 15px 0 7px;
        }

        .register-card input,
        .register-card select {
            width: 100%;
            padding: 14px 15px;
            box-sizing: border-box;
            border: 1px solid #126bdf;
            border-radius: 12px;
            background: #0d2453;
            color: white;
            font-size: 15px;
            outline: none;
        }

        .register-card input::placeholder {
            color: #88a6d8;
        }

        .register-card input:focus,
        .register-card select:focus {
            border-color: #28aaff;
            box-shadow: 0 0 0 3px rgba(20, 135, 255, .12);
        }

        .register-card select option {
            background: #0d2453;
            color: white;
        }

        .register-error {
            padding: 11px 13px;
            margin: 18px 0;
            border: 1px solid #ff6b85;
            border-radius: 10px;
            background: rgba(255, 70, 100, .1);
            color: #ffb3c1;
            font-size: 14px;
        }

        .register-card .login-button {
            width: 100%;
            margin-top: 24px;
        }

        .register-card .login-description {
            margin-bottom: 20px;
        }

        @media (max-width: 600px) {
            .register-card {
                padding: 28px 22px;
            }

            .register-card h1 {
                font-size: 25px;
            }
        }
    </style>
</head>

<body>
<div class="login-page">

    <div class="login-decoration login-decoration-top"></div>
    <div class="login-decoration login-decoration-bottom"></div>
    <div class="login-dots"></div>

    <header class="login-brand">
        <a href="../index.php" class="auth-logo" aria-label="EssayIQ home">
            <svg viewBox="0 0 32 32" fill="none" aria-hidden="true">
                <rect x="2" y="2" width="28" height="28" rx="9"
                      fill="url(#authRegisterGradient)"/>
                <path d="M10 11h12M10 16h8M10 21h5"
                      stroke="#fff" stroke-width="2"
                      stroke-linecap="round"/>
                <circle cx="23" cy="21" r="3" fill="#fff"/>
                <defs>
                    <linearGradient id="authRegisterGradient"
                                    x1="0" y1="0" x2="32" y2="32">
                        <stop stop-color="#22d3ee"/>
                        <stop offset="1" stop-color="#8b5cf6"/>
                    </linearGradient>
                </defs>
            </svg>
            <span>Essay<b>IQ</b></span>
        </a>
        <p>Your writing companion</p>
    </header>

    <div class="login-layout">

        <main class="register-card">

            <p class="login-subtitle">GET STARTED</p>
            <h1>Create your account</h1>

            <p class="login-description">
                Join EssayIQ and improve your writing.
            </p>

            <?php if ($error !== ""): ?>
                <div class="register-error">
                    <?= htmlspecialchars($error, ENT_QUOTES, "UTF-8") ?>
                </div>
            <?php endif; ?>

            <form method="POST" action="">
                <label for="name">Full Name</label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    placeholder="Enter your full name"
                    value="<?= htmlspecialchars($name, ENT_QUOTES, "UTF-8") ?>"
                    minlength="2"
                    maxlength="100"
                    autocomplete="name"
                    required
                >

                <label for="email">Email Address</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    placeholder="Enter your email"
                    value="<?= htmlspecialchars($email, ENT_QUOTES, "UTF-8") ?>"
                    maxlength="254"
                    autocomplete="email"
                    required
                >

                <label for="password">Password</label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="At least 8 characters"
                    minlength="8"
                    autocomplete="new-password"
                    required
                >

                <label for="confirm_password">Confirm Password</label>
                <input
                    type="password"
                    id="confirm_password"
                    name="confirm_password"
                    placeholder="Re-enter your password"
                    minlength="8"
                    autocomplete="new-password"
                    required
                >

                <label for="role">Account Type</label>
                <select id="role" name="role" required>
                    <option value="student"
                        <?= $role === "student" ? "selected" : "" ?>>
                        Student
                    </option>

                    <option value="instructor"
                        <?= $role === "instructor" ? "selected" : "" ?>>
                        Instructor
                    </option>
                </select>

                <button type="submit" class="login-button">
                    <span>→</span> Create Account
                </button>
            </form>

            <div class="login-divider"><span>OR</span></div>

            <p class="login-footer">
                Already have an account?
                <a href="login.php">Login</a>
            </p>

        </main>
    </div>

    <footer class="login-bottom">
        Simple <span>•</span> Modern <span>•</span> Academic
    </footer>

</div>
</body>
</html>

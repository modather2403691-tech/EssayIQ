<?php
session_start();

$conn = new mysqli("localhost", "root", "", "essayiq");

if ($conn->connect_error) {
    die("Unable to connect to the database. Please try again later.");
}

$conn->set_charset("utf8mb4");

$error = "";

if (isset($_GET["error"]) && $_GET["error"] === "role") {
    $error = "Your account role is not supported.";
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim($_POST["email"] ?? "");
    $password = $_POST["password"] ?? "";

    if (!filter_var($email, FILTER_VALIDATE_EMAIL) || $password === "") {
        $error = "Please enter a valid email and password.";
    } else {
        $stmt = $conn->prepare(
            "SELECT id, name, email, password, role
             FROM users
             WHERE email = ?
             LIMIT 1"
        );

        $stmt->bind_param("s", $email);
        $stmt->execute();

        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if ($user && password_verify($password, $user["password"])) {
            $role = strtolower(trim($user["role"]));

            $destinations = [
                "student" => "../student/dashboard.php",
                "instructor" => "../instructor/dashboard.php",
                "admin" => "../admin/dashboard.php"
            ];

            if (!isset($destinations[$role])) {
                $error = "Your account role is not supported.";
            } else {
                session_regenerate_id(true);

                $_SESSION["user_id"] = (int) $user["id"];
                $_SESSION["user_name"] = $user["name"];
                $_SESSION["user_email"] = $user["email"];
                $_SESSION["user_role"] = $role;

                // Compatibility with pages using these session names.
                $_SESSION["name"] = $user["name"];
                $_SESSION["email"] = $user["email"];
                $_SESSION["role"] = $role;

                $stmt->close();
                $conn->close();

                header("Location: " . $destinations[$role]);
                exit;
            }
        } else {
            $error = "Incorrect email or password.";
        }

        $stmt->close();
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | EssayIQ</title>

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

        .login-message {
            padding: 12px 14px;
            margin: 18px 0;
            border-radius: 10px;
            font-size: 14px;
        }

        .login-error {
            color: #ffb8c5;
            background: rgba(255, 70, 100, .1);
            border: 1px solid #ff6b85;
        }

        .login-success {
            color: #a7f3d0;
            background: rgba(13, 148, 136, .12);
            border: 1px solid #0d9488;
        }

        .forgot-password {
            display: block;
            text-align: right;
            margin-top: 10px;
            color: #389bff;
            text-decoration: none;
            font-size: 14px;
        }

        .forgot-password:hover {
            color: #8ed5ff;
            text-decoration: underline;
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
                      fill="url(#authLogoGradient)"/>
                <path d="M10 11h12M10 16h8M10 21h5"
                      stroke="#fff" stroke-width="2"
                      stroke-linecap="round"/>
                <circle cx="23" cy="21" r="3" fill="#fff"/>
                <defs>
                    <linearGradient id="authLogoGradient"
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

        <div class="login-quote">
            <span>✦</span>
            <p>Better Essays<br>Bigger Dreams</p>
            <div></div>
        </div>

        <main class="login-card">

            <p class="login-subtitle">WELCOME BACK</p>
            <h1>Login to your account</h1>

            <p class="login-description">
                Continue your writing journey with EssayIQ.
            </p>

            <?php if (isset($_GET["registered"])): ?>
                <div class="login-message login-success">
                    Account created successfully! You can now log in.
                </div>
            <?php endif; ?>

            <?php if ($error !== ""): ?>
                <div class="login-message login-error">
                    <?= htmlspecialchars($error, ENT_QUOTES, "UTF-8") ?>
                </div>
            <?php endif; ?>

            <form method="POST" action="">
                <label for="email">Email</label>

                <div class="login-input">
                    <span>✉</span>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        placeholder="Enter your email"
                        autocomplete="email"
                        value="<?= htmlspecialchars($_POST["email"] ?? "", ENT_QUOTES, "UTF-8") ?>"
                        required
                    >
                </div>

                <label for="password">Password</label>

                <div class="login-input">
                    <span>♙</span>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Enter your password"
                        autocomplete="current-password"
                        required
                    >
                </div>

                <a class="forgot-password" href="forgot-password.php">
                    Forgot Password?
                </a>

                <button type="submit" class="login-button">
                    <span>→</span> Login
                </button>
            </form>

            <div class="login-divider"><span>OR</span></div>

            <p class="login-footer">
                Don't have an account?
                <a href="register.php">Create an account</a>
            </p>

        </main>
    </div>

    <footer class="login-bottom">
        Simple <span>•</span> Modern <span>•</span> Academic
    </footer>

</div>
</body>
</html>

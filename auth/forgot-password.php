
<?php
session_start();

$conn = new mysqli("localhost", "root", "", "essayiq");

if ($conn->connect_error) {
    die("Database connection failed.");
}

$conn->set_charset("utf8mb4");
$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim($_POST["email"] ?? "");

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $user = $stmt->get_result()->fetch_assoc();

        if ($user) {
            $userId = (int)$user["id"];

            $stmt = $conn->prepare(
                "UPDATE password_resets
                 SET used_at = NOW()
                 WHERE user_id = ? AND used_at IS NULL"
            );
            $stmt->bind_param("i", $userId);
            $stmt->execute();

            $otp = (string) random_int(100000, 999999);
            $otpHash = hash("sha256", $otp);

            $stmt = $conn->prepare(
                "INSERT INTO password_resets
                (user_id, token_hash, expires_at, attempts)
                VALUES (?, ?, DATE_ADD(NOW(), INTERVAL 5 MINUTE), 0)"
            );
            $stmt->bind_param("is", $userId, $otpHash);
            $stmt->execute();

            // Local development only: OTP appears in Apache error.log.
            error_log("[EssayIQ OTP TEST] User ID: " .
                $userId . " | OTP: " . $otp);
        }

        if ($user) {
            $_SESSION["reset_email"] = $email;
            header("Location: verify-otp.php");
            exit;
        } else {
            $message = "If your account exists, an OTP has been generated. Check the local testing log.";
        }
    } else {
        $message = "Please enter a valid email address.";
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Forgot Password | EssayIQ</title>

<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 24px;
    overflow: hidden;
    font-family: Arial, sans-serif;
    color: #f8fafc;
    background:
        radial-gradient(circle at 15% 20%, #29205a 0, transparent 35%),
        radial-gradient(circle at 85% 80%, #102d60 0, transparent 35%),
        #050816;
}

.glow {
    position: fixed;
    width: 280px;
    height: 280px;
    border-radius: 50%;
    filter: blur(100px);
    opacity: .3;
    pointer-events: none;
}

.glow.one {
    background: #7c3aed;
    top: -100px;
    left: -80px;
}

.glow.two {
    background: #2563eb;
    bottom: -100px;
    right: -80px;
}

.card {
    position: relative;
    width: 100%;
    max-width: 430px;
    padding: 42px 36px;
    text-align: center;
    border-radius: 22px;
    background: rgba(17, 27, 53, .78);
    border: 1px solid rgba(147, 197, 253, .22);
    box-shadow: 0 0 45px rgba(37, 99, 235, .13);
    backdrop-filter: blur(18px);
    animation: appear .6s ease;
}

.logo {
    font-size: 27px;
    font-weight: 800;
    letter-spacing: 1px;
    margin-bottom: 30px;
    color: #fff;
}

.logo span {
    color: #60a5fa;
}

.icon {
    width: 66px;
    height: 66px;
    margin: 0 auto 22px;
    display: grid;
    place-items: center;
    font-size: 28px;
    border-radius: 20px;
    background: linear-gradient(135deg, #2563eb44, #9333ea44);
    border: 1px solid #6479e566;
    box-shadow: 0 0 25px #2563eb22;
}

h1 {
    font-size: 27px;
    margin-bottom: 12px;
}

.description {
    color: #aab7d0;
    font-size: 14px;
    line-height: 1.7;
    margin-bottom: 28px;
}

label {
    display: block;
    text-align: left;
    font-size: 13px;
    color: #dbeafe;
    margin-bottom: 9px;
}

input {
    width: 100%;
    padding: 14px 15px;
    border: 1px solid #334466;
    border-radius: 10px;
    outline: none;
    color: white;
    background: rgba(5, 8, 22, .8);
    font-size: 14px;
    transition: .25s;
}

input:focus {
    border-color: #60a5fa;
    box-shadow: 0 0 0 3px #2563eb22;
}

button {
    position: relative;
    width: 100%;
    margin-top: 20px;
    padding: 14px;
    border: 1px solid #657cff88;
    border-radius: 10px;
    color: white;
    font-size: 14px;
    font-weight: 700;
    cursor: pointer;
    background: linear-gradient(110deg, #172554, #312e81, #581c87);
    box-shadow: 0 0 20px #4f46e533, inset 0 1px #ffffff30;
    transition: .3s;
}

button:hover {
    transform: translateY(-2px);
    box-shadow: 0 0 28px #7c3aed66;
}

.message {
    padding: 12px;
    margin-bottom: 18px;
    border-radius: 9px;
    color: #bfdbfe;
    background: #2563eb18;
    border: 1px solid #3b82f644;
    font-size: 13px;
    line-height: 1.6;
}

.back {
    display: inline-block;
    margin-top: 25px;
    color: #a5b4fc;
    font-size: 13px;
    text-decoration: none;
    transition: .2s;
}

.back:hover {
    color: white;
}

@keyframes appear {
    from { opacity: 0; transform: translateY(15px); }
    to { opacity: 1; transform: translateY(0); }
}

@media (max-width: 480px) {
    .card { padding: 34px 24px; }
    h1 { font-size: 24px; }
}
</style>
</head>

<body>
<div class="glow one"></div>
<div class="glow two"></div>

<main class="card">
    <div class="logo">Essay<span>IQ</span></div>
    <div class="icon">&#128273;</div>

    <h1>Forgot Password?</h1>
    <p class="description">
        Don't worry, it happens. Enter your registered email
        and we'll help you reset your password.
    </p>

    <?php if ($message !== ""): ?>
        <div class="message">
            <?= htmlspecialchars($message) ?>
            <?php if (isset($user) && $user): ?>
                <br><a class="back" href="verify-otp.php">Continue to OTP verification</a>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <form method="POST">
        <label for="email">Email Address</label>
        <input
            type="email"
            id="email"
            name="email"
            placeholder="you@example.com"
            autocomplete="email"
            required
        >
        <button type="submit">Generate OTP &rarr;</button>
    </form>

    <a class="back" href="login.php">&larr; Back to Login</a>
</main>
</body>
</html>

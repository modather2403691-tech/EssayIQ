
<?php
session_start();

$conn = new mysqli("localhost", "root", "", "essayiq");

if ($conn->connect_error) {
    die("Database connection failed.");
}
$message = "";
$success = false;

if (!isset($_SESSION["reset_user_id"])) {
    $message = "Please verify your OTP first.";
} else {
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $password = $_POST["password"] ?? "";
        $confirm_password = $_POST["confirm_password"] ?? "";

        if (strlen($password) < 8) {
            $message = "Password must be at least 8 characters.";
        } elseif ($password !== $confirm_password) {
            $message = "Passwords do not match.";
        } else {
            $user_id = $_SESSION["reset_user_id"];
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $stmt = $conn->prepare(
                "UPDATE users SET password = ? WHERE id = ?"
            );
            $stmt->bind_param("si", $hashed_password, $user_id);

            if ($stmt->execute() && $stmt->affected_rows > 0) {
                unset($_SESSION["reset_user_id"]);
                unset($_SESSION["reset_email"]);

                $success = true;
                $message = "Your password has been reset successfully.";
            } else {
                $message = "Could not update your password. Please try again.";
            }

            $stmt->close();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password | EssayIQ</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            font-family: Arial, sans-serif;
            color: #f8fafc;
            background:
                radial-gradient(circle at top left, #263778, transparent 40%),
                radial-gradient(circle at bottom right, #512b75, transparent 40%),
                #080d20;
        }

        .card {
            width: 100%;
            max-width: 420px;
            padding: 35px;
            border: 1px solid rgba(255,255,255,0.12);
            border-radius: 20px;
            background: rgba(17, 27, 53, 0.88);
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
        }

        .logo {
            color: #60a5fa;
            font-size: 14px;
            font-weight: bold;
            letter-spacing: 2px;
            margin-bottom: 25px;
        }

        h1 {
            font-size: 28px;
            margin-bottom: 10px;
        }

        .subtitle {
            color: #aab5cc;
            font-size: 14px;
            line-height: 1.6;
            margin-bottom: 25px;
        }

        label {
            display: block;
            margin: 18px 0 8px;
            font-size: 14px;
        }

        input {
            width: 100%;
            padding: 13px;
            border: 1px solid #354363;
            border-radius: 10px;
            background: #0b132b;
            color: white;
            outline: none;
        }

        input:focus {
            border-color: #3b82f6;
        }

        button {
            width: 100%;
            margin-top: 24px;
            padding: 14px;
            border: none;
            border-radius: 10px;
            background: #2563eb;
            color: white;
            font-size: 15px;
            font-weight: bold;
            cursor: pointer;
        }

        button:hover {
            background: #1d4ed8;
        }

        .message {
            margin-top: 20px;
            padding: 12px;
            border-radius: 8px;
            background: #1e2b47;
            color: #bfdbfe;
            font-size: 14px;
            line-height: 1.5;
        }

        .back {
            display: inline-block;
            margin-top: 20px;
            color: #93c5fd;
            text-decoration: none;
            font-size: 14px;
        }

        .back:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="card">
        <div class="logo">ESSAYIQ</div>

        <h1>Reset Password</h1>
        <p class="subtitle">
            Create a new password for your account.
        </p>

        <?php if (isset($_SESSION["reset_user_id"]) && !$success): ?>
            <form method="POST">
                <label for="password">New Password</label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    minlength="8"
                    placeholder="At least 8 characters"
                    required
                >

                <label for="confirm_password">Confirm Password</label>
                <input
                    type="password"
                    id="confirm_password"
                    name="confirm_password"
                    placeholder="Enter your password again"
                    required
                >

                <button type="submit">Update Password</button>
            </form>
        <?php endif; ?>

        <?php if ($message !== ""): ?>
            <div class="message">
                <?= htmlspecialchars($message) ?>
            </div>
        <?php endif; ?>

        <?php if ($success): ?>
            <a class="back" href="login.php">Back to Login</a>
        <?php elseif (!isset($_SESSION["reset_user_id"])): ?>
            <a class="back" href="forgot-password.php">Start Again</a>
        <?php endif; ?>
    </div>
</body>
</html>

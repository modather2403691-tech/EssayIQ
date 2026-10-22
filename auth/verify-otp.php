
<?php
session_start();

$conn = new mysqli("localhost", "root", "", "essayiq");

if ($conn->connect_error) {
    die("Database connection failed.");
}

$conn->set_charset("utf8mb4");

$message = "";
$success = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $otp = trim($_POST["otp"] ?? "");
    $email = $_SESSION["reset_email"] ?? "";

    if ($email === "") {
        $message = "Session expired. Please start again.";
    } elseif (!preg_match('/^[0-9]{6}$/', $otp)) {
        $message = "Invalid OTP. Enter the six-digit code.";
    } else {
        $stmt = $conn->prepare(
            "SELECT id FROM users WHERE email = ?"
        );
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $user = $stmt->get_result()->fetch_assoc();

        if (!$user) {
            $message = "Invalid or expired OTP.";
        } else {
            $userId = (int)$user["id"];

            $stmt = $conn->prepare(
                "SELECT id, token_hash, expires_at, attempts
                 FROM password_resets
                 WHERE user_id = ? AND used_at IS NULL
                 ORDER BY id DESC LIMIT 1"
            );
            $stmt->bind_param("i", $userId);
            $stmt->execute();
            $reset = $stmt->get_result()->fetch_assoc();

            if (!$reset ||
                strtotime($reset["expires_at"]) <= time()) {
                if ($reset) {
                    $id = (int)$reset["id"];
                    $conn->query(
                        "UPDATE password_resets
                         SET used_at = NOW() WHERE id = $id"
                    );
                }
                $message = "Invalid or expired OTP.";
            } elseif ((int)$reset["attempts"] >= 5) {
                $message = "Too many attempts. Request a new OTP.";
            } elseif (!hash_equals(
                $reset["token_hash"],
                hash("sha256", $otp)
            )) {
                $id = (int)$reset["id"];
                $conn->query(
                    "UPDATE password_resets
                     SET attempts = attempts + 1
                     WHERE id = $id"
                );
                $message = "Invalid OTP. Please try again.";
            } else {
                // Consume the OTP so it cannot be reused.
                $id = (int)$reset["id"];
                $conn->query(
                    "UPDATE password_resets
                     SET used_at = NOW() WHERE id = $id"
                );

                session_regenerate_id(true);
$_SESSION["reset_user_id"] = $userId;

header("Location: reset-password.php");
exit;
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify OTP | EssayIQ</title>
    <style>
        * { box-sizing: border-box; }
        body {
            margin: 0;
            min-height: 100vh;
            display: grid;
            place-items: center;
            padding: 20px;
            background: #080d20;
            color: #fff;
            font-family: Arial, sans-serif;
        }
        .card {
            width: 100%;
            max-width: 400px;
            padding: 32px;
            background: #111b35;
            border: 1px solid #293b66;
            border-radius: 18px;
            text-align: center;
        }
        h2 { color: #60a5fa; }
        p { color: #cbd5e1; line-height: 1.6; }
        input, button {
            width: 100%;
            padding: 13px;
            margin-top: 12px;
            border-radius: 9px;
            font-size: 16px;
        }
        input {
            background: #080d20;
            color: white;
            border: 1px solid #475569;
            text-align: center;
            letter-spacing: 5px;
        }
        button {
            background: #2563eb;
            color: white;
            border: none;
            cursor: pointer;
        }
        .message { color: #fca5a5; }
        a { color: #93c5fd; }
    </style>
</head>
<body>
    <div class="card">
        <h2>Verify Your OTP</h2>
        <p>Enter the six-digit code generated for your account.
           The code expires after five minutes.</p>

        <?php if ($message !== ""): ?>
            <p class="message">
                <?= htmlspecialchars($message) ?>
            </p>
        <?php endif; ?>

        
        <form method="POST">
    <label for="otp">One-Time Password</label>
    <input
        type="text"
        id="otp"
        name="otp"
        inputmode="numeric"
        pattern="[0-9]{6}"
        maxlength="6"
        placeholder="000000"
        autocomplete="one-time-code"
        required
    >
    <button type="submit">Verify OTP</button>
</form>


        <p><a href="login.php">Back to Login</a></p>
    </div>
</body>
</html>

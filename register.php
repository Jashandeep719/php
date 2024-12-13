<?php
include 'templates/header.php';
include 'config/dbconfig.php';

$errors = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize and validate form inputs
    $firstname = trim($_POST['firstname']);
    $lastname = trim($_POST['lastname']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $passwordConfirm = $_POST['password_confirm'];

    // Check if the fields are empty
    if (empty($firstname) || empty($lastname) || empty($email) || empty($password) || empty($passwordConfirm)) {
        $errors[] = "All fields are required.";
    }

    // Check if passwords match
    if ($password !== $passwordConfirm) {
        $errors[] = "Passwords do not match.";
    }

    // Check if email already exists in the database
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->execute(['email' => $email]);
    if ($stmt->rowCount() > 0) {
        $errors[] = "Email is already registered.";
    }

    // If there are no errors, insert the new user into the database
    if (empty($errors)) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (firstname, lastname, email, password) VALUES (:firstname, :lastname, :email, :password)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $email,
            'password' => $hashedPassword
        ]);

        echo "<p>Registration successful!</p>";
    }
}
?>

<h2>Register</h2>

<?php
// Display errors
if (!empty($errors)) {
    echo '<ul>';
    foreach ($errors as $error) {
        echo "<li>$error</li>";
    }
    echo '</ul>';
}
?>

<form method="POST">
    <label for="firstname">First Name:</label>
    <input type="text" id="firstname" name="firstname" required><br>

    <label for="lastname">Last Name:</label>
    <input type="text" id="lastname" name="lastname" required><br>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required><br>

    <label for="password_confirm">Confirm Password:</label>
    <input type="password" id="password_confirm" name="password_confirm" required><br>

    <button type="submit">Register</button>
</form>

<?php include 'templates/footer.php'; ?>

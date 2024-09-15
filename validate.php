<?php
$errors = [];

// Sanitize inputs
$firstName = htmlspecialchars(trim($_POST['firstName']));
$lastName = htmlspecialchars(trim($_POST['lastName']));
$dob = $_POST['dob'];
$gender = $_POST['gender'];
$email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
$cellNumber = trim($_POST['cellNumber']);
$batch = htmlspecialchars(trim($_POST['batch']));

$isValid = true; // Flag to track form validity

// 1. Empty field validation
if (empty($firstName)) {
    $errors['firstNameError'] = "First name is required.";
    $isValid = false;
} elseif (!preg_match("/^[a-zA-Z-' ]*$/", $firstName)) {
    // 2. Restrict special characters for names
    $errors['firstNameError'] = "First name should not contain special characters.";
    $isValid = false;
}

if (empty($lastName)) {
    $errors['lastNameError'] = "Last name is required.";
    $isValid = false;
} elseif (!preg_match("/^[a-zA-Z-' ]*$/", $lastName)) {
    $errors['lastNameError'] = "Last name should not contain special characters.";
    $isValid = false;
}

if (empty($dob)) {
    $errors['dobError'] = "Date of birth is required.";
    $isValid = false;
} else {
    // 5. Check if age is 18+
    $dobDate = new DateTime($dob);
    $today = new DateTime();
    $age = $today->diff($dobDate)->y;

    if ($age < 18) {
        $errors['dobError'] = "You must be 18 years or older.";
        $isValid = false;
    }
}

if (empty($gender)) {
    $errors['genderError'] = "Gender is required.";
    $isValid = false;
}

if (empty($email)) {
    $errors['emailError'] = "Email is required.";
    $isValid = false;
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    // 3. Validate email
    $errors['emailError'] = "Invalid email format.";
    $isValid = false;
}

if (empty($cellNumber)) {
    $errors['cellNumberError'] = "Cell number is required.";
    $isValid = false;
} elseif (!preg_match("/^[0-9]{10}$/", $cellNumber)) {
    // 4. Validate cell number (10 digits)
    $errors['cellNumberError'] = "Cell number must be a 10-digit number.";
    $isValid = false;
}

if (empty($batch)) {
    $errors['batchError'] = "Batch is required.";
    $isValid = false;
}

// If valid, redirect to success page
if ($isValid) {
    header("Location: success.php");
    exit();
} else {
    // Redirect back to form with errors and input data
    $queryString = http_build_query(array_merge($_POST, $errors));
    header("Location: form.php?" . $queryString);
    exit();
}
?>

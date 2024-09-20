<?php
$errors = [];

$firstName = htmlspecialchars(trim($_POST['firstName']));
$lastName = htmlspecialchars(trim($_POST['lastName']));
$dob = $_POST['dob'];
$gender = $_POST['gender'];
$email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
$cellNumber = trim($_POST['cellNumber']);
$batch = htmlspecialchars(trim($_POST['batch']));

$isValid = true; 

// function validation for the php
function validateEmpty($value, $fieldName, &$errors) {
    if (empty($value)) {
        $errors[$fieldName . 'Error'] = ucfirst($fieldName) . " is required.";
        return false;
    }
    return true;
}

function SpecialCharacters($value, $fieldName, &$errors) {
    if (!preg_match("/^[a-zA-Z-' ]*$/", $value)) {
        $errors[$fieldName . 'Error'] = ucfirst($fieldName) . " should not contain special characters.";
        return false;
    }
    return true;
}

function validateEmail($email, &$errors) {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['emailError'] = "Invalid email format.";
        return false;
    }
    return true;
}

function validateCellNumber($cellNumber, &$errors) {
    if (!preg_match("/^[0-9]{10}$/", $cellNumber)) {
        $errors['cellNumberError'] = "Cell number must be a 10-digit number.";
        return false;
    }
    return true;
}

function validateAge($dob, &$errors) {
    $dobDate = new DateTime($dob);
    $today = new DateTime();
    $age = $today->diff($dobDate)->y;

    if ($age < 18) {
        $errors['dobError'] = "You must be at least 18 years old.";
        return false;
    }
    return true;
}

// validation for the first name
if (validateEmpty($firstName, 'firstName', $errors)) {
    SpecialCharacters($firstName, 'firstName', $errors);
}

// validation for the Last name
if (validateEmpty($lastName, 'lastName', $errors)) {
    SpecialCharacters($lastName, 'lastName', $errors);
}

// validation for the Age
if (validateEmpty($dob, 'dob', $errors)) {
    validateAge($dob, $errors);
}

// validation for the Gender
validateEmpty($gender, 'gender', $errors);

// validation for the Gender Email
if (validateEmpty($email, 'email', $errors)) {
    validateEmail($email, $errors);
}

// validation for the Gender cellNumber
if (validateEmpty($cellNumber, 'cellNumber', $errors)) {
    validateCellNumber($cellNumber, $errors);
}

// validation for the Batch
validateEmpty($batch, 'batch', $errors);

//redirect to success page
if (empty($errors)) {
    header("Location: success.php");
    exit();
} else {
    // Redirect back to form with errors and input data if there is a error
    $queryString = http_build_query(array_merge($_POST, $errors));
    header("Location: form.php?" . $queryString);
    exit();
}
?>

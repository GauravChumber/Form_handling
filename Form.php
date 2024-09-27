<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Information Form</title>
    <link rel="stylesheet" href="Form.css">
</head>
<body>
    <div class="Main-container">
<form action="validate.php" method="post">
<h2>Fitness class</h2>
    <div class="form-group">
        <label for="firstName">First Name:-</label>
        <input type="text" id="firstName" name="firstName" value="<?php echo isset($_GET['firstName']) ? $_GET['firstName'] : ''; ?>" required>
        <span class="error"><?php echo isset($_GET['firstNameError']) ? $_GET['firstNameError'] : ''; ?></span>
    </div>
    <div class="form-group">
        <label for="lastName">Last Name:-</label>
        <input type="text" id="lastName" name="lastName" value="<?php echo isset($_GET['lastName']) ? $_GET['lastName'] : ''; ?>" required>
        <span class="error"><?php echo isset($_GET['lastNameError']) ? $_GET['lastNameError'] : ''; ?></span>
    </div>
    <div class="form-group">
        <label for="dob">Date of Birth:-</label>
        <input type="date" id="dob" name="dob" value="<?php echo isset($_GET['dob']) ? $_GET['dob'] : ''; ?>" required>
        <span class="error"><?php echo isset($_GET['dobError']) ? $_GET['dobError'] : ''; ?></span>
    </div>
    <div class="form-group">
        <label for="email">Email:-</label>
        <input type="email" id="email" name="email" value="<?php echo isset($_GET['email']) ? $_GET['email'] : ''; ?>" required>
        <span class="error"><?php echo isset($_GET['emailError']) ? $_GET['emailError'] : ''; ?></span>
    </div>
    <div class="form-group">
        <label for="gender">Gender:-</label>
        <select id="gender" name="gender" required>
            <option value="">Select Gender</option>
            <option value="male" <?php echo isset($_GET['gender']) && $_GET['gender'] == 'male' ? 'selected' : ''; ?>>Male</option>
            <option value="female" <?php echo isset($_GET['gender']) && $_GET['gender'] == 'female' ? 'selected' : ''; ?>>Female</option>
            <option value="other" <?php echo isset($_GET['gender']) && $_GET['gender'] == 'other' ? 'selected' : ''; ?>>Other</option>
        </select>
        <span class="error"><?php echo isset($_GET['genderError']) ? $_GET['genderError'] : ''; ?></span>
    </div>
    <div class="form-group">
        <label for="cellNumber">Cell Number:-</label>
        <input type="tel" id="cellNumber" name="cellNumber" value="<?php echo isset($_GET['cellNumber']) ? $_GET['cellNumber'] : ''; ?>" placeholder="1234567890" required>
        <span class="error"><?php echo isset($_GET['cellNumberError']) ? $_GET['cellNumberError'] : ''; ?></span>
    </div>
    <div class="form-group">
        <label for="batch">Batch:-</label>
        <input type="text" id="batch" name="batch" value="<?php echo isset($_GET['batch']) ? $_GET['batch'] : ''; ?>" required>
        <span class="error"><?php echo isset($_GET['batchError']) ? $_GET['batchError'] : ''; ?></span>
    </div>
    <button type="submit">Register</button>
</form>
</div>
</body>
</html>

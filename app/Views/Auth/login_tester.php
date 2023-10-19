<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meeting Check <?php isset($title) ? print('| ' . $title) : '' ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous" />
    <link rel="stylesheet" href="<?php echo base_url('assets/css/login.css'); ?>">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>
    <label for="password">Password:</label>
    <div class="password-input-container">
        <input type="password" id="password" placeholder="Enter your password">
        <span class="password-toggle-btn" onclick="togglePasswordVisibility()">
            <i id="password-toggle-icon" class="fa fa-eye"></i>
        </span>
    </div>
</body>

<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<script src="<?php echo base_url('assets/js/login.js'); ?>"></script>

</html>
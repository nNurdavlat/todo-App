<?php
require 'views/components/header.php';
require 'views/components/navbar.php';
?>
<div class="form-container">
    <h2  href="/login" class="text-center mb-4">Sign Up</h2>
    <form action="/login" method="post">
        <div class="mb-3">
            <label for="loginEmail" class="form-label">Email</label>
            <input type="email" class="form-control" id="loginEmail" name="email" placeholder="Enter your email" required>
        </div>
        <div class="mb-3">
            <label for="loginPassword" class="form-label">Password</label>
            <input type="password" class="form-control" id="loginPassword" name="password" placeholder="Enter your password" required>
        </div>
        <div class="d-grid">
            <p class="text-danger text-center" style="display: block;"><?= $_SESSION['error_message'] ?? ''?></p>
            <button type="submit" class="btn btn-primary">Login</button>
        </div>
    </form>
    <p class="text-center mt-3">
        Don't have an account? <a href="/register">Register</a>
    </p>
</div>
<div style="position: fixed; width: 100%; bottom: 0; ">
    <?php
    require 'views/components/footer.php';
    ?>
</div>


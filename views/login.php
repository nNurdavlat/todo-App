<?php
require 'views/components/header.php';
require 'views/components/navbar.php';
?>
<div class="form-container">
    <h2  href="/login" class="text-center mb-4">Login</h2>
    <form action="/login" method="POST">
        <div class="mb-3">
            <label for="loginEmail" class="form-label">Email</label>
            <input type="email" class="form-control" id="loginEmail" placeholder="Enter your email" required name="email">
        </div>
        <div class="mb-3">
            <label for="loginPassword" class="form-label">Password</label>
            <input type="password" class="form-control" id="loginPassword" placeholder="Enter your password" required name="password">
        </div>
        <div class="d-grid">
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


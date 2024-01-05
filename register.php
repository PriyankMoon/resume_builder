<?php
$title = "Register | Resume Builder";
require './assets/includes/header.php';
$fn->nonAuthPage();
?>
<div class="container mt-5">
    <div class="content">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card bg-transparent">
                    <div class="card-header">
                        <div class="heading d-flex justify-content-center align-items-center">
                            <!-- Logo on the left side -->
                            <b>
                                <img src="./assets/images/logo.webp"
                                    style="height: 50px; width: 50px; border-radius: 50%; filter: brightness(120%); margin-right: 10px;">
                            </b>

                            <!-- Title and subtitle on the right side -->
                            <div class="text-center">
                                <h1 class="h3 fw-normal my-1"
                                    style="font-size: 40px; font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; color: rgb(255, 255, 0); text-shadow: 0 0 10px rgba(168, 86, 255, 0.865); margin-bottom: 5px;">
                                    Resume <c style="color: black; text-shadow: none;">Builder</c>
                                </h1>
                                <h3 style="color: black; margin-top: 0; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">Create New Account</h3>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <form method="post" action="actions/register.action.php">
                            <div class="form-group">
                                <label for="fullName" style="color:black">Full Name</label>
                                <input type="text" class="form-control" id="fullName" name="full_name" 
                                    placeholder="Enter your full name" required>
                            </div>
                            <div class="form-group">
                                <label for="email" style="color:black">Email</label>
                                <input type="email" class="form-control" id="email" name="email_id" 
                                    placeholder="Enter your email" required>
                            </div>
                            <div class="form-group">
                                <label for="password" style="color:black">Password</label>
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Enter your password" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block" style="color:white;"
                                style="color:black"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16" style=" margin-right:5px;" >
  <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664z"/>
</svg>Register</button>
                        </form>
                    </div>
                    <div class="card-footer text-center">
                        <p><a href="forgot-password.php">Forgot Password?</a></p>
                        <p style="color:rgb(255, 255, 255)">Already have an account? <a href="login.php">Login</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Bootstrap JS and Popper.js -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"
    integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8Wv5c0Dd1W" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
    integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+WyLnvADszl+9zI1Wq8Edby3S0D4Jq0Fkvx"
    crossorigin="anonymous"></script>
<?php
require './assets/includes/footer.php';
?>
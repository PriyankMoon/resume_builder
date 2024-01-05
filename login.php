<?php
$title = "Login | Resume Builder";
require './assets/includes/header.php';
$fn->nonAuthPage();
?> 
<div class="container mt-5">
    <div class="content" style="margin-top:100px;">
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
                                <h3 style="color: black; margin-top: 0; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">Login to your Account</h3>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <form method="post" action="actions/login.action.php">
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
                                style="color:black">Login <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0z"/>
  <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
</svg></button>
                        </form>
                    </div>
                    <div class="card-footer text-center">
                        <p><a href="forgot-password.php">Forgot Password?</a></p>
                        <p style="color:rgb(255, 255, 255)">Don't have an account? <a href="register.php">Register</a></p>
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
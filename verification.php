<?php
$title = "verification | Resume Builder";
require './assets/includes/header.php';
$fn->nonAuthPage();
?>
<style>
        .btn {
            box-shadow: 0px 0px 5px white;
            text-shadow: 0px 0px 20px white;
            margin: 0px 0 5px 0 ;
        }
        body::before{
            content: "";
            position: fixed;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            z-index: -1;
            background-image: url("./assets/images/img4.webp");
            background-size: 100% 105%;
            background-repeat: no-repeat;
            animation: bg-ani 40s ease infinite;
        }

        @keyframes bg-ani {
            0% {
                filter: hue-rotate(2000deg);
            }

            30% {
                filter: hue-rotate(2000deg);
            }

            60% {
                filter: hue-rotate(2000deg);
            }

            90% {
                filter: hue-rotate(2000deg);
            }

            100% {
                filter: hue-rotate(2000deg);
            }
        }

        .card{
            max-width:500px;
            scale:1.07;
        }
        .content{
            justift-content:center;
            margin-left: 1.5em;
        }
         /* .card{
            width:30rem;
        }
        
        .content{
            justift-content:center;
            margin-left: 4em;
        } */
    </style>
<div class="container mt-5">
    <div class="content">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card bg-transparent" style="margin-top:15vh;">
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
                                <h3 style="color: black; margin-top: 0; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">verify your email</h3>
                            </div>
                        </div>
                    </div>

                    <div class="card-body text-center">
    <form method="post" action='actions/verifyotp.action.php'>
    <div class="mb-4">
    <?php if ($fn->getSession('email') == ''): ?>
        <script>
            // i used javascript to redirect it to forgot-password.php when email is null
            window.location.href = 'forgot-password.php';
        </script>
    <?php else: ?>
        <div class="d-flex justify-content-start align-items-center">
            <div class="me-3">• A 6-digit code sent to</div>
            <span class="fw-bold" style="margin: 0 0 0 -10px;"><?= $fn->getSession('email') ?></span>
        </div>
    <?php endif; ?>
</div>


        <div class="form-floating mb-4">
            <input type="number" class="form-control" id="floatingNumber" placeholder="OTP" name="otp" required>
            <label for="floatingInput" class="ms-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-patch-check" viewBox="0 0 16 16" style="margin:0 10px 5px -10px;">
  <path fill-rule="evenodd" d="M10.354 6.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
  <path d="m10.273 2.513-.921-.944.715-.698.622.637.89-.011a2.89 2.89 0 0 1 2.924 2.924l-.01.89.636.622a2.89 2.89 0 0 1 0 4.134l-.637.622.011.89a2.89 2.89 0 0 1-2.924 2.924l-.89-.01-.622.636a2.89 2.89 0 0 1-4.134 0l-.622-.637-.89.011a2.89 2.89 0 0 1-2.924-2.924l.01-.89-.636-.622a2.89 2.89 0 0 1 0-4.134l.637-.622-.011-.89a2.89 2.89 0 0 1 2.924-2.924l.89.01.622-.636a2.89 2.89 0 0 1 4.134 0l-.715.698a1.89 1.89 0 0 0-2.704 0l-.92.944-1.32-.016a1.89 1.89 0 0 0-1.911 1.912l.016 1.318-.944.921a1.89 1.89 0 0 0 0 2.704l.944.92-.016 1.32a1.89 1.89 0 0 0 1.912 1.911l1.318-.016.921.944a1.89 1.89 0 0 0 2.704 0l.92-.944 1.32.016a1.89 1.89 0 0 0 1.911-1.912l-.016-1.318.944-.921a1.89 1.89 0 0 0 0-2.704l-.944-.92.016-1.32a1.89 1.89 0 0 0-1.912-1.911l-1.318.016z"/>
</svg> Enter 6 Digit Code
            </label>
        </div>
        <button class="btn btn-primary w-100 py-2" type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-check" viewBox="0 0 16 16" style="margin:0 5px 5px -10px;">
                    <path d="M2 2a2 2 0 0 0-2 2v8.01A2 2 0 0 0 2 14h5.5a.5.5 0 0 0 0-1H2a1 1 0 0 1-.966-.741l5.64-3.471L8 9.583l7-4.2V8.5a.5.5 0 0 0 1 0V4a2 2 0 0 0-2-2zm3.708 6.208L1 11.105V5.383zM1 4.217V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v.217l-7 4.2z"/>
                    <path d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0m-1.993-1.679a.5.5 0 0 0-.686.172l-1.17 1.95-.547-.547a.5.5 0 0 0-.708.708l.774.773a.75.75 0 0 0 1.174-.144l1.335-2.226a.5.5 0 0 0-.172-.686Z"/>
                  </svg>
                    Verify Email
                </button>
    </form>
</div>

                    <div class="card-footer text-center">
    <a href="register.php" class="mr-auto" style="float: left; padding: 0 0 0 60px; color:#1e78fd;">Register</a>
    <a href="login.php" class="ml-auto" style="float: right; padding: 0 60px 0 0; color:#1e78fd;">Login</a>
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
require './assets/includes/footer.php'
?>
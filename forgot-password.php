<?php
$title = "Forget Password | Resume Builder";
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
                filter: hue-rotate(2010deg);
            }

            60% {
                filter: hue-rotate(2020deg);
            }

            90% {
                filter: hue-rotate(2010deg);
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
            scale:1.07;
        }
        .content{
            justift-content:center;
            margin-left: 3em;
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
                                <h3 style="color: black; margin-top: 0; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">Forgot Your Password</h3>
                            </div>
                        </div>
                    </div>

                    <div class="card-body text-center">
                        <form method="post" action="actions/sendcode.action.php" method="post">
                        <div class="mb-4">
    <label for="floatingInput" class="form-label" style="color:black; padding-left: 5px ; float:left;">Email address</label>
    <br>
    <div class="input-group">
        <span class="input-group-text" id="basic-addon1">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z"/>
            </svg>
        </span>
        <input type="email" class="form-control" id="email floatingEmail" placeholder="name@example.com" aria-label="Email" aria-describedby="basic-addon1" name="email_id" required>
    </div>
</div>
                            <button type="submit" class=" btn butn btn-primary btn-block" style="color:white; width: 90%;"
                                style="color:black;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-send" viewBox="0 0 16 16">
                                    <path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z"/>
                                  </svg>  Send Verification Code</button>
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
require './assets/includes/footer.php';
?>
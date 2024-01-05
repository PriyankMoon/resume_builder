<?php
$title = "Change Password | Resume Builder";
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
            background-image: url("./assets/images/img4.png");
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
                                <img src="./assets/images/logo.jpg"
                                    style="height: 50px; width: 50px; border-radius: 50%; filter: brightness(120%); margin-right: 10px;">
                            </b>

                            <!-- Title and subtitle on the right side -->
                            <div class="text-center">
                                <h1 class="h3 fw-normal my-1"
                                    style="font-size: 40px; font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; color: rgb(255, 255, 0); text-shadow: 0 0 10px rgba(168, 86, 255, 0.865); margin-bottom: 5px;">
                                    Resume <c style="color: black; text-shadow: none;">Builder</c>
                                </h1>
                                <h3 style="color: black; margin-top: 0; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">Change Password</h3>
                            </div>
                        </div>
                    </div>

                    <div class="card-body text-center">
                        <form action="actions/changepassword.action.php" method="post">
                        <div class="mb-4">
    <?php if ($fn->getSession('email') == ''): ?>
        <script>
            // i used javascript to redirect it to forgot-password.php when email is null
            window.location.href = 'forgot-password.php';
        </script>
    <?php else: ?>
        <div class="d-flex justify-content-start align-items-center">
            <span class="fw-bold" style="margin: 0 0 0 10px;"><?= $fn->getSession('email') ?></span>
        </div>
    <?php endif; ?>
</div>

<div class="input-group mb-4">
<div class="form-floating">
    <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password" autocomplete="off">
    <label for="floatingPassword">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-key" viewBox="0 0 16 16" style="margin:0 5px 5px 0;">
            <path d="M0 8a4 4 0 0 1 7.465-2H14a.5.5 0 0 1 .354.146l1.5 1.5a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0L13 9.207l-.646.647a.5.5 0 0 1-.708 0L11 9.207l-.646.647a.5.5 0 0 1-.708 0L9 9.207l-.646.647A.5.5 0 0 1 8 10h-.535A4 4 0 0 1 0 8m4-3a3 3 0 1 0 2.712 4.285A.5.5 0 0 1 7.163 9h.63l.853-.854a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.793-.793-1-1h-6.63a.5.5 0 0 1-.451-.285A3 3 0 0 0 4 5"/>
            <path d="M4 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0"/>
        </svg>
        Enter new Password
    </label>
</div>

<div class="input-group-append">
    <span class="input-group-text" type="button" id="togglePassword">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
  <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
  <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
</svg>
    </span>
</div>
</div>

<script>
    document.getElementById('togglePassword').addEventListener('click', function () {
        var passwordInput = document.getElementById('floatingPassword');
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
        } else {
            passwordInput.type = 'password';
        }
    });
</script>




                            <button type="submit" class=" btn butn btn-primary btn-block" style="color:white; width: 90%;"
                                style="color:black;"> Change Password </button>
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
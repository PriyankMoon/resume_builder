<nav class="navbar bg-body-tertiary shadow">
    <div class="container nav-" style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap;">
        <a class="navbar-brand" href="myresumes.php" style="display: flex; align-items: center;">
            <img src="./assets/images/logo.webp"
                style="height: 50px; width: 50px; border-radius: 50%; filter: brightness(120%); margin-right: 10px;" alt="Logo">
            <h1 class="logo-heading" style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; color: rgb(255, 255, 0); text-shadow: 0 0 10px rgba(168, 86, 255, 0.865); margin-bottom: 5px;">
                Resume <c style="color: black; text-shadow: none;">Builder</c>
            </h1>
        </a>

        <div>
            <a href="account.php" class="btn btn-sm btn-dark"><i class="bi bi-person-circle"></i> Account</a>
            <a href="actions/logout.action.php" class="btn btn-sm btn-danger"><i class="bi bi-box-arrow-left"></i></a>
        </div>
    </div>
</nav>

<style>
    /* Define styles for different screen sizes */
    @media (max-width: 576px) {
        .navbar-brand {
            flex-direction: column; /* Stack items vertically on small screens */
            align-items: center;
        }
        .logo-heading {
            font-size: 24px; /* Adjust font size for small screens */
            margin-top: 0; /* Remove top margin to keep logo and heading aligned */
        }
    }
</style>

<?php
$title = "Create Resume | Resume Builder";
require './assets/includes/header.myresumes.php';
require './assets/includes/navbar.php';
$fn->authPage();
?>
<style>
    @media (max-width: 1000px) {
        .resume-card {
            width: 100vw;
        }
    }
    .cross-icon:hover{
        color:red;
    }
    </style>

<div class="container resume-card">

        <div class="bg-white rounded shadow p-2 mt-4" style="min-height:80vh">
            <div class="d-flex justify-content-between border-bottom">
                <h5>Create Resume</h5>
                <div>
                <a class="text-decoration-none cursor-pointer"onClick='history.back()'><i class="bi bi-arrow-left-circle"></i> Back</a>
                </div>
            </div>

            <div>

                <form action="actions/createresume.action.php" method="post" class="row g-3 p-3">
                    <h5 class="mt-3 text-secondary"><i class="bi bi-person-badge"></i> Personal Information</h5>
                    <div class="col-md-6">
                        <label class="form-label">Resume Title</label><span style="color:red;">*</span>
                        <input type="text" name="resume_title" placeholder="Web Developer" value="resume<?=time()?>" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Full Name</label><span style="color:red;">*</span>
                        <input type="text" name="full_name" placeholder="Dev Ninja" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Email</label><span style="color:red;">*</span>
                        <input type="email" name="email_id" placeholder="dev@abc.com" class="form-control" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Mobile No</label><span style="color:red;">*</span>
                        <input type="number" name="mobile_no" min="1111111111" placeholder="9569569569" max="9999999999" 
                            class="form-control" required autocomplete="off">
                    </div>
                    
                    <div class="col-md-6">
                        <label class="form-label">Date Of Birth</label><span style="color:red;">*</span>
                        <input type="date" name="dob" class="form-control" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Gender</label><span style="color:red;">*</span>
                        <select class="form-select" name="gender">
                            <option>Male</option>
                            <option>Female</option>
                            <option>Other</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Religion</label><span style="color:red;">*</span>
                        <select class="form-select" name="religion">
                            <option>Hindu</option>
                            <option>Muslim</option>
                            <option>Buddhist</option>
                            <option>Sikh</option>
                            <option>Christian</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Nationality</label><span style="color:red;">*</span>
                        <select class="form-select" name="nationality">
                            <option>Indian</option>
                            <option>Non Indian</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Marital Status</label><span style="color:red;">*</span>
                        <select class="form-select" name="marital_status">
                            <option>Married</option>
                            <option>Single</option>
                            <option>Divorced</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Hobbies</label><span style="color:red;">*</span>
                        <input type="text" name="hobbies" placeholder="Reading Books, Watching Movies" class="form-control" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Languages Known</label><span style="color:red;">*</span>
                        <input type="text" name="languages" placeholder="Hindi,English" class="form-control" required>
                    </div>

                    <div class="col-12">
                        <label for="inputAddress" class="form-label"> Address</label><span style="color:red;">*</span>
                        <input type="text" name="address"class="form-control" id="inputAddress" placeholder="1234 Main St" required>
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">Personal Link (optional)</label>
                        <input type="text" name="personal_link" placeholder="link" class="form-control">
                    </div>
                    <hr>
                    

                    <h5 class="mt-3 text-secondary"><i class="bi bi-file-earmark-person"></i> Objective</h5>
                    <div class="col-12">
                        <label for="objective" class="form-label">Objective</label><span style="color:red;">*</span>
                        <textarea name="objective" class="form-control" id="objective" placeholder="Enter your objective..." style="height: 100px;" required></textarea>
                    </div>
                    <hr>

                    <div class="col-12 text-end">
                        <button type="submit" class="btn btn-primary"><i class="bi bi-floppy"></i> Add
                            Resume</button>
                    </div>
                </form>
            </div>





        </div>

    </div>

   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
        <?php
        require './assets/includes/footer.php';
        ?>
<?php
$title = "Create Resume | Resume Builder";
require './assets/includes/header.myresumes.php';
require './assets/includes/navbar.php';
$fn->authPage();
$slug=$_GET['resume']??'';
$resumes = $db->query("SELECT * FROM resumes WHERE (slug='$slug' AND user_id=" . $fn->Auth()['id'].") ");
$resume = $resumes->fetch_assoc();
if(!$resume){
    header('Location: myresumes.php');
            exit();
}
// $exps is for experience
$exps = $db->query("SELECT * FROM experiences WHERE (resume_id=".$resume['id'].") ");
$exps = $exps->fetch_all(1);

// $edus is for education
$edus = $db->query("SELECT * FROM educations WHERE (resume_id=".$resume['id'].") ");
$edus = $edus->fetch_all(1);

// $skills is for skills
$skills = $db->query("SELECT * FROM skills WHERE (resume_id=".$resume['id'].") ");
$skills = $skills->fetch_all(1);

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
                <a href="myresumes.php" class="text-decoration-none cursor-pointer"><i class="bi bi-arrow-left-circle"></i> Back</a>
                </div>
            </div>

            <div>

                <form action="actions/updateresume.action.php" method="post" class="row g-3 p-3">
                <input type="hidden" name="id" value="<?=$resume['id']?>" />
                <input type="hidden" name="slug" value="<?=$resume['slug']?>" />
                    <h5 class="mt-3 text-secondary"><i class="bi bi-person-badge"></i> Personal Information</h5>
                    <div class="col-md-6">
                        <label class="form-label">Resume Title</label><span style="color:red;">*</span>
                        <input type="text" name="resume_title" placeholder="Web Developer" value="<?=@$resume['resume_title']?>" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Full Name</label><span style="color:red;">*</span>
                        <input type="text" name="full_name" placeholder="Dev Ninja" value="<?=@$resume['full_name']?>" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Email</label><span style="color:red;">*</span>
                        <input type="email" name="email_id" placeholder="dev@abc.com" value="<?=@$resume['email_id']?>" class="form-control" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Mobile No</label><span style="color:red;">*</span>
                        <input type="number" name="mobile_no" min="1111111111" placeholder="9569569569" value="<?=@$resume['mobile_no']?>" max="9999999999"
                            class="form-control" required>
                    </div>
                    
                    <div class="col-md-6">
                        <label class="form-label">Date Of Birth</label><span style="color:red;">*</span>
                        <input type="date" name="dob" value="<?=@$resume['dob']?>" class="form-control" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Gender</label><span style="color:red;">*</span>
                        <select class="form-select" name="gender">
                            <option <?=($resume['gender']=='Male')?'selected':''?>>Male</option>
                            <option <?=($resume['gender']=='Female')?'selected':''?>>Female</option>
                            <option <?=($resume['gender']=='Other')?'selected':''?>>Other</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Religion</label><span style="color:red;">*</span>
                        <select class="form-select" name="religion">
                            <option <?=($resume['religion']=='Hindu')?'selected':''?>>Hindu</option>
                            <option <?=($resume['religion']=='Muslim')?'selected':''?>>Muslim</option>
                            <option <?=($resume['religion']=='Buddhist')?'selected':''?>>Buddhist</option>
                            <option <?=($resume['religion']=='Sikh')?'selected':''?>>Sikh</option>
                            <option <?=($resume['religion']=='Christian')?'selected':''?>>Christian</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Nationality</label><span style="color:red;">*</span>
                        <select class="form-select" name="nationality">
                            <option <?=($resume['nationality']=='Indian')?'selected':''?>>Indian</option>
                            <option <?=($resume['nationality']=='Non Indian')?'selected':''?>>Non Indian</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Marital Status</label><span style="color:red;">*</span>
                        <select class="form-select" name="marital_status">
                            <option <?=($resume['marital_status']=='Married')?'selected':''?>>Married</option>
                            <option <?=($resume['marital_status']=='Single')?'selected':''?>>Single</option>
                            <option <?=($resume['marital_status']=='Divorced')?'selected':''?>>Divorced</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Hobbies</label><span style="color:red;">*</span>
                        <input type="text" name="hobbies" placeholder="Reading Books, Watching Movies" value="<?=@$resume['hobbies']?>" class="form-control" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Languages Known</label><span style="color:red;">*</span>
                        <input type="text" name="languages" placeholder="Hindi,English" value="<?=@$resume['languages']?>" class="form-control" required>
                    </div>

                    <div class="col-12">
                        <label for="inputAddress" class="form-label"> Address</label><span style="color:red;">*</span>
                        <input type="text" name="address"class="form-control" id="inputAddress" value="<?=@$resume['address']?>" placeholder="1234 Main St" required>
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">Personal Link (optional)</label>
                        <input type="text" name="personal_link" placeholder="link" value="<?=@$resume['personal_link']?>" class="form-control">
                    </div>
                    <hr>
                    

                    <h5 class="mt-3 text-secondary"><i class="bi bi-file-earmark-person"></i> Objective</h5>
                    <div class="col-12">
                        <label for="objective" class="form-label">Objective</label><span style="color:red;">*</span>
                        <textarea name="objective" class="form-control" id="objective" placeholder="Enter your objective..." style="height: 100px;" required><?=@$resume['objective']?></textarea>
                    </div>
                    <hr>


                    <div class="d-flex justify-content-between">
                        <h5 class=" text-secondary"><i class="bi bi-briefcase"></i> Experience</h5>
                        <div>
                            <a class="text-decoration-none cursor-pointer" data-bs-toggle="modal" data-bs-target="#addexp"><i class="bi bi-file-earmark-plus"></i> Add New</a>
                        </div>
                    </div>
                    <h6 class="col-9" style="font-weight: 100; margin-top:-5px; margin-left: 22px;">Optimize and prioritize your experience by placing your current role at the forefront.</h6>
                    <div class="d-flex flex-wrap">

<?php
if($exps){
    foreach($exps as $exp){
        ?>
<div class="col-12 col-md-6 p-2">
                            <div class="p-2 border rounded">
                                <div class="d-flex justify-content-between">
                                    <h6><?=$exp['position']?></h6>
                                    <a href="actions/deleteexp.action.php?id=<?=$exp['id']?>&resume_id=<?=$resume['id']?>&slug=<?=$resume['slug']?>"><i class="cross-icon bi bi-x-lg"></i></a>
                                </div>

                                <p class="small text-secondary m-0" style="">
                                    <i class="bi bi-buildings"></i> <?=$exp['company']?> (<?=$exp['started'].' -'.$exp['ended']?>)
                                </p>
                                <p class="small text-secondary m-0" style="">
                                    <?=$exp['job_desc']?>
                                </p>

                            </div>
                        </div>
        <?php
    }
}else{
?>
<div class="col-12 col-md-6 p-2">
                            <div class="p-2 border rounded">
                                <div class="d-flex justify-content-between">
                                    <h6>I am Fresher</h6>
                                    
                                </div>
                                <p class="small text-secondary m-0" style="">
                            If you have experience you can add it !
                            </p>

                            </div>
                        </div>
<?php
}
?>                    
                
                        

                    </div>

                    <hr>


                    <div class="d-flex justify-content-between">
                        <h5 class=" text-secondary"><i class="bi bi-journal-bookmark"></i> Education </h5>
                        <div>
                            <a class="text-decoration-none cursor-pointer" data-bs-toggle="modal" data-bs-target="#addedu"><i class="bi bi-file-earmark-plus"></i> Add New</a>
                        </div>
                    </div>
                    <h6 class="col-9" style="font-weight: 100; margin-top:-5px; margin-left: 22px;">Prioritize your education by placing your most recent and relevant qualifications first for better optimization.</h6>

                    <div class="d-flex flex-wrap">

                    <?php
if($edus){
    foreach($edus as $edu){
        ?>
<div class="col-12 col-md-6 p-2">
                            <div class="p-2 border rounded">
                                <div class="d-flex justify-content-between">
                                    <h6><?=$edu['course']?></h6>
                                    <a href="actions/deleteedu.action.php?id=<?=$edu['id']?>&resume_id=<?=$resume['id']?>&slug=<?=$resume['slug']?>"><i class="cross-icon bi bi-x-lg"></i></a>
                                </div>

                                <p class="small text-secondary m-0" style="">
                                    <i class="bi bi-book"></i> <?=$edu['institute']?>
                                </p>
                                <p class="small text-secondary m-0" style="">
                                <?=$edu['started'].' -'.$edu['ended']?>
                                </p>

                            </div>
                        </div>
        <?php
    }
}else{
?>
<div class="col-12 col-md-6 p-2">
                            <div class="p-2 border rounded">
                                <div class="d-flex justify-content-between">
                                    <h6>I have no education</h6>
                                    
                                </div>
                                <p class="small text-secondary m-0" style="">
                            If you have education you can add it !
                            </p>

                            </div>
                        </div>
<?php
}
?>  

                    </div>

                    <hr>
                    <div class="d-flex justify-content-between">
                        <h5 class=" text-secondary"><i class="bi bi-boxes"></i> Skills</h5>
                        <div>
                            <a class="text-decoration-none cursor-pointer" data-bs-toggle="modal" data-bs-target="#addskill"><i class="bi bi-file-earmark-plus"></i> Add New</a>
                        </div>
                    </div>

                    <div class="d-flex flex-wrap">


<?php
if($skills){
    foreach($skills as $skill){
        ?>
<div class="col-12 p-2">
                            <div class="p-2 border rounded">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h6><i class="bi bi-caret-right"></i><b><?=$skill['skill']?> </b><?=@$skill['sub_skill'] ? " - {$skill['sub_skill']} ." : ''?> </h6>
                                    <a href="actions/deleteskill.action.php?id=<?=$skill['id']?>&resume_id=<?=$resume['id']?>&slug=<?=$resume['slug']?>"><i class="cross-icon bi bi-x-lg"></i></a>
                                </div>
                            </div>
                        </div>
        <?php
    }
}else{
?>
<div class="col-12 p-2">
                            <div class="p-2 border rounded">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h6><i class="bi bi-caret-right"></i> I have no Skills.</h6>
                                </div>
                            </div>
                        </div>
<?php
}
?>




                    </div>



                    <div class="col-12 text-end">
                        <button type="submit" class="btn btn-primary"><i class="bi bi-floppy"></i> Update
                            Resume</button>
                    </div>
                </form>
            </div>





        </div>

    </div>

    <!-- Modal addexp -->
<div class="modal fade" id="addexp" data-bs-backdrop="static" data-bd-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel"><i class="bi bi-briefcase" style="margin-right:5px;"></i>Add Experience</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="post" action="actions/addexperience.action.php" class="row g-3">
      <input type="hidden" name="resume_id" value="<?=$resume['id']?>" />
      <input type="hidden" name="slug" value="<?=$resume['slug']?>" />
  <div class="col-12">
    <label for="inputEmail4" class="form-label">Position / Job Role</label><span style="color:red;">*</span>
    <input type="text" class="form-control" name="position" placeholder="Web Developer Consultant (2+ Years)" id="inputPassword4" required>
  </div>
  <div class="col-12">
    <label for="inputPassword4" class="form-label">Company</label><span style="color:red;">*</span>
    <input type="text" class="form-control" name="company" placeholder="Google,Banglore" id="inputPassword4" required>
  </div>

  <div class="col-6">
    <label for="inputPassword4" class="form-label">Joined</label><span style="color:red;">*</span>
    <input type="text" class="form-control" name="started" placeholder="October 2021" id="inputPassword4" required>
  </div>
  <div class="col-6">
    <label for="inputPassword4" class="form-label">Resigned</label><span style="color:red;">*</span>
    <input type="text" class="form-control" name="ended" placeholder="Currently Working" id="inputPassword4" required>
  </div>

  <div class="col-12">
    <label for="inputPassword4" class="form-label">Job Description</label><span style="color:red;">*</span>
    <textarea class="form-control" name="job_desc" required></textarea>
  </div>

  
  <div class="col-12 text-end">
    <button type="submit" class="btn btn-primary">Add Experience</button>
  </div>
</form>
      </div>
      
    </div>
  </div>
</div>
<!-- Modal -->

<!-- Modal addedu -->
<div class="modal fade" id="addedu" data-bs-backdrop="static" data-bd-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel"><i class="bi bi-briefcase" style="margin-right:5px;"></i>Add Education</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="post" action="actions/addeducation.action.php" class="row g-3">
      <input type="hidden" name="resume_id" value="<?=$resume['id']?>" />
      <input type="hidden" name="slug" value="<?=$resume['slug']?>" />
  <div class="col-12">
    <label for="inputEmail4" class="form-label">Course / Degree</label><span style="color:red;">*</span>
    <input type="text" class="form-control" name="course" placeholder="B.Tech Engineering CSE " id="inputPassword4" required>
  </div>
  <div class="col-12">
    <label for="inputPassword4" class="form-label">Institute / Board</label><span style="color:red;">*</span>
    <input type="text" class="form-control" name="institute" placeholder="KDK College Of Engineering ,RTMNU" id="inputPassword4" required>
  </div>

  <div class="col-6">
    <label for="inputPassword4" class="form-label">Started</label><span style="color:red;">*</span>
    <input type="text" class="form-control" name="started" placeholder="October 2021" id="inputPassword4" required>
  </div>
  <div class="col-6">
    <label for="inputPassword4" class="form-label">Ended</label><span style="color:red;">*</span>
    <input type="text" class="form-control" name="ended" placeholder="Currently Pursuing" id="inputPassword4" required>
  </div>

  <div class="col-12 text-end">
    <button type="submit" class="btn btn-primary">Add Education</button>
  </div>
</form>
      </div>
      
    </div>
  </div>
</div>
<!-- Modal -->

<!-- Modal addskill -->
<div class="modal fade" id="addskill" data-bs-backdrop="static" data-bd-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel"><i class="bi bi-briefcase" style="margin-right:5px;"></i>Add Skills</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="post" action="actions/addskill.action.php" class="row g-3">
      <input type="hidden" name="resume_id" value="<?=$resume['id']?>" />
      <input type="hidden" name="slug" value="<?=$resume['slug']?>" />
  <div class="col-12">
    <label for="inputEmail4" class="form-label">Skill</label><span style="color:red;">*</span>
    <input type="text" class="form-control" name="skill" placeholder="Frontend" id="inputPassword4" required>
  </div>
  <div class="col-12">
  <label for="inputEmail4" class="form-label">Sub-Skill (optional)</label>
    <input type="text" class="form-control" name="sub_skill" placeholder="HTML | CSS | JavaScript | Bootstrap | ......" id="inputPassword4">
  </div>

  <div class="col-12 text-end">
    <button type="submit" class="btn btn-primary">Add Skill</button>
  </div>
</form>
      </div>
      
    </div>
  </div>
</div>
<!-- Modal -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
        <?php
        require './assets/includes/footer.php';
        ?>
<?php
require 'assets/class/database.class.php';
require 'assets/class/function.class.php';


$slug=$_GET['resume']??'';
$resumes = $db->query("SELECT * FROM resumes WHERE (slug='$slug') ");
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;400&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <!-- Add this in the head section of your HTML file -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <link rel="shortcut icon" href="./assets/images/img1.webp" type="image/x-icon">
    <title>
        <?=$resume['full_name'].' | '.$resume['resume_title']?>
    </title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #edc243d9;
            font-family: 'Poppins', sans-serif;
            font-size: 12pt;
            background-image: url(./assets/images/tiles/<?=@$resume['background']?>);
            background-attachment: fixed;
            background-size: cover;
        }
        /* body {
            width: 100%;
            height: 100%;
            --color: #E1E1E1;
            background-color: #F3F3F3;
            background: linear-gradient(0deg, transparent 24%, var(--color) 25%, var(--color) 26%, transparent 27%, transparent 74%, var(--color) 75%, var(--color) 76%, transparent 77%, transparent),
                linear-gradient(90deg, transparent 24%, var(--color) 25%, var(--color) 26%, transparent 27%, transparent 74%, var(--color) 75%, var(--color) 76%, transparent 77%, transparent);
            background-size: 55px 55px;
        } */

        /* body {
            width: 100%;
            height: 100%;
            --u: 5px;
            --c1: #ededee;
            --c2: #000000;
            --c3: #1e1e1e;
            --gp: 50% / calc(var(--u) * 16.9) calc(var(--u) * 12.8);
            background: conic-gradient(from 122deg at 50% 85.15%,
                    var(--c2) 0 58deg,
                    var(--c3) 0 116deg,
                    #fff0 0 100%) var(--gp),
                conic-gradient(from 122deg at 50% 72.5%, var(--c1) 0 116deg, #fff0 0 100%) var(--gp),
                conic-gradient(from 58deg at 82.85% 50%, var(--c3) 0 64deg, #fff0 0 100%) var(--gp),
                conic-gradient(from 58deg at 66.87% 50%,
                    var(--c1) 0 64deg,
                    var(--c2) 0 130deg,
                    #fff0 0 100%) var(--gp),
                conic-gradient(from 238deg at 17.15% 50%, var(--c2) 0 64deg, #fff0 0 100%) var(--gp),
                conic-gradient(from 172deg at 33.13% 50%,
                    var(--c3) 0 66deg,
                    var(--c1) 0 130deg,
                    #fff0 0 100%) var(--gp),
                linear-gradient(98deg, var(--c3) 0 15%, #fff0 calc(15% + 1px) 100%) var(--gp),
                linear-gradient(-98deg, var(--c2) 0 15%, #fff0 calc(15% + 1px) 100%) var(--gp),
                conic-gradient(from -58deg at 50.25% 14.85%,
                    var(--c3) 0 58deg,
                    var(--c2) 0 116deg,
                    #fff0 0 100%) var(--gp),
                conic-gradient(from -58deg at 50% 28.125%, var(--c1) 0 116deg, #fff0 0 100%) var(--gp),
                linear-gradient(90deg, var(--c2) 0 50%, var(--c3) 0 100%) var(--gp);
        } */

        /* body {
            width: 100%;
            height: 100%;
            --color: rgb(200, 215, 228);
            background-color: #9c9c9c;
            background-image: linear-gradient(0deg, transparent 24%, var(--color) 25%, var(--color) 26%, transparent 27%, transparent 74%, var(--color) 75%, var(--color) 76%, transparent 77%, transparent),
                linear-gradient(90deg, transparent 24%, var(--color) 25%, var(--color) 26%, transparent 27%, transparent 74%, var(--color) 75%, var(--color) 76%, transparent 77%, transparent);
            background-size: 55px 55px;
        } */

        /* body {
            width: 100%;
            height: 100%;
            --s: 200px;
            --c1: #9be1ff;
            --c2: #b0ffe6;
            --c3: #7ea7ff;

            background: repeating-conic-gradient(from 30deg,
                    #00000000 0 120deg,
                    var(--c3) 0 180deg) calc(0.5 * var(--s)) calc(0.5 * var(--s) * 0.577),
                repeating-conic-gradient(from 30deg,
                    var(--c1) 0 60deg,
                    var(--c2) 0 120deg,
                    var(--c3) 0 180deg);
            background-size: var(--s) calc(var(--s) * 0.577);
        } */

        /* body {
            width: 100%;
            height: 100%;
            --s: 140px;

            --_g: #0000 52%, #170409
                54% 57%, #0000 59%;
            background: radial-gradient(farthest-side at -33.33% 50%, var(--_g)) 0 calc(var(--s) / 2),
                radial-gradient(farthest-side at 50% 133.33%, var(--_g)) calc(var(--s) / 2) 0,
                radial-gradient(farthest-side at 133.33% 50%, var(--_g)),
                radial-gradient(farthest-side at 50% -33.33%, var(--_g)), #67917a;
            background-size: calc(var(--s) / 4.667) var(--s),
                var(--s) calc(var(--s) / 4.667);
        } */

        * {
            margin: 0px;
        }

        * {
            box-sizing: border-box;
            -moz-box-sizing: border-box;
        }

        .page {
            width: 45rem;
            min-height: 29.7cm;
            padding: 0.5cm;
            margin: 0.5cm auto;
            border: 1px #D3D3D3 solid;
            border-radius: 5px;
            background: white;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        .subpage {


            /* height: 256mm; */


        }

        @page {
            size: A4;
            margin: 0;
        }

        @media print {
            .page {
                margin: 0;
                border: initial;
                border-radius: initial;
                width: initial;
                min-height: initial;
                box-shadow: initial;
                background: initial;
                page-break-after: auto;
            }
        }

        * {
            transition: all .2s;
        }

        table {
            border-collapse: collapse;
        }

        .pr {
            padding-right: 30px;
        }

        .pd-table td {
            padding-right: 10px;
            padding-bottom: 3px;
            padding-top: 3px;
        }

        .extra {
            background-color: #BF92B2;
        }

        .extra .btn {
            background-color: white;
            color: black;
            transition: 0.35s all ease;
        }

        .extra .btn:hover {
            text-shadow: 0 0 5px silver;
            box-shadow: 0 0 5px white;
            background-color: black;
            color: white;
        }
        .dropdown-menu .dropdown-item{
            transition: 0s all ease;
        }
        .dropdown-menu .dropdown-item:hover{
            background-color:white;
            color:black;
        }
        .dropdown-menu .btn:hover{
            border:2px solid black;
            border-radius: 15px;
            background-color: white;
            color: black;
        }

        /* Font family */

        @font-face {
            font-family: DO;
            src: url(./assets/fonts/DripOctober.woff2);
        }

        @font-face {
            font-family: RJ;
            src: url(./assets/fonts/Rejouice-Headline.woff2);
        }

        @font-face {
            font-family: FS-Ostro;
            src: url("https://db.onlinewebfonts.com/t/f9ad3735a42ad7a8f71e0554ca1f78d5.woff2")format("woff2");
        }

        @font-face {
            font-family: D3C;
            src: url(./assets/fonts/D3Craftism.woff2);
        }

        @font-face {
            font-family: NSR;
            src: url(./assets/fonts/NonserifRegular.woff2);
        }

        #imageContainer img {
            width: 100px;
            height:100px;
            scale:1.2;
            margin: 0 0 30px 20px;
            cursor: pointer;
            border-radius: 50%;
            object-fit: cover;
        }

        #uploadButton {
            display: block;
        }
    </style>
</head>

<body style="align-items: center; justify-content: center;">

<?php
if($fn->Auth()!=false && $fn->Auth()['id']==$resume['user_id']){
    ?>
    <div class="extra">
    <div class=" w-100 py-2 gap-3" style="display:flex; justify-content:center; align-items:center; ">
    <!-- Upload Image button -->
    <button class="btn btn-sm" id="uploadButton" data-toggle="modal" data-target="#uploadModal" aria-hidden="false">
        <i class="bi bi-camera"> </i>Upload Profile
        </button>
        <button class="btn btn-sm" data-bs-toggle="offcanvas" data-bs-target="#background"><i class="bi bi-card-image"> </i>Background</button>
        <button class="btn btn-sm" data-bs-toggle="offcanvas" data-bs-target="#font"><i class="bi bi-fonts"> </i>Font</button>



        <!-- this is share button drop down list  -->
        <!-- This is to get current page url  -->
    <?php
    $currentPageUrl = 'http://' . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
    ?>
    <!-- $currentPageUrl is used to store the url of this page  well
                i used in whatsapp , gmail and copy to clip board-->
    <div class="dropdown btn-sm">
    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
    Share
  </a>
  <ul class="dropdown-menu">
  <!-- .%0A is used to break line while sending whatsapp -->
    <li><a href="whatsapp://send?text=Hey this is the link of <?= $resume['full_name'] ?> Resume.%0A<?=$currentPageUrl?>" class="btn btn-sm dropdown-item"><i class="bi bi-whatsapp" style="color:#00ff6a;"> </i>Whatsapp</a></li>
    <li><a href="mailto:?subject=<?= $resume['full_name'] ?> Resume&body=<?= $currentPageUrl ?>" class="btn btn-sm dropdown-item"><i class="bi bi-envelope-arrow-up-fill" style="color:#ea4335;"> </i>Mail</a></li>
    <!-- Add an ID to the link for easier identification -->
<li><a href="#" id="copyLinkBtn" class="btn btn-sm dropdown-item"><i class="bi bi-clipboard"> </i>Copy To Clipboard</a></li>
<!-- we r not doing download through php but through js library (jspdf)-->
<li><a id="downloadpdf" class="btn btn-sm dropdown-item"><i class="bi bi-download"> </i>Download</a></li>
<li><a id="print" class="btn btn-sm dropdown-item"><i class="bi bi-printer"> </i>Print</a></li>
<script>
document.getElementById('copyLinkBtn').addEventListener('click', function(event) {
    // Prevent the default behavior of the anchor tag
    event.preventDefault();

    // Create a temporary input element
    var input = document.createElement('input');
    
    // Set the value of the input to the current page URL
    input.value = '<?=$currentPageUrl?>';

    // Append the input to the body
    document.body.appendChild(input);

    // Select the input's content
    input.select();

    // Execute the copy command
    document.execCommand('copy');

    // Remove the temporary input element
    document.body.removeChild(input);

    // Use SweetAlert2 to show a success message
    Swal.fire({
        title: "Link copied!",
        text: "The link has been copied to the clipboard.",
        icon: "success"
    });
});
</script>
  </ul>
    </div>
    </div>
    </div>
    <?php
}
?>


    <div class="page" style="font-family:<?=$resume['font']?>;">
        <div class="subpage">
            <table class="w-100">
                <tbody>
                    <tr>
                        <td colspan="2" class="text-center fw-bold fs-4" style="padding-bottom:10px;"><?=$resume['resume_title']?></td>
                    </tr>
                    <tr>
                        <td>
                            <!-- Image Container -->
                            <div id="imageContainer"></div>
                        </td>
                        <td class="personal-info zsection">
                            <div class="fw-bold name">
                                <?=$resume['full_name']?>
                            </div>
                            <div>Mobile : <span class="mobile">+91-
                                    <?=$resume['mobile_no']?>
                                </span></div>
                            <div>Email : <span class="email">
                                    <?=$resume['email_id']?>
                                </span></div>
                            <div>Address : <span class="address">
                                    <?=$resume['address']?>
                                </span></div>
                            <div><span class="personal_link">
                                <!-- now now i have used letter-spacing:-1.5px because when i down it via download btn as pdf i dont know why but 
                                for some reason there is spaced btwn text of the link so i had to do it 
                                or when i copy an dpaaste th elink wont work -->
                                    <a href="<?=@$resume['personal_link']?>" style="color:#9f5bff; text-decoration:none; letter-spacing: -1.5px;">
                                        <?=@$resume['personal_link']?>
                                    </a>
                                </span></div>
                            <hr>
                        </td>
                    </tr>

                    <tr class="objective-section zsection">
                        <td class="fw-bold align-top text-nowrap pr title">Objective</td>
                        <td class="pb-3 objective">
                            <?=$resume['objective']?>
                        </td>
                    </tr>

                    <tr class="experience-section zsection">
                        <td class="fw-bold align-top text-nowrap pr title">Experience</td>
                        <td class="pb-3 experiences">

                            <?php
                        if($exps){
foreach($exps as $exp){
    ?>
                            <div class="experience mb-2">
                                <div class="fw-bold">- <span class="job-role"><?=$exp['position']?></span>
                                </div>
                                <div class="company"><?=$exp['company']?></div>
                                <div><span class="working-from"><?=$exp['started']?></span> – <span class="working-to"><?=$exp['ended']?></span></div>
                                <div class="work-description"><?=$exp['job_desc']?></div>
</div>
                                <?php
}
                        }else{
?>
<div class="experience mb-2">
                                <div class="experience">I am a Fresher.</div>         
                        </div>     
<?php
                        }
                        ?>



                        </td>
                    </tr>

                    <tr class="education-section zsection">
                        <td class="fw-bold align-top text-nowrap pr title">Education</td>
                        <td class="pb-3 educations">

                        <?php
                        if($edus){
foreach($edus as $edu){
    ?>
                            <div class="education mb-2">
                                <div class="fw-bold">- <span class="course"><?=$edu['course']?> </span></div>
                                <div class="institute"><?=$edu['institute']?> </div>
                                <div><span class="working-from"><?=$edu['started']?> </span> - <span class="working-to"><?=$edu['ended']?> </span></div>
                            </div>

                                <?php
}
                        }else{
?>
<div class="education mb-2">
                                <div class="education">I don't have any Education.</div>         
                        </div>     
<?php
                        }
                        ?>
                        </td>
                    </tr>

                    <tr class="skills-section zsection">
                        <td class="fw-bold align-top text-nowrap pr title">Skills</td>
                        <td class="pb-3 skills">

                        <?php
                        if($skills){
                            foreach($skills as $skill){
                                ?>
                                <div class="education mb-2">
                                <div class="skill">- <b><?=$skill['skill']?> </b><?=@$skill['sub_skill'] ? " - {$skill['sub_skill']} ." : ''?> </div>
                            </div>
                                <?php
                            }
                        }else{
                            ?>
                            <div class="skill"> I don't have any Skills . </div>
                            <?php
                        }
                        ?>

                        </td>
                    </tr>

                    <tr class="personal-details-section zsection">
                        <td class="fw-bold align-top text-nowrap pr title">Personal Details</td>
                        <td class="pb-3">
                            <table class="pd-table">
                                <tbody>
                                    <tr>
                                        <td>Date of Birth</td>
                                        <td>: <span class="date-of-birth"><?=date('d F Y',strtotime($resume['dob']))?> </span></td>
                                    </tr>
                                    <tr>
                                        <td>Gender</td>
                                        <td>: <span class="gender"><?=$resume['gender']?> </span></td>
                                    </tr>
                                    <tr>
                                        <td>Religion</td>
                                        <td>: <span class="religion"><?=$resume['religion']?> </span></td>
                                    </tr>
                                    <tr>
                                        <td>Nationality</td>
                                        <td>: <span class="nationality"><?=$resume['nationality']?> </span></td>
                                    </tr>
                                    <tr>
                                        <td>Marital Status</td>
                                        <td>: <span class="marital-status"><?=$resume['marital_status']?> </span></td>
                                    </tr>
                                    <tr>
                                        <td>Hobbies</td>
                                        <td>: <span class="hobbies"><?=$resume['hobbies']?> </span>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>

                        </td>
                    </tr>

                    <tr class="languages-known-section zsection">
                        <td class="fw-bold align-top text-nowrap pr title">Languages Known</td>
                        <td class="pb-3 languages">
                        <?=$resume['languages']?>  </td>
                    </tr>

                    <tr class="declaration-section zsection">
                        <td class="fw-bold align-top text-nowrap pr title">Declaration</td>
                        <td class="pb-5 declaration">
                            I hereby declare that above information is correct to the best of my
                            knowledge and can be supported by relevant documents as and when
                            required.
                        </td>
                    </tr>

                </tbody>
            </table>
            <div class="d-flex justify-content-between">
                <div class="px-3">Date : <?=date('d F , Y',($resume['updated_at']))?></div>
                <div class="px-3 name text-end"><?=$resume['full_name']?> </div>

            </div>
        </div>

    </div>

    <!-- Upload Modal -->
    <div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="uploadModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="uploadModalLabel">Upload Image</h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                        <!-- <i class="bi bi-x-lg"> </i> -->
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="uploadForm" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="imageInput">Choose an image:</label>
                                <input type="file" class="form-control" id="imageInput" name="image" accept="image/*">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="uploadImage()" data-dismiss="modal" id="uploadPhoto">Upload Image</button>
                    </div>
                </div>
            </div>
        </div>

        

    </div>
    
    <script>
// Function to handle image upload
function uploadImage() {
    // Get the input element
    var imageInput = document.getElementById('imageInput');

    // Check if a file is selected
    if (imageInput.files.length > 0) {
        // Perform the image upload logic here

        // Show SweetAlert2 success message
        Swal.fire({
        title: "Profile Image Uploaded Successfully!",
        html: `
            <div class="warn">
                <div class="row" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Coz' I don't have enough memory to store your images.">
                    <div class="col-12 text-danger" style="display:flex; text-align:center; align-items:center; justify-content:center; font-weight:900;">Important Notice</div>
                    <div class="col-12" style="display:flex; text-align:center; align-items:center; justify-content:center;">Please download your resume before reloading the page.</div>
                    <div class="col-12" style="display:flex; text-align:center; align-items:center; justify-content:center;">We will automatically delete your profile photo after reloading.</div>
                </div>
            </div>`,
        icon: "success"
    });

    // Initialize Bootstrap tooltips
    $(document).ready(function () {
        $('[data-bs-toggle="tooltip"]').tooltip();
    });
    } else {
        // If no file is selected, show an error message
        Swal.fire({
            title: "Error",
            text: "Please choose an image before uploading.",
            icon: "error"
        });
    }
}

// Event listener for the upload button in the modal
document.getElementById('uploadPhoto').addEventListener('click', uploadImage);
</script>


    <!-- Add Bootstrap JS and Popper.js links -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        function uploadImage() {
            var input = document.getElementById('imageInput');
            var container = document.getElementById('imageContainer');
            var uploadButton = document.getElementById('uploadButton');

            // Check if a file is selected
            if (input.files.length > 0) {
                var file = input.files[0];

                // Create a FileReader to read the uploaded image
                var reader = new FileReader();

                reader.onload = function (e) {
                    // Display the uploaded image
                    container.innerHTML = '<img src="' + e.target.result + '" alt="Uploaded Image" data-toggle="modal" data-target="#deleteModal" style=" object-fit: cover;">';
                    // Show the delete button
                    deleteBtn.style.display = 'inline-block';
                    // Hide the upload button
                    uploadButton.style.display = 'none';
                    // Set aria-hidden to true
                    uploadButton.setAttribute('aria-hidden', 'true');
                };

                // Read the image as a data URL
                reader.readAsDataURL(file);
            }

            // Close the upload modal
            $('#uploadModal').modal('hide');
        }

        function deleteImage() {
            var container = document.getElementById('imageContainer');
            var uploadButton = document.getElementById('uploadButton');

            // Remove the image
            container.innerHTML = '';
            // Show the upload button
            uploadButton.style.display = 'block';
            // Set aria-hidden to false
            uploadButton.setAttribute('aria-hidden', 'false');

            // Close the delete modal
            $('#deleteModal').modal('hide');
        }
    </script>

    <!-- Delete Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Delete Image</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                        <!-- <i class="bi bi-x-lg"> </i> -->
                        </button>
                </div>
                <div class="modal-body">
                    <p>Do you want to delete the image?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <button type="button" class="btn btn-danger" onclick="deleteImage()" data-dismiss="modal">Yes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Toggle OffCanvas For Font -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="font" aria-labelledby="offcanvasBottomLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasBottomLabel">Change Font</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
        <select class="form-control" id="font">
                <!-- these fonts are above in the style as
        MCP , AS , DO , FL , GZ , NV , RJ -->
                <option value="'Poppins', sans-serif" style="font-family:'Poppins', sans-serif;" <?=$resume['font']=="'Poppins', sans-serif"?'selected':''?>>'Poppins', sans-serif</option>
                <option value="DO" style="font-family:DO;" <?=$resume['font']=="DO"?'selected':''?>>DripOctober</option>
                <option value="RJ" style="font-family:RJ;" <?=$resume['font']=="RJ"?'selected':''?>>Rejouice-Headline</option>
                <option value="FS-Ostro" style="font-family:FS-Ostro;" <?=$resume['font']=="FS-Ostro"?'selected':''?>>FS-Ostro</option>
                <option value="D3C" style="font-family:D3C;" <?=$resume['font']=="D3C"?'selected':''?>>D3Craftism</option>
                <option value="NSR" style="font-family:NSR;" <?=$resume['font']=="NSR"?'selected':''?>>NonserifRegular</option>
            </select>
        </div>
        </div>
    </div>

    <!-- Toggle OffCanvas For Background -->
    <div class="offcanvas offcanvas-bottom" tabindex="-1" id="background" style="height:60vh;" aria-labelledby="offcanvasBottomLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasBottomLabel" style="font-weight:500;">Change Background</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <style>
                .tile{
                    width:12vw;
                    height:12vw;
                    box-shadow: 0 0 10px black,0 0 15px white;
                    /* margin: 0 7px 0 7px ; */
                    background-size:cover;
                }

                .tile:hover{
                    cursor:pointer;
                    scale:1.05;
                }
                </style> 
                <div class="d-flex gap-2 justify-content-center w-100 flex-wrap">

                <!-- this will be default bg as the style is in body 
                as well as the tag  -->
                <div class="tile" data-background="tile.webp" style="background-color: #edc243d9;"></div>

                    <!-- in case of image do this  -->
                    <?php
                    for ($i = 1; $i < 12; $i++) {
                        ?>
                        
                        <div class="tile" data-background="tile<?=$i?>.webp" style="background-image:url(./assets/images/tiles/tile<?=$i?>.webp);"></div>
                        <?php
                        }
                        
                        ?>

                    

                    <!-- this was an option but its not optimal 
                <div class="tile rounded" style="
            --color: #E1E1E1;
            background-color: #F3F3F3;
            background: linear-gradient(0deg, transparent 24%, var(--color) 25%, var(--color) 26%, transparent 27%, transparent 74%, var(--color) 75%, var(--color) 76%, transparent 77%, transparent),
                linear-gradient(90deg, transparent 24%, var(--color) 25%, var(--color) 26%, transparent 27%, transparent 74%, var(--color) 75%, var(--color) 76%, transparent 77%, transparent);
            background-size: 55px 55px;">
            </div> -->
            
            

            </div>  
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

    <!-- THis is jquery library i used here for font change  -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <!-- html to canvas  -->
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
     <!-- jspdf library to download the page as pdf  -->
    <script src="https://unpkg.com/jspdf@latest/dist/jspdf.umd.min.js"></script>
    <script>
        // thiis is for download 

        $("#downloadpdf").click(function(){
            window.jsPDF = window.jspdf.jsPDF
            var doc = new jsPDF();

            var page = document.querySelector('.subpage');

            doc.html(page,{
                callback: function(doc){
                    doc.save('<?=$resume['full_name']?> - <?=$resume['resume_title']?>.pdf');
                },
                margin:[4,8,4,8],
                x:0,
                y:0,
                width:200,
                windowWidth:800
            })
        });

        $("#font").change(function () {

            let font = $(this).find(":selected").val();
            $(".page").css('font-family', font);

            $.ajax({
                url:'actions/changefont.action.php',
                method:'post',
                data:{
                    resume_id: <?=@$resume['id']?> ,
                    font : font 
                },
                success:function(res){
                    console.log(res);
                },
                error:function(res){
                    console.log(res);
                    alert('font is not updated ');
                }
            })
        });


        // this is for changing background
$(".tile").click(function () {

let tile = $(this).data('background');

$("body").css('background-image','url(./assets/images/tiles/'+tile+')');

$.ajax({
    url:'actions/changebackground.action.php',
    method:'post',
    data:{
        resume_id: <?=@$resume['id']?> ,
        background : tile 
    },
    success:function(res){
        console.log(res);
    },
    error:function(res){
        console.log(res);
        alert('Background is not updated ');
    }
})
});

$("#print").click(function(){
    $(".extra").hide();

    window.print();

    setTimeout(() => {
        $(".extra").show();
    }, 500);
});
    </script>


</body>

</html>
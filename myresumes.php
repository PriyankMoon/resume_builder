<?php
$title = "My Resume | Resume Builder";
require './assets/includes/header.myresumes.php';
require './assets/includes/navbar.php';
$fn->authPage();
$resumesQuery = $db->query('SELECT * FROM resumes WHERE user_id=' . $fn->Auth()['id'].' ORDER BY id DESC');
$resumes = $resumesQuery->fetch_all(1);
?>

<style>
    @media (max-width: 1000px) {
        .resume-card {
            width: 100vw;
        }
    }
</style>

<div class="container resume-card">
    <div class="bg-white rounded shadow p-2 mt-4">
        <div class="d-flex justify-content-between border-bottom">
            <h5>Resumes</h5>
            <div>
                <a href="createresume.php" class="text-decoration-none"><i class="bi bi-file-earmark-plus"></i> Add New</a>
            </div>
        </div>

        <?php
        if ($resumes) {
            ?>
            <div class="resume-container d-flex flex-wrap">
                <?php
                foreach ($resumes as $resume) {
                    ?>
                    <div class="col-12 col-md-6 p-2 mb-2">
                        <div class="p-2 border rounded">
                            <h5><?=$resume['resume_title']?></h5>
                            <p class="small text-secondary m-0" style="font-size: 12px">
                            <i class="bi bi-clock-history"></i> Last Updated <?= date('d F, Y h:i A', $resume['updated_at']) ?>
                            </p>
                            <div class="d-flex justify-content-around align-items-center mt-1">
                                <a href="resume.php?resume=<?=$resume['slug']?>" target="_blank" class="open text-decoration-none small"><i class="bi bi-file-text"></i> Open</a>
                                <a href="updateresume.php?resume=<?=$resume['slug']?>" class="edit text-decoration-none small"><i class="bi bi-pencil-square"></i> Edit</a>
                                <a href="actions/deleteresume.action.php?id=<?=$resume['id']?>" class="delet text-decoration-none small"><i class="bi bi-trash2"></i> Delete</a>
                                <a href="whatsapp://send/?text=" class="share text-decoration-none small"><i class="bi bi-share"></i> Share</a>
                                <a href="actions/cloneresume.action.php?resume=<?=$resume['slug']?>" class="clone text-decoration-none small"><i class="bi bi-copy"></i> Clone</a>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
            <?php
        } else {
            ?>
            <div class="text-center py-3 border rounded mt-3" style="background-color: rgba(236, 236, 236, 0.56); height:50vh; display:flex;   justify-content:center; align-items:center; font-size:1.1em;">
                <i class="bi bi-file-text"></i> No Resumes Available
            </div>
            <?php
        }
        ?>
    </div>
</div>

<?php
require './assets/includes/footer.php';
?>

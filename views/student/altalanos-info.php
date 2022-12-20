<!DOCTYPE html>
<html lang="en">

<?php include_once './views/page-parts/header.php'; ?>


<body>

    <section id="title">
        <?php include_once './views/student/navbar.php'; ?>
    </section>

    <div class="row d-flex justify-content-center mx-auto my-5 fileUpload w-75">
        <div class="col p-4">
            <h2>Töltsd fel a megoldásod!</h2>
            <form id="fileUpload" method="POST" action="/student/altalanos-informaciok" enctype="multipart/form-data">
                <input type="file" name="fileToUpload" id="fileToUpload"> <br>
                <button class=" my-2" type="submit" name="uploadBtn">Feltöltés</button>
            </form>
        </div>
    </div>
    <?php
    if (isset($_SESSION['message']) && $_SESSION['message']) {
        echo 
        '<div class="row d-flex justify-content-center mx-auto my-5 w-75 fileUpload">
            <div class="col file">
                <p class="notification">' . $_SESSION['message'] . '</p>
            </div>
        </div>';

        unset($_SESSION['message']);
    }
    ?>
  


    <?php include_once './views/page-parts/back-to-top.php'; ?>

    <?php include_once './views/page-parts/footer.php'; ?>

    <!-- My Scripts -->
    <!-- <script src="../../assets/JS/fileUpload.js"></script> -->
</body>

</html>
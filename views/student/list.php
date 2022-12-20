<!DOCTYPE html>
<html lang="en">

<?php include_once './views/page-parts/header.php'; ?>

<body>
    <section id="title">
        <?php include_once './views/student/navbar.php'; ?>
    </section>

    <section id="main">
        <?php include_once './views/student/main.php'; ?>
    </section>

    <section id="comming-soon">
        <?php include_once './views/student/coming-soon.php'; ?>
    </section>

    <section id="google-map">
        <?php include_once './views/student/map.php'; ?>
    </section>


    <section id="sponsor">
        <?php include_once './views/page-parts/sponsor.php'; ?>
    </section>

    <?php include_once './views/page-parts/back-to-top.php'; ?>

    <section id="footer bg-dark ">
        <?php include_once './views/page-parts/footer.php'; ?>

    </section>


    <!-- My Scripts -->
    <script src="../../assets/JS/signUpForm.js"></script>


    <!-- Bootsrap Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />

</body>

</html>
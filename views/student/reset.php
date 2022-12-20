<!DOCTYPE html>
<html lang="en">

<?php include_once './views/page-parts/header.php'; ?>


<body>

    <section id="title">
        <?php include_once './views/student/navbar.php'; ?>
    </section>

    <div class="row d-flex justify-content-center mx-auto my-5 lost-pwd ">
        <div class="col py-5 px-3">
            <h1>Jelszó visszaállitás!</h1>
            <p>Ha létezik a megadott email egy jelszó és utmutatás lesz küldve a megadott email cimre!</p>
            <form id="reset-password">
                <label for="email"></label>
                <input type="text" id="email" name="email" placeholder="Email cim">
                <button type="submit">Küldés</button>
            </form>
        </div>
    </div>
    <p id="form-message" class="mx-auto"></p>


    <?php include_once './views/page-parts/back-to-top.php'; ?>

    <?php include_once './views/page-parts/footer.php'; ?>

    <!-- My Scripts -->
    <script src="../../assets/JS/resetPassword.js"></script>
</body>

</html>
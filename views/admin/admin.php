
<!DOCTYPE html>
<html lang="en">

<?php include_once './views/page-parts/header.php'; ?>
<link rel="stylesheet" href="../../assets/CSS/style.css" />


<body>
    <section id="title">
        <?php include_once './views/student/navbar.php'; ?>
    </section>

    <?php
    // var_dump($csapat);
    // var_dump($iranyitoTanar);
    foreach ($csapat as $value) {
    ?>
        <div class="row admin w-75 mx-auto my-4 p-4">
            <div class="col ">
                <h3><?php echo $value->getCsapatNev(); ?></h3>
                <div class="row py-2">
                    <div class="col-3">Csapatvezeto Tanar</div>
                    <?php
                    foreach ($iranyitoTanar as $tanar) {
                        if ($value->getCsapatNev() == $tanar->getCsapatNev()) {
                    ?>
                            <div class="col-3"> <?php echo $tanar->getKNev() . " " . $tanar->getVNev(); ?></div>
                    <?php
                        }
                    }
                    ?>

                </div>

                <div class="row py-2">
                    <div class="col-3">Tanar Email</div>
                    <div class="col-6">
                        <?php
                        foreach ($iranyitoTanar as $tanar) {
                            if ($value->getCsapatNev() == $tanar->getCsapatNev()) {
                        ?>
                                <div class="col-3"> <?php echo $tanar->getEmail(); ?></div>
                        <?php
                            }
                        }
                        ?>
                    </div>
                </div>

                <div class="row py-2">
                    <div class="col-3">Csapattagok:</div>
                    <?php
                    foreach ($diakok as $diak) {
                        if ($value->getCsapatNev() == $diak->getCsapatNev()) {
                    ?>
                            <div class="col-2"> <?php echo $diak->getKNev() . " " . $diak->getVNev(); ?></div>
                    <?php
                        }
                    }
                    ?>

                </div>

                <div class="row py-2">
                    <div class="col-3">Kepviselt Iskola</div>
                    <div class="col-6">
                        <?php
                        foreach ($iskola as $isk) {
                            if ($value->getSchoolID() == $isk->getId()) {
                        ?>
                                <div class="col-3"> <?php echo $isk->getNev(); ?></div>
                        <?php
                            }
                        }
                        ?>
                    </div>
                </div>

            </div>
        </div>

    <?php } ?>



    <?php include_once './views/page-parts/back-to-top.php'; ?>

</body>

</html>
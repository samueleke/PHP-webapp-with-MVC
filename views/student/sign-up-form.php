<!DOCTYPE html>
<html lang="en">

<?php include_once './views/page-parts/header.php'; ?>
<link rel="stylesheet" href="../../assets/CSS/signUpForm.css" />


<body>
    <section id="title">
        <?php include_once './views/student/navbar.php'; ?>
    </section>
   
    <!-- Form beginning-->
     <?php if (isset($_COOKIE["diakSzam"])) {
    ?>
        <div class="row mx-auto m-5">
            <div class="col group-full d-flex justify-content-center">A csapat megtelt</div>
            <a class="button my-3 d-flex justify-content-center w-75" href="/student">Vissza a főoldalra!</a>
        </div> 
   <?php
     }else {    ?> 
        <main id="main">
            <div class="container w-75 my-4">
                <div class="form-title">Jelentkezés!</div>
                <form class="form my-2" id="student-form">
                    <div class="row">
                        <div class="col-md-6 ">
                            <label class="form-label" name="csname">Név</label><br />
                            <input class="form-control" type="text" id="csname" name="csname" placeholder="Családnév" />
                            <i class="fas fa-check-circle"></i>
                            <i class="fas fa-exclamation-circle"></i>
                            <small>Error message</small>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label visibility-hidden" for="kname">" "</label><br />
                            <input class="form-control" type="text" id="kname" name="kname" placeholder="Keresztnév" />
                            <i class="fas fa-check-circle"></i>
                            <i class="fas fa-exclamation-circle"></i>
                            <small>Error message</small>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label" for="email">E-mail</label><br>
                            <input class="form-control" type="email" name="email" id="email" placeholder="pl: nev@pelda.com">
                            <i class="fas fa-check-circle"></i>
                            <i class="fas fa-exclamation-circle"></i>
                            <small>Error message</small>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="telefonszam">Telefonszám</label><br>
                            <input class="form-control" type="tel" name="telefonszam" id="telefonszam" placeholder="+40 1234 5678">
                            <i class="fas fa-check-circle"></i>
                            <i class="fas fa-exclamation-circle"></i>
                            <small>Error message</small>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <label for="city" class="form-label">Cim</label>
                            <input type="text" class="form-control" name="city" id="city" placeholder="Város">

                        </div>
                        <div class="col-sm">
                            <label for="county<" class="form-label visibility-hidden">""</label>
                            <input type="text" class="form-control" name="county" id="county" placeholder="Megye">
                        </div>
                        <div class="col-sm">
                            <label for="post_code>" class="form-label visibility-hidden">" "</label>
                            <input type="text" class="form-control" name="post_code" id="post_code" placeholder="Irányítószám">
                        </div>

                    </div>



                    <div class="row">
                        <div class="col-md">
                            <span>Osztály:</span>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input osztaly" type="checkbox" id="inlineCheckbox1" value="X" name="group" onclick="selectOnlyThis(this.id,'osztaly')">
                                <label class="form-check-label" for="inlineCheckbox1">X</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input osztaly" type="checkbox" id="inlineCheckbox2" value="XI" name="group" onclick="selectOnlyThis(this.id,'osztaly')">
                                <label class="form-check-label" for="inlineCheckbox2">XI</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input osztaly" type="checkbox" id="inlineCheckbox3" value="XII" name="group" onclick="selectOnlyThis(this.id,'osztaly')">
                                <label class="form-check-label" for="inlineCheckbox3">XII</label>
                            </div>
                        </div>

                    </div>

                    <hr>
                    <div class="row">

                        <div class="col">
                            <div class="input-group mb-3">
                                <label class="input-group-text" for="inputGroupSelect?>">Iskola</label>
                                <select class="form-select" id="inputGroupSelect" name="IskolaNev" placeholder="Valassz Iskolat">

                                    <?php foreach ($schools as $value) { ?>
                                        <option value="<?php echo $value->getNev(); ?>">
                                            <?php echo $value->getNev() . " - " . $value->getTelepules(); ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col d-flex align-items-center justify-content-center">
                        <input type="submit" value="Kész" class="btn btn-dark w-25 " />
                    </div>

                    <p id="form-message"></p>

                </form>


            </div>
        </main>
    <?php
    ;
    } ?>
    <?php include_once './views/page-parts/back-to-top.php'; ?>

    <script src="../../assets/JS/signUpForm.js"></script>
    <script src="../../assets/JS/studentData.js"></script>

    <!-- Bootsrap Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />

</body>

</html>
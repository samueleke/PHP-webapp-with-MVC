<!DOCTYPE html>
<html lang="en">

<?php include_once './views/page-parts/header.php'; ?>
<link rel="stylesheet" href="../../assets/CSS/login-sign-up.css">

<body>
    <div class="container w-50 mx-auto py-3 my-auto">


        <!-- Pills navs -->
        <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="tab-login" href="/login" role="tab" aria-selected="true">Login</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="tab-register" data-mdb-toggle="pill" href="#" role="tab" aria-controls="pills-register" aria-selected="false">Register</a>
            </li>
        </ul>
        <!-- Pills navs -->

        <!-- Pills content -->
        <div class="tab-content">

            <form id="register-form">

                <div class="row">
                    <div class="col form-outline mb-4">
                        <label class="form-label" for="VNev">Vezetőtanár családnév</label>
                        <input type="text" id="VNev" class="form-control" name="VNev" />
                    </div>

                    <!-- Username input -->
                    <div class="col form-outline mb-4">
                        <label class="form-label" for="KNev">Vezetőtanár személynév</label>
                        <input type="text" id="KNev" class="form-control" name="KNev" />
                    </div>
                </div>
                <!-- Name input -->




                <!-- Email input -->
                <div class="form-outline mb-4">
                    <label class="form-label" for="registerEmail">Email</label>
                    <input type="email" id="registerEmail" class="form-control" name="email" />
                </div>

                <!-- Group Name input -->
                <div class="form-outline mb-4">
                    <label class="form-label" for="groupName">Csapat Név</label>
                    <input type="text" id="groupName" class="form-control" name="csapatNev" />
                </div>

                <!-- Tel Num input -->
                <div class="form-outline mb-4">
                    <label class="form-label" for="telNum">Telefonszám</label>
                    <input type="text" id="telNum" class="form-control" name="telefonszam" />
                </div>

                <div class="row">

                    <!-- Password input -->
                    <div class="col form-outline mb-4">
                        <label class="form-label" for="registerPassword">Jelszó</label>
                        <input type="password" id="registerPassword" class="form-control" name="password" />
                    </div>

                    <!-- Repeat Password input -->
                    <div class="col form-outline mb-4">
                        <label class="form-label" for="registerRepeatPassword">Jelszó mégegyszer</label>
                        <input type="password" id="registerRepeatPassword" class="form-control" name="repeatPassword" />
                    </div>
                </div>

                <!-- Submit button -->
                <div class="submit-btn">
                    <button type="submit" class="btn btn-dark btn-block mb-2 w-100">Regisztrálok!</button>
                </div>

                <p id="form-message"></p>
            </form>
        </div>
    </div>

    <script src="../../assets/JS/login.js"></script>
</body>

</html>
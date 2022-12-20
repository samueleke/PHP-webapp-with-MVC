<!DOCTYPE html>
<html lang="en">

<?php include_once './views/page-parts/header.php'; ?>

<link rel="stylesheet" href="../../assets/CSS/login-sign-up.css">

<body>
    <div class="container w-50 mx-auto py-5 my-auto">
        <!-- Pills navs -->
        <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="tab-login" data-mdb-toggle="pill" href="#" role="tab" aria-controls="pills-login" aria-selected="true">Login</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="tab-register" data-mdb-toggle="pill" href="/register" role="tab" aria-controls="pills-register" aria-selected="false">Register</a>
            </li>
        </ul>
        <!-- Pills navs -->

        <!-- Pills content -->
        <div class="tab-content">
            <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
                <form id="login-form">
                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="loginName">Csapat Név</label>
                        <input type="text" id="loginName" class="form-control" name="csapatNev" />
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="loginPassword">Jelszó</label>
                        <input type="password" id="loginPassword" class="form-control" name="password" />
                    </div>


                    <div class="row mb-4">
                        <div class="col">
                            <a href="/reset-password">Elfelejtetted a jelszót?</a>

                        </div>
                    </div>



                    <!-- Submit button -->
                    <button type="submit" class="btn btn-dark btn-block w-100">Jelentkezz be!</button>

                    <!-- Register buttons -->
                    <div class="my-3">
                        <p>Nem regisztráltál még? <a href="/register">Regisztrálj most!</a></p>
                    </div>

                    <p id="form-message"></p>
                </form>
            </div>
        </div>
        <script src="../../assets/JS/login.js"></script>

</body>

</html>
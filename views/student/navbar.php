<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="/student">
        <img src="../../assets/Images/Kepek/fsega.png" alt="" width="150" style="max-width: 100%" />
        KÜTV</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/student">Kezdőoldal</a>
            </li>
            <!-- <li class="nav-item">
            <a class="nav-link" href="#">Hírek</a>
          </li> -->

            <li class="nav-item">
                <a class="nav-link" href="versenySzabalyzat.html">Versenyszabályzat</a>
            </li>

            <?php
            if (isset($_COOKIE["csapatNev"])) {
            ?>
                <li class="nav-item">
                    <a class="nav-link" href="/student/altalanos-informaciok">Megoldás feltöltés</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/student/add-student"><?php echo $_COOKIE["csapatNev"]; ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/logout">Kijelentkezés</a>
                </li>
            <?php
            } else {
            ?>
                <li class="nav-item">
                    <a class="nav-link" href="/login">Bejelentkezem</a>
                </li>
            <?php } ?>
        </ul>
    </div>
</nav>
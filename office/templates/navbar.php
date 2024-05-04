<nav class="navbar navbar-expand-lg bg-primary bg-gradient fixed-top rounded-bottom">
    <div class="container">
        <a class="navbar-brand text-light" href="">
            <h3>SINA</h3>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link text-light" aria-current="page" href="index.php">Beranda</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Loket
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="loketPHU.php">PHU</a></li>
                        <li><a class="dropdown-item" href="loketSEKJEN.php">SEKJEN</a></li>
                        <li><a class="dropdown-item" href="loketBIMAS.php">BIMAS</a></li>
                        <li><a class="dropdown-item" href="loketPENDIS.php">PENDIS</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Rekab
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="rekabPHU.php">PHU</a></li>
                        <li><a class="dropdown-item" href="rekabSEKJEN.php">SEKJEN</a></li>
                        <li><a class="dropdown-item" href="rekabBIMAS.php">BIMAS</a></li>
                        <li><a class="dropdown-item" href="rekabPENDIS.php">PENDIS</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="rekabAll.php">Keseluruhan</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" aria-current="page" href="logout.php">Keluar</a>
                </li>
            </ul>
        </div>
        <div id="tanggal" class="text-light me-3"></div>
        <div id="jam" class="text-light"></div>
    </div>
</nav>
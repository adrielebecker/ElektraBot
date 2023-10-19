<nav class="navbar border-bottom border-success sticky-top">
    <div class="container-fluid">
        <div class="col-2">
            <a href="../gerente/index.php" class="nav-link ms-2"><img src="../img/logo/logo-nav.png" alt="logo da elektrabot" width="80%"></a>
        </div>
        <div class="col-4 mt-4">
            <p class="texto text-center"><?= $pagina ?></p>
        </div>
        <div class="col-3">
            <form class="d-flex mt-3" role="search">
                <input type="text" placeholder="Digite aqui..." class="form-control">
                <button type="submit" class="btn">
                    <img src="../img/icones/lupa.png" alt="">
                </button>
            </form>
        </div>
        <div class="col-1 mt-3">
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header border-bottom border-success mt-2">
                    <h4 class="titulo ms-5 mt-1">O que você deseja?</h4>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item">
                        <a class="nav-link active mt-2 text-white" aria-current="page" href="../gerente/conta.php">Minha Conta</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active mt-4 text-white" aria-current="page" href="#">Gravações</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active mt-4 text-white" aria-current="page" href="#">Relatórios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active mt-4 text-white" aria-current="page" href="#">Designar Substituições</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active mt-4 text-white" aria-current="page" href="#">Notificações</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active mt-4 text-white" aria-current="page" href="../gerente/eletricistas.php">Eletricistas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active mt-4 text-white" aria-current="page" href="#">Sobre os Desenvolvedores</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active mt-4 text-white" aria-current="page" href="#">Página Inicial</a>
                    </li>
                    <li class="nav-item">
                        <a href="../acao/acao.php?acao=logoff" class="btn text-white texto" name="acao" id="acao">Logoff</a>
                    </li>
                </ul>
                </div>
            </div>
        </div>
    </div>
  </nav>
<header class="container-fluid bg-white">
    <div class="container header">
        <div class="row py-2">
            <div class="col-12 col-sm-12 col-lg-2">
                <a href="index.php?classe=HomeController&metodo=abrirPrincipal">
                    <h2 class="logo">Boyaah <span>Games</span></h2>
                </a>
            </div>

            <div class="col-12 col-sm-8 col-lg-6">
                <form method="post" action="index.php?classe=HomeController&metodo=abriPesquisa">
                    <div class="input-group">
                        <input type="text" name="nomeproduto" class="form__input form-control" placeholder="Pesquisar..." aria-label="Recipient's username" aria-describedby="button-addon2">

                        <div class="input-group-append">
                            <button class="btn btn-principal" type="submit" id="button-addon2"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-12 col-sm-4 col-lg-4">
                <button class="btn btn-secondary">
                    <i class="fas fa-user"></i> Entrar
                </button>

                <a class="carrinho" href="index.php?classe=CarrinhoController&metodo=abrirCarrinho">
                    <div class="icon" id="icon">
                        <svg class="icon-carrinho" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="shopping-cart" class="svg-inline--fa fa-shopping-cart fa-w-18" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                            <path fill="currentColor" d="M528.12 301.319l47.273-208C578.806 78.301 567.391 64 551.99 64H159.208l-9.166-44.81C147.758 8.021 137.93 0 126.529 0H24C10.745 0 0 10.745 0 24v16c0 13.255 10.745 24 24 24h69.883l70.248 343.435C147.325 417.1 136 435.222 136 456c0 30.928 25.072 56 56 56s56-25.072 56-56c0-15.674-6.447-29.835-16.824-40h209.647C430.447 426.165 424 440.326 424 456c0 30.928 25.072 56 56 56s56-25.072 56-56c0-22.172-12.888-41.332-31.579-50.405l5.517-24.276c3.413-15.018-8.002-29.319-23.403-29.319H218.117l-6.545-32h293.145c11.206 0 20.92-7.754 23.403-18.681z">
                            </path>
                        </svg>

                        <div class="qtd-itens">
                            <span class="user-select-none">
                                <?php
                                if (isset($_SESSION['carrinho']))
                                    echo count($_SESSION['carrinho']);
                                else
                                    echo 0;
                                ?>
                            </span>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <nav class="navbar navbar-expand-lg navbar-light" style="border-top:1px solid silver;border-bottom:1px solid silver;">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menus" aria-controls="menus" aria-expanded="false" aria-label="Alterna navegação">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="menus">
                        <ul class="navbar-nav mx-auto">
                            <li class="nav-item dropdown mr-lg-4">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="gamepad" class="svg-inline--fa fa-gamepad fa-w-20" role="img" xmlns="http://www.w3.org/2000/svg" width='20' height='15.99' viewBox="0 0 640 512">
                                        <path fill="currentColor" d="M480.07 96H160a160 160 0 1 0 114.24 272h91.52A160 160 0 1 0 480.07 96zM248 268a12 12 0 0 1-12 12h-52v52a12 12 0 0 1-12 12h-24a12 12 0 0 1-12-12v-52H84a12 12 0 0 1-12-12v-24a12 12 0 0 1 12-12h52v-52a12 12 0 0 1 12-12h24a12 12 0 0 1 12 12v52h52a12 12 0 0 1 12 12zm216 76a40 40 0 1 1 40-40 40 40 0 0 1-40 40zm64-96a40 40 0 1 1 40-40 40 40 0 0 1-40 40z"></path>
                                    </svg> Categorias
                                </a>

                                <?php
                                foreach ($dadosCateg as $categ) {
                                    echo "
                                    <div class='dropdown-menu' aria-labelledby='navbarDropdown'>
                                        <a class='dropdown-item' href='index.php?classe=HomeController&metodo=abrirPesquisa&cod_categoria=$categ->cod_categoria'>
                                            <svg xmlns='http://www.w3.org/2000/svg' width='12' height='12' fill='currentColor' class='bi bi-chevron-right' viewBox='0 0 16 16'>
                                                <path fill-rule='evenodd' d='M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z' />
                                            </svg>$categ->nome_categoria
                                        </a>
                                    </div>";
                                }
                                ?>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-tags-fill" viewBox="0 0 16 16">
                                        <path d="M2 2a1 1 0 0 1 1-1h4.586a1 1 0 0 1 .707.293l7 7a1 1 0 0 1 0 1.414l-4.586 4.586a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 2 6.586V2zm3.5 4a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z" />
                                        <path d="M1.293 7.793A1 1 0 0 1 1 7.086V2a1 1 0 0 0-1 1v4.586a1 1 0 0 0 .293.707l7 7a1 1 0 0 0 1.414 0l.043-.043-7.457-7.457z" />
                                    </svg> Marcas
                                </a>

                                <?php
                                foreach ($dadosMar as $marca) {
                                    echo "
                                    <div class='dropdown-menu' aria-labelledby='navbarDropdown'>
                                        <a class='dropdown-item' href='index.php?classe=HomeController&metodo=abrirPesquisa&cod_marca=$marca->cod_marca'>
                                            <svg xmlns='http://www.w3.org/2000/svg' width='12' height='12' fill='currentColor' class='bi bi-chevron-right' viewBox='0 0 16 16'>
                                                <path fill-rule='evenodd' d='M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z' />
                                            </svg>$marca->nome_marca
                                        </a>
                                    </div>";
                                }
                                ?>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
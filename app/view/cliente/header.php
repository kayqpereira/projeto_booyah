<div class="container-fluid bg-white">
    <div class="container header">
        <div class="row py-2">
            <div class="col-12 col-sm-12 col-lg-2">
                <h2 class="logo">Boyaah <span>Games</span></h2>
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

                <div class="carrinho">
                    <div class="icon">
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

                    <div class="sombra-carrinho hidden"></div>

                    <div class="carrinho-interno hidden">
                        <div class="carrinho-header">
                            Meu carrinho
                        </div>

                        <div class="lista">
                            <?php
                            if (!isset($_SESSION['carrinho']) || count($_SESSION['carrinho']) == 0) {
                                echo '
                        <div class="carrinho-vazio">
                            Seu carrinho está vazio. <a href="index.php?classe=HomeController&metodo=abrir_home">Adicionar itens!</a>
                        </div>';
                            } else {
                                foreach ($_SESSION['carrinho'] as $value) { ?>
                                    <div class="item">
                                        <div class="item-image">
                                            <img src="lib/image/<?php echo $value['imagem'] ?>" alt="<?php echo $value['nome'] ?>">
                                        </div>
                                        <div class="cart-info">
                                            <div class="item-nome"><?php echo $value['nome'] ?></div>
                                            <div class="item-quantidade">Quantidade: <?php echo $value['quantidade'] ?></div>
                                            <div class="item-preco">R$ <?php echo number_format($value['preco'], 2, '.', ',') ?></div>
                                        </div>
                                        <div class="item-remover">
                                            <a href="index.php?classe=CarrinhoController&metodo=remover&remover=<?php echo $value['codproduto'] ?>">
                                                <i class="remover fas fa-trash"></i>
                                            </a>
                                        </div>
                                    </div>
                                <?php
                                } ?>

                            <?php
                            } ?>
                        </div>

                        <div class="carrinho-footer">
                            <a class="btn-principal" href="index.php?classe=CarrinhoController&metodo=abrirCarrinho">
                                <i class="icon-btn-cart fas fa-shopping-cart"></i>
                                Ver meu carrinho
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
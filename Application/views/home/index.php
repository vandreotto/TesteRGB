<div class="body-home">
    <div class="container-home">
        <div class="menu-header-desktop">
            <div class="rgb-logo-header">
                <img src="./public/assets/img/rgb_logo.png" />
            </div>

            <div class="options-menu-header">
                <div class="telefone-header">
                    <span class="ddd">
                        <?= substr($data['perfil']['telefone'], 0, 2); ?>
                    </span> <span class="telefone">
                        <?= substr($data['perfil']['telefone'], 2, 5); ?>-<?= substr($data['perfil']['telefone'], 7); ?>
                    </span>
                </div>

                <div class="paginas-header">
                    <a href="perfil">
                        <div class="pagina"> Perfil</div>
                    </a>

                    <a href="albums">
                        <div class="pagina"> Álbums</div>
                    </a>
                    <div class="pagina"> Página 3</div>
                    <div class="pagina"> Página 4</div>
                    <div class="pagina"> Página 5</div>
                    <div class="pagina"> Página 6</div>
                    <div class="pagina"> Página 7</div>
                </div>
            </div>
        </div>

        <div class="menu-header-mobile">
            <div class="menu-hamburguer" onclick="openNavbar()">
                <img src="./public/assets/img/hamburguer.png" />
            </div>
            <div class="rgb-logo-header">
                <img src="./public/assets/img/rgb_logo.png" />
            </div>
            <div class="telefone-header">
                <span class="ddd">
                    <?= substr($data['perfil']['telefone'], 0, 2); ?>
                </span> <span class="telefone">
                    <?= substr($data['perfil']['telefone'], 2, 5); ?>-<?= substr($data['perfil']['telefone'], 7); ?>
                </span>
            </div>
        </div>

        <div class="container-conteudo">
            <?php $i = 0; ?>
            <?php foreach ($data['albums'] as $album) { ?>
                <div class="container-album" onclick="select_album(<?= $i; ?>)">
                    <div class="album">
                        <div class="img-album">
                            <img src="./public/upload/img/album/<?= $album['url_img'] ?>" />
                        </div>
                        <div class="nome-album"><?= $album['nome'] ?></div>
                    </div>
                </div>
                <?php $i++; ?>
            <?php } ?>
        </div>

        <div class="container-footer">
            <div class="container-perfil">
                <div class="img-perfil">
                    <img src="./public/upload/img/perfil/<?= $data['perfil']['img_perfil'] ?>" />
                </div>
                <div class="info-perfil">
                    <div class="nome"><?= $data['perfil']['nome'] ?></div>
                    <div class="descricao">
                        <?= $data['perfil']['descricao']; ?>
                    </div>
                </div>

                <div class="sombra-container-perfil sombra-hidden" style="margin-top: 20px;"></div>

                <div class="redes-perfil">
                    <div class="titulo">Confira Também:</div>
                    <div class="rede">
                        <div class="logo">
                            <img src="./public/assets/img/face_logo.png" />
                        </div>
                        <a href="https://www.fb.com/<?= $data['perfil']['facebook']; ?>">
                            <div class="url">www.fb.com/<?= $data['perfil']['facebook']; ?></div>
                        </a>
                    </div>

                    <div class="rede">
                        <div class="logo">
                            <img src="./public/assets/img/twitter_logo.png" />
                        </div>
                        <a href="https://www.twitter.com/<?= $data['perfil']['twitter']; ?>">
                            <div class="url">www.twitter.com/<?= $data['perfil']['twitter']; ?></div>
                        </a>
                    </div>

                    <div class="rede">
                        <div class="logo">
                            <img src="./public/assets/img/flickr_logo.png" />
                        </div>
                        <a href="https://www.flickr.com/<?= $data['perfil']['flickr']; ?>">
                            <div class="url">www.flickr.com/<?= $data['perfil']['flickr']; ?></div>
                        </a>
                    </div>
                </div>
            </div>

            <div class="sombra-container-perfil"></div>

            <div class="rodape">
                <div class="direitos">Todos os direitos reservados - © 2012 </div>
                <div class="rgb-comunicacao">
                    <div class="fast"> Linha Fast </div>
                    <div class="logo-rgb">
                        <img src="./public/assets/img/rgb_logo2.png" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="fundo-modal-album hide-album">
    <div class="close-modal  hide-album" onclick="closeModal()"></div>
    <div class="modal-album  hide-album">
        <div class="header hide-album">
            <div class="nome  hide-album" id="nomeModal"></div>
            <div class="close  hide-album" onclick="closeModal()">x</div>
        </div>

        <div class="container-img  hide-album" id="img_modal"></div>
        <div class="container-descricao  hide-album" id="descricao_modal"></div>
    </div>
</div>

<div class="navbar-mobile">
    <div class="close-navbar-mobile" onclick="closeNavbar()"></div>

    <div class="container-navbar">
        <div class="rgb-logo">
            <img src="./public/assets/img/rgb_logo.png" />
        </div>

        <a href="perfil">
            <div class="pagina"> Perfil</div>
        </a>

        <a href="albums">
            <div class="pagina"> Álbums</div>
        </a>
        <div class="pagina"> Página 3</div>
        <div class="pagina"> Página 4</div>
        <div class="pagina"> Página 5</div>
        <div class="pagina"> Página 6</div>
        <div class="pagina"> Página 7</div>
    </div>
</div>

<script type="text/javascript">
    $(".hide-album").hide();
    const $albums = <?= json_encode($data['albums']); ?>;
    console.log($albums);

    function closeModal() {
        $(".hide-album").hide("fast", function() {});
    }

    function closeNavbar() {
        $(".navbar-mobile").hide("fast", function() {});
    }

    function openNavbar() {
        $(".navbar-mobile").show("fast", function() {});
    }

    function select_album($i) {
        $("#nomeModal").html($albums[$i]['nome']);
        $("#img_modal").html(
            '<img src="./public/upload/img/album/' + $albums[$i]['url_img'] + '" />'
        );
        $("#descricao_modal").html($albums[$i]['descricao']);
        $(".hide-album").show("fast", function() {});


    }
</script>
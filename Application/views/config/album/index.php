<div class="body-config">
    <div class="container-config">
        <div class="menu-lateral-desktop">
            <div class="container-titulo">
                <div class="titulo">
                    Menu de Configuração
                </div>
                <div class="logo">
                    <img src="./public/assets/img/rgb_logo.png" />
                </div>

            </div>
            <a href="perfil">
                <div class="option">Perfil</div>
            </a>

            <a href="albums">
                <div class="option" style="font-weight: bold;">Albums</div>
            </a>
        </div>

        <div class="container-formulario">
            <div class="header-titulo">
                <div class="menu-hamburguer" onclick="openNavbarConfig()">
                    <img src="./public/assets/img/hamburguer.png" />
                </div>
                <div class="titulo">Configurar Álbums</div>
            </div>

            <div class="container-form">
                <div class="container-cadastro-album">
                    <div class="titulo">Cadastrar novo album</div>
                    <div class="form-cadastrar-album">
                        <form method="post" id="data" name="formData" enctype="multipart/form-data">
                            <div class="container-input input-nome">
                                <div class="label">
                                    Nome
                                </div>
                                <div class="div-input">
                                    <input class="form-control" type="text" id="nome" name="nome" value="" required autofocus>
                                </div>
                            </div>

                            <div class="container-input-text input-descricao">
                                <div class="label">
                                    Descrição
                                </div>

                                <div class="div-input">
                                    <textarea id="descricao" name="descricao" required></textarea>
                                </div>
                            </div>

                            <div class="container-upload-img container-img-perfil">

                                <div class="label">
                                    Selecione uma imagem para capa do álbum (PNG, JPG ou JPEG)
                                </div>

                                <div class="container-upload">
                                    <input type="file" name="img" id="campoImg" required>
                                </div>
                            </div>

                            <div class="container-buttons">
                                <div class="input-button button-cancelar">
                                    <input type="reset" name="cancel" value="Cancelar" class="cancelar">
                                </div>

                                <div class="input-button button-enviar">
                                    <input type="submit" value="Enviar" name="submit" class="submit">
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="separador"></div>
                </div>

                <div class="container-cadastro-album">
                    <div class="titulo">Lista de Albums</div>
                    <div class="tabela-albums">
                        <?php foreach ($data['albums'] as $album) { ?>
                            <div class="row-album">
                                <div class="container-img-album">
                                    <img src="./public/upload/img/album/<?= $album['url_img'] ?>" />
                                </div>

                                <div class="nome-album">
                                    <?= $album['nome'] ?>
                                </div>

                                <div class="container-view-album" onclick="deletarAlbum(<?= $album['id'] ?>)">
                                    <img src="./public/assets/img/trash.ico" />
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="navbar-config">
    <div class="close-navbar-config" onclick="closeNavbarConfig()">
    </div>

    <div class="container-navbar-config">
        <div class="rgb-logo">
            <img src="./public/assets/img/rgb_logo.png" />
        </div>

        <a href="perfil">
            <div class="pagina"> Perfil</div>
        </a>

        <a href="albums">
            <div class="pagina"> Álbums</div>
        </a>
    </div>
</div>

<script type="text/javascript">
    function openNavbarConfig() {
        $(".navbar-config").show("fast", function() {});
    }

    function closeNavbarConfig() {
        $(".navbar-config").hide("fast", function() {});
    }

    function deletarAlbum($id) {
        jQuery.ajax({
            url: "https://localhost/testergb/albums/remove",
            type: "post",
            data: {
                id: $id
            },
            success: function(response) {
                console.log(response);
                var result = response.substring(response.indexOf('<body style="margin: 0;">') + 25);
                result = result.replace("</body></html>", "");
                console.log(result);
                if (result == "1") {
                    alert("Album removido com sucesso!");
                    location.reload();
                } else {
                    alert("Erro na remoção!");
                }
            }
        });
    }

    function validarAddAlbum() {
        var nome = $("#nome").val;
        var descricao = $("#descricao").html;

        var msg = [];

        if (nome.length > 50) {
            msg.push("Nome possui mais que 50 caracteres");
            alert("Nome possui mais que 50 caracteres");
        }

        if (descricao.length > 500) {
            msg.push("Descrição possui mais que 500 caracteres");
            alert("Descrição possui mais que 500 caracteres");
        }

        if (msg.length > 0) {
            return false;
        } else {
            return true;
        }
    }

    $("#campoImg").on("change", function() {
        $("#keepImg").val("false");
    });

    $("form#data").submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);

        if (validarAddAlbum()) {
            jQuery.ajax({
                url: "https://localhost/testergb/albums/add",
                type: 'POST',
                data: formData,
                success: function(response) {
                    console.log(response);
                    var result = response.substring(response.indexOf('<body style="margin: 0;">') + 25);
                    result = result.replace("</body></html>", "");
                    console.log(result);
                    if (result == "1") {
                        alert("Alteração realizada com sucesso!");
                        location.reload();
                    } else {
                        alert("Erro na alteração!");
                    }
                },
                cache: false,
                contentType: false,
                processData: false
            });
        }
    });
</script>
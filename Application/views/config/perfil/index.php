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
                <div class="option" style="font-weight: bold;">Perfil</div>
            </a>

            <a href="albums">
                <div class="option">Albums</div>
            </a>
        </div>

        <div class="container-formulario">
            <div class="header-titulo">
                <div class="menu-hamburguer" onclick="openNavbarConfig()">
                    <img src="./public/assets/img/hamburguer.png" />
                </div>
                <div class="titulo">Configurar Perfil</div>
            </div>

            <div class="container-form">
                <form method="post" id="data" name="formData" enctype="multipart/form-data">
                    <div class="container-input input-nome">
                        <div class="label">
                            Nome
                        </div>
                        <div class="div-input">
                            <input class="form-control" type="text" id="nome" name="nome" value="<?= $data['perfil']['nome'] ?>" required autofocus>
                        </div>
                    </div>

                    <div class="container-input input-telefone">
                        <div class="label">
                            Telefone
                        </div>

                        <div class="div-input">
                            <input class="form-control" type="text" id="telefone" name="telefone" value="<?= $data['perfil']['telefone'] ?>" required>
                        </div>
                    </div>

                    <div class="container-input-text input-descricao">
                        <div class="label">
                            Descrição
                        </div>

                        <div class="div-input">
                            <textarea id="descricao" name="descricao" required><?= $data['perfil']['descricao'] ?></textarea>
                        </div>
                    </div>

                    <div class="container-input-url input-facebook">
                        <div class="label">
                            <img src="./public/assets/img/face_logo.png" />
                            Facebook
                        </div>
                        <div class="input-url">
                            <div class="url">www.fb.com/</div>
                            <input type="text" id="facebook" name="facebook" value="<?= $data['perfil']['facebook'] ?>">
                        </div>
                    </div>

                    <div class="container-input-url input-facebook">
                        <div class="label">
                            <img src="./public/assets/img/twitter_logo.png" />
                            Twitter
                        </div>
                        <div class="input-url">
                            <div class="url">www.twitter.com/</div>
                            <input type="text" id="facebook" name="twitter" value="<?= $data['perfil']['twitter'] ?>">
                        </div>
                    </div>

                    <div class="container-input-url input-facebook">
                        <div class="label">
                            <img src="./public/assets/img/flickr_logo.png" />
                            Flickr
                        </div>
                        <div class="input-url">
                            <div class="url">www.flickr.com/</div>
                            <input type="text" id="facebook" name="flickr" value="<?= $data['perfil']['flickr'] ?>">
                        </div>
                    </div>

                    <div class="container-upload-img container-img-perfil">
                        <input type="hidden" id="keepImg" name="keepImg" value="true">
                        <input type="hidden" id="oldImg" name="oldImg" value="<?= $data['perfil']['img_perfil'] ?>">

                        <div class="label">
                            Selecione uma nova imagem para o perfil (PNG, JPG ou JPEG)
                        </div>

                        <div class="container-img">
                            <div class="overflow-img">
                                <img src="./public/upload/img/perfil/<?= $data['perfil']['img_perfil'] ?>" />
                            </div>
                            <div class="legenda">Imagem Atual</div>
                        </div>

                        <div class="container-upload">
                            <input type="file" name="img" id="campoImg">
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

    function validarConfigPerfil() {
        var nome = $("#nome").val;
        var telefone = $("#telefone").val;
        var descricao = $("#descricao").html;
        var facebook = $("#facebook").val;
        var twitter = $("#twitter").val;
        var flickr = $("#flickr").val;

        var msg = [];

        if (nome.length > 50) {
            msg.push("Nome possui mais que 50 caracteres");
            alert("Nome possui mais que 50 caracteres");
        }

        if (telefone.length > 30) {
            msg.push("Telefone possui mais que 30 caracteres");
            alert("Telefone possui mais que 30 caracteres");
        }

        if (descricao.length > 500) {
            msg.push("Descrição possui mais que 500 caracteres");
            alert("Descrição possui mais que 500 caracteres");
        }

        if (facebook.length > 140) {
            msg.push("Url do Facebook possui mais que 140 caracteres");
            alert("Url do Facebook possui mais que 140 caracteres");
        }

        if (twitter.length > 140) {
            msg.push("Url do Twitter possui mais que 140 caracteres");
            alert("Url do Twitter possui mais que 140 caracteres");
        }

        if (flickr.length > 140) {
            msg.push("Url do Flickr possui mais que 140 caracteres");
            alert("Url do Flickr possui mais que 140 caracteres");
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

        if (validarConfigPerfil()) {
            jQuery.ajax({
                url: "https://localhost/testergb/perfil/editar",
                type: 'POST',
                data: formData,
                success: function(response) {
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
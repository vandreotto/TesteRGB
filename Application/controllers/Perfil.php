<?php

use Application\core\Controller;

require './Application/libs/SaveImage.php';

class Perfil extends Controller
{
    public function index()
    {
        $m_perfil = $this->model('m_Perfil');
        //$m_perfil = $this->model('Album');

        $data = $m_perfil::getPerfil();

        $this->view('config/perfil/index', ['perfil' => $data[0]]);
    }

    public function editar()
    {
        $m_perfil = $this->model('m_Perfil');

        $nome = isset($_POST['nome']) ? $_POST['nome'] : null;
        $telefone = isset($_POST['telefone']) ? $_POST['telefone'] : null;
        $descricao = isset($_POST['descricao']) ? $_POST['descricao'] : null;
        $facebook = isset($_POST['facebook']) ? $_POST['facebook'] : null;
        $twitter = isset($_POST['twitter']) ? $_POST['twitter'] : null;
        $flickr = isset($_POST['flickr']) ? $_POST['flickr'] : null;
        $img = isset($_POST['oldImg']) ? $_POST['oldImg'] : null;

        if ($_POST['keepImg'] == 'true') {
            $m_perfil::updatePerfil($nome, $telefone, $descricao, $facebook, $twitter, $flickr, $img);
        } else {
            $file = $_FILES['img'];
            $save_img = new SaveImg($file, 'perfil');

            $img = $save_img->name_img;

            if ($save_img->uploadConfirm) {
                $m_perfil::updatePerfil($nome, $telefone, $descricao, $facebook, $twitter, $flickr, $img);
            }
        }

        echo true;
    }
}

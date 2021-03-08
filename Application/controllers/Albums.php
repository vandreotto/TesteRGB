<?php

use Application\core\Controller;

require './Application/libs/SaveImage.php';

class Albums extends Controller
{
    public function index()
    {
        $m_Album = $this->model('m_Album');
        //$m_perfil = $this->model('Album');

        $data = $m_Album::getAllAlbums();

        $this->view('config/album/index', ['albums' => $data]);
    }

    public function add()
    {
        $m_Album = $this->model('m_Album');

        $nome = isset($_POST['nome']) ? $_POST['nome'] : null;
        $descricao = isset($_POST['descricao']) ? $_POST['descricao'] : null;


        $file = $_FILES['img'];
        $save_img = new SaveImg($file, 'album');

        $img = $save_img->name_img;

        if ($save_img->uploadConfirm) {
            $m_Album::addAlbum($nome, $descricao, $img);
            echo true;
        }
    }

    public function remove()
    {
        $m_Album = $this->model('m_Album');

        $id = isset($_POST['id']) ? $_POST['id'] : null;
        $m_Album::removeAlbum($id);


        echo true;
    }
}

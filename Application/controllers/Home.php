<?php

use Application\core\Controller;

class Home extends Controller
{
  public function index()
  {
    $m_perfil = $this->model('m_Perfil');
    $m_album = $this->model('m_Album');

    $data = $m_perfil::getPerfil();
    $data2 = $m_album::getAlbumsAtivos();

    $this->view('home/index', ['perfil' => $data[0], 'albums' => $data2]);
  }
}

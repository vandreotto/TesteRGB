<?php

namespace Application\models;

use Application\core\Database;
use PDO;

class m_Perfil
{
  public static function getPerfil()
  {
    $conn = new Database();
    $result = $conn->executeQuery('SELECT * FROM perfil');
    return $result->fetchAll(PDO::FETCH_ASSOC);
  }

  public static function updatePerfil($nome, $telefone, $descricao, $facebook, $twitter, $flickr, $img)
  {
    $conn = new Database();
    $result = $conn->executeQuery('UPDATE perfil
                                   SET nome = :NOME,
                                       descricao = :DESCRICAO,
                                       facebook = :FACEBOOK,
                                       twitter = :TWITTER,
                                       flickr = :FLICKR,
                                       telefone = :TELEFONE,
                                       img_perfil = :IMG_PERFIL
                                  WHERE id = 1;', array(
      ':NOME' => $nome,
      ':DESCRICAO' => $descricao,
      ':FACEBOOK' => $facebook,
      ':TWITTER' => $twitter,
      ':FLICKR' => $flickr,
      ':TELEFONE' => $telefone,
      ':IMG_PERFIL' => $img
    ));

    return $result->fetchAll(PDO::FETCH_ASSOC);
  }
}

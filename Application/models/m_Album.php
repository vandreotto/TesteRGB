<?php

namespace Application\models;

use Application\core\Database;
use PDO;

class m_Album
{
  public static function getAlbumsAtivos()
  {
    $conn = new Database();
    $result = $conn->executeQuery('SELECT * FROM album WHERE ativo = 1');
    return $result->fetchAll(PDO::FETCH_ASSOC);
  }

  public static function getAllAlbums()
  {
    $conn = new Database();
    $result = $conn->executeQuery('SELECT * FROM album ORDER BY ativo DESC');
    return $result->fetchAll(PDO::FETCH_ASSOC);
  }

  public static function addAlbum($nome, $descricao, $img)
  {
    $conn = new Database();
    $result = $conn->executeQuery('INSERT INTO album (nome, descricao, url_img) VALUES (:NOME, :DESCRICAO, :URL_IMG)', array(
      ':NOME' => $nome,
      ':DESCRICAO' => $descricao,
      ':URL_IMG' => $img
    ));
    return $result->fetchAll(PDO::FETCH_ASSOC);
  }

  public static function removeAlbum($id)
  {
    $conn = new Database();
    $result = $conn->executeQuery('DELETE FROM album WHERE id=:ID', array(
      ':ID' => $id
    ));
    return $result->fetchAll(PDO::FETCH_ASSOC);
  }
}

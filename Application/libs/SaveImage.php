<?php
define("IMGPERFIL_PATH", './public/upload/img/perfil/');
define("IMGALBUM_PATH", './public/upload/img/album/');

class SaveImg
{
    private $arquivo;
    private $imgFileType;
    private $nome;
    private $uploadOk;
    private $f;
    public $uploadConfirm;
    public $msg_error;
    public $name_img;

    public function __construct($file, $option)
    {
        $this->f = $file;
        $this->uploadOk = false;
        $this->uploadConfirm = false;
        $this->setArquivo($this->f["name"], $option);
        $this->setImgType($this->getArquivo());
        $this->setNome();
        $this->checkOk();
        if ($this->uploadOk != false) {
            if ($option == "perfil") {
                $aux = move_uploaded_file($this->f["tmp_name"], IMGPERFIL_PATH . $this->getNome());
            } else if ($option == "album") {
                $aux = move_uploaded_file($this->f["tmp_name"], IMGALBUM_PATH . $this->getNome());
            }

            $this->uploadConfirm = true;
            $this->name_img =  $this->getNome();
        } else {
            $this->uploadConfirm = false;
        }
    }

    private function checkOk()
    {
        $aux = $this->isImage($this->f["tmp_name"]);
        if ($aux) {
            $aux = $this->fileExists();
            if ($aux) {
                $aux = $this->fileSize($this->f["size"]);
                if ($aux) {
                    $aux = $this->fileType();
                    if ($aux) {
                        $this->uploadOk = true;
                    } else {
                        $this->msg_error = "Formato incorreto, apenas (JPEG, JPG, PNG)";
                    }
                } else {
                    $this->msg_error = "Tamanho incorreto (MAX 10mb)";
                }
            } else {
                $this->msg_error = "Arquivo nao encontrado";
            }
        } else {
            $this->msg_error = "Formato incorreto, apenas (JPEG, JPG, PNG)";
        }
    }

    private function getArquivo()
    {
        return $this->arquivo;
    }
    private function setArquivo($p, $option)
    {
        if ($option == "perfil") {
            $this->arquivo = IMGPERFIL_PATH . basename($p);
        } else if ($option == "album") {
            $this->arquivo = IMGALBUM_PATH . basename($p);
        }
    }

    private function getImgType()
    {
        return $this->imgFileType;
    }
    private function setImgType($p)
    {
        $this->imgFileType = strtolower(pathinfo($this->getArquivo(), PATHINFO_EXTENSION));
    }

    private function getNome()
    {
        return $this->nome;
    }
    private function setNome()
    {
        $this->nome = md5(uniqid(rand(), true)) . '.' . $this->getImgType();
    }

    public function isImage($t)
    {
        return (getimagesize($t) != false) ? true : false;
    }

    public function fileExists()
    {
        return (file_exists($this->getArquivo())) ? false : true;
    }

    private function fileSize($s)
    {
        return ($s > 10000000) ? false : true;
    }

    private function fileType()
    {
        return ($this->getImgType() != "jpg" && $this->getImgType() != "png" && $this->getImgType() != "jpeg") ? false : true;
    }
}

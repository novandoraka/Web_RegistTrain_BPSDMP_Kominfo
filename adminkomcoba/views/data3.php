<?php
require_once '../models/m_admin.php';

class prosesadmin
{
    public $aksi;

    function __construct()
    {
        $this->aksi = $_GET['aksi'];
    }

    function proses()
    {
        $model = new modeladmin();
        // if ($this->aksi=="ubah") 
        // {
        // 	$id=$_GET['id'];
        // 	$judul=$_POST['judul'];
        //     $deskripsi=$_POST['deskripsi'];
        //     $tglpel=$_POST['tglpel'];
        //     $extensi = explode(".", $_FILES['banner']['name']);
        //     $banner = "ban-" . round(microtime(true)) . "." . end($extensi);
        //     $tmpname = $_FILES['banner']['tmp_name'];
        // 	move_uploaded_file($tmpname, "../assetss/img/" . $banner);

        // 	$model->ubahdata($id, $judul, $deskripsi, $tglpel, $banner);
        // 	header("location: ../?page=pelatihan");

        // }
        if ($this->aksi == "hapus") {
            $id = $_GET['id'];
            $model->hapusdata($id);
            header("location: ../?page=adminn");
        }
    }
}
$object = new prosesadmin();
$object->proses();

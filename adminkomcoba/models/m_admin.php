<?php
require_once 'koneksi.php';

class modeladmin extends koneksi
{
    private $data;

    function setdata()
    {
        $sql = "SELECT id, nama, email, statuss FROM tb_admin";
        $exec = mysqli_query($this->konek, $sql);

        while ($d = mysqli_fetch_array($exec)) {
            $temp[] = $d;
        }
        $this->data = $temp;
    }


    function getdata()
    {
        return $this->data;
    }

    function view()
    {
        foreach ($this->data as $key) {
            echo $key['id'];
            echo " ";
            echo $key['nama'];
            echo " ";
            echo $key['email'];
            echo " ";
            echo $key['statuss'];
            echo " ";
        }
    }

    function ubahdata($id, $judul, $deskripsi, $tglpel, $banner)
    {
        $sql = "update pelatihan set judul='$judul', deskripsi='$deskripsi', tglpel='$tglpel', banner='$banner' where id_pelatihan='$id'";
        $exec = mysqli_query($this->konek, $sql);
    }

    function hapusdata($id)
    {
        $sql = "delete from tb_admin where id='$id'";
        $exec = mysqli_query($this->konek, $sql);
    }
}

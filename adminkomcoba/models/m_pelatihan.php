<?php
require_once 'koneksi.php';

class modelpelatihan extends koneksi
{
    private $data;
 
    function setdata()
    {
        $sql="select * from pelatihan";
        $exec = mysqli_query($this->konek,$sql);
    
        while ($d = mysqli_fetch_array($exec))
        {
            $temp[]=$d;
        }
        $this->data=$temp;
    }
    // function setdata2()
    // {
    //     $sql="select * from produk";
    //     $exec = mysqli_query($this->konek,$sql);
    
    //     while ($d = mysqli_fetch_array($exec))
    //     {
    //         $temp[]=$d;
    //     }
    //     $this->data=$temp;
    // }

    function getdata()
    {
        return $this->data;
    }

    function view()
    {
        foreach ($this->data as $key) {
            echo $key['id_pelatihan'];
            echo " ";
            echo $key['judul'];
            echo " ";
            echo $key['deskripsi'];
            echo " ";
            echo $key['tglpel'];
            echo " ";
            echo $key['banner'];
            echo " ";
            echo $key['poster'];
            echo " ";
        }
    }

	function inputdata($judul,$deskripsi,$tglpel,$banner,$poster)
	{
		$sql="insert into pelatihan values('','$judul','$deskripsi','$tglpel','$banner','$poster')";
		$exec=mysqli_query($this->konek,$sql);
	}

	function ubahdata($id,$judul,$deskripsi,$tglpel,$banner,$poster)
	{
		$sql="update pelatihan set judul='$judul', deskripsi='$deskripsi', tglpel='$tglpel', banner='$banner', poster='$poster' where id_pelatihan='$id'";
		$exec=mysqli_query($this->konek,$sql);
	}

	function hapusdata($id)
	{
		$sql="delete from pelatihan where id_pelatihan='$id'";
		$exec=mysqli_query($this->konek,$sql);
	}

}

    //$object=new modelpabrik();
    //$object->setdata();
    //$object->view();
    //$datapabrik=$object->getdata();
    //foreach ($datapabrik as $key) {
    //echo $key['id_pabrik'];
    //echo "<br>";
    //echo $key['nama_pabrik'];
    //echo "<br>";
    //echo $key['alamat_pabrik'];
    //echo "<br>";
    //echo $key['no_telp'];
    //echo "<br>";
    //}

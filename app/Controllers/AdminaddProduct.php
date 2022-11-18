<?php

namespace App\Controllers;

class AdminaddProduct extends BaseController
{
    public function index()
    {
        $session=session();
        $data=["meta_title"=>"Home"];

        return view('admin/editproduct.php',$data);
    }
}
?>

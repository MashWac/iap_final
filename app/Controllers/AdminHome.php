<?php

namespace App\Controllers;

class AdminHome extends BaseController
{
    public function index()
    {
        $session=session();
        $data=["meta_title"=>"Home"];

        return view('admin/adminHome.php',$data);
    }
}
?>

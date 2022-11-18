<?php

namespace App\Controllers;

class Side extends BaseController
{
    public function index()
    {
        $session=session();
        $data=["meta_title"=>"Home"];

        return view('adminsidemenu.php',$data);
    }
}
?>

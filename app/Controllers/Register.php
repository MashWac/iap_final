<?php

namespace App\Controllers;
use stdClass;
use CodeIgniter\I18n\Time;
use App\Models\UserModel;
use App\Models\WalletModel;

class Register extends BaseController
{
    public function index()
    {
        $session=session();
        $data=["meta_title"=>"Register"];
        return view('registration.php',$data);
    }
    public function store()
    {       
        $session=session(); 
        $data=["meta_title"=>"Home"];
        $user=new UserModel();  
        $wallet=new WalletModel();  
        $newData = [
                'email'    => $this->request->getPost('emailaddress') ,
                'first_name'     => $this->request->getPost('firstname'),
                'last_name'    => $this->request->getPost('surname'),
                'password' => $this->request->getPost('password'),
                'gender'    =>$this->request->getPost('selgender'),
                'role'    =>1
            ];
        $user->save($newData);
        $user_id=$user->getInsertID();
        $walletData=[   'customer_id'    => $user_id,
        'amount_available'     => 0,
        'created_at'    => new Time('now'),
        ];
        $wallet->save($walletData);
        echo"<script>alert('You have been registered successfully');
                window.location.href='/Login';
            </script>";
    }
    

}
?>

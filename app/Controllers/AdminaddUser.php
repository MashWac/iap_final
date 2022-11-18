<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\WalletModel;
use CodeIgniter\I18n\Time;

class AdminaddUser extends BaseController
{
    public function index()
    {
        $session=session();
        $data=["meta_title"=>"Home"];

        return view('admin/adminnewUser.php',$data);
    }
    public function deleteaccount($id)
    {      
        $session = session();
        $user=new UserModel();
        $wallet=new WalletModel();
        $delid=$user-> where('user_id', $id)->first();
        if($delid['role']==1){
        $walletdets=$wallet-> where('customer_id', $id)->first();
        $walletid=$walletdets['wallet_id'];

        $newData = [
                'is_deleted'    => 1 ,
            ];
            $wallet->update($walletid,$newData);
            $user->update($id,$newData);
            return redirect()->to('/displayusers');
        }
        elseif($_SESSION['user_id']==$id){
            $newData = [
                'is_deleted'    => 1 ,
            ];
            $user->update($id,$newData);
            $session->destroy();
            return redirect()->to('/Login');

        } else{
            $newData = [
                'is_deleted'    => 1 ,
            ];

            $user->update($id,$newData);
            return redirect()->to('/displayusers');

        }        
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
                'role'    =>$this->request->getPost('uType')
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

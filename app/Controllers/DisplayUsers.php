<?php

namespace App\Controllers;
use App\Models\UserModel;
use CodeIgniter\I18n\Time;
use App\Models\WalletModel;
use App\Models\RoleModel;


class DisplayUsers extends BaseController
{
    public function index()
    {
        $session=session();
        $users=new UserModel();
        $data['users']=json_decode(json_encode($users->join('tbl_roles', 'tbl_roles.role_id=tbl_users.role')->whereIn('tbl_users.is_deleted',[0])->paginate()),true);
        $data['pager']=$users->pager;
        return view('admin/displayusers.php',$data);
    }
    public function editPage($type,$id=null){
        $session=session();
        $roles=new RoleModel();
        
        if($type=="edit"){
            $data=["meta_title"=>"Editproduct",
            "formtype"=>"edittype"];
            
            $user=new UserModel();
            $userID=$id;
            $data['user']=json_decode(json_encode($user->whereIn('user_id', [$userID],'tbl_users.is_deleted',[0])->join('tbl_roles', 'tbl_roles.role_id=tbl_users.role')->paginate()),true);
            $data['roles']=$roles->findAll();
            $data['pager'] = $user->pager;
          
        }else{
            $data=["meta_title"=>"addproduct",
            "formtype"=>"addtype"];
            $data['roles']=$roles->findAll();
        }
        return view('admin/createnewUsers.php',$data);

    }
    public function store()
    {      
        $session=session();  
        $user=new UserModel();  
        $wallet=new WalletModel();  
        $newData = [
                'email'    => $this->request->getPost('emailaddress') ,
                'first_name'     => $this->request->getPost('firstname'),
                'last_name'    => $this->request->getPost('surname'),
                'password' => 12345678,
                'gender'    =>$this->request->getPost('selgender'),
                'role'    =>$this->request->getPost('select-role')
            ];
        if($this->request->getPost('select-role')==1){
            $user->save($newData);
            $user_id=$user->getInsertID();
            $walletData=[   'customer_id'    => $user_id,
            'amount_available'     => 0,
            'created_at'    => new Time('now'),
            ];
            $wallet->save($walletData);

        }else{
            $user->save($newData);
        }   
        echo"<script>alert('You have been registered successfully');
                window.location.href='/Login';
            </script>";
            return redirect()->to('displayusers')->with('status','User data saved');
    }
    public function update()
    {    
        $session=session();
        $user=new UserModel();  
        $id=$this->request->getPost('user-id');
        
        $data = [
                'email'    => $this->request->getPost('emailaddress') ,
                'first_name'     => $this->request->getPost('firstname'),
                'last_name'    => $this->request->getPost('surname'),
                'gender'    =>$this->request->getPost('selgender'),
                'role'    =>$this->request->getPost('select-role'),
                'password' =>12345678
            ];
            $user->update($id,$data);
            return redirect()->to('displayusers')->with('status','product data saved');
    }
}
?>

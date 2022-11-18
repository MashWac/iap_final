<?php

namespace App\Controllers;
use App\Models\CatModel;
use App\Models\SubCatModel;
use App\Models\UserModel;
use App\Models\RoleModel;
use App\Models\UserLogin;
use App\Models\WalletModel;
use App\Models\Order;
use App\Models\Orderdetails;
use CodeIgniter\I18n\Time;




class Homepage extends BaseController
{
    public function index()
    {
        $session=session();
        $categories=new CatModel();
        $subcats=new SubCatModel();
        $data=["meta_title"=>"Home"];
        $data['cats']=json_decode(json_encode($categories->whereIn('tbl_categories.is_deleted',[0] )->paginate()),true);
        $data['subcats']=json_decode(json_encode($subcats->join('tbl_categories', 'tbl_categories.category_id=tbl_subcategories.category')->whereIn('tbl_subcategories.is_deleted',[0])->paginate()),true);
        

        return view('homepage.php',$data);
    }
    public function aboutus()
    {
        $data=["meta_title"=>"Aboutus"];

        return view('aboutus.php',$data);
    }
    public function shipping()
    {
        $data=["meta_title"=>"Shipping"];
        return view('shipping.php',$data);
    }
    public function refunds()
    {
        $data=["meta_title"=>"Refunds"];

        return view('refund.php',$data);
    }
    public function editprofile()
    {
        session();
        $roles=new RoleModel();
        $data=["meta_title"=>"Edit Profile"];
        $user=new UserModel();
        $userID=$_SESSION['user_id'];
        $data['user']=json_decode(json_encode($user->whereIn('user_id', [$userID],'tbl_users.is_deleted',[0])->join('tbl_roles', 'tbl_roles.role_id=tbl_users.role')->paginate()),true);
        $data['roles']=$roles->findAll();
        $data['pager'] = $user->pager;

        return view('editdetails.php',$data);
    }
    public function store()
    {      
        $session=session();  
        $user=new UserModel();     
        $id=$_SESSION['user_id'];
        $newData = [
                'email'    => $this->request->getPost('emailaddress') ,
                'first_name'     => $this->request->getPost('firstname'),
                'last_name'    => $this->request->getPost('secondname'),
                'gender'    =>$this->request->getPost('cpassword'),
            ];
            $user->update($id,$newData);
            return redirect()->to('/homepage')->with('status','User data saved');
    }
    public function deleteaccount()
    {      
        $session = session();
        $user=new UserModel();
        $wallet=new WalletModel();
        $userlog=new UserLogin();
        $id=$_SESSION['user_id'];
        $walletdets=$wallet-> where('customer_id', $_SESSION['user_id'])->first();
        $walletid=$walletdets['wallet_id'];

        $newData = [
                'is_deleted'    => 1 ,
            ];
            $user->update($id,$newData);
            $wallet->update($walletid,$newData);
            $data=['logout_time'=>new Time('now')];
            $userlog->update($id,$data);
            
        $session->destroy();
    
        return redirect()->to('Login/');

    }
    public function managewallet()
    {
        $session = session();
        $data=["meta_title"=>"Wallet"];
        $wallet=new WalletModel();
        $walletdets=$wallet-> where('customer_id', $_SESSION['user_id'])->first();
        $walletid=$walletdets['wallet_id'];
        $current_bal=$_SESSION['wallet_balance'];

        if($this->request->getVar('withdraw') == 'withdraw'){
            $withdraw=$this->request->getPost('amountchange');
            $newamount=$current_bal-$withdraw;
            if($newamount>=0){
            $newData = [
                'amount_available'    => $newamount ,
            ];

            $wallet->update($walletid,$newData);
            $walletdets=$wallet-> where('customer_id', $_SESSION['user_id'])->first();
            $_SESSION['wallet_balance']=$walletdets['amount_available'];

            echo"<script>alert('Transcaction Successful');
                window.location.href='/editprofile';
                </script>";
            } 
            else{
                echo"<script>alert('Unsuccessful. Amount withdrawn is greater than limit');
                window.location.href='/editprofile';
                </script>";

            }
           
        }
        else{
            $deposit=$this->request->getPost('amountchange');
            $current_bal=$_SESSION['wallet_balance'];
            $newbal=$deposit+$current_bal;
            $newData = [
                'amount_available'    => $newbal,
            ];
            $wallet->update($walletid,$newData); 
            $walletdets=$wallet-> where('customer_id', $_SESSION['user_id'])->first();
            $_SESSION['wallet_balance']=$walletdets['amount_available'];
            echo"<script>alert('Transcation Successful');
            window.location.href='/editprofile';
            </script>";

        }
        

    }
    public function vieworders()
    {
        session();
        $data=["meta_title"=>" My Orders"];
        $order=new Order();
        $data['orders']=json_decode(json_encode($order->whereIn('tbl_order.is_deleted',[0])->join('tbl_orderdetails', 'tbl_orderdetails.order_id = tbl_order.order_id')->join('tbl_paymenttypes','tbl_paymenttypes.paymenttype_id=tbl_order.payment_type')->paginate()), true);

        return view('myorders.php',$data);
    }
}
?>

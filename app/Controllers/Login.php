<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\UserLogin;
use App\Models\WalletModel;
use CodeIgniter\I18n\Time;



class Login extends BaseController
{
    public function index()
    {
        $session=session();
        $data=["meta_title"=>"Login"];
        return view('login.php',$data);
    }
    public function signin()
    {
        helper(['form']);
        $session = session();
        $user = new UserModel();
        $userlog=new UserLogin();
        $walletdets=new WalletModel();

        $email = $this->request->getVar('email_address');
        $password = $this->request->getVar('pass_word');
        $data = $user->where('email', $email)->first();

        if ($data && $data['is_deleted']==0) {
            $pass = $data['password'];

            if ($pass == $password) {
                $userip= $this->request->getIPAddress();
                $wallet=$walletdets-> where('customer_id', $data['user_id'])->first();

                $logindata=[
                    'user_id' => $data['user_id'],
                    'user_ip' => $userip,
                    'login_time'=>new Time('now'),
                    'is_deleted'=>0
                ];
                $userlog->save($logindata);
                $login_id=$userlog->getInsertID();
                if($data['role']==1){
                    $sessionData = [
                        'user_id' => $data['user_id'],
                        'userName' => $data['first_name']." ".$data['last_name'],
                        'email' => $data['email'],
                        'wallet_balance'=>$wallet['amount_available'],
                        'login_id'=>$login_id,
                        'logged' => TRUE
                    ];
                }else{
                    $sessionData = [
                        'user_id' => $data['user_id'],
                        'userName' => $data['first_name']." ".$data['last_name'],
                        'email' => $data['email'],
                        'login_id'=>$login_id,
                        'logged' => TRUE
                    ];
                }

                $session->set($sessionData);
                if ($data['role'] == 1) {
                    return redirect()->to('/homepage');
                } else {
                    return redirect()->to('/adminHome');
                }
            } else {
                $session->setFlashdata('msg', 'Wrong password. Please enter correct password');
                return view('sign-up/user-login');
            }
        } else {
            $session->setFlashdata('msg', 'Email does not exist or has been deleted. Please enter correct Email!');
            return redirect()->to('Login/');
        }
    }
    public function logout()
    {
        $session = session();
        $userlog= new UserLogin();
        $id= $_SESSION['login_id'];
        $data=['logout_time'=>new Time('now')];
        $userlog->update($id,$data);

        $session->destroy();

        return redirect()->to('Login/');
    }
}
?>

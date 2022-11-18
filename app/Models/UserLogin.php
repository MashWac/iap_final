<?php namespace App\Models;

use CodeIgniter\Model;


class UserLogin extends Model{
  protected $table ="tbl_userlogins";
  protected $primaryKey="userlogin_id"; 
  
  protected $allowedFields=['user_id','user_ip', 'login_time','logout_time','is_deleted'];

}

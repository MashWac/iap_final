<?php namespace App\Models;

use CodeIgniter\Model;


class Order extends Model{

  protected $table='tbl_order';
  protected $primaryKey='order_id';

  protected $allowedFields=['customer_id','order_amount','order_status','created_at','payment_type','updated_at','is_deleted'];

}
?>

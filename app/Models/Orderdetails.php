<?php namespace App\Models;

use CodeIgniter\Model;


class Orderdetails extends Model{

  protected $table='tbl_orderdetails';
  protected $primaryKey='orderdetails_id';

  protected $allowedFields=['order_id','product_id','product_price','order_quantity','orderdetails_total','created_at','updated_at','is_deleted'];
}
?>

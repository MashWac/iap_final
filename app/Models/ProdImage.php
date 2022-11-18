<?php namespace App\Models;

use CodeIgniter\Model;


class ProductImageModel extends Model{

  protected $table='tbl_productimages';
  protected $primaryKey='productimages_id';

  protected $allowedFields=['product_id','product_image','created_at','updated_at','added_by','is_deleted'];

}
?>

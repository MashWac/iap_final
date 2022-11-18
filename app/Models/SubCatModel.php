<?php namespace App\Models;

use CodeIgniter\Model;


class SubCatModel extends Model{

  protected $table='tbl_subcategories';
  protected $primaryKey='subcategory_id';

  protected $allowedFields=['subcategory_name','subcategory_image','subcategory_banner','category','is_deleted'];

}
?>

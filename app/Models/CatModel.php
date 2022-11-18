<?php namespace App\Models;

use CodeIgniter\Model;


class CatModel extends Model{

  protected $table='tbl_categories';
  protected $primaryKey='category_id';

  protected $allowedFields=['category_name','categoryImage','is_deleted'];

}
?>

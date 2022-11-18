<?php 
include('header.php');
?>
<div id="mainbody">
    <div id="prodpage">
    <h2 id="prodtitle">Our catalog</h3>
    <div id="productlist">
    <?php foreach($prods as $item):?>
        <div class="card col-12 col-sm-6 col-md-4" style="width: 18rem;">
            <img src="/upload/<?= $item['product_image']?>" class="card-img-top" alt="Product Image">
            <div class="card-body">
                <h5 class="card-title"><?=$item['product_name']?></h5>
                <p class="card-text"><?=$item['product_description'] ?><p>
                <a href="Product/addtocart/<?=$item['product_id']?>" class="btn btn-primary">ADD TO CART</a>
            </div>
        </div>
        <?php endforeach;?>
    </div>
    <?php print_r($_SESSION)?>
    </div>
</div>
<?php include('footer.php')?> 

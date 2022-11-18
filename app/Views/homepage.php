<?php 
include('header.php');
?>

    <div id="mainbodyHome">
        <div id="headline" >
            <h1 id="headlinehead">NEVER GET LEFT BEHIND </h1>
            <p id=headlinebody>Stay stylish no matter the time, location and occassion</p>
            <a href="/product" class="btn btn-primary">View all products</a>

        </div>
        <div id="categories">
            <?php foreach($cats as $item):?>
                <div class="cats">
                    <h2><?= $item['category_name']." "."COLLECTION" ?></h2>
                    <hr>  
                    <div class="row">
                    <?php foreach($subcats as $cards):?>
                        <?php if($cards['category']==$item['category_id']):?>
                        <div class="card col-12 col-sm-6 col-md-4" style="width: 18rem;">
                            <img class="card-img-top" src="/upload/<?=$cards['subcategory_image']?>" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title"><?=$cards['subcategory_name']?></h5>
                                <p class="card-text"><?="View"." ".$cards['subcategory_name']?></p>
                                <a href="/product" class="btn btn-primary">Explore</a>
                            </div>
                        </div>
                        <?php endif;?>

                        <?php endforeach;?>
                    </div>
                </div>
            <?php endforeach;?>
        </div>
    </div>
<?php include('footer.php');?>

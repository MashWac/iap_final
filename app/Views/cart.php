<?php 
include('header.php');
?>
<div id="mainbody">
    <div id="cartbody">
        <h3> My Shopping Cart</h3>
        <hr> 
        <div class="orderinfo">
            <h4>Order details</h4>
            <?php
            $totalprice=0;
            if(isset($_SESSION['cart'])){
                $count=count($_SESSION['cart']);
                if($count!=0){
                ?>
                <table id="carttable" class="purchaseinfo" cellpadding="4">
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Product Price</th>
                            <th>Product Image</th>
                            <th>Product Quatity</th>
                            <th>Subtotal</th>          
                        </tr>
                    </thead>
                    <?php
                        foreach($prods as $row){
                            foreach($_SESSION["cart"]as $key=>$value){
                                ?>
                                <?php
                                if($row['product_id']==$value['product_ID']){
                                    $currentquan=$value['Quantity'];
                                    $available_stock=$value['stock'];
                                    $_SESSION['cart'][$key]["prodName"]=$row['product_name'];
                                    $_SESSION['cart'][$key]["Price"]=$row['unit_price'];
                                ?>
                                <tr>
                                    <td><?= $row['product_name'] ?></td>
                                    <td><?= $row['unit_price'] ?>
                                        <input type='hidden' class='pprice' value="<?php echo (intval($row['unit_price']))?>">
                                    </td>

                                    <td>
                                        <img src='<?="../upload/".$row['product_image']?>' class="cardadmincatsImg" alt="Image" height="100px" width="100px">
                                    </td>
                                
                                    <td>
                                        <form action="Product/updateQuantity" method="POST">
                                        <input type="number" class="pquantity" onchange="this.form.submit()" name="prodquan" value="<?php echo ($currentquan); ?>" min="1" max="<?=$available_stock?>">
                                        <input type='hidden'  name="prod_Price" value="<?= $row['unit_price'] ?>" width="0px">
                                        <input type='hidden'  name="prod_Name" value="<?= $row['product_name'] ?>" width="0px">
                                        <input type='hidden'  name="prod_ID" value="<?= $row['product_id']?>" width="0px">
                                        </form>
                                        
                                    </td>
                                    <td class="ptotal">

                                    </td>
                                    <td>
                                        <a href="<?php echo base_url("/product/deletefromcart/".$row['product_id'])?>">
                                        <button type="button" class="btndel"> <ion-icon name="trash-outline" class="deleteicon"> </ion-icon> DELETE</button>
                                    </a>
                                </td>
                            </tr>
                            <?php
                                }
                            
                            }
                        }
                        }
                    }
                    else {echo "<h5 class='purchaseinfo'> Cart is empty</h5>";
                    }
                    ?>
                                
                </table>
                <div id=pricingdetails class="purchaseinfo">
                    <h4> Order Summary</h4>
                    <h5>Total items</h5>
                    <?php
                    if(isset($_SESSION['cart'])){
                        echo"<h7> Price ($count items)</h7>";
                    }
                    else{
                        echo"<h7> Price (0 items)</h7>";
                    }
                    ?>
                    <h6>Delivery Charges</h6>
                    <?php if(!ISSET($_SESSION['logged'])):?>
                        <h7>KSH200</h7>
                    <?php else:?>
                        <h7> FREE</h7>
                    <?php endif;?>
                    <h6> Amount Payable:</h6>
                    <h7 id="gtotal"> </h7>
                    <h6>Select payment method:</h6>
                    <div class="Accordion">
                        <div class=Accorcionitem id="option1">
                            <a class="accordionlink" href=#option1>Always Fashionable Wallet
                                <ion-icon class=ion-icon name="add-outline"></ion-icon>
                                <ion-icon class=ion-icon name="remove"></ion-icon>
                            </a>
                            <div class="answer">
                                <p>Make Payment From Wallet<br><br>
                                    <form method="post" action="/checkout">
                                    <input type="submit" id="gotoclients" name="Complete_payment" value="walletpay" class="buttonadminHome">
                                    <input type="hidden" name="paymenttype" id="paymenttype" value="wallet">
                                    <input type="hidden" name="totalpay" class="totalpay">
                                    </form>
                                </p>
                            </div>
                        </div>
                        <div class=Accorcionitem id="option2">
                            <a class="accordionlink" href=#option2>Mpesa
                                <ion-icon class=ion-icon name="add-outline"></ion-icon>
                                <ion-icon class=ion-icon name="remove"></ion-icon>
                            </a>
                            <div class="answer">
                                <p>Enter Number:<br><br>  
                                <input type="number" name="mpesano" class="acordionfields"><br><br>
                                <form method="post" action="/checkout">
                                    <input type="submit" id="gotoclients" name="Complete_payment" value="mpesa" class="buttonadminHome">
                                    <input type="hidden" name="paymenttype" id="paymenttype" value="mpesa">
                                    <input type="hidden" name="totalpay" class="totalpay">
                                </form>
                            </div>
                        </div>
                        <div class=Accorcionitem id="option3">
                            <a class="accordionlink" href=#option3>Card
                                <ion-icon class=ion-icon name="add-outline"></ion-icon>
                                <ion-icon class=ion-icon name="remove"></ion-icon>
                            </a>
                            <div class="answer">
                                <p>Enter Card Details<br><br>
                                <label for="cardholder">CardHolder Name:</label><br>
                                <input type="text" id="card_holder" name="cardholder"><br>
                                <label for="cardno">Card Number:</label><br>
                                <input type="number" id="card_number" name="cardno"><br>
                                <label for="cvc">CVC:</label><br>
                                <input type="number" id="cvc" name="cvc"><br>
                                <label for="exp">Expiry date:</label><br>
                                <input type="date" id="exp" name="exp"><br><br>
                                <form method="post" action="/checkout">
                                    <input type="submit" id="gotoclients" name="Complete_payment" value="card" class="buttonadminHome">
                                    <input type="hidden" name="paymenttype" id="paymenttype" value="card">
                                    <input type="hidden" name="totalpay" class="totalpay">
                                </form>
                            </div>
                        </div>
         
                    </div>
                </div>
  
            </div>
    </div>

        <script>
            var gt=0;
            var pprice=document.getElementsByClassName('pprice');
            var pquantity=document.getElementsByClassName('pquantity');
            var ptotal=document.getElementsByClassName('ptotal');
            var gtotal=document.getElementById('gtotal');

            function subTotal(){
                gt=0;
                for(i=0;i<pprice.length;i++){
                    ptotal[i].innerText=(pprice[i].value)*(pquantity[i].value);
                    gt=gt+((pprice[i].value)*(pquantity[i].value));
                
                }
                <?php if(!ISSET($_SESSION['logged'])):?>
                    gt=gt+200;
                    <?php endif;?>   
                gtotal.innerText=gt;
                document.getElementsByClassName('totalpay').value=gt;
            }
            subTotal();
        </script>
</div>
<?php include('footer.php');?>

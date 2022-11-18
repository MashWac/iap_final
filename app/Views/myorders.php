<?php include('header.php')?>
<div id="mainbody">
    <h2>My ORDERS</h2>
        <table id="tableadmin" cellpadding="10">
                <thead>
                    <tr>
                        <th>OrderID</th>
                        <th>Date</th>
                        <th>Order Amount</th>
                        <th>Payment type</th>
                        <th>Order Details</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($orders as $row):?>
                <tr>
                    <td><?= $row['order_id']?></td>
                    <td><?= $row['created_at']?></td>
                    <td><?= $row['order_amount']?></td>
                    <td><?= $row['paymenttype_name']?></td>
                <td>
                    <table id="tableadmin" cellpadding="10">
                        <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Unit Price</th>
                    </tr>
                </thead>
                <tbody>
                        <tr>
                            <td><?= $row['product_id']?></td>
                            <td> <?= $row['order_quantity']?> </td>
                            <td> <?= $row['product_price']?></td>
                            
                        </tr>
                </tbody>
                </table>

                </td>
                </tr>
                </tbody>
                <?php endforeach;?>
        </table> 
 </div>
 <?php include('footer.php')?>

<?php
require('top.inc.php');

$sql="select * from users order by id desc";
$res=mysqli_query($con,$sql);

?>
<script
  src="http://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous">
</script>


<style>
    table td p{
        margin-top:10px;
    }
</style>
<div class="content">
   <!-- Button trigger modal -->
        <div class="jumbotron">
            <div class="card">
                <h4>Orders</h4>
            </div>
            

            <div class="card">
                <div class="card_body">
                    <div class="table-responsive">
                        <table id ="example" class="table table-dark table-hover">
                        <thead>
                                <tr>
                                <th>Order ID</th>
                                <th>Order Date</th>
                                <th>Address</th>
                                <th>Payment Type</th>
                                <th>Payment Status</th>
                                <th>Order Status</th>
                                <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $res=mysqli_query($con,"select `order`.*,order_status.name as order_status_str from `order`,order_status where order_status.id=`order`.order_status");
                            while($row=mysqli_fetch_assoc($res)){
                            ?>
                                <tr>
                                <td><a href="order_master_detail.php?id=<?php echo $row['id']?>"><?php echo $row['id']?></a><br/><br/><br/><br/>
									<a style="background:blue;color:#fff;padding:2px 5px;top:5px;border-radius:5px;" href="../order_pdf.php?id=<?php echo $row['id']?>">PDF</a></td>
                                <td><?php echo $row['added_on']?></td>
                                <td>
                                <?php echo $row['address']?><br/>
                                <p><?php echo $row['city']?></p><br/>
                                <?php echo $row['pincode']?>
                                </td>
                                <td><?php echo $row['payment_type']?></td>
                                <td><?php echo $row['payment_status']?></td>
                                <td><?php echo $row['order_status_str']?></td>
                                <td>Rs. <?php echo number_format($row['total_price'])?></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>    
    </div>

    <script type="text/javascript">
    $(document).ready(function(){
        $('.nav_btn').click(function(){
            $('.mobile_nav_items').toggleClass('active');
        });

        $('.content').click(function(){
            $('.check1').prop('checked', true);
        });

     
});
        
$(document).ready(function() {
    $('#example').DataTable({
        lengthMenu: [ 10, 15, 25 ]
    });
} );
   

          

    </script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script> 
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>  
<script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap5.min.js"></script>
</body>
</html>
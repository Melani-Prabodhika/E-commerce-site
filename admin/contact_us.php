<?php
require('top.inc.php');

if(isset($_GET['type']) && $_GET['type']!=''){
	$type=get_safe_value($con,$_GET['type']);
	if($type=='delete'){
		$id=get_safe_value($con,$_GET['id']);
		$delete_sql="delete from contact_us where id='$id'";
		mysqli_query($con,$delete_sql);
	}
}

$sql="select * from contact_us order by id desc";
$res=mysqli_query($con,$sql);
?>


<div class="content">
        

   <!-- Button trigger modal -->
        <div class="jumbotron">
            <div class="card">
                <h4>Contact Us</h4>
            </div>
            

            <div class="card">
                <div class="card_body">
				<div class="table-responsive">
                <table class="table  table-dark table-hover">
                <thead>
                        <tr>
                        <th class="serial">#</th>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Query</th>
                        <th>Date</th>
                        <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $i=1;
                    while($row=mysqli_fetch_assoc($res)){?>
                        <tr>
                        <td class="serial"><?php echo $i++?></td>
                        <td><?php echo $row['id']?></td>
                        <td><?php echo $row['name']?></td>
                        <td><?php echo $row['email']?></td>
                        <td><?php echo $row['mobile']?></td>
                        <td><?php echo $row['comment']?></td>
                        <td><?php echo $row['added_on']?></td>
                        <td>
                        <?php
                             
                           echo "&nbsp;<button class='btn btn-danger btn-sm'><a href='?type=delete&id=".$row['id']."'>Delete</a></button>";
                            
                        ?>
                        </td>
                        </tr>
                        <tr>
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
});
        

   

          

    </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>   
</body>
</html>
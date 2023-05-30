<?php
require('top.inc.php');

if(isset($_GET['type']) && $_GET['type']!=''){
	$type=get_safe_value($con,$_GET['type']);
	if($type=='delete'){
		$id=get_safe_value($con,$_GET['id']);
		$delete_sql="delete from users where id='$id'";
		mysqli_query($con,$delete_sql);
	}
}

$sql="select * from users order by id desc";
$res=mysqli_query($con,$sql);

?>
<script
  src="http://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous">
</script>

<div class="content">
   <!-- Button trigger modal -->
        <div class="jumbotron">
            <div class="card">
                <h4>Users</h4>
            </div>
            

            <div class="card">
                <div class="card_body">
                <table id ="example" class="table table-dark table-hover">
                <thead>
                        <tr>
                        <th class="serial">#</th>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
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
                        <td><?php echo $row['added_on']?></td>
                        <td>
                        <?php
                            echo "<button class='btn btn-danger btn-sm'><a href='?type=delete&id=".$row['id']."'>Delete</a></button>";
                        ?>
                        </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
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
        lengthMenu: [ 05, 10, 25 ]
    });
} );
   

          

    </script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script> 
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>  
<script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap5.min.js"></script>
</body>
</html>
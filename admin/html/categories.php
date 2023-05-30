<?php
    require('top.inc.php');
    $msg='';
    if(isset($_GET['type']) && $_GET['type']!=''){
        $id=get_safe_value($con,$_GET['id']);
        $res=mysqli_query($con,"select * from categories where id='$id'");
        $check=mysqli_num_rows($res);
        if($check>0){
        $type =get_safe_value ($con,$_GET['type']);
        if($type=='status'){
            $operation=get_safe_value($con,$_GET['operation']);
            $id=get_safe_value($con,$_GET['id']);
            if($operation=='active'){
                $status='1';
            }else{
                $status='0';
            }
            $update_status_sql="update categories set status='$status' where id='$id'";
            mysqli_query($con, $update_status_sql);
        }

        if($type=='delete'){
            $id=get_safe_value($con,$_GET['id']);
            $delete_sql="delete from categories where id='$id'";
            mysqli_query($con, $delete_sql);
        }
    }else{
        header('location:categories.php');
        die();
    }
    }

 
    $sql="select * from categories order by categories asc";
    $res=mysqli_query($con,$sql);

    if(isset($_POST['submit'])){
        $categories=get_safe_value($con,$_POST['categories']);

        $res=mysqli_query($con,"select * from categories where categories='$categories'");
        $check=mysqli_num_rows($res);
        if($check>0){
            $msg="fsdfsgfsdgsfgsgdgdghdfghdf";
        }else{
        mysqli_query($con,"insert into categories(categories,status) values('$categories','1')");
        header('location:categories.php');
        die();
        }
    }
    /*
    if(isset($_GET['id']) && $_GET['id']!=''){
        $id=get_safe_value($con,$_GET['id']);
        $res=mysqli_query($con,"select * from categories where id='$id'");
        $row=mysqli_fetch_assoc($res);
        $categories=$row['categories'];
    }**/
?>
<div class="content">
        

    <!-- Modal -->
    <div class="modal fade" id="catadd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Categories</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                        <form method="POST">
                            <div class="modal-body">
                                <div class="mb-3">
                                <label for="categories" class="form-label">Category Name</label>
                                <input type="text" name="categories" class="form-control" placeholder="Enter Category Name" required>
                                </div>
                            </div>
                            <div class="field_error"><?php echo $msg?></div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="submit" class="btn btn-primary">Add Category</button>
                            </div>
                            
                        </form>
            </div>
        </div>
    </div>

<!--*******************************************edit******************************************-->
<div class="modal fade" id="editmodle" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Categories</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                        <form action="manage_categories.php" method="POST">
                            <div class="modal-body">
                                <input type="hidden" name="catupdate_id" id="catupdate_id">
                                <div class="mb-3">
                                <label for="categories" class="form-label">Category Name</label>
                                <input type="text" id="catedit" name="catedit" class="form-control" placeholder="Enter Category Name" required>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button name="updatedata" class="btn btn-primary">Save Changes</button>
                            </div>
                        </form>
            </div>
        </div>
    </div>

 <!--##########################################################################################################################3-->


   <!-- Button trigger modal -->
        <div class="jumbotron">
            <div class="card">
                <h4>Categories</h4>
            </div>
            <div class="card">
                <div class="card_body">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#catadd">Add Categories</button>
                </div>
            </div>

            <div class="card">
                <div class="card_body">
                <table class="table table-dark table-hover">
                <thead>
                        <tr>
                        <th class="serial">#</th>
                        <th>ID</th>
                        <th>Categories</th>
                        <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $i=1;
                    while($row=mysqli_fetch_assoc($res)){?>
                        <tr>
                        <td class="serial"><?php echo $i?></td>
                        <td><?php echo $row['id']?></td>
                        <td><?php echo $row['categories']?></td>
                        <td>
                        <?php
                             
                             
                            if($row['status'] ==1){
                                echo "<button class='btn btn-success btn-sm'><a href='?type=status&operation=deactive&id=".$row['id']."'>Active</a></button>&nbsp;";
                            }else{
                                echo "<button class='btn btn-warning btn-sm'><a class=dbtn href='?type=status&operation=active&id=".$row['id']."'>Deactive</a></button>&nbsp;";
                            }
                            echo "&nbsp;<button class='btn btn-primary btn-sm editbtn'>Edit</button>&nbsp;";
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

    <script type="text/javascript">
    $(document).ready(function(){
        $('.nav_btn').click(function(){
            $('.mobile_nav_items').toggleClass('active');
        });

       $('.editbtn').on('click',function(){
            $('#editmodle').modal('show');

            $tr = $(this).closest('tr');

            var data =$tr.children("td").map(function(){
                return $(this).text();
            }).get();

            console.log(data);
            $('#catupdate_id').val(data[1]);
            $('#catedit').val(data[2]);

        });
    });

          

    </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>   
</body>
</html>
<?php
include('connection.inc.php');
$s1=$_REQUEST["n"];
$sql=mysqli_query($con,"select * from product where name like '%".$s1."%'") or die (mysql_error());
$s="";
if(mysqli_num_rows($sql)>0){
while($row=mysqli_fetch_array($sql))
{
	$s=$s."
	<div class='sddsada'>
	<a class='link-p-colr' href='product.php?id=".$row['id']."'>
		<div class='live-outer'>
            	<div class='live-im'>
                	<img src='media/product/".$row['image']."'/>
                </div>
                <div class='live-product-det'>
                	<div class='live-product-name'>
                    	<p>".$row['name']."</p>
                    </div>
                    <div class='live-product-price'>
						<div class='live-product-price-text'><p>Rs. ".number_format($row['price'])."</p></div>
                    </div>
            	</div>
        </div>
	</a>
	</div>
	"	;
}}
echo $s;
?>
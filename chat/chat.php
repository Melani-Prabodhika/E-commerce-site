<?php 
  require('../connection.inc.php');
  if(!isset($_SESSION['unique_id'])){
    ?>
	<script>
	window.location.href='../login.php';
	</script>
	<?php
  }
  
?>
<link rel="stylesheet" href="chatstyle.css">
<div class="chatbody">
  <div class="chatwrapper">
    <section class="chat-area">
      <div class="chthead">
        <?php 
          $id = mysqli_real_escape_string($con, $_GET['id']);
          $sql = mysqli_query($con, "SELECT * FROM users WHERE unique_id = {$id}");
          if(mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql);
          }else{
            header("location: users.php");
          }
        ?>
        
        <div style="display:flex;" class="chtname">
        <img src="php/images/161366453887515352_2391967934357157_9057583666414223360_o.jpg" alt="">
        <div class="details">
          <span><?php echo $row['name'] ?></span>
          <p><?php echo $row['status']; ?></p>
        </div>
        </div>
        <span style="cursor: pointer;" id="cht2" class="back-icon"><i class="fas fa-chevron-down"></i></span>
        </div>
      <div class="chat-box">

      </div>
      <form action="#" class="typing-area">
        <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $id; ?>" hidden>
        <input type="text" name="message" class="input-field" placeholder="Type a message here..." autocomplete="off">
        <button><i class="fab fa-telegram-plane"></i></button>
      </form>
    </section>
  </div>
</div>

<script>
  $("#cht2").click(function(){
            $('.chatbody').removeClass("active");
        });
</script>

  <script src="javascript/chat.js"></script>



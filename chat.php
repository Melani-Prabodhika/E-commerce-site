<?php 
  require('connection.inc.php');
  if(!isset($_SESSION['unique_id'])){
    ?>
	<script>
	window.location.href='login-user.php';
	</script>
	<?php
  }
  
?>
<style>

.chatbody{
  display: flex;
  align-items: center;
  justify-content: center;
  background: rgba(0,0,0,0.9);
  padding: 0 10px;
  bottom:0;
  position: fixed;
  right: 2px;
  box-sizing: border-box;
  text-decoration: none;
  font-family: 'Poppins', sans-serif;
  visibility: hidden;
  border-radius: 10px;
}

.chatbody.active{
  visibility: visible;
  z-index: 50;
}


.chatwrapper{
  max-width: 400px;
  width: 100%;
  border-radius: 16px;
  box-shadow: 0 0 128px 0 rgba(0,0,0,0.1),
              0 32px 64px -48px rgba(0,0,0,0.5);
}




/* Chat Area CSS Start */
.chat-area .chthead{
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 10px 10px;
  color:#fff;
  border-bottom: 1px rgb(90, 90, 90) solid;
}
.chat-area .chthead .back-icon{
  color: #FFF;
  font-size: 18px;
  cursor: pointer;

}


.chat-area .chthead .chtname .details span{
  font-size: 17px;
  font-weight:bolder;
  
}
.chat-area .chthead .chtname .details p{
  margin:0;
}
.chat-box{
  position: relative;
  overflow-y: auto;
  padding: 10px 10px 20px 10px;
  height: 200px;
  background: rgba(0,0,0,0);
  scrollbar-color: #a6a6a6 black;
  scrollbar-width: thin;
  
}
.chat-box .text{
  position: absolute;
  top: 45%;
  left: 50%;
  width: calc(100% - 50px);
  text-align: center;
  transform: translate(-50%, -50%);
}
.chat-box .chat{
  margin: 15px 0;
}
.chat-box .chat p{
  word-wrap: break-word;
  padding: 8px 16px;
  box-shadow: 0 0 32px rgb(0 0 0 / 8%),
              0rem 16px 16px -16px rgb(0 0 0 / 10%);
}
.chat-box .outgoing{
  display: flex;
}
.chat-box .outgoing .details{
  margin-left: auto;
  max-width: calc(100% - 130px);
}
.outgoing .details p{
  background: #333;
  color: #fff;
  border-radius: 18px 18px 0 18px;
}
.chat-box .incoming{
  display: flex;
  align-items: flex-end;
}
.chat-box .incoming img{
  height: 35px;
  width: 35px;
  border-radius: 50%;
}
.chat-box .incoming .details{
  margin-right: auto;
  margin-left: 10px;
  max-width: calc(100% - 130px);
}
.incoming .details p{
  background: rgb(212, 212, 212);
  color: #333;
  border-radius: 18px 18px 18px 0;
}
.typing-area{
  padding: 18px 30px;
  display: flex;
  justify-content: center;
}
.typing-area textarea{
  resize:none;
  height:80px;
  width: 100%;
  font-size: 16px;
  padding: 10px 13px;
  border: 1px solid rgb(90, 90, 90);
  outline: none;
  border-radius: 5px;
  color:#fff;
  background: rgba(0,0,0,0);
}
.typing-area button{
  color: #fff;
  width: 27px;
  border: none;
  outline: none;
  background: rgb(0, 0, 0, 0);
  font-size: 19px;
  cursor: pointer;
  opacity: 0.7;
  pointer-events: none;
  border-radius: 50%;
  margin-left:5px;
  margin-top:3px;
}
.typing-area button.active{
  opacity: 1;
  pointer-events: auto;
}

.typing-area button i{
  font-size:29px;
  color:rgb(212, 212, 212);
}

/* Responive media query */
@media screen and (max-width: 450px) {


  .chat-area .chthead{
    padding: 15px 20px;
  }
  .chat-box{
    min-height: 400px;
    padding: 10px 15px 15px 20px;
  }
  .chat-box .chat p{
    font-size: 15px;
  }
  .chat-box .outogoing .details{
    max-width: 230px;
  }
  .chat-box .incoming .details{
    max-width: 265px;
  }
  .incoming .details img{
    height: 30px;
    width: 30px;
  }
  .chat-area form{
    padding: 20px;
  }
  .chat-area form input{
    height: 40px;
    width: calc(100% - 48px);
  }
  .chat-area form button{
    width: 45px;
  }
}

</style>
<body>
  

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
          $last_login = $row['status'];
        ?>
          <div class="details">
            <span style ="text-transform: capitalize;"><?php echo $row['name'] ?></span>
            <p style ="font-size:12px;;"><?php 
            $old_date =date('Y-m-d',strtotime("-2 days"));
            date_default_timezone_set("Asia/Colombo");
            if($last_login==date('Y-m-d')){
echo "Last seen today"."  ".$row['status3'];
            }
else if($last_login  == date('Y-m-d',strtotime("-1 days"))){
echo "Last seen yesterday"."  ".$row['status3'];
}
else if($last_login<$old_date){
echo "Last seen  ".$last_login." ".$row['status3'] ;
}else{
  echo $last_login;
}
 ?></p>
          </div>
          <span style="cursor: pointer;" id="cht2" class="back-icon"><i class="fas fa-chevron-down"></i></span>
      </div>
      <div class="chat-box">

      </div>
      <form action="#" class="typing-area">
        <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $id; ?>" hidden>
        <textarea id="chttextarea" type="text" name="message" class="input-field span4" placeholder="Type a message here..." autocomplete="off" clos="25"></textarea>
        <button><i class="fas fa-arrow-circle-right"></i></button>
      </form>
    </section>
  </div>
</div>

  <script src="javascript/chat.js"></script>
  

  <script>
  $("#cht2").click(function(){
            $('.chatbody').removeClass("active");
        });

        $(".search-btn").click(function(){
            $('.chatbody').removeClass("active");
        });

      
  
</script>
</body>

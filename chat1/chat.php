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
<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');  
.chatbody{
  display: flex;
  align-items: center;
  justify-content: center;
  background: #f7f7f7;
  padding: 0 10px;
  bottom:2px;
  position: fixed;
  right: 10px;
  box-sizing: border-box;
  text-decoration: none;
  font-family: 'Poppins', sans-serif;
}


.chatwrapper{
  background: #fff;
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
  padding: 18px 10px;
}
.chat-area .chthead .back-icon{
  color: #333;
  font-size: 18px;
  cursor: pointer;
}
.chat-area .chthead img{
  height: 45px;
  width: 45px;
  margin: 0 15px;
  border-radius: 50%;
}

.chat-area .chthead .chtname .details span{
  font-size: 17px;
  font-weight: 500;
}
.chat-area .chthead .chtname .details p{
  margin:0;
}
.chat-box{
  position: relative;
  overflow-y: auto;
  padding: 10px 10px 20px 10px;
  height: 200px;
  background: #f7f7f7;
  box-shadow: inset 0 32px 32px -32px rgb(0 0 0 / 5%),
              inset 0 -32px 32px -32px rgb(0 0 0 / 5%);
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
  justify-content: space-between;
}
.typing-area input{
  height: 35px;
  width: calc(100% - 58px);
  font-size: 16px;
  padding: 0 13px;
  border: 1px solid #e6e6e6;
  outline: none;
  border-radius: 5px 0 0 5px;
}
.typing-area button{
  color: #fff;
  width: 55px;
  border: none;
  outline: none;
  background: #333;
  font-size: 19px;
  cursor: pointer;
  opacity: 0.7;
  pointer-events: none;
  border-radius: 0 5px 5px 0;
  transition: all 0.3s ease;
}
.typing-area button.active{
  opacity: 1;
  pointer-events: auto;
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
          <img src="php/images/2.jpg" alt="">
          <div class="details">
            <span><?php echo $row['name'] ?></span>
            <p><?php echo $row['status']; ?></p>
          </div>
          <span style="cursor: pointer;" id="cht2" class="back-icon"><i class="fas fa-chevron-down"></i></span>
        </div>
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

  <script src="javascript/chat.js"></script>


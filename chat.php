<?php 
    session_start();
    include_once "php/config.php";
    if(!isset($_SESSION['unique_id'])){
      header("location: login.php");
    }
?>
<?php include_once "header.php"; ?>
<body>
  <div class="wrapper">
    <section class="chat-area">
        <header>
          <?php $unique_id = mysqli_real_escape_string($conn, $_GET['user_id']);  
           $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$unique_id} ");
           if(mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql);
           }else{
            header("location : users.php");
           }
           ?>
            <a href="users.php" class="back-icon"><i class="bi bi-arrow-left-circle-fill"></i></a>
            <img class="chat-image" src="php/images/<?php echo $row['img']; ?>" alt="">
            <div class="details">
                <span><?php echo $row['fname'].''.$row['lname']; ?> </span>
                <p><?php echo $row['status']; ?></p>
            </div>
        </header>
        <div class="chat-box">

        </div>
        <form action="#" class="typing-area">
          <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $unique_id;?>" hidden>
          <input type="text" name="message" value="" class="input-field" placeholder="Type a message here...." autocomplete="off">
          <button><i class="bi bi-send-fill"></i></button>            
        </form>
    </section>
  </div>
  <script  src="js/chat.js"></script>
</body>
</html>
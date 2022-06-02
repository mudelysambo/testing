<?php

include 'config.php';

session_start();

$seller_id = $_SESSION['seller_id'];

if(!isset($seller_id)){
    header('location:login.php');
};

if(isset($_GET['delete'])){
    $delete_id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM `request` WHERE id = '$delete_id'") or die('query failed');
    header('location:seller_messages.php');
}

    ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>messages</title>

        <!-- font awesome cdn link  -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

        <!-- custom seller css file link  -->
        <link rel="stylesheet" href="css/seller_style.css">

    </head>

    <body>
    
    <?php include 'seller_header.php'; ?>

    <section class="messages">

    <h1 class="title">messages</h1>

    <div class="box-container">
    <?php
        $select_message = mysqli_query($conn, "SELECT * FROM `request`") or die('query failed');
        if(mysqli_num_rows($select_message) > 0){
            while($fetch_message = mysqli_fetch_assoc($select_message)){
        
    ?>
    <div class="box">
        <p>Message from the admin</p>
        <p> message : <span><?php echo $fetch_message['message']; ?></span> </p>
        <a href="seller_messages.php?delete=<?php echo $fetch_message['id']; ?>" onclick="return confirm('delete this message?');" class="delete-btn">delete message</a>
    </div>
    <?php
        };
    }else{
        echo '<p class="empty">you have no messages!</p>';
    }
    ?>
    </div>

    </section>

    <!-- custom messages js file link  -->
    <script src="js/seller_script.js"></script>

    </body>
</html>
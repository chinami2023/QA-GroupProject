<?php

include_once("./app/database/connect.php");

$error_message = array();

if(isset($_POST["submitButton"])){

    if(empty($_POST["username"])){
        $error_message["username"] = "please write your name";
    } 
    if(empty($_POST["body"])){
        $error_message["body"] = "please write your comment";
    }

    if(empty($error_message)){
    $post_date = date("y-m-d H:i");

    $sql = "INSERT INTO `comment` ( `username`, `body`, `post_date`) VALUES (:username, :body, :post_date);";
$statement = $pdo->prepare($sql);


$statement->bindParam(":username", $_POST["username"], PDO::PARAM_STR);
$statement->bindParam(":body", $_POST["body"], PDO::PARAM_STR);
$statement->bindParam(":post_date", $post_date, PDO::PARAM_STR);

$statement->execute();
}
}

$comment_array = array();

$sql = "SELECT * FROM comment";
$statement = $pdo->prepare($sql);
$statement->execute();

// $comment_array = $statement;

$comment_array = $statement->fetchAll(PDO::FETCH_ASSOC);
// var_dump($comment_array);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="assets/style.css">
   

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Patrick+Hand&display=swap" rel="stylesheet">
    <title>In Memorian of Akira Toriyama</title>
</head>

<body>
<header>
    <!-- <img src="img/orange.svg" class="logo"> -->
    <nav class="mobile-menu">
      <a href="#" class="hamburger">
        <i class="fa-solid fa-bars fa-lg"></i>
        <i class="fa-solid fa-xmark fa-lg" style="display:none"></i>
      </a>
      <ul>
        <li><a href="index.html">Home</a></li>
        <li><a href="#">Forum</a></li>
      </ul>
    </nav>
    
    <nav class="main-menu">
      <ul>
        <li><a href="index.html">Home</a></li>
        <li><a href="#">Forum</a></li>
      </ul>
    </nav>
  </header> 

    <?php if(isset($error_message)) : ?>
        <ul class="errormessage">
            <?php foreach ($error_message as $error):?>
                <li><?php echo $error ?></li>
                <?php endforeach; ?>
        </ul>
        <?php endif; ?>
        
    <div class="threadWrapper">
        <div class="childWrapper">
           <section class="margin0">
            <div class="grid">
                <div class="col-3 leftside">
                  <div class="w80">
                 <img src="img/Layer_1.png" alt="side picture">
                 <form class="formwrapper" method="POST">

                 <div>
                 <label>Name :<br> </label>
                 <input type="text" name="username">
                 </div>

                 <div class="marginT23">
                 <label>Your message :<br> </label>
                 <textarea class="commentTextArea" name="body"></textarea> 
                 </div>
                 <div><input type="submit" value="Sent" name="submitButton"></div>

                 </form>
                  </div>
               </div>
       

               <div class="col-6">
                <?php foreach($comment_array as $comment) :?>
                <article>
                <div class="wrapper">
                <div class="grid">
                    <?php foreach($comment_array as $comment) :?>
                        <div class="col-4 boxstyle" class="threeboxs">
                        <div class="nameArea">
                        <!-- <span>Name :  </span> -->
                        <p class="username"><?php echo $comment["username"] ?> </p>
                        <!-- <time>: <?php echo $comment["post_date"] ?></time> -->
                        </div>
                        <p class="comment" >
                        <?php echo $comment["body"];?>
                        </p>
                        </div>
                        <?php endforeach ?>

                    </diV> 
                </div>
                </article>
                <?php endforeach ?>
               </div>
               <!-- col-6 -->

            <div class="col-3 ">
                <img src="img/rightpicture.png" alt="sidepicture" class="rightside">
            </div>
        
        
        </div>
        <!-- grid -->
          </section>
         
        </div>
    </div>
</body>
</html>
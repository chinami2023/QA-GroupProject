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
    <link rel="stylesheet" href="assets/style.css">
    <title>Document</title>
</head>
<body>
    <header>
        <h1>Comment</h1>
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
            <h2>comment message</h2>
           <section>
            <?php foreach($comment_array as $comment) :?>
            <article>
                <div class="wrapper"> 
                    <div class="nameArea">
                        <span>Name :  </span>
                    
                    <p class="username"><?php echo $comment["username"] ?> </p>
                    <time>: <?php echo $comment["post_date"] ?></time>
                    </div>
                    <p class="comment">
                        <?php echo $comment["body"];?>
                    </p>
                </div>
            </article>
            <?php endforeach ?>
          </section>
          <form class="formwrapper" method="POST">
            <div>
                <input type="submit" value="write" name="submitButton">
                <label>Name : </label>
                <input type="text" name="username">
            </div>
            <div>
                <textarea class="commentTextArea" name="body"></textarea> 
            </div>
          </form>
        </div>
    </div>
</body>
</html>
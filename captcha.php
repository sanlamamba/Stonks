<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        session_start();
        include("securimage/securimage.php");
        //on définit un nouvel objet de type securimage
        $securimage=new Securimage();

        $token = sha1(session_id().'xztns');
        //creation d'un ternaire
        $postedToken = isset($_POST['token'])?$_POST['token']:null;
        $captcha=isset($_POST['captcha'])?$_POST['captcha']:null;

        if ($postedToken)
        {
            if ($postedToken==$token)
            {
                if ($securimage->check($captcha))
                {
                    echo "captcha valid";
                } 
            
                else
                {
                    echo "captcha not valid";
                }
            } 
            else
            {
                echo "NOT OK";
            }
        }
    ?>
    <form method="POST">
        <label for="">your name</label>
        <input type="text" name="param">
    </br>
    <img src="securimage/securimage_show.php">
    </br>
    <label>captcha</label>
    <input type="text" name="captcha">
    </br>
        <input type="hidden" name="token" value="<?php echo $token; ?>">
        <input type="submit" name="ENVOYER">
    </form>
</body>
</html>
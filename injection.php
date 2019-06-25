<?php

/**  Tester avec :
 * 
 * Commentaire dans login :  admin'#
 * 
 * Condition toujours vrai dans password : ' OR '1'='1
 * 
 * Et bien d'autre....
 * */


$connect = false;

if(array_key_exists('login',$_POST)) {


    var_dump($_POST['login']);

    $bdd = new PDO('mysql:host=localhost;dbname=leblog;charset=UTF8','root','');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $sql = "SELECT * FROM b_user WHERE u_email='".$_POST['login']."' AND u_password='".$_POST['password']."'";

    var_dump($sql);


    $sth = $bdd->query($sql);

    
    $user = $sth->fetch(PDO::FETCH_ASSOC);

    if($user)
        $connect = true;

    var_dump($user);
}


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <script src="main.js"></script>
</head>
<body>

<?php if($connect === true):?>
    <h2>Connexion résussie !</h2>
<?php else:?>
    <form action="injection.php" method="post">
        <input type="text" value='' name="login" placeholder="Votre login">
        <input type="text" value='' name="password" placeholder="Votre mot de passe">

        <input type="submit" value="Connexion">
    </form>
<?php endif; ?>


</body>
</html>
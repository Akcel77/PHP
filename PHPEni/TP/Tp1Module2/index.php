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
        $varBool = true;
        $varInt = 42;
        $varFloa = 12.34;
        $varStr = "Hello!";

        echo $varBool . " " . var_dump($varBool);
        echo $varInt . " " . var_dump($varInt);
        echo $varFloa . " " . var_dump($varFloa);
        echo $varStr . " " . var_dump($varStr);
    ?>
    
    <?php
        $x = "PostgreSQL";
        $y = "MySQL";
        $z = &$x;
        $x = "PHP 5";
        $y = &$x;

        echo $x . " " . var_dump($x);
        echo $y . " " . var_dump($y);
        echo $z . " " . var_dump($z);

    ?>
</body>
</html>

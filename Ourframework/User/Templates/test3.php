<HTML>
<HEAD>
    <title>HI</title>
</HEAD>
<BODY>
<b><?php
    echo "I'm test3.php";
    //$vs->print($tablica);
    $vs->params($parr);
    $v1 = "tekst123";
    $v2 = "456DFGHJK";
    echo $v1;
    echo "<br>";
    echo $v2;
    echo "<br>";
    echo $vs->upper($v1);
    echo "<br>";
    echo $vs->lower($v2);
    echo "<br>";
    $vs->include_template("User/Templates/test4.php");
    //$vs->dump($parr);
    $vs->date();
    ?></b>
</BODY>
</HTML>
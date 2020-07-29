<?php
$text_entry1 = (int)$_POST['text1'];
$text_entry2 = (int)$_POST['text2'];
$text_entry3 = ($text_entry1 + $text_entry2);
?>
<html>
    <head>
        <title>My Page</title>
    </head>

    <body>
        <br>
        <form name="myform" action="textentry2.php" method="POST">
        <input type = "submit" name = "submit" value = "go">
        <input type = "text" name = "text1" value = "<?php echo $text_entry1 ?>" >
        <input type = "text" name = "text2" value = "<?php echo $text_entry2 ?>" >
        <input type = "text" name = "text3" value = "<?php echo $text_entry3 ?>" >
        </form>
    </body>
</html>
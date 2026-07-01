첫화면입니다. <br>
IP = <?php echo $_SERVER["REMOTE_ADDR"] ?> <br>

<form method="post" >
    <input type="text" name="xxx" pattern="010-[0-9]{4}-[0-9]{4}">

    <button type="submit">test</button>
</form>

<?php
    //phpinfo();
?>
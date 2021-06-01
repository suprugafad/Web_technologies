<!DOCTYPE html>
<html>
<head>
    <title>7</title>
</head>
<body>
    <h1>Лабораторная работа №7</h1>
    <form method="post">
        Имя:<br>
        <input type="text" name="name" required><br>
        E-mail:<br>
        <input type="email" name="email" required><br>
        Текст письма:<br>
        <textarea rows="10" cols="45" name="message" required></textarea><br>
        Подтверждение отправки письма:<br>
        <img src="captcha.php" alt="" /><br>
        <input type="text" name="captcha" required><br>
        <br>
        <input type="submit" name="submit" value="Отправить письмо">
    </form>
</body>
</html>

<?php
    session_start();
    if(isset($_POST['submit']))
    {
        if (($_POST["captcha"] == $_SESSION["rand_code"]) && ($_POST["captcha"] != ""))
        {
            $server_email = "poida.alesya@gmail.com";
            $mailto = $_POST['email'];
            $subject = "=?UTF-8?B?".base64_encode("Mail")."?=";
            $message = "Name: ".$_POST['name']."\n";
            $message .= "Message: ".$_POST['message']."\n";
            $headers = "From: Alexandrina ($server_email) \r\n";
            $headers .= "Reply-To: $server_email \r\n" ;
            if(mail($mailto, $subject, $message, $headers, "-f $server_email"))
            {
                echo "Ваше письмо было успешно отправлено<br>";
            }
            else
            {
                echo "Возникли проблемы при отправке. Повторите попытку.<br>";
            }
        }
        else
        {
            echo "Капча введена неправильно. Повторите попытку";
        }
    }
?>

<?php 
    require_once('count.php');
?>
<a href="1.html" id="1" target="_blank" onclick="handler(event)">
    Ссылка была нажата
    <?php getValue(1) ?>
    раз(а).
</a>
<script>
function handler(event)
{
    var request = new XMLHttpRequest();
    request.open('POST', 'count.php');
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.addEventListener('readystatechange', function()
    {
        if (this.readyState == 4 && this.status == 200)
        {
            event.target.innerText = 'Ссылка нажата ' + this.responseText + ' раз(а).';
        }
    });
    request.send('id=' + event.target.id);
 }
</script>
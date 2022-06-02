<?php

if (isset($_POST['submit'])){
    $selector = bin2hex(random_bytes(8));
    $token = random_bytes(32);
    $url = "localhost/testing-2/testing/" . $selector . "&validator=" . $token

}



?>
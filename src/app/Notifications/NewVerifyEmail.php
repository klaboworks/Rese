<?php

namespace App\Notifications;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;

class NewVerifyEmail extends VerifyEmail
{

    protected function buildMailMessage($url)
    {
        return (new MailMessage)
            ->subject('メールアドレスの確認')
            ->line('ご登録ありがとうございます。')
            ->line('全ての機能を使うにはメールアドレスのご確認が必要です。')
            ->action('このボタンをクリック', $url)
            ->line('上記ボタンをクリックして、ご確認を完了してください。');
    }
}

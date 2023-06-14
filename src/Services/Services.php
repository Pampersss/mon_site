<?php
namespace App\Services;

use Symfony\Component\Mailer\MailerInterface;
Use Symfony\Component\Mime\Email;

class Services
{
    public function __construct (private MailerInterface $mailer) {

    }

    public function sendEmail(
        $to = 'gelinot.robert@gmail.com',
        $subject = 'This is the Mail subject !',
        $content = '',
        $text = ''
    ): void{
        $email = (new Email())
            ->from('mon site internet')
            ->to($to)
            ->subject($subject)
            ->text($text)
            ->html($content);
        $this->mailer->send($email);
    }
}
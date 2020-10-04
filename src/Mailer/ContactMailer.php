<?php
namespace App\Mailer;

use Cake\Mailer\Mailer;

/**
 * Contact mailer.
 */
class ContactMailer extends Mailer
{

    /**
     * Mailer's name.
     *
     * @var string
     */
    static public $name = 'Contact';

    public function newContactMessage($contactMessage){
        $this->setTo($contactMessage->email)
            ->setProfile('dev')
            ->setEmailFormat('html')
            ->setTemplate('client_contact')
            ->setLayout('contact')
            ->setViewVars([
                'name' => $contactMessage->name,
                'subject' => $contactMessage->subject,
                'message' => $contactMessage->message
            ])
            ->setSubject(sprintf('Sua mensagem foi recebida!'));
    }

    public function newContactMessageAdmin($contactMessage){
        $this->setTo($contactMessage->email_adm)
            ->setProfile('dev')
            ->setEmailFormat('html')
            ->setTemplate('adm_contact')
            ->setLayout('contact')
            ->setViewVars([
                'name' => $contactMessage->name,
                'email' => $contactMessage->email,
                'subject' => $contactMessage->subject,
                'message' => $contactMessage->message
            ])
            ->setSubject(sprintf('Nova mensagem recebida!'));
    }
}

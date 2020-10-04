<?php
namespace App\Mailer;

use Cake\Mailer\Mailer;

/**
 * User mailer.
 */
class UserMailer extends Mailer
{

    /**
     * Mailer's name.
     *
     * @var string
     */
    static public $name = 'User';

    public function signupUser($user){
        $this->from(['exemplo@email.com' => 'Meu site'])
            ->setTo($user->email)
            ->setProfile('dev')
            ->setEmailFormat('html')
            ->setTemplate('welcome')
            ->setLayout('user')
            ->setViewVars(['name' => $user->name, 'cod_valid_email' => $user->cod_valid_email, 'host_name' => $user->host_name])
            ->setSubject('Welcome');
    }

    public function passwordRecovery($user){
        $this->from(['exemplo@email.com' => 'Meu site'])
            ->setTo($user->email)
            ->setProfile('dev')
            ->setEmailFormat('html')
            ->setTemplate('password_recovery')
            ->setLayout('user')
            ->setViewVars(['name' => $user->name, 'password_recovery' => $user->password_recovery, 'host_name' => $user->host_name])
            ->setSubject('Password Recovery');
    }
}

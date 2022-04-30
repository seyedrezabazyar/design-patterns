<?php

namespace Src\Solid\Srp;

class ConfirmationMailMailer
{
    private $templating;
    private $translator;
    private $mailer;

    /**
     * @param $templating
     * @param $translator
     * @param $mailer
     */

    public function __construct(
        TemplatingEngineInterface $templating,
        TranslatorInterface       $translator,
        MailerInterface           $mailer
    )
    {
        $this->templating = $templating;
        $this->translator = $translator;
        $this->mailer = $mailer;
    }

    public function sendTo(User $user)
    {
        $message = $this->createMessageFor($user);
        $this->sendMessage($message);
    }

    private function createMessageFor(User $user): Message
    {
        $subject = $this->translator->translate('please confirm your email address');
        $body = $this->templating->render('email.confirm', [
            'confirm_code' => $user->getConfirmCode()
        ]);
        return new Message($subject, $body, $user->getEmailAddress());
    }

    private function sendMessage(Message $message)
    {
        $this->mailer->send($message);
    }
}

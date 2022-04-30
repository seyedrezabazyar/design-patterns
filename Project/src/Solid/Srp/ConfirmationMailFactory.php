<?php

namespace Src\Solid\Srp;

class ConfirmationMailFactory
{
    private $templating;
    private $translator;

    /**
     * @param $templating
     * @param $translator
     */
    public function __construct(
        TemplatingEngineInterface $templating,
        TranslatorInterface       $translator)
    {
        $this->templating = $templating;
        $this->translator = $translator;
    }

    public function createMessageFor(User $user): Message
    {
        $subject = $this->translator->translate('please confirm your email address');
        $body = $this->templating->render('email.confirm', [
            'confirm_code' => $user->getConfirmCode()
        ]);
        return new Message($subject, $body, $user->getEmailAddress());
    }
}

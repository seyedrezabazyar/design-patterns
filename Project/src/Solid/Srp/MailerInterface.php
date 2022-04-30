<?php

namespace Src\Solid\Srp;

interface MailerInterface
{
    public function send(Message $message);
}

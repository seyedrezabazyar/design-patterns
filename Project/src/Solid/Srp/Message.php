<?php

namespace Src\Solid\Srp;

class Message
{
    private $subject;
    private $body;
    private $emailAddress;

    /**
     * @param $subject;
     * @param $body;
     * @param $emailAddress;
     */

    public function __construct($subject, $body, $emailAddress)
    {
        $this->subject = $subject;
        $this->body = $body;
        $this->emailAddress = $emailAddress;
    }

    /**
     * @return mixed
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @return mixed
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @return mixed
     */
    public function getEmailAddress()
    {
        return $this->emailAddress;
    }

}

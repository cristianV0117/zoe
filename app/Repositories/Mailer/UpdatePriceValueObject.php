<?php

namespace App\Repositories\Mailer;

use stdClass;

final class UpdatePriceValueObject
{
    private stdClass $mailObject;

    public function __construct(private readonly ?array $message)
    {
        $this->mailObject = new stdClass();
        $this->to();
        $this->setFrom();
        $this->setSubject();
        $this->setMarkdown();
        $this->setMessage();
    }

    public function object(): stdClass
    {
        return $this->mailObject;
    }

    private function to(): void
    {
        $this->mailObject->to = 'cvo6372@gmail.com';
    }

    private function setFrom(): void
    {
        $this->mailObject->from = 'sistema@gmail.com';
    }

    private function setSubject(): void
    {
        $this->mailObject->subject = 'Precios actualizados';
    }

    private function setMarkdown(): void
    {
        $this->mailObject->markdown = 'mails.UpdatePrice';
    }

    private function setMessage(): void
    {
        $this->mailObject->message = "{$this->message["model"]} {$this->message["message"]}";
    }

}

<?php

namespace Estina\Bundle\HomeBundle\EventListener;


use Estina\Bundle\HomeBundle\Event\ParticipantEvent;

/**
 * ParticipantListener
 */
class ParticipantListener
{
    protected $mailer;

    public function __construct($mailer, $adminEmail)
    {
        $this->mailer = $mailer;
        $this->adminEmail = $adminEmail;
    }

    /**
     * Item created 
     * 
     * @param GetResponseForExceptionEvent $event 
     */
    public function onCreate(ParticipantEvent $event)
    {
        $participant = $event->getParticipant();

        if (null === $this->adminEmail) {
            return;
        }

        $subject = 'Registracija: ' . $participant->getParticipant();
        $body = <<<EOT
====================
DALYVIS
====================
{$participant->getParticipant()}
{$participant->getEmail()}
{$participant->getPhone()}

====================
PRANEŠIMAS
====================
{$participant->getMotivation()}
{$participant->getDescription()}
EOT;

        $message = \Swift_Message::newInstance()
            ->setSubject($subject)
            ->setFrom($this->adminEmail)
            ->setTo($this->adminEmail)
            ->setBody($body)
        ;

        $this->mailer->send($message);
    }
}

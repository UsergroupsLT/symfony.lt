<?php

namespace Estina\Bundle\HomeBundle\Event;

use Symfony\Component\EventDispatcher\Event;

/**
 * ParticipantEvent
 */
class ParticipantEvent extends Event
{
    protected $participant;

    /**
     * @param $participant
     */
    public function __construct($participant)
    {
        $this->participant = $participant;
    }

    /**
     * @return mixed
     */
    public function getParticipant()
    {
        return $this->participant;
    }
}

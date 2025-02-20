<?php

namespace App\Handler;

use App\Entity\Auftrag;
use App\Entity\Auftraggeber;
use App\Entity\AuftragsPosition;

class BestellungHandler
{
    public function __construct(
        private readonly MateriallagerHandler $materiallagerHandler,
        private readonly AuftragHandler $auftragHandler,
        private readonly MaterialHandler $materialHandler,
    ){}

    public function generiereBestellung(array $data)
    {
        $auftraggeber = new Auftraggeber();
        $auftraggeber->setName("Test"); //@TODO ADJUST IT IF WE HAVE LOGINS, SO EACH CUSTOMER CAN CREATE A OWN ORDER

        // Create new Auftrag and set date of now
        $auftrag = new Auftrag();
        $auftrag->setDatum(new \DateTimeImmutable('now'));
        $auftrag->setAuftraggeber($auftraggeber);

        foreach($data as $order) {
            $tmp = new AuftragsPosition();
            $tmp->setAuftrag($auftrag);
            $tmp->setStatus(0);
            $tmp->setMenge($order);
        }

    }

    public function sendCommand()
    {

    }
}
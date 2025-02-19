<?php

namespace App\Services\Gedcom;

use \Gedcom\Gedcom;
use \Gedcom\Record\Fam;
use Gedcom\Record\Indi;

class GedcomImporter extends Gedcom
{
    public function __construct(Gedcom $gedcom)
    {
        $this->head = $gedcom->head;
        $this->subn = $gedcom->subn;
        $this->sour = $gedcom->sour;
        $this->indi = $gedcom->indi;
        $this->uid2indi = $gedcom->uid2indi;
        $this->fam = $gedcom->fam;
    }

    public function getUidToIndi(): array
    {
        return $this->uid2indi;
    }

    public function getRootNode()
    {
        return $this->uid2indi[''] ?? null;
    }

    public function getFamilyById(string $id): Fam|null
    {
        return $this->fam[$id] ?? null;
    }

    public function getNodeById(string $id): Indi|null 
    {
        return $this->indi[$id] ?? null;
    }
}
<?php

namespace App\Types\Gedcom;

use \Gedcom\Record\Indi;
use App\Types\Gedcom\Famc as IntFamc;
use App\Types\Gedcom\Fams as IntFams;

class GedcomNode
{
    private string $name = '';
    private Famc|null $family = null;
    private Fams|null $childFamily = null;
    private string $gedcomId = '';
    private GedcomFamily $ownFamily;

    public function __construct(Indi $indi = null)
    {
        if ($indi === null) {
            return;
        }

        $gedcomName = $indi->getName()[0];

        $this->name = $gedcomName->getName();
        $this->gedcomId = $indi->getId();

        if(isset($indi->getFamc()[0])) {
            $this->family = new Famc($indi->getFamc()[0]);
        }

        if(isset($indi->getFams()[0])){
            $this->childFamily = new Fams($indi->getFams()[0]);
        }

        dd($this);
    }

    public function buildTemp(Indi $indi): self
    {
        $this->gedcomId = $indi->getId();

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getFamily(): IntFamc |null
    {
        return $this->family;
    }

    public function getChildFamily(): IntFams
    {
        return $this->childFamily;
    }

    public function getId(): string 
    {
        return $this->gedcomId;
    }

    public function setOwnFamily (GedcomFamily $family){
        $this->ownFamily = $family;
    }
};
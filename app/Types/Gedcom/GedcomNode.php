<?php

namespace App\Types\Gedcom;

use \Gedcom\Record\Indi;
use App\Types\Gedcom\Famc as IntFamc;
use App\Types\Gedcom\Fams as IntFams;

class GedcomNode
{
    private string $name = '';
    private Fams|null $family = null;
    private Famc|null $parentFamily = null;
    private string $gedcomId = '';
    private int $treeDepth = 0;

    public GedcomFamily|null $tmpSelf = null;
    public GedcomFamily|null $tmpParent = null;

    public function __construct(Indi $indi = null, int $depth = 0)
    {
        if ($indi === null) {
            return;
        }

        $this->treeDepth = $depth;

        $gedcomName = $indi->getName()[0];

        $this->name = $gedcomName->getName();
        $this->gedcomId = $indi->getId();

        if (isset($indi->getFamc()[0])) {
            $this->parentFamily = new Famc($indi->getFamc()[0]);
        }

        if (isset($indi->getFams()[0])) {
            $this->family = new Fams($indi->getFams()[0]);
        }
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

    public function getFamily(): IntFams |null
    {
        return $this->family;
    }

    public function getParentFamily(): IntFamc|null
    {
        return $this->parentFamily;
    }

    public function getId(): string
    {
        return $this->gedcomId;
    }
};

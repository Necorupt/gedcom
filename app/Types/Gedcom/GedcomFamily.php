<?php

namespace App\Types\Gedcom;

use App\Services\Gedcom\GedcomImporter;
use \Gedcom\Record\Fam;

class GedcomFamily extends Fam
{
    private string $id = '';

    private string $husbandId = '';
    private string $wifeId = '';
    private array $childrensId = [];

    private GedcomNode $husb;
    private GedcomNode $wife;
    public array $childrens = [];

    public function __construct(Fam $fam)
    {
        if ($fam === null) {
            return;
        }

        $this->husbandId = $fam->_husb;
        $this->wifeId = $fam->_wife;
        $this->childrensId = $fam->_chil;
        $this->id = $fam->getId();
    }

    public function setWife(GedcomNode|null $node): self
    {
        if ($node !== null) {
            $this->wife = $node;
        }

        return $this;
    }

    public function setHusb(GedcomNode|null $node): self
    {
        if ($node !== null) {
            $this->husb = $node;
        }

        return $this;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getChildsId(): array
    {
        return $this->childrensId;
    }

    public function getHusbandId(): string
    {
        return $this->husbandId;
    }

    public function getWifeId(): string
    {
        return $this->wifeId;
    }

    public function getHusband(): GedcomNode
    {
        return $this->husb;
    }

    public function getWife(): GedcomNode
    {
        return $this->wife;
    }
};

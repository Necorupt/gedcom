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

    /**
     * @var GedcomNode[] $childrens
     */
    private array $childrens;

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

    public function parse(GedcomImporter $importer, GedcomBuilder $builder): self
    {
        $this->husb = new GedcomNode($importer->getNodeById($this->husbandId));
        $importer->addLoadedIndi($this->husb->getId());

        $this->wife = new GedcomNode($importer->getNodeById($this->wifeId));
        $importer->addLoadedIndi($this->wife->getId());

        $importer->addLoadedFamily($this->id);

        foreach($this->childrensId as $id){
            $children = new GedcomNode($importer->getNodeById($id));

            $importer->addLoadedIndi($children->getId());

            $this->childrens[] = $children;
        }

        return $this;
    }

    public function getId(): string {
        return $this->id;
    }
};
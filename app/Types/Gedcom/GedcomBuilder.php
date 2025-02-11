<?php

namespace App\Types\Gedcom;

use App\Services\Gedcom\GedcomImporter;
use App\Types\Gedcom\GedcomNode;
use App\Types\Gedcom\GedcomFamily;

class GedcomBuilder
{
    private GedcomImporter $importer;
    private GedcomFamily $rootFamily;
    private GedcomNode $rootNode;
    private GedcomRegistry $registry;

    public function __construct(GedcomImporter $importer)
    {
        $this->importer = $importer;
        $this->registry = new GedcomRegistry();
    }

    public function getGedcomRegistry()
    {
        return $this->registry;
    }

    public function parse(string $rootNodeId): self
    {
        $this->rootNode = $this->buildIndi($rootNodeId, 0);

        return $this;
    }

    public function buildIndi(string $indiId, int $depth)
    {
        $node = new GedcomNode($this->importer->getNodeById($indiId),  $depth);

        if ($this->registry->isIndiLoaded($indiId)) {
            return $node;
        }

        $this->registry->addIndividual($node);
        $isHasFamily = $node->getFamily() !== null;
        $isHasParents = $node->getParentFamily() !== null;

        if ($isHasFamily) {
            $node->tmpSelf = $this->buildFamily($node->getFamily()->getId(), $depth);
        }

        if ($isHasParents) {
            $node->tmpParent = $this->buildFamily($node->getParentFamily()->getId(), $depth + 1);
        }

        return $node;
    }

    public function buildFamily(string $familyId, int $depth): GedcomFamily
    {
        $gedFamily = $this->importer->getFamilyById($familyId);

        $family = new GedcomFamily($gedFamily);
        $this->registry->addFamily($family);

        $family
            ->setHusb($this->buildIndi($family->getHusbandId(), $depth))
            ->setWife($this->buildIndi($family->getWifeId(), $depth));

        foreach ($family->getChildsId() as $child) {
            $this->buildIndi($child, $depth - 1);
            $family->childrens[] = $child;
        }

        return $family;
    }
}

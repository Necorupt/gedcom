<?php

namespace App\Types\Gedcom;

use App\Services\Gedcom\GedcomImporter;

class GedcomBuilder 
{
    private GedcomImporter $importer;
    private GedcomFamily $rootFamily;
    private GedcomRegistry $registry;

    public function __construct(GedcomImporter $importer) {
        $this->importer = $importer;
        $this->registry = new GedcomRegistry();
    }

    public function getGedcomRegistry() {
        return $this->registry;
    }
 
    public function parse(string $rootNodeId): self
    {
        $rootNode = new GedcomNode($this->importer->getNodeById($rootNodeId));

        $family = $rootNode->getFamily();
        if($family) {
            $family = $this->buildFamily($family->getId());
        }

        return $this;
    }

   public function buildFamily(string $familyId) {
    $gedFamily = $this->importer->getFamilyById($familyId);

    $family = new GedcomFamily($gedFamily);
    $this->registry->addFamily($family);

    $family->parse($this->importer, $this);

    return $family;
   }
}
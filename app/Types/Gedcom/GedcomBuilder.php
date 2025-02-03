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
        /*
        $rootNode = new GedcomNode($this->importer->getNodeById($rootNodeId));

        $family = $rootNode->getFamily();
        if($family) {
            $family = new GedcomFamily($this->importer->getFamilyById($family->getId()));
            $family->parse($this->importer);

            $this->rootFamily = $family;

            foreach($family->getChildrens() as $children){
                $this->paseIndiChild($children);
            }
        }

        $this->parseFamParent($family);
        */

        return $this;
    }

    /*public function paseIndiParent(GedcomNode $node)
    {

    }

    public function parseFamParent(GedcomFamily|null $fam)
    {

    }

    public function paseIndiChild(GedcomNode $node)
    {
        $gedFamily = $this->importer->getFamilyById($node->getChildFamily()->getId());

        $family = new GedcomFamily($gedFamily);

        $family->parse($this->importer);
        $node->setOwnFamily($family);
   }*/


   public function buildFamily(string $familyId) {
    $gedFamily = $this->importer->getFamilyById($familyId);

    $family = new GedcomFamily($gedFamily);
    
    $this->registry->addFamily($family);

    return $family;
   }
}
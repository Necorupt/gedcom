<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Gedcom\GedcomImporter;
use App\Models\FamilyTree;
use App\Types\Gedcom\GedcomBuilder;
use App\Types\Gedcom\GedcomFamily;
use App\Types\Gedcom\GedcomNode;
use \Gedcom\Parser;

class TreeController extends Controller
{
    public function import(Request $request)
    {
        $file = $request->file('tree_file')->store('', 'uploads');
        $parser = new Parser();

        $gedcom = $parser->parse(public_path('uploads/' . $file));

        $importer = new GedcomImporter($gedcom);

        $tmpNode = (new GedcomNode())
            ->buildTemp($importer->getRootNode());

        $builder = (new GedcomBuilder($importer))
            ->parse($tmpNode->getId());

        dd($builder);

        $tree = FamilyTree::create(['name' => $request->input('name')]);

        return redirect()->route('treePage', ['id' => $tree->id]);
    }

    public function export(Request $request) {}
}

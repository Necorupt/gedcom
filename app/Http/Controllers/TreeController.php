<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\FamilyTree;
use \Gedcom\Parser;

class TreeController extends Controller
{
    public function import(Request $request)
    {
        $file = $request->file('tree_file')->store('', 'uploads');
        $parser = new Parser();

        $gedcom = $parser->parse(public_path('uploads/' . $file));
        dd($gedcom);

        $tree = FamilyTree::create(['name' => $request->input('name')]);

        return redirect()->route('treePage', ['id' => $tree->id]);
    }

    public function export(Request $request){

    }
}

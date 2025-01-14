<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\FamilyTree;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ViewController extends Controller
{
    public function index(): View{
        $trees = FamilyTree::all();

        return view('Pages.Index', ['trees' => $trees]);
    }

    public function treePage($id): View{
        $tree = FamilyTree::find($id);

        return view('Pages.TreePage', ['tree' => $tree]);
    }
}

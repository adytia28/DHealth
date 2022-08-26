<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Receipe;
use Illuminate\Http\Request;

class ReceipeController extends Controller
{
    public function index() {
        return view('web.receipe.index', [
            'receipes' => Receipe::paginate(10),
        ]);
    }

    public function create() {
        return view('web.receipe.create');
    }
}

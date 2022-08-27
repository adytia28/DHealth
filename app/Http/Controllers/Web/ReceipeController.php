<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Receipe;
use Illuminate\Http\Request;
use PDF;

class ReceipeController extends Controller {
    public function index() {
        return view('web.receipe.index', [
            'receipes' => Receipe::orderBy('id', 'DESC')->paginate(8),
        ]);
    }

    public function create() {
        return view('web.receipe.create');
    }

    public function show($id) {
        $receipe = Receipe::where('id', $id)->first();

        if(!$receipe)
        abort(404);

        return view('web.receipe.show', [
            'receipe' => $receipe,
        ]);
    }

    public function print($id) {
        $receipe = Receipe::where('id', $id)->first();

        if(!$receipe)
        abort(404);

        $pdf = PDF::loadview('web.pdf.resep-obat',['receipe'=> $receipe, 'user_id' => auth()->id()]);
    	return $pdf->download("resep-obat - " . auth()->user()->name .'.pdf');
    }
}

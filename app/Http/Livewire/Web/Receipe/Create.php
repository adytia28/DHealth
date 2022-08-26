<?php

namespace App\Http\Livewire\Web\Receipe;

use App\Models\Concoction;
use App\Models\Receipe;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Create extends Component
{
    public $type = 'Non-Racikan';
    public $name;
    public $quantity;
    public $medicine;
    public $selectSigna;
    public $signa;
    public $mix = [];

    public function rules() {
        return [
            'name' => $this->type == 'Racikan' ? 'required' : '',
            'quantity' => 'required|numeric',
            'signa' => 'required',
            'mix' => $this->type == 'Racikan' ? 'required|array|min:2' : 'required|array|max:1',
        ];
    }

    public function messages() {
        return [
            'mix.required' => 'Medicine is required',
            'mix.min'       =>  'Medicine min 2 data',
            'mix.max'       => 'Medicine max 1 data',
        ];
    }

    public function save() {
        $this->validate();

        $receipe = new Receipe;
        $receipe->type = $this->type;
        $receipe->users_id = auth()->id();
        $receipe->name = $this->name;
        $receipe->quantity = $this->quantity;
        $receipe->signa_id = explode('|', $this->selectSigna)[0];
        $receipe->save();

        foreach($this->mix as $item) {
            $mix = new Concoction;
            $mix->receipes_id = $receipe->id;
            $mix->obatalkes_id = explode('|', $item)[0];
            $mix->save();
        }
    }

    public function render() {
        $medicines =  DB::table('obatalkes_m')->where('stok', '>', 0.99)->where('obatalkes_nama', 'like', "%{$this->medicine}%")->take(10)->get();
        $signas = DB::table('signa_m')->where('signa_nama', 'like', "%{$this->signa}%")->take(10)->get();

        return view('livewire.web.receipe.create', [
            'medicines' => $medicines,
            'signas' => $signas,
        ]);
    }
}

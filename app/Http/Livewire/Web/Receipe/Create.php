<?php

namespace App\Http\Livewire\Web\Receipe;

use App\Models\Concoction;
use App\Models\Obatalkes;
use App\Models\Receipe;
use App\Models\Signas;
use Livewire\Component;

class Create extends Component {
    public $type = 'Non-Racikan';
    public $name;
    public $quantity;
    public $medicine;
    public $selectSigna;
    public $signa;
    public $mix = [];

    public function rules() {
        return [
            'name' => $this->type == 'Racikan' ? 'required|unique:receipes' : '',
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

    public function updated() {
        $this->validate([
            'quantity' => 'required|numeric',
        ]);

        if($this->type == 'Non-Racikan' && count($this->mix) > 1) {
            $data = $this->mix[0];
            $this->mix = [];
            $this->mix[] = $data;
        }
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
            $obatalkesId = explode('|', $item)[0];
            $mix = new Concoction;
            $mix->receipes_id = $receipe->id;
            $mix->obatalkes_id = $obatalkesId;
            $mix->save();

            $obatAlkes = Obatalkes::where('obatalkes_id', $obatalkesId)->first();
            if($obatAlkes && $obatAlkes->stok >= $this->quantity) {
                $obatAlkes->stok = $obatAlkes->stok - $this->quantity;
                $obatAlkes->save();
            }
        }

        return redirect()->route('receipe.index');
    }

    public function render() {
        $medicines =  Obatalkes::where('obatalkes_nama', 'like', "%{$this->medicine}%")->take(10)->get();
        $signas = Signas::where('signa_nama', 'like', "%{$this->signa}%")->take(10)->get();

        return view('livewire.web.receipe.create', [
            'medicines' => $medicines,
            'signas' => $signas,
        ]);
    }

    public function setSigna($val) {
        $this->selectSigna = $val;
        $this->signa = explode("|", $val)[1];
    }

    public function clearSigna() {
        $this->selectSigna = null;
        $this->signa = null;
    }
}

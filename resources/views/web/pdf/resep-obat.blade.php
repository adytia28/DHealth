
<div>
    <div class="flex items-center justify-between">
        <div>
            <h2 class="font-bold text-xl uppercase">Resep Obat</h2>
            <span class="font-semibold text-gray-500">{{$user_id}}</span>
        </div>
        <div>
            {{-- <img src="{{asset('img/logo.webp')}}" class="w-24"/> --}}
        </div>
    </div>

    {{-- <div class="space-y-5">
        <div>
            <h3 class="text-lg font-bold">{{$receipe->name ?? 'No Racikan'}}</h3>
            <div class="pl-4 py-5 text-sm">
                <ol @if($receipe->type == 'Racikan') class="list-decimal" @endif>
                    @foreach($receipe->concoction as $key => $concotion)
                    <li>
                        <span class="font-bold">{{$concotion->obatalkes->obatalkes_kode}} </span> - {{$concotion->obatalkes->obatalkes_nama}}
                    </li>
                    @endforeach
                </ol>
            </div>
        </div>
        <div>
            <h3 class="text-lg font-bold">Pemakaian</h3>
            <div class="py-5 text-sm">
                <span class="font-bold">{{$receipe->signa->signa_kode}} </span> - {{$receipe->signa->signa_nama}}
            </div>
        </div>
    </div> --}}

</div>

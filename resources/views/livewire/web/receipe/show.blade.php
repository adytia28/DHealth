<div class="space-y-12">
    <div class="flex items-center justify-between">
        <div>
            <h2 class="font-bold text-xl uppercase">Resep Obat</h2>
            <span class="font-semibold text-gray-500">{{auth()->user()->name}}</span>
        </div>
        <div>
            <img src="{{asset('img/logo.webp')}}" class="w-24"/>
        </div>
    </div>

    <div class="space-y-5">
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
    </div>

    <div class="flex items-center justify-end ">
        <a href="{{route('receipe.print', $receipe->id)}}" class="bg-gray-700 text-white flex items-center space-x-2 py-2 px-4 rounded-md">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6.72 13.829c-.24.03-.48.062-.72.096m.72-.096a42.415 42.415 0 0110.56 0m-10.56 0L6.34 18m10.94-4.171c.24.03.48.062.72.096m-.72-.096L17.66 18m0 0l.229 2.523a1.125 1.125 0 01-1.12 1.227H7.231c-.662 0-1.18-.568-1.12-1.227L6.34 18m11.318 0h1.091A2.25 2.25 0 0021 15.75V9.456c0-1.081-.768-2.015-1.837-2.175a48.055 48.055 0 00-1.913-.247M6.34 18H5.25A2.25 2.25 0 013 15.75V9.456c0-1.081.768-2.015 1.837-2.175a48.041 48.041 0 011.913-.247m10.5 0a48.536 48.536 0 00-10.5 0m10.5 0V3.375c0-.621-.504-1.125-1.125-1.125h-8.25c-.621 0-1.125.504-1.125 1.125v3.659M18 10.5h.008v.008H18V10.5zm-3 0h.008v.008H15V10.5z" />
              </svg>
            <span>Print</span>
        </a>
    </div>
</div>

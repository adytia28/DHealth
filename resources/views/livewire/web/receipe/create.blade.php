<div class="px-4 lg:px-0">
    <h2 class="font-bold text-xl border-b-2 border-gray-100 pb-5">Tambah Resep</h2>
    <div class="pt-8 space-y-6 w-full" x-data="{type:@entangle('type')}">
        <div class="grid grid-cols-12 w-full gap-2 sm:gap-8 border-b-2 border-gray-50 pb-6">
            <div class="col-span-12 sm:col-span-4 font-bold">
                Jenis Resep
            </div>
            <div class="col-span-12 sm:col-span-8 grid grid-cols-6 ">
                <div class="space-x-2 col-span-6 sm:col-span-2">
                    <input type="radio" id="type" name="type" x-model="type" value="Non-Racikan"/>
                    <label class="font-bold text-gray-600 text-sm" for="type">Non Racikan</label>
                </div>
                <div class="space-x-2 col-span-6 sm:col-span-2">
                    <input type="radio" id="type2" name="type" x-model="type" value="Racikan"/>
                    <label class="font-bold text-gray-600 text-sm" for="type2">Racikan</label>
                </div>
            </div>
        </div>

        @if($type == 'Racikan')
            <div class="grid grid-cols-12 w-full gap-2 sm:gap-8 border-b-2 border-gray-50 pb-6">
                <div class="col-span-12 sm:col-span-4 font-bold">
                    Nama Racikan
                </div>
                <div class="col-span-12 sm:col-span-8 grid grid-cols-12 ">
                    <input type="text" name="name" id="name" wire:model.debounce.300ms="name" class="border col-span-12 border-gray-200 text-sm rounded-md" placeholder="Masukan nama racikan"/>
                    @error('name')
                    <div class="text-red-500 text-xs whitespace-nowrap">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        @endif

        <div class="grid grid-cols-12 w-full gap-2 sm:gap-8 border-b-2 border-gray-50 pb-6">
            <div class="col-span-12 sm:col-span-4 font-bold">
                Jumlah
            </div>
            <div class="col-span-12 sm:col-span-8 grid grid-cols-12 ">
                <input type="text" name="quantity" id="quantity" wire:model.debounce.300ms="quantity" class="border col-span-12 border-gray-200 text-sm rounded-md" placeholder="Masukkan Jumlah Resep"/>
                @error('quantity')
                <div class="text-red-500 text-xs whitespace-nowrap">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="grid grid-cols-12 w-full gap-2 sm:gap-8 border-b-2 border-gray-50 pb-6">
            <div class="col-span-12 sm:col-span-4 font-bold">
                Obat
            </div>
            <div class="relative col-span-12 sm:col-span-8 grid grid-cols-12" x-data="{mix:@entangle('mix'), type:@entangle('type'), medicine:@entangle('medicine'), clearMedicine() {this.medicine = ''}, removeMix(val) {this.mix.splice(val, 1)}, pushMix (val) {if(!this.mix.includes(val) && this.type == 'Racikan') {this.mix.push(val); this.medicine = ''} else { this.mix = [];  this.mix.push(val); this.clearMedicine();} }}">
                <input type="text" name="medicine" id="medicine" wire:model.debounce.300ms="medicine" class="border col-span-12 border-gray-200 text-sm rounded-md" placeholder="Cari nama obat"/>
                @error('quantity')
                    @if($medicine)
                    <div class="z-20 flex justify-center bg-white border text-sm absolute top-12  w-full col-span-12 border-gray-100 shadow-md rounded-md py-4 px-4">
                        <div class="flex items-center  space-x-4">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-red-300">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 10.5v3.75m-9.303 3.376C1.83 19.126 2.914 21 4.645 21h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 4.88c-.866-1.501-3.032-1.501-3.898 0L2.697 17.626zM12 17.25h.007v.008H12v-.008z" />
                            </svg>
                            <span class="text-gray-500 font-semibold">
                                Isi form jumlah / quantity dengan angka terlebih dahulu
                            </span>
                        </div>
                    </div>
                    @endif
                @else
                    @error('mix')
                    <div class="text-red-500 text-xs whitespace-nowrap">{{ $message }}</div>
                    @enderror

                    <div class="mt-2 col-span-12 flex  items-center gap-2">
                        @foreach($mix as $keyMix => $item)
                            <span class="w-auto bg-green-500 items-center py-1 flex px-3 text-xs rounded-md text-white">
                                <span>{{explode("|", $item)[1]}}</span>
                                <span x-on:click="removeMix({{$keyMix}})" class="pl-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-white w-3 h-3">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 19.5l15-15m-15 0l15 15" />
                                    </svg>
                                </span>
                            </span>
                        @endforeach
                    </div>

                    @if($medicine)
                    <div class="z-20 bg-white border  absolute top-12  w-full text-xs col-span-12 border-gray-100 shadow-md rounded-md">
                        @forelse($medicines as $item)
                            @if($item->stok > 0)
                            <div @if($item->stok >= $quantity) x-on:click="pushMix('{{$item->obatalkes_id}}|{{$item->obatalkes_nama}}')" @endif class=" px-2 @if($item->stok < $quantity) bg-gray-200 @else cursor-pointer @endif w-full py-2 border-b border-gray-100">
                                <span class="font-semibold">{{$item->obatalkes_kode}}</span> - {{$item->obatalkes_nama}} - <span class="font-medium text-green-500">{{number_format($item->stok, 0, ',', '.')}} Stock  </span>  @if($item->stok < $quantity) <span class="text-red-500 font-semibold">  - Quantity lebih besar dari stock</span>@endif
                            </div>
                            @else
                            <div class=" px-2 bg-gray-100 text-gray-300 w-full py-2 border-b border-gray-100">
                                <span class="font-semibold">{{$item->obatalkes_kode}}</span> - {{$item->obatalkes_nama}} - <span class="text-red-500 font-semibold"> Stock habis</span>
                            </div>
                            @endif
                        @empty
                        <div class="text-center py-2 px-4">
                            Tidak ada obat
                        </div>
                        @endforelse
                    </div>
                    @endif
                @enderror
            </div>
        </div>

        <div  class="grid grid-cols-12 w-full gap-2 sm:gap-8 pb-6" x-data="{clearInput() { this.signa = ''; this.selectsigna = ''}}">
            <div class="col-span-12 sm:col-span-4 font-bold">
                Signa
            </div>
            <div class="relative col-span-12 sm:col-span-8 grid grid-cols-12 ">
                <input  type="text" name="signa" id="signa" wire:model.debounce.300ms="signa" wire:click="clearSigna()" class="border col-span-12 border-gray-200 text-sm rounded-md" placeholder="Cari nama signa"/>
                @error('signa')
                <div class="text-red-500 text-xs whitespace-nowrap">{{ $message }}</div>
                @enderror

                @if($signa && !$selectSigna)
                <div class="z-20 bg-white border text-sm absolute top-12 text-xs w-full col-span-12 border-gray-100 shadow-md rounded-md">
                    @forelse($signas as $item)
                    <div wire:click="setSigna('{{$item->signa_id}}|{{$item->signa_nama}}')" class="px-2  w-full py-2 border-b border-gray-100">
                        <span class="font-semibold">{{$item->signa_kode}}</span> - {{$item->signa_nama}}
                    </div>
                    @empty
                    <div class="text-center py-2 px-4">
                        Tidak ada obat
                    </div>
                    @endforelse
                </div>
                @endif
            </div>
        </div>

        <div class="flex justify-end">
            <div class="flex items-center space-x-4">
                <button type="button" wire:click="save()" class="bg-green-500 hover:bg-green-600 text-white px-6 text-xs sm:text-sm font-semibold py-2 rounded-md">Save</button>
            </div>
        </div>

        <div class="pt-8">
            <h2 class="font-bold text-xl">Draft Resep</h2>
            <div class="flex flex-col">
                <div class="py-6 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                        <div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-xs font-bold tracking-wider text-left text-gray-500 uppercase">
                                            Type
                                        </th>
                                        @if($type == 'Racikan')
                                        <th scope="col" class="px-6 py-3 text-xs font-bold tracking-wider text-left text-gray-500 uppercase">
                                            Name
                                        </th>
                                        @endif
                                        <th scope="col" class="px-6 py-3 text-xs font-bold tracking-wider text-left text-gray-500 uppercase">
                                            Quantity
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-xs font-bold tracking-wider text-left text-gray-500 uppercase">
                                            Obat Alkes
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-xs font-bold tracking-wider text-left text-gray-500 uppercase">
                                            Signa
                                        </th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr class="bg-white">
                                        <td class="px-6 py-4 text-sm font-bold text-blue-500 whitespace-nowrap">
                                            {{$type }}
                                        </td>
                                        @if($type == 'Racikan')
                                        <td class="px-6 text-sm font-bold @if($type == 'Non-Racikan') text-gray-400 @else text-gray-600 @endif whitespace-nowrap">
                                            {{$name ?? 'No content yet'}}
                                        </td>
                                        @endif
                                        <td class="px-6 py-4 text-sm font-normal text-gray-700 whitespace-nowrap">
                                            @error('quantity')
                                            No content yet
                                            @else
                                            {{$quantity ?? 'No content yet'}}
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 text-sm font-normal text-gray-700 whitespace-nowrap">
                                        <ol  class="list-decimal">
                                            @foreach($mix as $key => $concotion)
                                            <li>
                                                {{explode('|', $concotion)[1] }}
                                            </li>
                                            @endforeach
                                        </ol>
                                        </td>
                                        <td class="px-6 py-4 text-sm font-normal text-gray-700 whitespace-nowrap">
                                            {{explode('|', $selectSigna)[1] ?? 'No content yet'}}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

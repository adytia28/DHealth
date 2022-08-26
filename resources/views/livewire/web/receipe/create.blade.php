<div>
    <h2 class="font-bold text-xl border-b-2 border-gray-100 pb-5">Tambah Resep</h2>
    <div class="pt-8 space-y-6 w-full" x-data="{type:@entangle('type')}">
        <div class="grid grid-cols-12 w-full gap-8 border-b-2 border-gray-50 pb-6">
            <div class="col-span-4 font-bold">
                Jenis Resep
            </div>
            <div class="col-span-8 grid grid-cols-6 ">
                <div class="space-x-2 col-span-2">
                    <input type="radio" id="type" name="type" x-model="type" value="Non-Racikan"/>
                    <label class="font-bold text-gray-600 text-sm" for="type">Non Racikan</label>
                </div>
                <div class="space-x-2 col-span-2">
                    <input type="radio" id="type2" name="type" x-model="type" value="Racikan"/>
                    <label class="font-bold text-gray-600 text-sm" for="type2">Racikan</label>
                </div>
            </div>
        </div>

        <template x-if="type == 'Racikan'">
            <div class="grid grid-cols-12 w-full gap-8 border-b-2 border-gray-50 pb-6">
                <div class="col-span-4 font-bold">
                    Nama Racikan
                </div>
                <div class="col-span-8 grid grid-cols-12 ">
                    <input type="text" name="name" id="name" wire:model.debounce.300ms="name" class="border col-span-12 border-gray-200 text-sm rounded-md" placeholder="Masukan nama racikan"/>
                    @error('name')
                    <div class="text-red-500 text-xs whitespace-nowrap">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </template>

        <div class="grid grid-cols-12 w-full gap-8 border-b-2 border-gray-50 pb-6">
            <div class="col-span-4 font-bold">
                Jumlah
            </div>
            <div class="col-span-8 grid grid-cols-12 ">
                <input type="text" name="quantity" id="quantity" wire:model.debounce.300ms="quantity" class="border col-span-12 border-gray-200 text-sm rounded-md" placeholder="Masukkan Jumlah Resep"/>
                @error('quantity')
                <div class="text-red-500 text-xs whitespace-nowrap">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="grid grid-cols-12 w-full gap-8 border-b-2 border-gray-50 pb-6">
            <div class="col-span-4 font-bold">
                Obat
            </div>
            <div class="relative col-span-8 grid grid-cols-12" x-data="{mix:@entangle('mix'), type:@entangle('type'), medicine:@entangle('medicine'), removeMix(val) {this.mix.splice(val, 1)}, pushMix (val) {if(!this.mix.includes(val) && this.type == 'Racikan') {this.mix.push(val); this.medicine = ''} else {this.mix = []; this.mix.push(val) ; this.medicine = ''} }}">
                <input type="text" name="medicine" id="medicine" wire:model.debounce.300ms="medicine" class="border col-span-12 border-gray-200 text-sm rounded-md" placeholder="Cari nama obat"/>
                @error('mix')
                <div class="text-red-500 text-xs whitespace-nowrap">{{ $message }}</div>
                @enderror

                <div class="mt-2 col-span-12 flex  items-center gap-2">
                    <template x-for="(item, index) in mix" :key="'medicine' + index" >
                        <span class="w-auto bg-green-500 items-center py-1 flex px-3 text-xs rounded-md text-white">
                            <span x-text="item.split('|')[1]" class="">
                            </span>
                            <span x-on:click="removeMix(index)" class="pl-3">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-white w-3 h-3">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 19.5l15-15m-15 0l15 15" />
                                </svg>
                            </span>
                        </span>
                    </template>
                </div>

                @if($medicine)
                <div class="z-20 bg-white border text-sm absolute top-12  w-full col-span-12 border-gray-100 shadow-md rounded-md">
                    @forelse($medicines as $item)
                    <div  x-on:click="pushMix('{{$item->obatalkes_id}}|{{$item->obatalkes_nama}}')" class="px-2  w-full py-2 border-b border-gray-100">
                        <span class="font-semibold">{{$item->obatalkes_kode}}</span> - {{$item->obatalkes_nama}} - <span class="font-medium text-green-500">{{number_format($item->stok, 0, ',', '.')}} Stock</span>
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

        <div class="grid grid-cols-12 w-full gap-8 pb-6" x-data="{signa:@entangle('signa'), selectsigna:@entangle('selectSigna')}">
            <div class="col-span-4 font-bold">
                Signa
            </div>
            <div class="relative col-span-8 grid grid-cols-12 ">
                <input type="text" name="signa" id="signa" wire:model.debounce.300ms="signa" x-on:click="signa = ''; selectsigna = ''" class="border col-span-12 border-gray-200 text-sm rounded-md" placeholder="Cari nama signa"/>
                @error('signa')
                <div class="text-red-500 text-xs whitespace-nowrap">{{ $message }}</div>
                @enderror

                @if($signa && !$selectSigna)
                <div class="z-20 bg-white border text-sm absolute top-12  w-full col-span-12 border-gray-100 shadow-md rounded-md">
                    @forelse($signas as $item)
                    <div x-on:click="signa = '{{$item->signa_nama}}';  selectsigna = '{{$item->signa_id}}|{{$item->signa_nama}}'" class="px-2  w-full py-2 border-b border-gray-100">
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
            <button type="button" wire:click="save()" class="bg-green-500 hover:bg-green-600 text-white px-6 text-sm py-2 rounded-md">Save</button>
        </div>
    </div>
</div>

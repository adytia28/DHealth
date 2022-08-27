@extends('layouts.app')

@section('content')
<div class="w-full">
    <div class="flex items-center justify-end">
        <a href="{{route('receipe.create')}}" type="button" class="rounded-full p-2 bg-green-500 text-white">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 5v14m7-7H5" />
              </svg>
        </a>
    </div>
    <div class="flex flex-col">
        <div class="py-6 -my-2 overflow-x-scroll sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <div class="overflow-x-auto border-b border-gray-200 shadow sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-xs font-bold tracking-wider text-left text-gray-500 uppercase">
                                    Type
                                </th>
                                <th scope="col" class="px-6 py-3 text-xs font-bold tracking-wider text-left text-gray-500 uppercase">
                                    Name
                                </th>
                                <th scope="col" class="px-6 py-3 text-xs font-bold tracking-wider text-left text-gray-500 uppercase">
                                    Quantity
                                </th>
                                <th scope="col" class="px-6 py-3 text-xs font-bold tracking-wider text-left text-gray-500 uppercase">
                                    Obat Alkes
                                </th>
                                <th scope="col" class="px-6 py-3 text-xs font-bold tracking-wider text-left text-gray-500 uppercase">
                                    Signa
                                </th>
                                <th scope="col" class="px-6 py-3 text-xs font-bold tracking-wider text-left text-gray-500 uppercase">
                                    Action
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($receipes as $receipe)
                            <tr class="@if($loop->iteration % 2) bg-white @else bg-gray-50 @endif">
                                <td class="px-6 py-4 text-sm font-bold text-blue-500 whitespace-nowrap">
                                    {{$receipe->type}}
                                </td>
                                <td class="px-6 text-sm font-bold @if($receipe->type == 'Non-Racikan') text-gray-400 @else text-gray-600 @endif whitespace-nowrap">
                                {{$receipe->name ?? 'No Name'}}
                                </td>
                                <td class="px-6 py-4 text-sm font-normal text-gray-700 whitespace-nowrap">
                                    {{$receipe->quantity}}
                                </td>
                                <td class="px-6 py-4 text-sm font-normal text-gray-700 whitespace-nowrap">

                                <ol @if($receipe->type == 'Racikan') class="list-decimal" @endif>
                                    @foreach($receipe->concoction as $key => $concotion)
                                    <li>
                                        {{$concotion->obatalkes->obatalkes_nama}}
                                    </li>
                                    @endforeach
                                </ol>
                                </td>
                                <td class="px-6 py-4 text-sm font-normal text-gray-700 whitespace-nowrap">
                                    {{$receipe->signa->signa_nama}}
                                </td>
                                <td class="px-6 py-4 text-sm font-normal text-gray-700 whitespace-nowrap">
                                    <a href="{{route('receipe.show', $receipe->id)}}" class="w-8 h-8 flex items-center rounded-md bg-green-500 justify-center text-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5  ">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                          </svg>

                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="10" class="text-center px-4 py-4 text-gray-500 font-bold">
                                    No Receipe
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

    <div class="mt-8">
        {{$receipes->links()}}
    </div>
</div>
@endsection

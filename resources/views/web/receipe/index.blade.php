@extends('layouts.app')

@section('content')
<div class="w-full">
    <div class="flex flex-col">
        <div class="py-6 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-xs font-bold tracking-wider text-left text-gray-500 uppercase">
                                    Thumbnail
                                </th>
                                <th scope="col" class="px-6 py-3 text-xs font-bold tracking-wider text-left text-gray-500 uppercase">
                                    Date
                                </th>
                                <th scope="col" class="px-6 py-3 text-xs font-bold tracking-wider text-left text-gray-500 uppercase">
                                    Title
                                </th>
                                <th scope="col" class="px-6 py-3 text-xs font-bold tracking-wider text-left text-gray-500 uppercase">
                                    Description
                                </th>
                                <th scope="col" class="px-6 py-3 text-xs font-bold tracking-wider text-left text-gray-500 uppercase">
                                    Categories
                                </th>
                                <th scope="col" class="px-6 py-3 text-xs font-bold tracking-wider text-left text-gray-500 uppercase">
                                    Post By
                                </th>
                                <th scope="col" class="px-6 py-3 text-xs font-bold tracking-wider text-left text-gray-500 uppercase">
                                    Author
                                </th>
                                <th scope="col" class="px-6 py-3 text-xs font-bold tracking-wider text-left text-gray-500 uppercase">
                                    Status
                                </th>
                                <th scope="col" class="px-6 py-3 text-xs font-bold tracking-wider text-left text-gray-500 uppercase">
                                    Views
                                </th>
                                <th scope="col" class="px-6 py-3 text-xs font-bold tracking-wider text-left text-gray-500 uppercase">
                                    Action
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($receipes as $receipe)
                            <tr class=" bg-gray-100">
                                <td class="px-6 text-sm font-normal text-gray-700 whitespace-nowrap">
                                Img
                                </td>
                                <td class="px-6 py-4 text-sm font-normal text-gray-700 whitespace-nowrap">
                                te
                                </td>
                                <td class="px-6 py-4 text-sm font-normal text-gray-700 whitespace-nowrap">
                                    w
                                <td class="px-6 py-4 text-sm font-normal text-gray-700 whitespace-nowrap">
                                    a
                                </td>
                                <td class="px-6 py-4 text-sm font-normal text-gray-700 whitespace-nowrap">
                                e
                                </td>
                                <td class="px-6 py-4 text-sm font-normal text-gray-700 whitespace-nowrap">
                                    cv
                                </td>
                                <td class="px-6 py-4 text-sm font-normal text-gray-700 whitespace-nowrap">
                                h
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                    ye
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                22
                                </td>
                                <td class="flex items-center justify-center px-6 py-4 space-x-3 text-sm font-medium h-40 w-44 whitespace-nowrap">
                                    <a  target="_blank" class="px-2 py-1 text-xs text-green-500 uppercase bg-green-500 rounded shadow-sm max-w-max hover:shadow-lg hover:bg-green-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24 text-white" fill="currentColor" class="w-6 h-6 text-white">
                                            <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                                            <path fill-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" clip-rule="evenodd" />
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
</div>
@endsection

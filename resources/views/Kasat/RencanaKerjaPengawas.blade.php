<x-layout>
    <x-slot:title>{{$title}}</x-slot:title>

    <div class="bg-white shadow-md border-2 border-background-yellow2Bg rounded-2xl overflow-hidden ml-20 mr-20">
        <div class="w-full p-4 bg-white rounded-2xl">

            <div class="overflow-x-auto rounded-2xl">
                <table class="table-auto min-w-max w-full border-collapse">
                    <thead>
                        <tr class="bg-background-yellow2Bg text-black text-center">
                            <th class="py-3 px-4 rounded-l-2xl">No</th>
                            <th class="py-3 px-4">NIP</th>
                            <th class="py-3 px-4">Nama</th>
                            <th class="py-3 px-4 rounded-r-2xl">Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pengawas as $index => $data)
                        <tr class="border-b border-background-yellow2Bg text-center">
                            <td class="py-3 px-4">{{ $index + 1}}</td>
                            <td class="py-3 px-4">{{ $data->nip}}</td>
                            <td class="py-3 px-4">{{ $data->name}}</td>
                            <td class="py-3 px-4 text-center">
                                <a href="{{ route('kasat.detailRencanaKerja', $data->nip) }}" class="bg-button-acceptBtn hover:bg-button-hoverBtn text-white py-2 px-4 rounded-md">
                                    Detail
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>    
    </div>
</x-layout>

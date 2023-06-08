<x-filament::page>

    @if($hasPdf)
    <div style="height: 80vh">
        <object id='pdf-viewer' data="{{ $pdf }}" type="application/pdf" width="100%" height="100%">
            <p>К сожалению, ваш браузер не поддерживает просмотр PDF файлов. Вы можете <a href="{{ $pdf }}">скачать его</a>.</p>
        </object>
    </div>
    @endif

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Upload PDF') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('menu.upload') }}" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <label
                                class="block font-medium text-gray-700"
                                for="pdf-menu"
                            >
                                {{ __('Загрузка меню в PDF формате') }}
                            </label>
                            <input
                                type="file"
                                name="pdf-menu"
                                id="pdf-menu"
                                accept=".pdf"
                                class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow"
                            />
                        </div>

                        <div class="mt-4">
                            <button
                                type="submit"
                                class="bg-gray-500 hover:bg-gray-100 text-white hover:text-primary-500 font-semibold py-2 px-4 border border-gray-400 rounded shadow"
                            >
                                {{ __('Загрузить') }}
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

</x-filament::page>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    Bem vindo(a) ao VetCenter, {{Auth::user()->name }}! 🐾
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg" style="margin-top: 10px">
                <div class="p-6 text-gray-900">
                    <a href="{{ route('funcionarios.index') }}" class="btn btn-dark float-right">
                        <i class="fas fa-undo-alt"></i> Funcionários
                    </a>
                    <a href="{{ route('proprietarios.index') }}" class="btn btn-dark float-right">
                        <i class="fas fa-undo-alt"></i> Proprietários;  
                    </a>
                </div>

            </div>
            
        </div>
    </div>

</x-app-layout>

@include('layouts.cabecalho')

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
                    Bem vindo(a) ao VetCenter, {{ Auth::user()->name }}! 🐾
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg" style="margin-top: 10px">
                <div class="p-6 text-gray-900">

                    <div class="container mt-5">
                        <div class="row">
                            <!-- Card 1 -->
                            <div class="col-md-3">
                                <div class="card bg-dark text-white">
                                    <img src="https://ictq.com.br/images/Desafios_do_farmac%C3%AAutico_na_manipula%C3%A7%C3%A3o_de_medicamentos_veterin%C3%A1rios.jpg"
                                        class="card-img-top" alt="Imagem 1">
                                    <div class="card-body">
                                        <h5 class="card-title"><b>Animais</b></h5>
                                        <p class="card-text">Gerencie os pacientes da clínica</p><br>
                                        <a href="{{ route('animais.index') }}" class="btn btn-light">Acessar</a>
                                    </div>
                                </div>
                            </div>
                    
                            <!-- Card 2 -->
                            <div class="col-md-3">
                                <div class="card bg-dark text-white">
                                    <img src="https://ictq.com.br/images/Desafios_do_farmac%C3%AAutico_na_manipula%C3%A7%C3%A3o_de_medicamentos_veterin%C3%A1rios.jpg"
                                        class="card-img-top" alt="Imagem 1">
                                    <div class="card-body">
                                        <h5 class="card-title"><b>Funcionários</b></h5>
                                        <p class="card-text">Gerencie os funcionários</p><br>
                                        <a href="{{ route('funcionarios.index') }}" class="btn btn-light">Acessar</a>
                                    </div>
                                </div>
                            </div>
                        

                            <!-- Card 3 -->
                            <div class="col-md-3">
                                <div class="card bg-dark text-white">
                                    <img src="https://ictq.com.br/images/Desafios_do_farmac%C3%AAutico_na_manipula%C3%A7%C3%A3o_de_medicamentos_veterin%C3%A1rios.jpg"
                                        class="card-img-top" alt="Imagem 1">
                                    <div class="card-body">
                                        <h5 class="card-title"><b>Proprietários</b></h5>
                                        <p class="card-text">Gerencie os proprietários</p><br>
                                        <a href="{{ route('proprietarios.index') }}" class="btn btn-light">Acessar</a>
                                    </div>
                                </div>
                            </div>

                            <!-- Card 4 -->
                            <div class="col-md-3">
                                <div class="card bg-dark text-white">
                                    <img src="https://ictq.com.br/images/Desafios_do_farmac%C3%AAutico_na_manipula%C3%A7%C3%A3o_de_medicamentos_veterin%C3%A1rios.jpg"
                                        class="card-img-top" alt="Imagem 1">
                                    <div class="card-body">
                                        <h5 class="card-title"><b>Consultas</b></h5>
                                        <p class="card-text">Gerencie consultas</p><br>
                                        <a href="{{ route('consultas.index') }}" class="btn btn-light">Acessar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>

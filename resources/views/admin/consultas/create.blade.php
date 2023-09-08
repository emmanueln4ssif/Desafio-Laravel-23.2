<x-app-layout>

    @include('layouts.cabecalho')

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Agendar Consulta') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 text-gray-900">

                    <form class="row g-3" id="form-adicionar" action="{{ route('consultas.store') }}" method="post">

                        @csrf

                        <div class="col-12">
                            <b>Dados da consulta</b>
                        </div>

                        <div class="col-md-6">
                            <label for="nasc" class="form-label">Funcionário responsável</label>
                            <input type="text" class="form-control" id="funcionario_id" name="funcionario_id" value = {{$funcionario->name}} readonly>
                        </div>

                        <div class="col-md-6">
                            <label for="inputProprietario" class="form-label">Paciente</label>
                          <select id="proprietario_id" class="form-select" name = "animal_id">
                            <option selected>Selecione...</option>

                                @foreach ($animais as $animal)
                                    <option value="{{$animal->id}}">{{$animal->nome}}</option>
                                @endforeach
                            
                          </select>
                        </div>

                        <div class="col-md-6">
                            <label for="inicio" class="form-label">Início</label>
                            <input type="datetime-local" class="form-control" id="data_nascimento" name="inicio">
                        </div>

                        <div class="col-md-6">
                            <label for="termino" class="form-label">Término</label>
                            <input type="datetime-local" class="form-control" id="especie" name="termino">
                        </div>

                        <div class="col-12">
                            <b>Tratamento realizado</b>
                        </div>

                        <div class="col-md-5">
                            <label for="raca" class="form-label">Nome</label>
                            <input type="text" class="form-control" id="tratamentos" name="nome_tratamento">
                        </div>

                        <div class="col-md-5">
                            <label for="raca" class="form-label">Medicações</label>
                            <input type="text" class="form-control" id="tratamentos" name="medicacoes_tratamento">
                        </div>

                        <div class="col-md-2">
                            <label for="raca" class="form-label">Repouso</label>
                            <input type="text" class="form-control" id="tratamentos" name="repouso_tratamento">
                        </div>


                        <div class="col-md-2">
                            <label for="custo" class="form-label">Custo (R$)</label>
                            <input type="number" class="form-control" id="custo" name="custo" placeholder="000.00">
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end" style="margin-top: 3%">

                            <a href="{{ route('consultas.index') }}" class="btn btn-dark float-right">
                                <i class="fas fa-undo-alt"></i> Voltar
                            </a>

                            <button class="btn btn-success me-md-2" type="submit">Agendar consulta</button>

                        </div>

                      </form>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>
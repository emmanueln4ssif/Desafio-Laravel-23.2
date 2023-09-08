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

                        <div class="col-md-6">
                            <label for="nasc" class="form-label">Funcionário responsável</label>
                            <input type="text" class="form-control" id="funcionario_id" name="funcionario_id" value = {{$consulta->user->name}} readonly>
                        </div>

                        <div class="col-md-6"></div>

                        <div class="col-12">
                            <b>Dados da consulta</b>
                        </div>

                        <div class="col-md-6">
                            <label for="nome" class="form-label">Paciente</label>
                            <input type="text" class="form-control" id="animal_id" value = {{$consulta->animal->nome}} readonly>
                        </div>

                        <div class="col-md-6"></div>

                        <div class="col-md-6">
                            <label for="inicio" class="form-label">Início</label>
                            <input type="text" class="form-control" id="data" value = "{{'Dia ' . $dia_inicio .', às '. $hora_inicio}}" readonly>
                        </div>

                        <div class="col-md-6">
                            <label for="termino" class="form-label">Término</label>
                            <input type="text" class="form-control" id="especie" value = "{{'Dia '. $dia_termino .', às '. $hora_termino}}" readonly>
                        </div>

                        <div class="col-md-10">
                            <label for="tratamento" class="form-label">Tratamentos realizados</label>
                            <input type="text" class="form-control" id="tratamento" name="tratamentos">
                        </div>

                        <div class="col-md-2">
                            <label for="custo" class="form-label">Custo (R$)</label>
                            <input type="number" class="form-control" id="custo" name="custo" value = {{$consulta->custo}} readonly>
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
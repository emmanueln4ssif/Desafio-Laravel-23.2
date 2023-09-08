<x-app-layout>

    @include('layouts.cabecalho')

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Adicionar Animal') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 text-gray-900">

                    <form class="row g-3" id="form-adicionar" action="{{ route('animais.store') }}" method="post" enctype="multipart/form-data">

                        @csrf

                        <div class="col-12">
                            <b>Dados do animal</b>
                        </div>

                        <div class="col-md-6">
                            <label for="nome" class="form-label">Nome</label>
                            <input type="text" name="nome" class="form-control" id="nome">
                        </div>

                        <div class="col-md-6">
                            <label for="nasc" class="form-label">Data de Nascimento</label>
                            <input type="date" class="form-control" id="data_nascimento" name="data_nascimento">
                        </div>

                        <div class="col-md-4">
                            <label for="especie" class="form-label">Espécie</label>
                            <input type="text" class="form-control" id="especie" name="especie">
                        </div>

                        <div class="col-md-4">
                            <label for="raca" class="form-label">Raça</label>
                            <input type="text" class="form-control" id="raca" name="raca">
                        </div>

                        <div class="col-md-4">
                            <label for="inputProprietario" class="form-label">Proprietário</label>
                          <select id="proprietario_id" class="form-select" name = "proprietario_id">
                            <option selected>Selecione...</option>

                                @foreach ($proprietarios as $proprietario)
                                    <option value="{{$proprietario->id}}">{{$proprietario->nome.' ('.$proprietario->cpf.')'}}
                                @endforeach

                            </option>
                          </select>
                        </div>

                        <div class="col-12">
                            <b>Tratamentos realizados</b>
                        </div>

                        <div class="col-md-5">
                            <label for="raca" class="form-label">Nome</label>
                            <input type="text" class="form-control" id="tratamentos" name="tratamentos">
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end" style="margin-top: 3%">

                            <a href="{{ route('animais.index') }}" class="btn btn-dark float-right">
                                <i class="fas fa-undo-alt"></i> Voltar
                            </a>

                            <button class="btn btn-success me-md-2" type="submit">Cadastrar animal</button>

                        </div>

                      </form>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>
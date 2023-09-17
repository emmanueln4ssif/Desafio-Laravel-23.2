<x-app-layout>

    @include('layouts.cabecalho')

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Animal') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 text-gray-900">

                    <form class="row g-3" id="form-editar" action="{{ route('animais.update', $animal->id) }}" method="post">

                        @csrf

                        <div class="col-12">
                            <b>Dados do animal</b>
                        </div>

                        <div class="col-md-6">
                            <label for="nome" class="form-label">Nome</label>
                            <input type="text" name="nome" class="form-control" id="nome" value = "{{$animal->nome}}" required>
                        </div>

                        <div class="col-md-6">
                            <label for="nasc" class="form-label">Data de Nascimento</label>
                            <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" value = "{{$animal->data_nascimento}}" required>
                        </div>

                        <div class="col-md-6">
                            <label for="especie" class="form-label">Espécie</label>
                            <input type="text" class="form-control" id="especie" name="especie" value = "{{$animal->especie}}" required>
                        </div>

                        <div class="col-md-6">
                            <label for="raca" class="form-label">Raça</label>
                            <input type="text" class="form-control" id="raca" name="raca" value = "{{$animal->raca}}" required>
                        </div>

                        <div class="col-md-6">
                            <label for="inputProprietario" class="form-label">Proprietário</label>
                          <select id="proprietario_id" class="form-select" name = "proprietario_id" required>
                                <option value="{{$animal->proprietario->id}}">{{$animal->proprietario->nome .' ('.$animal->proprietario->cpf.')'}}</option>
                          </select>
                        </div>

                        <div class="col-12">
                            <b>Tratamentos realizados</b>
                        </div>

                        <div class="col-md-12">
                            <label for="raca" class="form-label">Nome</label>
                            <input type="textarea" class="form-control" id="tratamentos" name="tratamentos" value = "{{$animal->tratamentos}}" required>
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">

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
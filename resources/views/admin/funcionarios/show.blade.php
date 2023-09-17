<x-app-layout>

    @can('isAdmin', '\App\Models\User')

    @include('layouts.cabecalho')

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dados do Funcionário') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 text-gray-900">

                    

                    <form class="row g-3">

                        <div class="col-12">
                            <b>Dados pessoais</b>
                        </div>

                        <div class="col-md-8">
                            <label for="nome" class="form-label">Nome</label>
                            <input type="text" name="name" class="form-control" id="name" value="{{$user->name}}" readonly>
                        </div>

                        <div class="col-md-1">
                            <label for="ddd" class="form-label">DDD</label>
                            <input type="text"  class="form-control" id="ddd" name="ddd" value="{{$user->ddd}}" readonly>
                        </div>

                        <div class="col-md-3">
                            <label for="telefone" class="form-label">Telefone</label>
                            <input type="text" class="form-control" id="telefone" name="telefone" value="{{$user->telefone}}" readonly>
                        </div>

                        <div class="col-md-6">
                            <label for="inputState" class="form-label">Data de Nascimento</label>
                            <input type="text" class="form-control" id="data_nascimento" name="data_nascimento" value="{{$dataNascimento}}" readonly>
                        </div>

                        <div class="col-md-6">
                            <label for="inputState" class="form-label">Período de trabalho</label>
                            <input type="text" class="form-control" id="periodo_trabalho" name="periodo_trabalho" value="{{$user->periodo_trabalho}}" readonly>
                        </div>

                        <div class="col-12" style="padding-top: 2%">
                            <b>Endereço</b>
                        </div>


                        <div class="col-8">
                          <label for="rua" class="form-label">Rua</label>
                          <input type="text" class="form-control" id="rua" name="rua" value="{{$user->rua}}" readonly>
                        </div>

                        <div class="col-1">
                          <label for="numero" class="form-label">Número</label>
                          <input type="text" class="form-control" id="numero" name="numero" value="{{$user->numero}}" readonly>
                        </div>

                        <div class="col-3">
                            <label for="bairro" class="form-label">Bairro</label>
                            <input type="text" class="form-control" id="bairro" name="bairro" value="{{$user->bairro}}" readonly>
                          </div>

                        <div class="col-md-5">
                          <label for="cidade" class="form-label">Cidade</label>
                          <input type="text" class="form-control" id="cidade" name="cidade" value="{{$user->cidade}}" readonly>
                        </div>

                        <div class="col-md-3">
                          <label for="inputState" class="form-label">Estado</label>
                          <input type="text" class="form-control" id="uf" name="uf" value="{{$user->uf}}" readonly>
                        </div>

                        <div class="col-md-2">
                            <label for="pais" class="form-label">País</label>
                            <input type="text" class="form-control" id="pais" name="pais" value="{{$user->pais}}" readonly>
                          </div>

                        <div class="col-md-2">
                          <label for="cep" class="form-label">CEP</label>
                          <input type="text" class="form-control" id="cep" name="cep" value="{{$user->cep}}"readonly>
                        </div>

                        <div class="col-12" style="padding-top: 2%">
                            <b>Dados de acesso</b>
                        </div>

                        <div class="col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}" readonly>
                          </div>
  
                          <div class="col-md-6">
                            <label for="senha" class="form-label">Senha</label>
                            <input type="password" class="form-control" id="password" name="password" value="{{$user->password}}" readonly>
                          </div>


                        

                        <div class="col-10"></div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">

                            <a href="{{ route('funcionarios.index') }}" class="btn btn-dark float-right">
                                <i class="fas fa-undo-alt"></i> Voltar
                            </a>

                        </div>

                </div>
            </div>
        </div>
    </div>

    @endcan

</x-app-layout>
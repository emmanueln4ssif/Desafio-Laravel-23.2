<x-app-layout>

    @include('layouts.cabecalho')

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dados do Proprietário') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 text-gray-900">

                    <form class="row g-3" id="form-adicionar" action="{{ route('proprietarios.update', $proprietario->id) }}" method="post" enctype="multipart/form-data">

                        @csrf

                        <div class="col-12">
                            <b>Dados pessoais</b>
                        </div>

                        <div class="col-md-6">
                            <label for="nome" class="form-label">Nome</label>
                            <input type="text" name="nome" class="form-control" id="nome" value="{{$proprietario->nome}}" required>
                        </div>

                        <div class="col-md-3">
                            <label for="inputState" class="form-label">Data de Nascimento</label>
                            <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" value="{{$proprietario->data_nascimento}}" required>
                        </div>

                        <div class="col-md-3">
                            <label for="senha" class="form-label">CPF</label>
                            <input type="text" class="form-control" id="cpf" name="cpf" value="{{$proprietario->cpf}}" required>
                        </div>

                        <div class="col-7" style="padding-top: 2%">
                            <b>Contato</b>
                        </div>

                        <div class="col-5" style="padding-top: 2%">
                            <b>Perfil</b>
                        </div>

                        <div class="col-md-4">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{$proprietario->email}}" required>
                        </div>

                        <div class="col-md-1">
                            <label for="ddd" class="form-label">DDD</label>
                            <input type="text"  class="form-control" id="ddd" name="ddd" value="{{$proprietario->ddd}}" required>
                        </div>

                        <div class="col-md-2">
                            <label for="telefone" class="form-label">Telefone</label>
                            <input type="text" class="form-control" id="telefone" name="telefone" value="{{$proprietario->telefone}}" required>
                        </div>

                        <div class="col-md-5">
                            <label for="formFile" class="form-label">Alterar foto de perfil</label>
                            <input class="form-control" type="file" id="formFile" name = "foto_perfil">
                        </div>
                        

                        <div class="col-12" style="padding-top: 2%">
                            <b>Endereço</b>
                        </div>


                        <div class="col-8">
                          <label for="rua" class="form-label">Rua</label>
                          <input type="text" class="form-control" id="rua" name="rua" value="{{$proprietario->rua}}" required>
                        </div>

                        <div class="col-1">
                          <label for="numero" class="form-label">Número</label>
                          <input type="text" class="form-control" id="numero" name="numero" value="{{$proprietario->numero}}" required>
                        </div>

                        <div class="col-3">
                            <label for="bairro" class="form-label">Bairro</label>
                            <input type="text" class="form-control" id="bairro" name="bairro" value="{{$proprietario->bairro}}" required>
                          </div>

                        <div class="col-md-5">
                          <label for="cidade" class="form-label">Cidade</label>
                          <input type="text" class="form-control" id="cidade" name="cidade" value="{{$proprietario->cidade}}" required>
                        </div>

                        <div class="col-md-3">
                          <label for="inputState" class="form-label">Estado</label>
                          <select id="uf" class="form-select" name = "uf" required>
                            <option selected>{{$proprietario->uf}}</option>
                            <option value="AC">Acre</option>
                            <option value="AL">Alagoas</option>
                            <option value="AP">Amapá</option>
                            <option value="AM">Amazonas</option>
                            <option value="BA">Bahia</option>
                            <option value="CE">Ceará</option>
                            <option value="DF">Distrito Federal</option>
                            <option value="ES">Espírito Santo</option>
                            <option value="GO">Goiás</option>
                            <option value="MA">Maranhão</option>
                            <option value="MT">Mato Grosso</option>
                            <option value="MS">Mato Grosso do Sul</option>
                            <option value="MG">Minas Gerais</option>
                            <option value="PA">Pará</option>
                            <option value="PB">Paraíba</option>
                            <option value="PR">Paraná</option>
                            <option value="PE">Pernambuco</option>
                            <option value="PI">Piauí</option>
                            <option value="RJ">Rio de Janeiro</option>
                            <option value="RN">Rio Grande do Norte</option>
                            <option value="RS">Rio Grande do Sul</option>
                            <option value="RO">Rondônia</option>
                            <option value="RR">Roraima</option>
                            <option value="SC">Santa Catarina</option>
                            <option value="SP">São Paulo</option>
                            <option value="SE">Sergipe</option>
                            <option value="TO">Tocantins</option>
                          </select>
                        </div>

                        <div class="col-md-2">
                            <label for="pais" class="form-label">País</label>
                            <input type="text" class="form-control" id="pais" name="pais" value="{{$proprietario->pais}}" required>
                          </div>

                        <div class="col-md-2">
                          <label for="cep" class="form-label">CEP</label>
                          <input type="text" class="form-control" id="cep" name="cep" value="{{$proprietario->cep}}" required>
                        </div>

                        <div class="col-10"></div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">

                            <a href="{{ route('proprietarios.index') }}" class="btn btn-dark float-right">
                                <i class="fas fa-undo-alt"></i> Voltar
                            </a>

                            <button class="btn btn-success me-md-2" type="submit">Enviar alterações</button>

                        </div>

                      </form>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>
<x-app-layout>

    @include('layouts.cabecalho')

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Proprietários') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="mb-3">
                <form action="{{ route('proprietarios.index') }}" method="GET">
                    <div class="input-group">
                        <input type="text" class="form-control" name="search" placeholder="Buscar proprietário">
                        <button type="submit" class="btn btn-success">Buscar</button>
                    </div>
                </form>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 text-gray-900">


                    {{-- @if ($proprietarios->isEmpty())
                    <div class="container text-center" style="margin-top: 45px; margin-bottom: 45px">
                        <div class="alert" style="font-size: 24px;">O termo <b>"{{$query}}"</b> não foi encontrado.</div>
                        <a href="{{ route('proprietarios.index') }}" class="btn btn-dark">Voltar</a>
                    </div>
                    @else
                    @endif --}}



                    <div class="table-responsive-xl">

                        <table class="table table-hover table-striped">

                            {{-- @can('view', $leitor = Auth::user()) --}}

                            @if (isset($mensagem))
                                <div class="container text-center" style="margin-top: 45px; margin-bottom: 45px">
                                    <div class="alert" style="font-size: 24px;">{{ $mensagem }}</div>
                                    <a href="{{ route('proprietarios.create') }}" class="btn btn-success">Adicionar um
                                        proprietário</a>
                                </div>
                            @else
                            
                                <thead class="bg-success text-white"
                                    style="background-color: rgb(55, 109, 91); color: white">
                                    <tr>
                                        <th scope="col" style="">
                                            <h5>NOME DO PROPRIETÁRIO<h5>
                                        </th>

                                        <th scope="col" style="">
                                            <a href="{{ route('proprietarios.create') }}"
                                                class="btn btn-secondary float-right">
                                                </i> <i class="bi bi-plus-lg"></i>
                                                +
                                            </a>
                                        </th>

                                    </tr>
                                </thead>

                                <tbody>

                                    @foreach ($proprietarios as $proprietario)
                                        <tr>
                                            <td>{{ $proprietario->name }}</td>
                                            <td>
                                                <form action="{{ route('proprietarios.destroy', $proprietario->id) }}"
                                                    method="POST">
                                                    @csrf

                                                    <div class="btn-group float-right" role="group" aria-label="...">

                                                        <a href="{{ route('proprietarios.show', $proprietario->id) }}"
                                                            class="btn btn-dark float-right">
                                                            <i class="fas fa-undo-alt">Ver</i>
                                                        </a>

                                                        <a href="{{ route('proprietarios.edit', $proprietario->id) }}"
                                                            class="btn btn-secondary float-right">
                                                            <i class="fas fa-undo-alt">Editar</i>
                                                        </a>

                                                        <button class="btn btn-danger float-right" type="submit">
                                                            <i class="fas fa-undo-alt">Excluir</i>
                                                        </button>

                                                    </div>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>

                            @endif

                        </table>


                    </div>

                </div>

            </div>

        </div>
    </div>

</x-app-layout>

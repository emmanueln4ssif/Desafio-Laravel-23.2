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
                        <button type="submit" class="btn btn-success"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                          </svg></button>
                    </div>
                </form>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 text-gray-900">

                    @if ($proprietarios->isEmpty() && $query != null)
                        <div class="container text-center" style="margin-top: 45px; margin-bottom: 45px">
                            <div class="alert" style="font-size: 24px;">O termo <b>"{{ $query }}"</b> não foi
                                encontrado.</div>
                            <a href="{{ route('proprietarios.index') }}" class="btn btn-dark">Voltar</a>
                        </div>
                    @else
                        <div class="table-responsive-xl">
                            
                            <table class="table table-hover table-striped">

                                {{-- @can('view', $leitor = Auth::user()) --}}

                                @if ($proprietarios->isEmpty())
                                    <div class="container text-center" style="margin-top: 45px; margin-bottom: 45px">
                                        <div class="alert" style="font-size: 24px;">Nenhum proprietário cadastrado
                                        </div>
                                        <a href="{{ route('proprietarios.create') }}" class="btn btn-success">Adicionar
                                            um proprietário</a>
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
                                                    class="btn btn-dark float-right">
                                                    </i> <i class="bi bi-plus-lg"></i>
                                                    <b></b>
                                                </a>
                                            </th>

                                        </tr>
                                    </thead>

                                    <tbody>

                                        @foreach ($proprietarios as $proprietario)
                                            <tr>
                                                <td>{{ $proprietario->nome }}</td>
                                                <td>
                                                    <form
                                                        action="{{ route('proprietarios.destroy', $proprietario->id) }}"
                                                        method="POST">
                                                        @csrf

                                                        <div class="btn-group float-right" role="group"
                                                            aria-label="...">

                                                            <a href="{{ route('proprietarios.show', $proprietario->id) }}"
                                                                class="btn btn-dark float-right">
                                                                <i class="fas fa-undo-alt">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                                                    <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                                                    </svg>
                                                                </i>
                                                            </a>

                                                            <a href="{{ route('proprietarios.edit', $proprietario->id) }}"
                                                                class="btn btn-secondary float-right">
                                                                <i class="fas fa-undo-alt">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                                                    </svg>
                                                                </i>
                                                            </a>

                                                            <button class="btn btn-danger float-right" type="submit">
                                                                <i class="fas fa-undo-alt">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                                                        <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                                                                    </svg>
                                                                </i>
                                                            </button>

                                                        </div>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>

                                @endif

                            </table>

                            <div class="text-center">
                                {{ $proprietarios->links('pagination::tailwind') }}
                            </div>

                    @endif
                </div>

            </div>

        </div>

    </div>
    </div>

</x-app-layout>

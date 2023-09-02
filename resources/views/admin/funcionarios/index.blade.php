<x-app-layout>

    @include('layouts.cabecalho')

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Funcionários') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 text-gray-900">
                    
                    {{--@if(Auth::user()->id != 1)
                    Você não tem autorização para acessar este conteúdo.
                    @endif--}}

                    <div class="table-responsive-xl">

                        <table class="table table-striped">

                            {{--@can('view', $leitor = Auth::user())--}}
                            
                            <thead class="" style = "background-color: rgb(55, 109, 91); color: white">
                                <tr>
                                    <th scope="col" style=""><h5>Nome do funcionário<h5></th>
                                    
                                    <th scope="col" style="">
                                        <a href="{{ route('funcionarios.create') }}" class="btn btn-secondary float-right">
                                            </i> <i class="bi bi-plus-lg"></i>
                                            +
                                        </a>
                                    </th>
                                </tr>
                            </thead>

                                <tbody>
                                    
                                    @foreach ($funcionarios as $funcionario )
                                    

                                    @if($funcionario->id != 1 || $funcionario->name != 'Administrador')
                                        <tr>
                                            <td>{{$funcionario->name}}</td>
                                            <td>
                                                <form action="{{ route('funcionarios.destroy', $funcionario->id) }}" method="POST">
                                                    @csrf
                                                        
                                                    <div class="btn-group float-right" role="group" aria-label="...">
                                                    
                                                        <a href="{{ route('funcionarios.show', $funcionario->id) }}" class="btn btn-dark float-right">
                                                            <i class="fas fa-undo-alt">Ver</i>  
                                                        </a>

                                                        <a href="{{ route('funcionarios.edit', $funcionario->id) }}" class="btn btn-secondary float-right">
                                                            <i class="fas fa-undo-alt">Editar</i>  
                                                        </a>

                                                        <button class="btn btn-danger float-right" type="submit">
                                                            <i class="fas fa-undo-alt">Excluir</i> 
                                                        </button>

                                                    </div>
                                                </form>
                                            </td>
                                        </tr>
                                    @endif

                                    @endforeach
                                
                                </tbody>
                            {{--@endcan--}}
                                    
                        </table>

                    </div>

                </div>

            </div>
            
        </div>
    </div>

</x-app-layout>
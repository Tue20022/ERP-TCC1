<x-app-layout>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <h5 class="card-title">Projetos</h5>
                </div>
                <div class="col-md-6 d-flex justify-content-end">
                    <a href="{{ route('projetos.create') }}" class="btn btn-primary mb-3"><i class="bi bi-plus"></i>Novo Projeto</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="col-md-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th width="5%">ID</th>
                            <th width="10%">Nome</th>
                            <th width="20%">Responsavel</th>
                            <th width="20%">Tipo</th>
                            <th width="10%">Prioridade</th>
                            <th width="15%">Status</th>
                            <th width="20%">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($projetos as $projeto)
                            <tr>
                                <td>{{ $projeto->id }}</td>
                                <td>{{ $projeto->numero_interno }}</td>
                                <td>{{ $projeto->user->name }}</td>
                                <td>{{ $projeto->tipoProjeto->name }}</td>
                                <td>{{ $projeto->prioridade }}</td>
                                <td>{{ $projeto->status }}</td>
                                <td>
                                    <a href="{{ route('projetos.edit', $projeto->id) }}" class="btn btn-warning"><i class="bi bi-pencil"></i> Editar</a> 
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal{{ $projeto->id }}">
                                        <i class="bi bi-trash"></i> Excluir
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal de deletar-->
    @foreach ($projetos as $projeto)
        <div class="modal fade" id="modal{{ $projeto->id }}" tabindex="-1" role="dialog" aria-labelledby="modal{{ $projeto->id }}Label" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal{{ $projeto->id }}Label">Excluir Projeto</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Deseja realmente excluir o projeto {{ $projeto->numero_interno }}?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <form action="{{ route('projetos.delete', $projeto->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Excluir</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

</x-app-layout>
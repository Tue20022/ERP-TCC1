<x-app-layout>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-sm-6">
                    <h5 class="card-title">Termos de Encerramento de Obra</h5>
                </div>
                <div class="col-sm-6 d-flex justify-content-end">
                    <a href="{{ route('teo.create') }}" class="btn btn-primary mb-3"><i class="bi bi-plus"></i> Novo TEO</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="col-sm-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th width="5%">ID</th>
                            <th width="10%">Cadastrado Em</th>
                            <th width="15%">Projeto</th>
                            <th width="15%">Responsável</th>
                            <th width="10%">Cliente</th>
                            <th width="10%">Status</th>
                            <th width="20%">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($teos as $teo)
                            <tr>
                                <td>{{ $teo->id }}</td>
                                <td>{{ $teo->created_at->format('d/m/Y') }}</td>
                                <td>{{ $teo->projeto->numero_interno }}</td>
                                <td>{{ $teo->responsavel->login }}</td>
                                <td>{{ $teo->nome_cliente }}</td>
                                <td>{{ $teo->status }}</td>
                                <td>
                                    <a href="{{ route('teo.edit', $teo->id) }}" class="btn btn-warning"><i class="bi bi-pencil"></i> Editar</a>
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal{{ $teo->id }}">
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
    @foreach ($teos as $teo)
        <div class="modal fade text-left" id="modal{{ $teo->id }}" tabindex="-1" role="dialog" aria-labelledby="modal{{ $teo->id }}Label" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal{{ $teo->id }}Label">Excluir TEO</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Tem certeza que deseja excluir o TEO: <strong>{{ $teo->id }}</strong>? Esta ação não poderá ser desfeita.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <form action="{{ route('teo.delete', $teo->id) }}" method="POST">
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
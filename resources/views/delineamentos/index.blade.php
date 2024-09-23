<x-app-layout>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <h5 class="card-title">Delineamentos</h5>
                </div>
                <div class="col-md-6 d-flex justify-content-end">
                    <a href="{{ route('delineamentos.create') }}" class="btn btn-primary"> + Novo Delineamento</a>
                </div>
            </div>

        </div>
        <div class="card-body">
            <div class="col-md-12">
                <div class="col-md-12">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Projeto</th>
                                <th>Número</th>
                                <th>Tipo</th>
                                <th>Status</th>
                                <th>Disciplina</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($delineamentos as $delineamento)
                                <tr>
                                    <td>{{ $delineamento->id }}</td>
                                    <td>{{ $delineamento->projeto->numero_interno }}</td>
                                    <td>{{ $delineamento->num_del }}</td>
                                    <td>{{ $delineamento->tipo }}</td>
                                    <td>{{ $delineamento->status }}</td>
                                    <td>{{ $delineamento->disciplina->name }}</td>
                                    <td>
                                        <a href="{{ route('delineamentos.edit', $delineamento->id) }}"
                                            class="btn btn-warning">Editar</a>
                                        <button type="button" class="btn btn-danger" data-toggle="modal"
                                            data-target="#modalDelete{{ $delineamento->id }}">
                                            Excluir </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de deletar-->
    @foreach ($delineamentos as $delineamento)
        <div class="modal fade" id="modalDelete{{ $delineamento->id }}" tabindex="-1" role="dialog"
            aria-labelledby="modalDelete{{ $delineamento->id }}Label" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalDelete{{ $delineamento->id }}Label">Excluir Delineamento</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-left">
                        <p>Tem certeza que deseja excluir o delineamento <strong>{{ $delineamento->num_del }}</strong>?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <form action="{{ route('delineamentos.delete', $delineamento->id) }}" method="POST">
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
<x-app-layout>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <h5>Detalhamentos</h5>
                </div>
                <div class="col-md-6 d-flex justify-content-end">
                    <a href="{{ route('detalhamentos.create') }}" class="btn btn-primary mb-3"> + Novo Detalhamento</a>
                </div>
            </div>
           
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Número</th>
                        <th>Projeto</th>
                        <th>Responsavel</th>
                        <th>Aprovador</th>
                        <th>Peso</th>
                        <th>Área</th>
                        <th>Status</th>
                        <th>Opções</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($detalhamentos as $detalhamento)
                        <tr>
                            <td>{{ $detalhamento->id }}</td>
                            <td>{{ $detalhamento->num_det }}</td>
                            <td>{{ $detalhamento->projeto->numero_interno }}</td>
                            <td>{{ $detalhamento->responsavel->login }}</td>
                            <td>{{ $detalhamento->aprovador->login }}</td>
                            <td>{{ $detalhamento->peso }}</td>
                            <td>{{ $detalhamento->area }}</td>
                            <td>{{ $detalhamento->status }}</td>
                            <td>
                                <a href="{{ route('detalhamentos.edit', $detalhamento->id) }}"
                                    class="btn btn-warning bi bi-pencil"> Editar</a>
                                <button type="button" class="btn btn-danger bi bi-trash" data-toggle="modal"
                                    data-target="#modalDelete{{ $detalhamento->id }}">
                                    Excluir </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal de Delete -->
    @foreach($detalhamentos as $detalhamento)
        <div class="modal fade" id="modalDelete{{ $detalhamento->id }}" tabindex="-1" role="dialog"
            aria-labelledby="modalDelete{{ $detalhamento->id }}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalDelete{{ $detalhamento->id }}">Excluir Detalhamento</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Tem certeza que deseja excluir o detalhamento <strong> {{ $detalhamento->num_det }}</strong>?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <form action="{{ route('detalhamentos.delete', $detalhamento->id) }}" method="post">
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
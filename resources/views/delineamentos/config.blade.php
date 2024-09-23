<x-app-layout>
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Configurações do Delineamento</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <!-- Adição de Disciplina -->
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title text-center">Adicionar Disciplina</h5>
                        </div>
                        <div class="card-body">
                            <div class="col-sm-12">
                                <form action="{{ route('disciplina.store') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <label for="nome" class="form-label">Nome</label>
                                            <input type="text" class="form-control" id="nome" name="nome" required
                                                placeholder="Digite o nome da disciplina">
                                        </div>
                                        <div class="col-sm-4 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary mt-4 mb-4">Adicionar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">Nome</th>
                                                <th scope="col">Ativo</th>
                                                <th scope="col">Ações</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($disciplinas as $disciplina)
                                                <tr>
                                                    <td>{{ $disciplina->name }}</td>
                                                    <td>
                                                        @if ($disciplina->ativo)
                                                            <span class="badge bg-success text-white">Ativo</span>
                                                        @else
                                                            <span class="badge bg-danger text-white">Inativo</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-warning btn-sm mr-1"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#modalEditarDisciplina{{ $disciplina->id }}">
                                                            <i class="bi bi-pencil"></i> Editar
                                                        </button>
                                                        <button type="button" class="btn btn-danger btn-sm mr-1"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#modalExcluirDisciplina{{ $disciplina->id }}">
                                                            <i class="bi bi-trash"></i> Excluir
                                                        </button>
                                                        @if ($disciplina->ativo)
                                                            <button type="button" class="btn btn-secondary btn-sm"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#modalDesativarDisciplina{{ $disciplina->id }}">
                                                                <i class="bi bi-x-circle"></i> Desativar
                                                            </button>
                                                        @else
                                                            <button type="button" class="btn btn-success btn-sm"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#modalAtivarDisciplina{{ $disciplina->id }}">
                                                                <i class="bi bi-check-circle"></i> Ativar
                                                            </button>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal de Editar Disciplina -->
    @foreach ($disciplinas as $disciplina)
        <div class="modal fade" id="modalEditarDisciplina{{ $disciplina->id }}" tabindex="-1"
            aria-labelledby="modalEditarDisciplina{{ $disciplina->id }}Label" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalEditarDisciplina{{ $disciplina->id }}Label">Editar Disciplina</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('disciplina.update', $disciplina->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="col-sm-12">
                                <label for="nome" class="form-label">Nome</label>
                                <input type="text" class="form-control" id="nome" name="nome" required
                                    value="{{ $disciplina->name }}">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

    <!-- Modal de Excluir Disciplina -->
    @foreach ($disciplinas as $disciplina)
        <div class="modal fade" id="modalExcluirDisciplina{{ $disciplina->id }}" tabindex="-1"
            aria-labelledby="modalExcluirDisciplina{{ $disciplina->id }}Label" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalExcluirDisciplina{{ $disciplina->id }}Label">Excluir Disciplina
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('disciplina.delete', $disciplina->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="modal-body">
                            <p>Tem certeza que deseja excluir a disciplina <strong>{{ $disciplina->nome }}</strong>?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-danger">Excluir</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

    <!-- Modal de Desativar Disciplina -->
    @foreach ($disciplinas as $disciplina)
        <div class="modal fade" id="modalDesativarDisciplina{{ $disciplina->id }}" tabindex="-1"
            aria-labelledby="modalDesativarDisciplina{{ $disciplina->id }}Label" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalDesativarDisciplina{{ $disciplina->id }}Label">Desativar Disciplina
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('disciplina.disable', $disciplina->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-body text-center">
                            <p>Tem certeza que deseja desativar a disciplina <strong>{{ $disciplina->nome }}</strong>?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-danger">Desativar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

    <!-- Modal de Ativar Disciplina -->
    @foreach ($disciplinas as $disciplina)
        <div class="modal fade" id="modalAtivarDisciplina{{ $disciplina->id }}" tabindex="-1"
            aria-labelledby="modalAtivarDisciplina{{ $disciplina->id }}Label" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalAtivarDisciplina{{ $disciplina->id }}Label">Ativar Disciplina
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('disciplina.enable', $disciplina->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-body text-center">
                            <p>Tem certeza que deseja ativar a disciplina <strong>{{ $disciplina->nome }}</strong>?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-success">Ativar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

</x-app-layout>
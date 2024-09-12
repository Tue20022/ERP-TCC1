<x-app-layout>
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Configurações do Projeto</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <!-- Adição de status -->
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Status</h5>
                        </div>
                        <div class="card-body">
                            <div class="col-sm-12">
                                <form action="{{ route('config.status') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <label for="nome_status">Nome</label>
                                            <input type="text" class="form-control" name="nome_status" id="nome_status"
                                                required>
                                        </div>
                                        <div class="col-sm-4 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary mt-4">Adicionar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 mt-3">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th width="40%">Nome</th>
                                                <th width="20%">Ativo</th>
                                                <th width="40%">Ações</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($status as $s)
                                                <tr>
                                                    <td>{{ $s->name }}</td>
                                                    <td>
                                                        @if ($s->ativo) <!-- Verificação explícita para o valor 1 -->
                                                            <span class="badge bg-success text-white">Ativo</span>
                                                        @else
                                                            <span class="badge bg-danger text-white">Inativo</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <!-- botao de edit-->
                                                        <button type="button" class="btn btn-warning btn-sm mr-1"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#modalEditarStatus{{ $s->id }}">
                                                            <i class="bi bi-pencil"></i> Editar

                                                            <!-- botao de delete-->
                                                        <button type="button" class="btn btn-danger btn-sm mr-1"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#modalExcluirStatus{{ $s->id }}">
                                                            <i class="bi bi-trash"></i> Excluir

                                                        @if ($s->ativo)
                                                            <button type="button" class="btn btn-secondary btn-sm"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#modalDesativarStatus{{ $s->id }}">
                                                                <i class="bi bi-x-circle"></i> Desativar
                                                            </button>
                                                        @else
                                                        <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal"
                                                            data-bs-target="#modalAtivarStatus{{ $s->id }}">
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
                <!-- Adição de tipo -->
                <div class="col-sm-6">
                    <!-- Adição de tipo -->
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Tipo</h5>
                        </div>
                        <div class="card-body">
                            <div class="col-sm-12">
                                <form action="{{ route('config.tipo') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <label for="nome_tipo">Nome</label>
                                            <input type="text" class="form-control" name="nome_tipo" id="nome_tipo"
                                                required>
                                        </div>
                                        <div class="col-sm-4 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary mt-4">Adicionar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 mt-3">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th with="40%">Nome</th>
                                                <th width="20%">Ativo</th>
                                                <th width="40%">Ações</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($tipo as $t)
                                                <tr>
                                                    <td>{{ $t->name }}</td>
                                                    <td>
                                                        @if ($t->ativo)
                                                            <span class="badge bg-success text-white">Ativo</span>
                                                        @else
                                                            <span class="badge bg-danger text-white">Inativo</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-warning btn-sm mr-1"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#modalEditar{{ $t->id }}">
                                                            <i class="bi bi-pencil"></i> Editar
                                                        </button>
                                                        <button type="button" class="btn btn-danger btn-sm mr-1"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#modalExcluir{{ $t->id }}">
                                                            <i class="bi bi-trash"></i> Excluir
                                                        </button>
                                                        @if ($t->ativo)
                                                            <button type="button" class="btn btn-secondary btn-sm"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#modalDesativar{{ $t->id }}">
                                                                <i class="bi bi-x-circle"></i> Desativar
                                                            </button>
                                                        @else
                                                            <button type="button" class="btn btn-success btn-sm"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#modalAtivar{{ $t->id }}">
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

     <!-- Modal de Editar Status -->
     @foreach ($status as $s)
        <div class="modal fade text-start" id="modalEditarStatus{{ $s->id }}" tabindex="-1"
            aria-labelledby="modalEditarStatus{{ $s->id }}Label" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-warning text-white">
                        <h5 class="modal-title" id="modalEditarStatus{{ $s->id }}Label">Editar Status</h5>
                        <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('config.editStatus', ['id' => $s->id]) }}" method="post">
                            @csrf
                            @method('put')
                            <div class="mb-3">
                                <label for="name" class="form-label">Nome</label>
                                <input type="text" class="form-control" id="nome_status" name="nome_status" value="{{ $s->name }}">
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="ativo" name="ativo"
                                    {{ $s->ativo ? 'checked' : '' }}>
                                <label class="form-check label" for="ativo">Ativo</label>
                            </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-warning">Editar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <!-- Modal de Excluir Status-->
    @foreach ($status as $s)
        <div class="modal fade text-start" id="modalExcluirStatus{{ $s->id }}" tabindex="-1"
            aria-labelledby="modalExcluirStatus{{ $s->id }}Label" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-danger text-white">
                        <h5 class="modal-title" id="modalExcluirStatus{{ $s->id }}Label">Excluir Status</h5>
                        <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Tem certeza que deseja excluir o status {{ $s->name }}?</p>
                    </div>
                    <div class="modal-footer">
                        <form action="{{ route('config.deleteStatus', ['id' => $s->id]) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-danger">Excluir</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <!-- Modal de Desativar Status -->
    @foreach ($status as $s)
        <div class="modal fade text-start" id="modalDesativarStatus{{ $s->id }}" tabindex="-1"
            aria-labelledby="modalDesativarStatus{{ $s->id }}Label" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-danger text-white">
                        <h5 class="modal-title" id="modalDesativarStatus{{ $s->id }}Label">Desativar Status</h5>
                        <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Tem certeza que deseja desativar o status {{ $s->name }}?</p>
                    </div>
                    <div class="modal-footer">
                        <form action="{{ route('config.disableStatus', ['id' => $s->id]) }}" method="post">
                            @csrf
                            @method('put')
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-danger">Desativar</button>
                        </form>
                    </div>
                </div>
            </div> 
        </div>
    @endforeach

    <!-- Modal de Ativar Status -->
    @foreach ($status as $s)
        <div class="modal fade text-start" id="modalAtivarStatus{{ $s->id }}" tabindex="-1"
            aria-labelledby="modalAtivarStatus{{ $s->id }}Label" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-success text-white">
                        <h5 class="modal-title" id="modalAtivarStatus{{ $s->id }}Label">Ativar Status</h5>
                        <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Tem certeza que deseja ativar o status {{ $s->name }}?</p>
                    </div>
                    <div class="modal-footer">
                        <form action="{{ route('config.enableStatus', ['id' => $s->id]) }}" method="post">
                            @csrf
                            @method('put')
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-success">Ativar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <script>
        var myModal = document.getElementById('myModal')
        var myInput = document.getElementById('myInput')

        myModal.addEventListener('shown.bs.modal', function() {
            myInput.focus()
        })
    </script>

</x-app-layout>
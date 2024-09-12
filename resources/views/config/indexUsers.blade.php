<x-app-layout>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <!-- Coluna para o título -->
                <div class="col-md-10 d-flex justify-content-center">
                    <h3 class="card-title">Listagem de Usuários</h3>
                </div>

                <!-- Coluna para o botão, alinhado à direita -->
                <div class="col-sm-2 d-flex justify-content-end">
                    <a href="{{ route('config.createUser') }}" class="btn btn-primary"><i class="bi bi-plus"></i>
                        Novo</a>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="row d-flex justify-content-center">
                <div class="col-md-12">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th style="width: 30%;">Nome</th> <!-- Define 30% da largura -->
                                <th style="width: 30%;">Login</th>
                                <th style="width: 20%;">Ativo</th>
                                <th style="width: 20%;" class="text-end">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->login }}</td>
                                    <td>
                                        @if ($user->ativo)
                                            <span class="badge bg-success text-white">Ativo</span>
                                        @else
                                            <span class="badge bg-danger text-white">Inativo</span>
                                        @endif
                                    <td>
                                        <!-- botao de edit-->
                                        <a href="{{ route('config.editUser', ['id' => $user->id]) }}"
                                            class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i> Editar</a>

                                        <!-- botao de delete-->
                                        <button type="button" class="btn btn-danger btn-sm mr-1" data-bs-toggle="modal"
                                            data-bs-target="#modalExcluir{{ $user->id }}">
                                            <i class="bi bi-trash"></i> Excluir

                                        <!-- botao de desativar/ativar-->
                                        @if ($user->ativo)
                                            <button type="button" class="btn btn-secondary btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#modalDesativar{{ $user->id }}">
                                                <i class="bi bi-x-circle"></i> Desativar
                                            </button>
                                        @else
                                            <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#modalAtivar{{ $user->id }}">
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

    <!-- Modal de desativar -->
    @foreach ($users as $user)
        <div class="modal fade text-start" id="modalDesativar{{ $user->id }}" tabindex="-1"
            aria-labelledby="modalDesativar{{ $user->id }}Label" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-danger text-white">
                        <h5 class="modal-title" id="modalDesativar{{ $user->id }}Label">Desativar Usuário</h5>
                        <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Tem certeza que deseja desativar o usuário <strong>{{ $user->name }}</strong>?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <form action="{{ route('config.disableUser', ['id' => $user->id]) }}" method="post">
                            @csrf
                            @method('put')
                            <button type="submit" class="btn btn-danger">Desativar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <!-- Modal de ativar -->
    @foreach ($users as $user)
        <div class="modal fade text-start" id="modalAtivar{{ $user->id }}" tabindex="-1"
            aria-labelledby="modalAtivar{{ $user->id }}Label" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-success text-white">
                        <h5 class="modal-title" id="modalAtivar{{ $user->id }}Label">Ativar Usuário</h5>
                        <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Tem certeza que deseja ativar o usuário <strong>{{ $user->name }}</strong>?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <form action="{{ route('config.enableUser', ['id' => $user->id]) }}" method="post">
                            @csrf
                            @method('put')
                            <button type="submit" class="btn btn-success">Ativar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <!-- Modal de excluir -->
    @foreach ($users as $user)
        <div class="modal fade text-start" id="modalExcluir{{ $user->id }}" tabindex="-1"
            aria-labelledby="modalExcluir{{ $user->id }}Label" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-danger text-white">
                        <h5 class="modal-title" id="modalExcluir{{ $user->id }}Label">Excluir Usuário</h5>
                        <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Tem certeza que deseja excluir o usuário <strong>{{ $user->name }}</strong>?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <form action="{{ route('config.deleteUser', ['id' => $user->id]) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">Excluir</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

</x-app-layout>
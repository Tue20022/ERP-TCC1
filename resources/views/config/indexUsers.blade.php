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
                    <a href="{{ route('config.newUser') }}" class="btn btn-primary"><i class="bi bi-plus"></i> Novo</a>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="row d-flex justify-content-center">
                <div class="col-md-12">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Login</th>
                                <th>Ativo</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->login }}</td>
                                    <td>
                                        @if ($user->active)
                                            <span class="badge bg-success text-white">Ativo</span>
                                        @else
                                            <span class="badge bg-danger text-white">Inativo</span>
                                        @endif
                                    <td>
                                        <!-- botao de edit-->
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
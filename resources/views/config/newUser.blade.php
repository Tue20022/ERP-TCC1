<x-app-layout>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <!-- Coluna para o título -->
                <div class="col-md-10 d-flex justify-content-center">
                    <h3 class="card-title">Cadastro de Usuário</h3>
                </div>

                <!-- Coluna para o botão, alinhado à direita -->
                <div class="col-md-2 d-flex justify-content-end">
                    <a href="{{ route('config.indexUsers') }}" class="btn btn-primary"><i class="bi bi-arrow-left"></i>
                        Voltar</a>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="row d-flex justify-content-center">
                <div class="col-md-6">
                    <form action="{{ route('config.storeUser') }}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="name">Nome</label>
                            <input type="text" name="name" id="name" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="login">Login</label>
                            <input type="text" name="login" id="login" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="password">Senha</label>
                            <input type="password" name="password" id="password" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="password_confirmation">Confirmação de Senha</label>
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary">Cadastrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>
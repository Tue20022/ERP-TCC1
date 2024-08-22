<x-app-layout>
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Configurações do Projeto</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <!-- Adição de status -->
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
                                            <input type="text" class="form-control" name="nome_status" id="nome_status" required>
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
                                                <th>Nome</th>
                                                <th>Ativo</th>
                                                <th>Ações</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

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
                                            <input type="text" class="form-control" name="nome_tipo" id="nome_tipo" required>
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
                                                <th>Nome</th>
                                                <th>Ativo</th>
                                                <th>Ações</th>
                                            </tr>
                                        </thead>
                                        <tbody>
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
</x-app-layout>
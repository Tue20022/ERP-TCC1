<x-app-layout>
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Novo Projeto</h5>
        </div>
        <div class="card-body">
            <div class="col-md-12">
                <form action="{{ route('projetos.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-sm-1">
                            <label for="id" class="form-label">ID</label>
                            <input type="text" class="form-control" id="id" name="id" disabled value="N/A">
                        </div>

                        <div class="col-sm-2">
                            <label for="cadastrado_em" class="form-label">Cadastrado Em</label>
                            <input type="date" class="form-control" id="cadastrado_em" name="cadastrado_em" disabled
                                value="{{ date('Y-m-d') }}">
                        </div>

                        <div class="col-sm-3 mb-3">
                            <label for="responsavel" class="form-label">Responsável*</label>
                            <select class="form-control" id="responsavel" name="responsavel" required>
                                <option value="" disabled selected>Selecione um responsável</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->login }}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="col-sm-3">
                            <label for="nome" class="form-label">Número Interno*</label>
                            <div class="input-group">
                                <span class="input-group-text">PJ-</span>
                                <input type="text" class="form-control" id="numero_interno" name="numero_interno"
                                    required placeholder="Digite o número">
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <label for="nome" class="form-label">Número Externo</label>
                            <input type="text" class="form-control" id="numero_externo" name="numero_externo">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-3">
                            <label for="tipo" class="form-label">Tipo*</label>
                            <select class="form-control" id="tipo" name="tipo" required>
                                <option value="" disabled selected>Selecione um tipo</option>
                                @foreach ($tipo as $t)
                                    <option value="{{ $t->id }}">{{ $t->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-sm-3">
                            <label for="status" class="form-label">Status*</label>
                            <select class="form-control" id="status" name="status" required>
                                <option value="Em Planejamento" selected >Em Planejamento</option>
                                <option value="Em Delineamento">Em Delineamento</option>
                                <option value="Em Detalhamento">Em Detalhamento</option>
                                <option value="Em Lista de Materiais">Em Lista de Materiais</option>
                                <option value="Em Transferência de Materiais">Em Transferência de Materiais</option>
                                <option value="Em Requisição de Compras">Em Requisição de Compras</option>
                                <option value="Em Recebimento de Materiais">Em Recebimento de Materiais</option>
                                <option value="Em Inspeção de Recebimento">Em Inspeção de Recebimento</option>
                                <option value="Em Reserva de Materiais">Em Reserva de Materiais</option>
                                <option value="Em Fabricação">Em Fabricação</option>
                                <option value="Concluído">Concluído</option>
                                <option value="Cancelado">Cancelado</option>
                            </select>
                        </div>

                        <div class="col-sm-3">
                            <label for="prioridade" class="form-label">Prioridade*</label>
                            <select class="form-control" id="prioridade" name="prioridade" required>
                                <option value="Baixa">Baixa</option>
                                <option value="Média">Média</option>
                                <option value="Alta">Alta</option>
                            </select>
                        </div>

                        <div class="col-sm-3">
                            <label for="cliente" class="form-label">Cliente</label>
                            <select class="form-control" id="cliente" name="cliente">
                                <option value="" disabled selected>Selecione um cliente</option>
                                @foreach ($cliente as $c)
                                    <option value="{{ $c->id }}">{{ $c->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-sm-12">
                            <label for="descricao" class="form-label">Descrição</label>
                            <textarea class="form-control" id="descricao" name="descricao" rows="3"></textarea>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-sm-12 d-flex justify-content-end">
                            <a href="{{ route('projetos.index') }}" class="btn btn-danger mr-1">Cancelar</a>
                            <button type="submit" class="btn btn-primary">Cadastrar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
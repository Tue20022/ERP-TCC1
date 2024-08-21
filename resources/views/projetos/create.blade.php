<x-app-layout>
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Preencha os campos abaixo para cadastrar um novo projeto</h5>
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
                                    <option value="1">João Silva</option>
                                    <option value="2">Maria Oliveira</option>
                                    <option value="3">Carlos Sousa</option>
                                    <option value="4">Matheus Nunes</option>
                                </select>
                        </div>


                        <div class="col-sm-3">
                            <label for="nome" class="form-label">Número Interno*</label>
                            <div class="input-group">
                                <span class="input-group-text">PJ-</span>
                                <input type="text" class="form-control" id="numero_interno" name="numero_interno" required
                                    placeholder="Digite o número">
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
                                <option value="1">Detalhado</option>
                                <option value="2">Simplificado</option>
                            </select>
                        </div>

                        <div class="col-sm-3">
                            <label for="status" class="form-label">Status*</label>
                            <select class="form-control" id="status" name="status" required>
                                <option value="1">Não iniciado</option>
                                <option value="2">Em Andamento</option>
                                <option value="3">Paralisada</option>
                                <option value="4">Concluída</option>
                                <option value="5">Cancelada</option>
                            </select>
                        </div>

                        <div class="col-sm-3">
                            <label for="prioridade" class="form-label">Prioridade*</label>
                            <select class="form-control" id="prioridade" name="prioridade" required>
                                <option value="1">Baixa</option>
                                <option value="2">Média</option>
                                <option value="3">Alta</option>
                            </select>
                        </div>

                        <div class="col-sm-3">
                            <label for="cliente" class="form-label">Cliente</label>
                            <select class="form-control" id="cliente" name="cliente">
                                <option value=""></option>
                                <option value="1">Empresa A</option>
                                <option value="2">Empresa B</option>
                                <option value="3">Empresa C</option>
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
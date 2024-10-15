<x-app-layout>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-sm-6">
                    <h5>Editar Projeto</h5>
                </div>
                <div class="col-sm-6">
                    <a href="{{ route('projetos.index') }}" class="btn btn-primary float-right"><i
                            class="bi bi-arrow-left"></i> Voltar</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('projetos.update', $projeto->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-sm-1">
                        <label for="id">ID</label>
                        <input type="text" class="form-control" id="id" name="id" disabled value="{{ $projeto->id }}">
                    </div>
                    <div class="col-sm-2">
                        <label for="cadastrado_em">Cadastrado Em</label>
                        <input type="date" class="form-control" id="cadastrado_em" name="cadastrado_em" disabled
                            value="{{ $projeto->created_at->format('Y-m-d') }}">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <label for="responsavel">Responsável*</label>
                        <select class="form-control" id="responsavel" name="responsavel" required>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}" {{ $projeto->responsavel == $user->id ? 'selected' : '' }}>
                                    {{ $user->login }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <label for="nome">Número Interno*</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="numero_interno" name="numero_interno" required
                                value="{{ $projeto->numero_interno }}">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <label for="nome">Número Externo</label>
                        <input type="text" class="form-control" id="numero_externo" name="numero_externo"
                            value="{{ $projeto->numero_externo }}">
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-3 mb-3">
                        <label for="tipo">Tipo*</label>
                        <select class="form-control" id="tipo" name="tipo" required>
                            @foreach ($tipo as $t)
                                <option value="{{ $t->id }}" {{ $projeto->tipo == $t->id ? 'selected' : '' }}>
                                    {{ $t->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <label for="status">Status*</label>
                        <select class="form-control" id="status" name="status" required>
                                <option value="Em Planejamento" {{$projeto->status == "Em Planejamento" ? 'selected' : ''}}>Em Planejamento</option>
                                <option value="Em Delineamento" {{$projeto->status == "Em Delineamento" ? 'selected' : ''}}>Em Delineamento</option>
                                <option value="Em Detalhamento" {{$projeto->status == "Em Detalhamento" ? 'selected' : ''}}>Em Detalhamento</option>
                                <option value="Em Lista de Materiais" {{$projeto->status == "Em Lista de Materiais" ? 'selected' : ''}}>Em Lista de Materiais</option>
                                <option value="Em Transferência de Materiais" {{$projeto->status == "Em Transferência de Materiais" ? 'selected' : ''}}>Em Transferência de Materiais</option>
                                <option value="Em Requisição de Compras" {{$projeto->status == "Em Requisição de Compras" ? 'selected' : ''}}>Em Requisição de Compras</option>
                                <option value="Em Recebimento de Materiais" {{$projeto->status == "Em Recebimento de Materiais" ? 'selected' : ''}}>Em Recebimento de Materiais</option>
                                <option value="Em Inspeção de Recebimento" {{$projeto->status == "Em Inspeção de Recebimento" ? 'selected' : ''}}>Em Inspeção de Recebimento</option>
                                <option value="Em Reserva de Materiais" {{$projeto->status == "Em Reserva de Materiais" ? 'selected' : ''}}>Em Reserva de Materiais</option>
                                <option value="Em Fabricação" {{$projeto->status == "Em Fabricação" ? 'selected' : ''}}>Em Fabricação</option>
                                <option value="Concluído" {{$projeto->status == "Concluído" ? 'selected' : ''}}>Concluído</option>
                                <option value="Cancelado" {{$projeto->status == "Cancelado" ? 'selected' : ''}}>Cancelado</option>
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <label for="prioridade" class="form-label">Prioridade*</label>
                        <select class="form-control" id="prioridade" name="prioridade" required>
                            <option value="Baixa" {{$projeto->prioridade == "Baixa" ? 'selected' : ''}}>Baixa</option>
                            <option value="Média" {{$projeto->prioridade == "Média" ? 'selected' : ''}}>Média</option>
                            <option value="Alta" {{$projeto->prioridade == "Alta" ? 'selected' : ''}}>Alta</option>
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <label for="cliente" class="form-label">Cliente</label>
                        <select class="form-control" id="cliente" name="cliente">
                            <option value="" disabled selected>Selecione um cliente</option>
                            @foreach ($cliente as $c)
                                <option value="{{ $c->id }}" {{ $projeto->cliente == $c->id ? 'selected' : '' }}>
                                    {{ $c->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 mb-3">
                        <label for="descricao">Descrição</label>
                        <textarea class="form-control" id="descricao" name="descricao"
                            rows="3">{{ $projeto->descricao }}</textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 mb-3">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Datas de Acompanhamento de Planejamento</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3 mb-3">
                                        <label for="inicio_prev_plan">Inicio de Prev. de Plan.</label>
                                        <input type="date" class="form-control" id="inicio_prev_plan" name="inicio_prev_plan"
                                            value="{{ $projeto->inicio_prev_plan }}">
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="fim_prev_plan">Fim de Prev. de Plan.</label>
                                        <input type="date" class="form-control" id="fim_prev_plan" name="fim_prev_plan"
                                            value="{{ $projeto->fim_prev_plan }}">
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="inicio_real_plan">Inicio de Real. de Plan.</label>
                                        <input type="date" class="form-control" id="inicio_real_plan" name="inicio_real_plan"
                                            value="{{ $projeto->inicio_real_plan }}">
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="fim_real_plan">Fim de Real. de Plan.</label>
                                        <input type="date" class="form-control" id="fim_real_plan" name="fim_real_plan"
                                            value="{{ $projeto->fim_real_plan }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label for="status_plan" class="form-label">Status de Plan.</label>
                                        <select class="form-control" id="status_plan" name="status_plan">
                                            <option></option>
                                            @foreach ($statusPlan as $s)
                                                <option value="{{ $s->id }}"
                                                    {{ $projeto->status_plan == $s->id ? 'selected' : '' }}>
                                                    {{ $s->nome }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Datas de Acompanhamento de Execução</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3 mb-3">
                                        <label for="inicio_prev_exec">Inicio de Prev. de Exec.</label>
                                        <input type="date" class="form-control" id="inicio_prev_exec" name="inicio_prev_exec"
                                            value="{{ $projeto->inicio_prev_exec }}">
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="fim_prev_exec">Fim de Prev. de Exec.</label>
                                        <input type="date" class="form-control" id="fim_prev_exec" name="fim_prev_exec"
                                            value="{{ $projeto->fim_prev_exec }}">
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="inicio_real_exec">Inicio de Real. de Exec.</label>
                                        <input type="date" class="form-control" id="inicio_real_exec" name="inicio_real_exec"
                                            value="{{ $projeto->inicio_real_exec }}">
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="fim_real_exec">Fim de Real. de Exec.</label>
                                        <input type="date" class="form-control" id="fim_real_exec" name="fim_real_exec"
                                            value="{{ $projeto->fim_real_exec }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label for="status_exec" class="form-label">Status de Exec.</label>
                                        <select class="form-control" id="status_exec" name="status_exec">
                                            <option></option>
                                            @foreach ($statusExec as $s)
                                                <option value="{{ $s->id }}"
                                                    {{ $projeto->status_exec == $s->id ? 'selected' : '' }}>
                                                    {{ $s->nome }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 d-flex justify-content-end mt-3">
                        <a href="{{ route('projetos.index') }}" class="btn btn-danger">Cancelar</a>
                        <button type="submit" class="btn btn-primary ml-2">Salvar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
<x-app-layout>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-sm-6">
                    <h2>Editar Projeto</h2>
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
                            @foreach ($status as $s)
                                <option value="{{ $s->id }}" {{ $projeto->status == $s->id ? 'selected' : '' }}>
                                    {{ $s->name }}
                                </option>
                            @endforeach
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
                    <div class="col-sm-12">
                        <label for="descricao">Descrição</label>
                        <textarea class="form-control" id="descricao" name="descricao"
                            rows="3">{{ $projeto->descricao }}</textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 d-flex justify-content-end mt-3">
                        <a href="{{ route('projetos.index') }}" class="btn btn-danger">Cancelar</a>
                        <button type="submit" class="btn btn-primary ml-2">Salvar</button>
                    </div>
            </form>
        </div>
    </div>
</x-app-layout>
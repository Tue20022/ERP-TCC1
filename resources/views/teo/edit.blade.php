<x-app-layout>
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">Editar Termo de Encerramento de Obra</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('teo.update', $teo->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-sm-1">
                        <label for="id">ID</label>
                        <input type="text" name="id" id="id" class="form-control" value="{{$teo->id}}" disabled>
                    </div>
                    <div class="col-sm-2">
                        <label for="cadastrado_em">Cadastrado Em</label>
                        <input type="date" name="cadastrado_em" id="cadastrado_em" class="form-control"
                            value="{{$teo->created_at->format('Y-m-d')}}" disabled>
                    </div>
                    <div class="col-sm-3">
                        <label for="cadastrado_por">Cadastrado Por</label>
                        <input type="text" name="cadastrado_por" id="cadastrado_por" class="form-control"
                            value="{{ $teo->responsavel->login }}" disabled>
                    </div>
                    <div class="col-sm-3">
                        <label for="projeto">Projeto</label>
                        <select name="projeto" id="projeto" class="form-control">
                            <option value="" disabled selected>Selecione um projeto</option>
                            @foreach ($projetos as $projeto)
                                <option value="{{ $projeto->id }}" {{ $projeto->id == $teo->projeto_id ? 'selected' : '' }} >{{ $projeto->numero_interno }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <label for="status">Status*</label>
                        <select name="status" id="status" class="form-control" required>
                            <option value="" disabled selected>Selecione um status</option>
                            <option value="Concluído" {{ $teo->status == "Concluído" ? 'selected' : ''}} >Concluído</option>
                            <option value="Em Aberto" {{ $teo->status == "Em Aberto" ? 'selected' : ''}} >Em Aberto</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 mt-3">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title text-gray">Dados Contratada</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3 mb-3">
                                        <label for="responsavel">Responsável*</label>
                                        <select name="responsavel" id="responsavel" class="form-control" required>
                                            <option value="" disabled selected>Selecione um responsável</option>
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}" {{$teo->responsavel->id == $user->id ? 'selected' : ''}} >{{ $user->login }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-3 mb-3">
                                        <label for="cpf_responsavel">CPF</label>
                                        <input type="text" name="cpf_responsavel" id="cpf_responsavel"
                                            class="form-control" value="{{$teo->cpf_responsavel}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 mt-3">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title text-2xl text-gray-700">Dados Cliente</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3 mb-3">
                                        <label for="cliente">Cliente*</label>
                                        <input type="text" name="cliente" id="cliente" class="form-control" required disabled value="{{$teo->nome_cliente}}">
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="cpf_cliente">CPF</label>
                                        <input type="text" name="cpf_cliente" id="cpf_cliente" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 mt-3">
                        <label for="observacoes">Observações</label>
                        <textarea name="observacoes" id="observacoes" class="form-control" rows="3">{{$teo->observacoes}}</textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 mt-3 d-flex justify-content-end">
                        <a href="{{ route('teo.index') }}" class="btn btn-danger mr-2">Cancelar</a>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div> 
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
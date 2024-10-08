<x-app-layout>
    <div class="card">
        <div class="card-header">
            <h5>Novo Detalhamento</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('detalhamentos.store') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-1">
                        <label for="id">ID</label>
                        <input type="text" class="form-control" name="id" id="id" value="N/A" disabled>
                    </div>
                    <div class="col-md-2">
                        <label for="cadastrado_em" class="form-label">Cadastrado Em</label>
                        <input type="date" class="form-control" id="cadastrado_em" name="cadastrado_em" disabled
                            value="{{ date('Y-m-d') }}">
                    </div>
                    <div class="col-md-3">
                        <label for="projeto" class="form-label">Projeto*</label>
                        <select class="form-control" id="projeto_id" name="projeto_id" required>
                            <option value="" disabled selected>Selecione um projeto</option>
                            @foreach ($projetos as $projeto)
                                <option value="{{ $projeto->id }}">{{ $projeto->numero_interno }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="numero" class="form-label">Número*</label>
                        <input type="text" class="form-control" id="num_det" name="num_det" required
                            placeholder="Digite o número">
                    </div>
                    <div class="col-md-2">
                        <label for="tag" class="form-label">TAG</label>
                        <input type="text" class="form-control" id="tag" name="tag" placeholder="Digite a TAG">
                    </div>
                    <div class="col-md-2 mb-3">
                        <label for="status" class="form-label">Status*</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="Em andamento" selected>Em andamento</option>
                            <option value="Concluído">Concluído</option>
                            <option value="Cancelado">Cancelado</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <label for="responsavel" class="form-label">Responsavel*</label>
                        <select class="form-control" id="responsavel_id" name="responsavel_id" required>
                            <option value="" disabled selected>Selecione um responsável</option>
                            @foreach ($users as $responsavel)
                                <option value="{{ $responsavel->id }}">{{ $responsavel->login }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="aprovador" class="form-label">Aprovador*</label>
                        <select class="form-control" id="aprovador_id" name="aprovador_id" required>
                            <option value="" disabled selected>Selecione um aprovador</option>
                            @foreach ($users as $aprovador)
                                <option value="{{ $aprovador->id }}">{{ $aprovador->login }}</option>
                            @endforeach
                        </select>
                        <script>
                            document.getElementById('responsavel_id').addEventListener('change', function () {
                                var responsavel_id = this.value;
                                var aprovador = document.getElementById('aprovador_id');

                                for (var i = 0; i < aprovador.options.length; i++) {
                                    if (aprovador.options[i].value == responsavel_id) {
                                        aprovador.options[i].disabled = true;
                                    } else {
                                        aprovador.options[i].disabled = false;
                                    }
                                }
                            });	
                        </script>
                    </div>
                    <div class="col-md-2">
                        <label for="peso" class="form-label">Peso<small> kg</small></label>
                        <input type="float" class="form-control" id="peso" name="peso"
                            placeholder="Digite o peso"></input>
                    </div>
                    <div class="col-md-2">
                        <label for="area" class="form-label">Área<small> m²</small></label>
                        <input type="float" class="form-control" id="area" name="area"
                            placeholder="Digite a área"></input>
                    </div>
                    <div class="col-md-2 mb-3">
                        <label for="anexo" class="form-label">Anexo</label>
                        <input type="file" class="form-control" id="anexo" name="anexo"></input>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label for="observacoes" class="form-label">Observações</label>
                        <textarea class="form-control mb-3" id="observacoes" name="observacoes" rows="3"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 d-flex justify-content-end">
                        <a href="{{ route('detalhamentos.index') }}" class="btn btn-danger mr-2 mt-2">Cancelar</a>
                        <button type="submit" class="btn btn-primary mt-2">Salvar</button>
                    </div>
                </div>
                
            </form>
        </div>
    </div>
</x-app-layout>
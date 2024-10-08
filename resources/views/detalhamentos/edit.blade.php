<x-app-layout>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <h5>Editar Detalhamento</h5>
                </div>
                <div class="col-md-6 d-flex justify-content-end">
                    <a href="{{ route('detalhamentos.index') }}" class="btn btn-primary mb-3 bi bi-arrow-left"> Voltar</a>
                </div>
            </div>
           
        </div>
        <div class="card-body">
            <form action="{{ route('detalhamentos.update', $detalhamento->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-1">
                        <label for="id" class="form-label">ID</label>
                        <input id="id" type="text" class="form-control" name="id" value="{{ $detalhamento->id }}" readonly>
                    </div>
                    <div class="col-md-2">
                        <label for="cadastrado_em" class="form-label">Cadastrado Em</label>
                        <input id="cadastrado_em" type="text" class="form-control" name="cadastrado_em" value="{{ $detalhamento->created_at->format('d/m/Y') }}" readonly>
                    </div>
                    <div class="col-md-3">
                        <label for="projeto_id" class="form-label">Projeto*</label>
                        <select id="projeto_id" class="form-control" name="projeto_id" required>
                            <option value="{{ $detalhamento->projeto_id }}" selected>{{ $detalhamento->projeto->numero_interno }}</option>
                            @foreach ($projetos as $projeto)
                               <option value="{{ $projeto->id }}">{{ $projeto->numero_interno }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="num_det" class="form-label">Número*</label>
                        <input id="num_det" type="text" class="form-control" name="num_det" value="{{ $detalhamento->num_det }}">
                    </div>
                    <div class="col-md-2">
                        <label for="tag" class="form-label">TAG</label>
                        <input id="tag" type="text" class="form-control mb-3" name="tag" value="{{ $detalhamento->tag }}">
                    </div>
                    <div class="col-md-2">
                        <label for="status" class="form-label">Status*</label>
                        <select id="status" class="form-control" name="status">
                            <option value="Em andamento" {{ $detalhamento->status == 'Em andamento' ? 'selected' : '' }}>Em
                                andamento</option>
                            <option value="Concluído" {{ $detalhamento->status == 'Concluído' ? 'selected' : '' }}>Concluído
                            </option>
                            <option value="Cancelado" {{ $detalhamento->status == 'Cancelado' ? 'selected' : '' }}>Cancelado
                            </option>
                        </select>
                    </div> 
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <label for="responsavel_id" class="form-label">Responsável*</label>
                        <select id="responsavel_id" class="form-control" name="responsavel_id">
                            @foreach ($users as $responsavel)
                                <option value="{{ $responsavel->id }}" {{ $responsavel->id == $detalhamento->responsavel_id ? 'selected' : '' }}>
                                    {{ $responsavel->login }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="aprovador_id" class="form-label">Aprovador*</label>
                        <select id="aprovador_id" class="form-control" name="aprovador_id">
                            @foreach ($users as $aprovador)
                                <option value="{{ $aprovador->id }}" {{ $aprovador->id == $detalhamento->aprovador_id ? 'selected' : '' }}>
                                    {{ $aprovador->login }}</option>
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
                        <input id="peso" type="text" class="form-control" name="peso" value="{{ $detalhamento->peso }}">
                    </div>
                    <div class="col-md-2">
                        <label for="area" class="form-label">Área<small> m²</small></label>
                        <input id="area" type="text" class="form-control" name="area" value="{{ $detalhamento->area }}">
                    </div>
                    <div class="col-md-2 mb-3">
                        <label for="anexo" class="form-label">Anexo</label>
                        <input id="anexo" type="file" class="form-control" name="anexo">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label for="observacoes" class="form-label">Observações</label>
                        <textarea id="observacoes" class="form-control mb-3" name="observacoes" rows="3">{{ $detalhamento->observacoes }}</textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 d-flex justify-content-end">
                        <a href="{{ route('detalhamentos.index') }}" class="btn btn-danger mr-2 mt-2">Cancelar</a>
                        <button type="submit" class="btn btn-primary mt-2">Salvar</button>
                    </div>
                </div>
</x-app-layout>
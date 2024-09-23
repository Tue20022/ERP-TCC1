<x-app-layout>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <h5 class="card-title">Editar Delineamento</h5>
                </div>
                <div class="col-md-6 d-flex justify-content-end">
                    <a href="{{ route('delineamentos.index') }}" class="btn btn-primary"><i
                    class="bi bi-arrow-left"></i>Voltar</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('delineamentos.update', $delineamento->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-sm-1">
                        <label for="id" class="form-label">ID</label>
                        <input id="id" type="text" class="form-control" name="id" value="{{ $delineamento->id }}"
                            disabled>
                        </input>
                    </div>
                    <div class="col-sm-2">
                        <label for="cadastrado_em" class="form-label text-md-right">Cadastrado Em</label>
                        <input id="cadastrado_em" type="date" class="form-control" name="cadastrado_em"
                            value="{{ $delineamento->created_at->format('Y-m-d') }}" disabled>
                        </input>
                    </div>
                    <div class="col-sm-3">
                        <label for="projeto" class="form-label text-md-right">Projeto*</label>
                        <select id="projeto" class="form-control" name="projeto" required>
                            <option value="{{ $delineamento->projeto->id }}" selected>{{ $delineamento->projeto->numero_interno}}</option>
                            @foreach ($projetos as $projeto)
                                @if ($projeto->id != $delineamento->projeto_id)
                                    <option value="{{ $projeto->id }}">{{ $projeto->numero_interno }}</option>                                
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <label for="num_del" class="form-label">Número*</label>
                        <input id="num_del" type="text" class="form-control" name="num_del" required
                            value="{{ $delineamento->num_del }}">
                        </input>
                    </div>
                    <div class="col-sm-2 mb-3">
                        <label for="tipo_del" class="form-label">Tipo*</label>
                        <select id="tipo_del" class="form-control" name="tipo_del" required>
                            <option value="Onshore" @if ($delineamento->tipo == 'Onshore') selected @endif>Onshore
                            </option>
                            <option value="Offshore" @if ($delineamento->tipo == 'Offshore') selected @endif>Offshore
                            </option>
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <label for="status_del" class="form-label">Status*</label>
                        <select id="status_del" class="form-control" name="status_del" required>
                            <option value="Em andamento" @if ($delineamento->status == 'Em andamento') selected @endif>Em
                                andamento</option>
                            <option value="Concluído" @if ($delineamento->status == 'Concluído') selected @endif>Concluído
                            </option>
                            <option value="Cancelado" @if ($delineamento->status == 'Cancelado') selected @endif>Cancelado
                            </option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2">
                        <label for="disciplina" class="form-label">Disciplina*</label>
                        <select id="disciplina" class="form-control" name="disciplina" required>
                            @foreach ($disciplinas as $disciplina)
                                <option value="{{ $disciplina->id }}" @if ($disciplina->id == $delineamento->disciplina_id)
                                selected @endif>{{ $disciplina->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <label for="delineador" class="form-label">Delineador*</label>
                        <input id="delineador" type="text" class="form-control" name="delineador" required
                            value="{{ $delineamento->delineador->name }}">
                        </input>
                    </div>
                    <div class="col-sm-3">
                        <label for="aprovador" class="form-label">Aprovador*</label>
                        <select class="form-control" id="aprovador" name="aprovador" required>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}" @if ($user->id == $delineamento->aprovador_id) selected
                                @endif>{{ $user->login }}</option>
                            @endforeach
                        </select>
                        <script>
                            document.getElementById('delineador').addEventListener('change', function () {
                                var delineadorId = this.value;
                                var aprovadorSelect = document.getElementById('aprovador');

                                // Habilitar todas as opções primeiro
                                for (var i = 0; i < aprovadorSelect.options.length; i++) {
                                    aprovadorSelect.options[i].disabled = false;
                                }

                                // Desabilitar a opção que foi selecionada em "Delineador"
                                for (var i = 0; i < aprovadorSelect.options.length; i++) {
                                    if (aprovadorSelect.options[i].value == delineadorId) {
                                        aprovadorSelect.options[i].disabled = true;
                                    }
                                }
                            });
                        </script>
                    </div>
                    <div class="col-sm-2 mb-3">
                        <label for="necessidade_em" class="form-label">Necessidade Em*</label>
                        <input id="necessidade_em" type="date" class="form-control" name="necessidade_em" required
                            value="{{ $delineamento->necessidade_em }}">
                        </input>
                    </div>
                    <div class="col-sm-2">
                        <label for="anexo" class="form-label">Anexo</label>
                        <input type="file" class="form-control" id="anexo" name="anexo" value="{{$delineamento->anexo}}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <label for="observacoes" class="form-label">Observações</label>
                        <textarea id="observacoes" class="form-control" name="observacoes"
                            rows="3">{{ $delineamento->observacoes }}</textarea>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-sm-12 d-flex justify-content-end">
                        <button type="button" class="btn btn-danger mr-2" data-toggle="modal"
                            data-target="#modalDelete{{ $delineamento->id }}">Excluir</button>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal de deletar-->
    <div class="modal fade" id="modalDelete{{ $delineamento->id }}" tabindex="-1" role="dialog"
        aria-labelledby="modalDelete{{ $delineamento->id }}Label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalDelete{{ $delineamento->id }}Label">Excluir Delineamento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Tem certeza que deseja excluir o Delineamento <strong>{{ $delineamento->num_del }}</strong>?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <form action="{{ route('delineamentos.delete', $delineamento->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Excluir</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>
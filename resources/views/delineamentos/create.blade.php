<x-app-layout>
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Novo Delineamento</h5>
        </div>
        <div class="card-body">
            <div class="col-md-12">
                <form action="" method="POST">
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
                        <div class="col-sm-3">
                            <label for="projeto" class="form-label">Projeto*</label>
                            <select class="form-control" id="projeto" name="projeto" required>
                                <option value="" disabled selected>Selecione um projeto</option>
                                @foreach ($projetos as $projeto)
                                    <option value="{{ $projeto->id }}">{{ $projeto->numero_interno }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <label for="numero" class="form-label">Número*</label>
                            <input type="text" class="form-control" id="num_del" name="num_del" required
                                placeholder="Digite o número">
                        </div>
                        <div class="col-sm-2 mb-3">
                            <label for="tipo" class="form-label">Tipo*</label>
                            <select class="form-control" id="tipo_del" name="tipo_del" required>
                                <option value="" disabled selected>Sel. tipo</option>
                                <option value="Onshore">Onshore</option>
                                <option value="Offshore">Offshore</option>
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <label for="status" class="form-label">Status*</label>
                            <select class="form-control" id="status_del" name="status_del" required>
                                <option value="Em andamento" selected>Em andamento</option>
                                <option value="Concluído">Concluído</option>
                                <option value="Cancelado">Cancelado</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2">
                            <label for="'disciplina" class="form-label">Disciplina*</label>
                            <select class="form-control" id="disciplina" name="disciplina" required>
                                <option value="" disabled selected>Selecione uma disciplina</option>
                                @foreach ($disciplinas as $disciplina)
                                    <option value="{{ $disciplina->id }}">{{ $disciplina->name }}</option>   
                                @endforeach
                            </select>
                        </div>

                        <div class="col-sm-3">
                            <label for="delineador" class="form-label">Delineador*</label>
                            <select class="form-control" id="delineador" name="delineador" required>
                                <option value="" disabled selected>Selecione um delineador</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->login }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <label for="aprovador" class="form-label">Aprovador*</label>
                            <select class="form-control" id="aprovador" name="aprovador" required>
                                <option value="" disabled selected>Selecione um aprovador</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->login }}</option>
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
                            <input type="date" class="form-control" id="necessidade_em" name="necessidade_em" required>
                        </div>
                        <div class="col-sm-2">
                            <label for="anexo" class="form-label">Anexo</label>
                            <input type="file" class="form-control" id="anexo" name="anexo">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <label for="observacoes" class="form-label">Observações</label>
                            <textarea class="form-control mb-3" id="observacoes" name="observacoes" rows="3"></textarea>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-sm-12 d-flex justify-content-end">
                            <a href="{{ route('delineamentos.index') }}" class="btn btn-danger mr-2 mt-3">Cancelar</a>
                            <button type="submit" class="btn btn-primary mt-3">Cadastrar</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>
<div class="row">
        <div class="col-md-6">
            <div class="form-group mb-3">
                <label for="primeiro_nome">Nome</label>
                <input required type="text" id="primeiro_nome" name="primeiro_nome" class="form-control" value="{{isset($aluno) ?$aluno->primeiro_nome: old('primeiro_nome') }}">
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group mb-3">
                <label for="ultimo_nome">Sobrenome</label>
                <input required type="text" id="ultimo_nome" name="ultimo_nome" class="form-control" value="{{ isset($aluno) ?$aluno->ultimo_nome: old('ultimo_nome') }}">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group mb-3">
                <label for="data_nascimento">Data de Nascimento</label>
                <input required type="date" id="data_nascimento" name="data_nascimento" class="form-control" value="{{ isset($aluno) ?$aluno->data_nascimento: old('data_nascimento') }}">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group mb-3">
                <label for="genero">Gênero</label>

                <select name="genero" class="form-control" id="">
                    <option value="Masculino" @if (isset($aluno) ? $aluno->genero=="Masculino" : old('genero')=="Masculino")
                    selected
                    @endif>Masculino</option>
                    <option value="Feminino" @if (isset($aluno) ? $aluno->genero=="Feminino" : old('genero')=="Feminino")
                    selected
                    @endif>Feminino</option>
                </select>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group mb-3">
                <label for="nacionalidade">Nacionalidade</label>
                <input required type="text" id="nacionalidade" name="nacionalidade" class="form-control" value="{{ isset($aluno) ?$aluno->nacionalidade: old('nacionalidade') }}">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group mb-3">
                <label for="endereco">Endereço</label>
                <input required type="text" id="endereco" name="endereco" class="form-control" value="{{ isset($aluno) ?$aluno->endereco: old('endereco') }}">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group mb-3">
                <label for="numero_telefone">Número de Telefone</label>
                <input required type="number" id="numero_telefone" name="numero_telefone" class="form-control" value="{{ isset($aluno) ?$aluno->numero_telefone: old('numero_telefone') }}" max="999999999" min="911111111">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group mb-3">
                <label for="email">Email</label>
                <input required type="email" id="email" name="email" class="form-control" value="{{ isset($aluno) ?$aluno->email: old('email') }}">
            </div>
        </div>



        <div class="col-md-4">
            <div class="form-group mb-3">
                <label for="deficiencia">Deficiencia</label>
                <select name="deficiencia" class="form-control" id="">
                    <option value="Sim" @if (isset($aluno) ? $aluno->deficiencia=="Sim": old('deficiencia')=="Sim")
                    selected
                    @endif>Sim</option>
                    <option value="Não" @if (isset($aluno) ? $aluno->deficiencia=="Não": old('deficiencia')=="Não")
                    selected
                    @endif>Não</option>
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group mb-3">
                <label for="classe">Classe</label>
                <select name="classe" class="form-control" id="" required>
                    @foreach ($classes as $classe)
                        <option value="{{ $classe->id }}" @if (isset($aluno) ? $aluno->classe==$classe->id : old('classe')==$classe->id)
                        selected
                        @endif>{{ $classe->nome }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group mb-3">
                <label for="nome_responsavel">Nome do Responsável</label>
                <input required type="text" id="nome_responsavel" name="nome_responsavel" class="form-control" value="{{ isset($aluno) ?$aluno->nome_responsavel: old('nome_responsavel') }}">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group mb-3">
                <label for="nome_pai">Nome do Pai</label>
                <input required type="text" id="nome_pai" name="nome_pai" class="form-control" value="{{ isset($aluno) ?$aluno->nome_pai: old('nome_pai') }}">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group mb-3">
                <label for="nome_mae">Nome da Mãe</label>
                <input required type="text" id="nome_mae" name="nome_mae" class="form-control" value="{{ isset($aluno) ?$aluno->nome_mae: old('nome_mae') }}">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group mb-3">
                <label for="contato_responsavel">Contato do Responsável</label>
                <input required type="number" id="contato_responsavel" name="contato_responsavel" class="form-control" value="{{ isset($aluno) ?$aluno->contato_responsavel: old('contato_responsavel') }}" max="999999999" min="911111111">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group mb-3">
                <label for="parentesco_responsavel">Parentesco do Responsável</label>
                <input required type="text" id="parentesco_responsavel" name="parentesco_responsavel" class="form-control" value="{{ isset($aluno) ?$aluno->parentesco_responsavel: old('parentesco_responsavel') }}">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group mb-3">
                <label for="escola_anterior">Escola Anterior</label>
                <input required type="text" id="escola_anterior" name="escola_anterior" class="form-control" value="{{ isset($aluno) ?$aluno->escola_anterior: old('escola_anterior') }}">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group mb-3">
                <label for="naturalidade">Naturalidade</label>
                <input required type="text" id="naturalidade" name="naturalidade" class="form-control" value="{{ isset($aluno) ?$aluno->naturalidade: old('naturalidade') }}">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group mb-3">
                <label for="provincia">Provincia</label>
                <input required type="text" id="provincia" name="provincia" class="form-control" value="{{ isset($aluno) ?$aluno->provincia: old('provincia') }}">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group mb-3">
                <label for="numero_bi">Número do BI</label>
                <input required type="text" id="numero_bi" name="numero_bi" class="form-control" value="{{ isset($aluno) ?$aluno->numero_bi: old('numero_bi') }}">
            </div>
        </div>


        <div class="col-md-4">
            <div class="form-group mb-3">
                <label for="estado_civil">Estado civil</label>
                <select name="estado_civil" class="form-control" id="">
                    <option value="Solteiro" @if (isset($aluno) ? $aluno->estado_civil=="Solteiro" : old('estado_civil')=="Solteiro")
                    selected
                    @endif>Solteiro</option>
                    <option value="Casado" @if (isset($aluno) ? $aluno->estado_civil=="Casado" : old('estado_civil')=="Casado")
                    selected
                    @endif>Casado</option>
                </select>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group mb-3">
                <label for="curso">Curso</label>
                <select name="curso" class="form-control" id="" required>
                    @foreach ($cursos as $curso)
                        <option value="{{ $curso->id }}" @if (isset($aluno) ? $aluno->curso==$curso->id : old('curso')==$curso->id)
                        selected
                        @endif>{{ $curso->nome }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group mb-3">
                <label for="foto">Foto</label>
                <input  type="file" id="vc_foto" name="vc_foto" class="form-control" {{ isset($aluno)?:'required' }}>
            </div>
        </div>

</div>

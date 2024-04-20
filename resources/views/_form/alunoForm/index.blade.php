<div class="row">
        <div class="col-md-6">
            <div class="mb-3 form-group">
                <label for="primeiro_nome">Nome</label>
                <input required type="text" id="primeiro_nome" name="primeiro_nome" class="form-control" value="{{isset($aluno) ?$aluno->nome: old('primeiro_nome') }}">
            </div>
        </div>

        <div class="col-md-6">
            <div class="mb-3 form-group">
                <label for="ultimo_nome">Sobrenome</label>
                <input required type="text" id="ultimo_nome" name="ultimo_nome" class="form-control" value="{{ isset($aluno) ?$aluno->sobrenome: old('ultimo_nome') }}">
            </div>
        </div>


        <div class="col-md-4">
            <div class="mb-3 form-group">
                <label for="data_nascimento">Data de Nascimento</label>
                <input required type="date" id="data_nascimento" name="data_nascimento" class="form-control" value="{{ isset($aluno) ?$aluno->data_nascimento: old('data_nascimento') }}">
            </div>
        </div>

        <div class="col-md-4">
            <div class="mb-3 form-group">
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
            <div class="mb-3 form-group">
                <label for="nacionalidade">Nacionalidade</label>
                <input required type="text" id="nacionalidade" name="nacionalidade" class="form-control" value="{{ isset($aluno) ?$aluno->nacionalidade: old('nacionalidade') }}">
            </div>
        </div>

        <div class="col-md-4">
            <div class="mb-3 form-group">
                <label for="endereco">Endereço</label>
                <input required type="text" id="endereco" name="endereco" class="form-control" value="{{ isset($aluno) ?$aluno->endereco: old('endereco') }}">
            </div>
        </div>





        <div class="col-md-4">
            <div class="mb-3 form-group">
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
            <div class="mb-3 form-group">
                <label for="classe">Ano</label>
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
            <div class="mb-3 form-group">
                <label for="nome_responsavel">Nome do Responsável</label>
                <select name="encarregado_id"  class="form-control select2" required>
                    <option value="" selected >Selecione uma opção</option>
                    @foreach ($users as $item)
                        <option value="{{$item->id}}" {{isset($aluno)? ($aluno->user_id == $item->id?'selected':'') : '' }}>{{$item->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-md-4">
            <div class="mb-3 form-group">
                <label for="nome_pai">Nome do Pai</label>
                <input required type="text" id="nome_pai" name="nome_pai" class="form-control" value="{{ isset($aluno) ?$aluno->nome_pai: old('nome_pai') }}">
            </div>
        </div>

        <div class="col-md-4">
            <div class="mb-3 form-group">
                <label for="nome_mae">Nome da Mãe</label>
                <input required type="text" id="nome_mae" name="nome_mae" class="form-control" value="{{ isset($aluno) ?$aluno->nome_mae: old('nome_mae') }}">
            </div>
        </div>


        <div class="col-md-4">
            <div class="mb-3 form-group">
                <label for="parentesco_responsavel">Parentesco do Responsável</label>
                <input required type="text" id="parentesco_responsavel" name="parentesco_responsavel" class="form-control" value="{{ isset($aluno) ?$aluno->parentesco_responsavel: old('parentesco_responsavel') }}">
            </div>
        </div>

        <div class="col-md-4">
            <div class="mb-3 form-group">
                <label for="naturalidade">Naturalidade</label>
                <input required type="text" id="naturalidade" name="naturalidade" class="form-control" value="{{ isset($aluno) ?$aluno->naturalidade: old('naturalidade') }}">
            </div>
        </div>
        <div class="col-md-4">
            <div class="mb-3 form-group">
                <label for="provincia">Provincia</label>
                <input required type="text" id="provincia" name="provincia" class="form-control" value="{{ isset($aluno) ?$aluno->provincia: old('provincia') }}">
            </div>
        </div>

        <div class="col-md-12">
            <div class="mb-3 form-group">
                <label for="foto">Foto</label>
                <input  type="file" id="vc_foto" name="vc_foto" class="form-control" {{ isset($aluno)?:'required' }}>
            </div>
        </div>

</div>

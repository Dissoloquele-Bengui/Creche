<div class="row">
    <div class="col-md-6">
        <div class="mb-3 form-group">
            <label for="nome">Nome</label>
            <input required type="text" id="nome" name="nome" class="form-control" value="{{isset($professor) ?$professor->nome: old('nome') }}">
        </div>
        <div class="mb-3 form-group">
            <label for="data_nascimento">Data de nascimento</label>
            <input required type="date" id="data_nascimento" name="data_nascimento" class="form-control" value="{{isset($professor) ?$professor->data_nascimento: old('data_nascimento') }}">
        </div>

        <div class="mb-3 form-group">
            <label for="endereco">Endereço</label>
            <input required type="text" id="endereco" name="endereco" class="form-control" value="{{isset($professor) ?$professor->endereco: old('endereco') }}">
        </div>

        <div class="mb-3 form-group">
            <label for="telefone">Telefone</label>
            <input required type="text" id="telefone" name="telefone" class="form-control" value="{{isset($professor) ?$professor->contacto: old('telefone') }}">
        </div>


    </div> <!-- /.col -->

    <div class="col-md-6">
        <div class="mb-3 form-group">
            <label for="genero">Gênero</label>

            <select name="genero" class="form-control" id="">
                <option value="Masculino" @if (isset($professor) ? $professor->genero=="Masculino": old('genero')=="Masculino")
                selected
                @endif>Masculino</option>
                <option value="Feminino" @if (isset($professor) ? $professor->genero=="Feminino": old('genero')=="Feminino")
                selected
                @endif>Feminino</option>
            </select>
        </div>
        <div class="mb-3 form-group">
            <label for="area_especializacao">Area de Especialização</label>
            <input required type="text" id="area_especializacao" name="area_especializacao" class="form-control" value="{{isset($professor) ?$professor->area_especializacao: old('area_especializacao') }}">
        </div>

        <div class="mb-3 form-group">
            <label for="data_contratacao">Data de contratação</label>
            <input required type="date" id="data_contratacao" name="data_contratacao" class="form-control" value="{{isset($professor) ?$professor->data_contratacao: old('data_contratacao') }}">
        </div>
        <div class="mb-3 form-group">
            <label for="numero_identificacao">Numero do BI</label>
            <input required type="text" id="numero_identificacao" name="numero_identificacao" class="form-control" value="{{isset($professor) ?$professor->bi: old('numero_identificacao') }}">
        </div>


    </div>
</div>

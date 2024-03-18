<div class="row">
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="nome">Nome</label>
            <input required type="text" id="nome" name="nome" class="form-control" value="{{isset($professor) ?$professor->nome: old('nome') }}">
        </div>
        <div class="form-group mb-3">
            <label for="data_nascimento">Data de nascimento</label>
            <input required type="date" id="data_nascimento" name="data_nascimento" class="form-control" value="{{isset($professor) ?$professor->data_nascimento: old('data_nascimento') }}">
        </div>

        <div class="form-group mb-3">
            <label for="endereco">Endereço</label>
            <input required type="text" id="endereco" name="endereco" class="form-control" value="{{isset($professor) ?$professor->endereco: old('endereco') }}">
        </div>

        <div class="form-group mb-3">
            <label for="telefone">Telefone</label>
            <input required type="text" id="telefone" name="telefone" class="form-control" value="{{isset($professor) ?$professor->telefone: old('telefone') }}">
        </div>

        <div class="form-group mb-3">
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

    </div> <!-- /.col -->

    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="email">E-mail</label>
            <input required type="email" id="email" name="email" class="form-control" value="{{isset($professor) ?$professor->email: old('email') }}">
        </div>

        <div class="form-group mb-3">
            <label for="area_especializacao">Area de Especialização</label>
            <input required type="text" id="area_especializacao" name="area_especializacao" class="form-control" value="{{isset($professor) ?$professor->area_especializacao: old('area_especializacao') }}">
        </div>

        <div class="form-group mb-3">
            <label for="data_contratacao">Data de contratação</label>
            <input required type="date" id="data_contratacao" name="data_contratacao" class="form-control" value="{{isset($professor) ?$professor->data_contratacao: old('data_contratacao') }}">
        </div>

        <div class="form-group mb-3">
            <label for="salario">Salário</label>
            <input required type="number" id="salario" name="salario" class="form-control" value="{{isset($professor) ?$professor->salario: old('salario') }}">
        </div>
        <div class="form-group mb-3">
            <label for="numero_identificacao">Numero do BI</label>
            <input required type="text" id="numero_identificacao" name="numero_identificacao" class="form-control" value="{{isset($professor) ?$professor->numero_identificacao: old('numero_identificacao') }}">
        </div>


    </div>
</div>

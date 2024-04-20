<div class="row">
    <div class="col-md-6">
        <div class="mb-3 form-group">
            <label for="name">Nome Completo*</label>
            <input type="text"   id="name" name="name" class="form-control" value="{{isset($user) ?$user->name: old('name') }}" required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3 form-group">
            <label for="password">Password*</label>
            <input type="password"    name="password" class="form-control"  required>
        </div>
    </div>
    <div class="col-md-4">
        <div class="mb-3 form-group">
            <label for="email">E-mail*</label>
            <input type="email"   id="email" name="email" class="form-control" value="{{isset($user) ?$user->email: old('email') }}" required>
        </div>
    </div>
    <div class="col-md-4">
        <div class="mb-3 form-group">
            <label for="numero_bi">Numero do BI*</label>
            <input type="text"    name="numero_bi" class="form-control" value="{{isset($user) ?$user->bi: old('numero_bi') }}" required>
        </div>
    </div>
    <div class="col-md-4">
        <div class="mb-3 form-group">
            <label for="numero_bi">Numero de Telefone</label>
            <input type="text"    name="contacto" class="form-control" value="{{isset($user) ?$user->contacto: old('contacto') }}" required>
        </div>
    </div>
    <div class="col-md-4">
        <div class="mb-3 form-group">
            <label for="endereco">Morada*</label>
            <input type="text" name="endereco" class="form-control" value="{{isset($user) ?$user->endereco: old('endereco') }}" required>
        </div>
    </div>


    <div class="col-md-4">
        <div class="mb-3 form-group">
            <label for="tipo">Nível de Acesso*</label>
            <select name="tipo"
                id="nivel{{isset($user)?$user->id:''}}" class="form-control select2">
                    @if (!isset($encarregado_view))
                        <option value="Encarregado" {{isset($user)?$user->tipo=="Encarregado"?'selected':'':''}}>Encarregado</option>

                        <option value="Administrador" {{isset($user)?$user->tipo=="Administrador"?'selected':'':''}}>Administrador</option>
                    @else
                        <option value="Encarregado" {{isset($user)?$user->tipo=="Encarregado"?'selected':'':''}}>Encarregado</option>

                    @endif
            </select>
        </div>
    </div>
    <div class="col-md-4">
        <div class="mb-3 form-group">
            <label for="genero">Genero*</label>
            <select name="genero" id="" class="form-control select2">
                <option value="Masculino" {{isset($user)?$user->genero=="Masculino"?'selected':'':''}}>Masculino</option>
                <option value="Feminino" {{isset($user)?$user->genero=="Feminino"?'selected':'':''}}>Feminino</option>
            </select>
        </div>
    </div>

</div>

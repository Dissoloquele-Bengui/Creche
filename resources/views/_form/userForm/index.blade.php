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
            <input type="text"    name="numero_bi" class="form-control" value="{{isset($user) ?$user->numero_bi: old('numero_bi') }}" required>
        </div>
    </div> 
    <div class="col-md-4">
        <div class="mb-3 form-group">
            <label for="endereco">Morada*</label>
            <input type="text" name="endereco" class="form-control" value="{{isset($user) ?$user->endereco: old('endereco') }}" required>
        </div>
    </div> 


    <div class="col-md-6">
        <div class="mb-3 form-group">
            <label for="tipo">Nível de Acesso*</label>
            <select name="tipo" 
                id="nivel{{isset($user)?$user->id:''}}" 
                onchange="{{isset($user)?'addGestorFieldUpdate('.$user->id.')':'addGestorField()'}}" 
                class="form-control select2">
                    @if (Auth::user()->tipo=="Administrador" || Auth::user()->tipo=="DP")
                        <option value="Professor" {{isset($user)?$user->tipo=="Professor"?'selected':'':''}}>Professor</option>
                        <option value="Aluno" {{isset($user)?$user->tipo=="Aluno"?'selected':'':''}}>Aluno</option>
                        <option value="Administrador" {{isset($user)?$user->tipo=="Administrador"?'selected':'':''}}>Administrador</option>
                        <option value="DP" {{isset($user)?$user->tipo=="DP"?'selected':'':''}}>DP</option>
                        <option value="Prestador de Serviços" {{isset($user)?$user->tipo=="Prestador de Serviços"?'selected':'':''}}>Prestador de Serviços</option>
                        <option value="Secretário" {{isset($user)?$user->tipo=="Secretário"?'selected':'':''}}>Secretário(a)</option>    
                    @elseif(Auth::user()->tipo=="Prestador de Serviços")
                        <option value="Prestador de Serviços" {{isset($user)?$user->tipo=="Prestador de Serviços"?'selected':'':''}}>Prestador de Serviços</option>
                        
                    @endif
            </select>
        </div>
    </div> 
    <div class="col-md-6">
        <div class="mb-3 form-group">
            <label for="genero">Genero*</label>
            <select name="genero" id="" class="form-control select2">
                <option value="Masculino" {{isset($user)?$user->genero=="Masculino"?'selected':'':''}}>Masculino</option>
                <option value="Feminino" {{isset($user)?$user->genero=="Feminino"?'selected':'':''}}>Feminino</option>
            </select>
        </div>
    </div> 

    @if (Auth::user()->tipo=="Prestador de Serviços")
        <div class="col-md-12 hidden">
            <div class="mb-3 form-group">
                <label for="tipo">Lojas*</label>
                <select name="id_loja"  class="form-control select2" required>
                    @foreach (getLojas() as $loja)
                        <option value="{{$loja->id}}">{{$loja->nome}}</option>                    
                    @endforeach
                </select>
            </div>
        </div> 
    @endif
</div>

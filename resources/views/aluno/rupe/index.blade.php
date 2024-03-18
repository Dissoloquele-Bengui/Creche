<!DOCTYPE html>
<html lang="pt-AO">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Referência Única de Pagamento ao Estado (RUPE)</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      font-size: 12px;
      margin: 0;
      padding: 20px;
    }
    
    h1, h2, h3, h4, h5, h6 {
      margin-top: 0;
    }
    
    table {
      width: 100%;
      border-collapse: collapse;
    }
    
    th, td {
      border: 1px solid #ddd;
      padding: 8px;
    }
    
    th {
      text-align: left;
    }
    
    .logo {
      width: 100px;
      height: 100px;
    }
    
    .assinatura {
      text-align: right;
    }
    
    .titulo-pagina {
      font-size: 16px;
      font-weight: bold;
      text-align: center;
    }
    
    .container {
      display: flex;
      flex-direction: row;
      justify-content: space-between;
    }
    
    .informacoes-contribuinte {
      width: 60%;
    }
    
    .qrcode {
      width: 40%;
      text-align: center;
    }
    
    .tabela-detalhes {
      margin-top: 20px;
    }
    
    .tabela-detalhes th,
    .tabela-detalhes td {
      text-align: center;
    }
  </style>
</head>
<body>
  <header>
    <table style="width: 100%;">
      <tr>
        <th><img src="logo.png" class="logo"></th>
        <th><h1>República de Angola</h1></th>
      </tr>
    </table>
  </header>
  
  <h2 class="titulo-pagina">Referência Única de Pagamento ao Estado (RUPE)</h2>
  
  <div class="container">
    <div class="informacoes-contribuinte">
      <h3>Contribuinte</h3>
      
      <table style="width: 100%;">
        <tr>
          <th>Nome:</th>
          <td>IPIL</td>
        </tr>
        <tr>
          <th>NIF:</th>
          <td>0545457848LA46</td>
        </tr>
        <tr>
          <th>Endereço:</th>
          <td>Largo das Escolas, 1º de MAIO</td>
        </tr>
        <tr>
            <th>RUPE:</th>
            <td>{{ $rupe->codigo }}</td>
          </tr>
      </table>
    </div>
    
  </div>
  
  <h3 class="titulo-pagina">Pagamento</h3>
  
  <table class="tabela-detalhes" style="width: 100%;">
    <tr>
      <th>Valor:</th>
      <td>{{ isset($rupe->preco)?$rupe->preco:2000 }}</td>
    </tr>
    <tr>
      <th>Data de Emissão:</th>
      <td>{{ $rupe->created_at }}</td>
      <th>Data de Vencimento:</th>
      <td> 31/12/2024 </td>
    </tr>
  </table>
  
</body>
</html>

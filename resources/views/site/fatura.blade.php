<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fatura Da Compra Nº {{$fatura->fatura_id}}/2024</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
            margin: 0;
            padding: 0;
        }

        .invoice-container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
        }

        .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .logo {
            max-width: 100px;
            height: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid black;
        }

        thead {
            background-color: #f2f2f2;
        }

        tr td:first-child {
            width: 50%;
        }

        tr td:nth-child(2) {
            width: 50%;
        }

        td {
            justify-items: center;
        }

        tr {
            height: 4500px !important;
        }

        .row::after {
            content: "";
            clear: both;
            display: table;
        }

        .col-md-6 {
            width: 45%;
            float: left;
        }
    </style>
</head>
<body>
    
        <div class="header">
            <table>

                <thead>
                    <tr style="border: none">
                        <th style="text-align: left">IPIL</th>
                    </tr>
                </thead>
                <tbody>
                    <tr style="border: none">
                        <td >
                            Loja: {{$fatura->loja}} <br>
                            Endereço {{ $fatura->endereco }}  <br>
                            EMAIL: {{ $fatura->email }}<br>
                            TELEFONE: {{ $fatura->telefone }}
                        </td>
                        <td style="text-align:right;top:0;padding-top:0; ">
                            {{ $fatura->loja_endereco }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <table>
            <tr>
                <td colspan="3">Fatura nº {{ $fatura->fatura_id }}/2024</td>
                <td>Original</td>
            </tr>
            <tr style="justify-items: center">
                <td>Data</td>
                <td>Contribuinte</td>
                <td>
                    Nome do Cliente
                </td>
                <td>V/Ref</td>
            </tr>
            <tr>
                <td>{{ $fatura->data }}</td>
                <td>{{ $fatura->nif }}</td>
                <td>{{$fatura->cliente}}</td>
                <td>{{ $fatura->fatura_id }}</td>
            </tr>
        </table>

        <table style="margin:50px 0 100px 0">
            <thead >
                <tr>
                    <th width="22%">PRATO</th>
                    <th width="2%">QTD</th>
                    <th width="25%">DATA</th>
                    <th width="14%">PREÇO</th>
                    <th width="14%">TOTAL</th>
                </tr>
            </thead>
            <tbody>

                    @foreach ($produtos as $produtos)
                        <tr>
                            <td>{{ $produtos->nome }}</td>
                            <td>{{ $produtos->quantidade }}</td>
                            <td>{{ $produtos->created_at }}</td>
                            <td>{{ $produtos->preco }} kzs</td>
                            <td>{{ $produtos->valor }} kzs</td>
                            
                        </tr>
                    @endforeach

            </tbody>
        </table>
        <table style="margin:50px 0 20px 0">
            <thead >
                <tr>
                    <th width="85%">VALOR TOTAL</th>
                    <th width="15%">{{$fatura->valor_total}} kzs</th>
                </tr>
            </thead>
        </table>
        <table style="margin:0px 0 400px 0">
            <thead >
                <tr>
                    <th width="60%">IBAN</th>
                    <th width="40%">AO06 0000 0332 0320 3230 0323</th>
                </tr>
            </thead>
        </table>
</body>
</html>

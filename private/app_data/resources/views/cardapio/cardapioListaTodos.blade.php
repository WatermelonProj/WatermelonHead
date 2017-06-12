@extends('layouts.dataTable')

@section('page_title', "Cardápios")

@section('table_head')
    <th>Data de Utilização</th>
    <th>Faixa Etaria</th>
    <th>Criada Por</th>
@endsection

@section('table_body')
    @foreach($cardapios as $cardapio)
        <tr>
            <td>{{ toCarbon($cardapio->dataUtilizacao)->format('d/m/y') }}</td>
            <td>{{ $cardapio->faixaEtaria['descricaoFaixa'] }}</td>
            <td>{{ $cardapio->usuario->name }}</td>
        </tr>
    @endforeach
@endsection
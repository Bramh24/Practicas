@extends('principal')
@section('contenido')

    <template v-if="menu==1">
        <almacen-component></almacen-component>
    </template>

    <template v-if="menu==2">
        <categoria-component></categoria-component>
    </template>

    <template v-if="menu==3">
        <articulo-component></articulo-component>
    </template>
@endsection

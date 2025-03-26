@extends('layouts.admin')

@section('header')
    Crear Nuevo Libro
@endsection

@section('content')
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">
            <form action="{{ route('admin.books.store') }}" method="POST" enctype="multipart/form-data">
                @include('admin.books.form')
            </form>
        </div>
    </div>
@endsection
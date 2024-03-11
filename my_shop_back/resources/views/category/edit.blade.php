@extends('layouts.main')
@section('title', 'Редактирование категории')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактировать категорию</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('main.index')}}">Главная</a></li>
                        <li class="breadcrumb-item"><a href="{{route('categories.index')}}">Категории</a></li>
                        <li class="breadcrumb-item active">Редактировать категорию</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">

            <form method="post" action="{{route('categories.update', $category->id)}}">
                @csrf
                @method('PATCH')
                <label for="titleCategory">Название категории</label>
                <input type="text"
                       name="title"
                       class="form-control @error('title')is-invalid @enderror col-3"
                       id="titleCategory"
                       placeholder="Введите название"
                       aria-describedby="titleCategory-error"
                       aria-invalid="true"
                       value="{{old('title') ? old('title') : $category->title}}">

                @error('title')
                <span id="titleCategory-error" class="error invalid-feedback">{{$message}}</span>
                @enderror
                <input type="submit" class="btn btn-primary mt-3" value="Добавить">
            </form>

        </div>
    </div>
@endsection

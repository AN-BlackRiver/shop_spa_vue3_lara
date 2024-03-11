@extends('layouts.main')
@section('title', 'Добавление продукта')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Добавление продукта</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('main.index')}}">Главная</a></li>
                        <li class="breadcrumb-item"><a href="{{route('products.index')}}">Продукты</a></li>
                        <li class="breadcrumb-item active">Добавить продукт</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">

            <form method="post" action="{{route('products.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="card-body col-6">
                    <div class="form-group">
                        <label for="InputEmail1">Название</label>
                        <input type="text"
                               name="title"
                               class="form-control @error('title')is-invalid @enderror"
                               id="InputTitle"
                               value="{{old('title')}}"
                               placeholder="Введите название">
                                @error('title')
                                     <span class="error invalid-feedback">
                                         {{$message}}
                                     </span>
                                @enderror
                    </div>
                    <div class="form-group">
                        <label for="InputDescription">Описание</label>
                        <input type="text"
                               name="description"
                               class="form-control @error('description')is-invalid @enderror"
                               id="InputDescription"
                               value="{{old('description')}}"
                               placeholder="Введите описание">
                            @error('description')
                                 <span class="error invalid-feedback">
                                     {{$message}}
                                 </span>
                            @enderror
                    </div>
                    <div class="form-group">
                        <label for="InputContent">Контент</label>
                        <textarea type="text" name="content" class="form-control @error('content')is-invalid @enderror" id="InputContent" placeholder="Введите контент">{{old('content')}}</textarea>
                                @error('content')
                                    <span class="error invalid-feedback">
                                         {{$message}}
                                     </span>
                                @enderror
                    </div>
                    <div class="form-group">
                        <label for="InputPrice">Цена</label>
                        <input type="number"
                               name="price"
                               class="form-control @error('price')is-invalid @enderror"
                               id="InputPrice"
                               value="{{old('price')}}"
                               placeholder="Укажите цену">
                                @error('price')
                                    <span class="error invalid-feedback">
                                         {{$message}}
                                     </span>
                                @enderror
                    </div>
                    <div class="form-group">
                        <label for="InputCount">Количество</label>
                        <input type="number"
                               name="count"
                               class="form-control @error('count')is-invalid @enderror"
                               id="InputCount"
                               value="{{old('count')}}"
                               placeholder="Укажите колличество">
                                @error('count')
                                    <span class="error invalid-feedback">
                                         {{$message}}
                                     </span>
                                @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputFile">Изображение</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" name="preview_image" class="custom-file-input" id="exampleInputFile">
                                <label class="custom-file-label" for="exampleInputFile">Выберите изображение</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Категория</label>
                        <select name="category_id" class="form-control select2" style="width: 100%;">
                            <option selected disabled>Выберите категорию</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->title}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Теги</label>
                        <select class="tags" name="tags[]" multiple="multiple" data-placeholder="Выберите тег" style="width: 100%;">
                            @foreach($tags as $tag)
                                <option value="{{$tag->id}}">{{$tag->title}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Цвет</label>
                        <select class="colors" name="colors[]" multiple="multiple" data-placeholder="Выберите цвет" style="width: 100%;">
                            @foreach($colors as $color)
                                <option value="{{$color->id}}">{{$color->title}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="">
                        <button type="submit" class="btn btn-primary">Добавить продукт</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

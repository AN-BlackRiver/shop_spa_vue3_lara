@extends('layouts.main')
@section('title', 'Цвета')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Цвета</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('main.index')}}">Главная</a></li>
                        <li class="breadcrumb-item active">Цвета</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="content">
        <div class="container-fluid">

            <div class="row">
                    <a class="btn btn-success" href="{{route('colors.create')}}">Добавить цвет</a>
            </div>

        </div>
    </div>

    <div class="container-fluid mt-3">
        <div class="card">
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Код</th>
                        <th>Цвет</th>
                        <th>Действие</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($colors as $color)
                        <tr>
                            <td>{{$color->id}}</td>
                            <td>{{$color->title}}</td>
                            <td><div style="width: 35px; height: 16px; background: {{$color->title}}"></div></td>
                            <td>
                                <div class="row">
                                    <a class="btn btn-success btn-sm mr-1" href="{{route('colors.show', $color->id)}}">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a class="btn btn-primary btn-sm mr-1" href="{{route('colors.edit', $color->id)}}">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <div>
                                        <form onSubmit="return confirm('Подтвердите удаление категории!')" method="post"
                                              action="{{route('colors.destroy', $color->id)}}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col">{{$colors->links()}}</div>
@endsection

@extends('layouts.main')
@section('title', 'Пользователи')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Пользователи</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('main.index')}}">Главная</a></li>
                        <li class="breadcrumb-item active">Пользователи</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="content">
        <div class="container-fluid">

            <div class="row">
                    <a class="btn btn-success" href="{{route('users.create')}}">Добавить пользователя</a>
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
                        <th>ФИО</th>
                        <th>Email</th>
                        <th>Пол</th>
                        <th>Действие</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td><a href="{{route('users.show', $user->id)}}">{{$user->fullName}}</a></td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->genderTitle}}</td>
                            <td>
                                <div class="row">
                                    <a class="btn btn-success btn-sm mr-1" href="{{route('users.show', $user->id)}}">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a class="btn btn-primary btn-sm mr-1" href="{{route('users.edit', $user->id)}}">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <div>
                                        <form onSubmit="return confirm('Подтвердите удаление пользователя!')" method="post"
                                              action="{{route('users.destroy', $user->id)}}">
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
    <div class="col">{{$users->links()}}</div>
@endsection

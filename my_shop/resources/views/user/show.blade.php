@extends('layouts.main')
@section('title', 'Пользователь')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Пользователь № {{$user->id}}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('main.index')}}">Главная</a></li>
                        <li class="breadcrumb-item"><a href="{{route('users.index')}}">Пользователи</a></li>
                        <li class="breadcrumb-item active">Пользователь {{$user->fullName}}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="card-header d-flex ">
            <div class="mr-3">
                <a class="btn btn-success" href="{{route('users.edit', $user->id)}}"><i class="fa fa-edit mr-2"></i>Редактировать</a>
            </div>
            <div class="mr-3">
                <form onSubmit="return confirm('Подтвердите удаление пользователя!')" method="post"
                      action="{{route('users.destroy', $user->id)}}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-trash-alt mr-2"></i>Удалить
                    </button>
                </form>
            </div>
        </div>
        <div class="card-body table-responsive p-0">
        <table class="table table-hover col-6">
            <tr>
                <td>Фамилия</td>
                <td>{{$user->surname}}</td>
            </tr>
            <tr>
                <td>Имя</td>
                <td>{{$user->firstname}}</td>
            </tr>
            <tr>
                <td>Отчество</td>
                <td>{{$user->patronymic}}</td>
            </tr>
            <tr>
                <td>Возраст</td>
                <td>{{$user->age}}</td>
            </tr>
            <tr>
                <td>Адрес</td>
                <td>{{$user->address}}</td>
            </tr>
            <tr>
                <td>Пол</td>
                <td>{{$user->genderTitle}}</td>
            </tr>
            <tr>
                <td>Email</td>
                <td>{{$user->email}}</td>
            </tr>

        </table>



        </div>
    </div>
@endsection

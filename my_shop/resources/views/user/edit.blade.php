@extends('layouts.main')
@section('title', 'Редактирование пользователя')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактировать пользователя № {{$user->id}}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('main.index')}}">Главная</a></li>
                        <li class="breadcrumb-item"><a href="{{route('users.index')}}">Пользователи</a></li>
                        <li class="breadcrumb-item active">Редактировать пользоваетля {{$user->fullName}}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">

            <form method="post" action="{{route('users.update', $user->id)}}">
                @csrf
                @method('PATCH')
                <div class="card-body">
                    <div class="form-group">
                        <label for="InputSurname">Фамилия</label>
                        <input type="text"
                               name="surname"
                               class="form-control @error('surname')is-invalid @enderror"
                               id="InputSurname"
                               value="{{old('surname') ? old('surname') : $user->surname}}"
                               placeholder="Введите фамилию">
                        @error('surname')
                        <span class="error invalid-feedback">
                                     {{$message}}
                                 </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="InputName">Имя</label>
                        <input type="text"
                               name="firstname"
                               class="form-control @error('firstname')is-invalid @enderror"
                               id="InputName"
                               value="{{old('firstname') ? old('firstname') : $user->firstname}}"
                               placeholder="Введите имя">
                        @error('firstname')
                        <span class="error invalid-feedback">
                                         {{$message}}
                                     </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="InputPatronymic">Отчество</label>
                        <input type="text"
                               name="patronymic"
                               class="form-control @error('patronymic')is-invalid @enderror"
                               id="InputPatronymic"
                               value="{{old('patronymic') ? old('patronymic') : $user->patronymic}}"
                               placeholder="Ведите отчетсво">
                        @error('patronymic')
                        <span class="error invalid-feedback">
                                         {{$message}}
                                     </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="InputPatronymic">Возраст</label>
                        <input type="number"
                               name="age"
                               class="form-control @error('age')is-invalid @enderror"
                               id="InputPatronymic"
                               value="{{old('age') ? old('age') : $user->age}}"
                               placeholder="Укажите колличество полных лет">
                        @error('age')
                        <span class="error invalid-feedback">
                                         {{$message}}
                                     </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="InputPatronymic">Адрес</label>
                        <input type="text"
                               name="address"
                               class="form-control @error('address')is-invalid @enderror"
                               id="InputPatronymic"
                               value="{{old('address') ? old('address') : $user->address}}"
                               placeholder="Укажите адрес проживания">
                        @error('address')
                        <span class="error invalid-feedback">
                                         {{$message}}
                                     </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Пол</label>
                        <select name="gender" class="form-control select2 select2-hidden-accessible @error('gender')is-invalid @enderror">
                            <option selected disabled>Укажите ваш пол</option>
                            <option {{old('gender') == 1 || $user->gender == 1 ? 'selected' : '' }} value="1">Мужской</option>
                            <option {{old('gender') == 2 || $user->gender == 2 ? 'selected' : '' }} value="2">Женский</option>
                        </select>
                        @error('gender')
                        <span class="error invalid-feedback">
                                 {{$message}}
                             </span>
                        @enderror
                    </div>
                    <div class="">
                        <button type="submit" class="btn btn-primary">Сохранить</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection

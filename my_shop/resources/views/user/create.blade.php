@extends('layouts.main')
@section('title', 'Добавление пользователя')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Добавление пользователя</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('main.index')}}">Главная</a></li>
                        <li class="breadcrumb-item"><a href="{{route('users.index')}}">Пользователи</a></li>
                        <li class="breadcrumb-item active">Добавить пользователя</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">

            <form method="post" action="{{route('users.store')}}">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="InputEmail">Email</label>
                        <input type="email"
                               name="email"
                               class="form-control @error('email')is-invalid @enderror"
                               id="InputEmail"
                               value="{{old('email')}}"
                               placeholder="Введите Email">
                                @error('email')
                                     <span class="error invalid-feedback">
                                         {{$message}}
                                     </span>
                                @enderror
                    </div>
                    <div class="form-group">
                        <label for="InputSurname">Фамилия</label>
                        <input type="text"
                               name="surname"
                               class="form-control @error('surname')is-invalid @enderror"
                               id="InputSurname"
                               value="{{old('surname')}}"
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
                               value="{{old('firstname')}}"
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
                               value="{{old('patronymic')}}"
                               placeholder="Ведите отчетсво">
                                @error('patronymic')
                                    <span class="error invalid-feedback">
                                         {{$message}}
                                     </span>
                                @enderror
                    </div>
                    <div class="form-group">
                        <label for="InputAge">Возраст</label>
                        <input type="number"
                               name="age"
                               class="form-control @error('age')is-invalid @enderror"
                               id="InputAge"
                               value="{{old('age')}}"
                               placeholder="Укажите колличество полных лет">
                                @error('age')
                                    <span class="error invalid-feedback">
                                         {{$message}}
                                     </span>
                                @enderror
                    </div>
                    <div class="form-group">
                        <label for="InputAddress">Адрес</label>
                        <input type="text"
                               name="address"
                               class="form-control @error('address')is-invalid @enderror"
                               id="InputAddress"
                               value="{{old('address')}}"
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
                            <option {{old('gender') == 1? 'selected': ''}} value="1">Мужской</option>
                            <option {{old('gender') == 2? 'selected': ''}} value="2">Женский</option>
                        </select>
                        @error('gender')
                            <span class="error invalid-feedback">
                                 {{$message}}
                             </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="InputPassword">Пароль</label>
                        <input type="password"
                               name="password"
                               class="form-control @error('password')is-invalid @enderror"
                               id="InputPassword"
                               placeholder="Введите пароль">
                                @error('password')
                                <span class="error invalid-feedback">
                                         {{$message}}
                                     </span>
                                @enderror
                    </div>
                    <div class="form-group">
                        <label for="InputPasswordConfirm">Подтверждение пароля</label>
                        <input
                            type="password"
                            name="password_confirmation"
                            class="form-control @error('password')is-invalid @enderror"
                            id="InputPasswordConfirm"
                            placeholder="Повторите пароль">
                            @error('password')
                                <span class="error invalid-feedback">
                                     {{$message}}
                                 </span>
                            @enderror
                    </div>
                    <div class="">
                        <button type="submit" class="btn btn-primary">Добавить пользователя</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

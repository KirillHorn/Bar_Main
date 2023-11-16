@extends('app.header')
@section('title', 'Too Much, Too Little')
@section('content')
<section class="auth_section register">
    <div class="container">
        <h2>
            Регистрация
        </h2>
        @if (session("error"))
        {{session("error")}}
        @endif
        <form method="POST" action="/reg_valid" class="auth reg">
            @csrf
            <div class="auth_element">
                <label>Имя</label>
           
                <input type="type" name="name" value="{{old('name')}}" placeholder="  @error('name') {{$message}}  @enderror">
          
                <div class="element_input"></div>
            </div>
            <div class="auth_element">
                <label>Фамилия</label>
                <input type="type" name="surname" value="{{old('surname')}}" placeholder="  @error('surname') {{$message}}  @enderror">
                <div class="element_input"></div>
            </div>
            <div class="auth_element">
                <label>Отчество</label>
                <input type="type" name="patronymic" value="{{old('patronymic')}}" placeholder="  @error('patronymic') {{$message}}  @enderror">
                <div class="element_input"></div>
            </div>  
            <div class="auth_element">
                <label>Электронная почта</label>
                <input type="email" name="email" value="{{old('email')}}" placeholder="  @error('email') {{$message}}  @enderror">
                <div class="element_input"></div>
            </div>
            <div class="auth_element">
                <label>Номер телефона</label>
                <input type="tel " name="phone" value="{{old('phone')}}" placeholder="  @error('phone') {{$message}}  @enderror">
                <div class="element_input"></div>
            </div>
            <div class="auth_element">
                <label>Пароль</label>
                <input type="password" name="password" value="{{old('password')}}" placeholder="  @error('password') {{$message}}  @enderror">
                <div class="element_input"></div>
            </div>
          
            <div class="auth_element">
                <label>Повтор пароля</label>
                <input type="password" name="confirm_password" value="{{old('confirm_password')}}" placeholder="  @error('password') {{$message}}  @enderror">
                <div class="element_input"></div>
            </div>

            <div>
                <input type="submit" value="Регистрация" class="submit_auth">
            </div>
        </form>
    </div>

</section>

@endsection('content')
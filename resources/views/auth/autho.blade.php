@extends('app.header')
@section('title', 'Too Much, Too Little')
@section('content')
<section class="auth_section">
    <div class="container">
            <h2>
                Вход
            </h2>
            @if (session("error"))
        {{session("error")}}
        @endif
            <form method="POST" action="/auth_valid" class="auth">
                @csrf
                <div class="auth_element">
                <label>Электронная почта</label>
                <input type="email" name="email" placeholder="  @error('email') {{$message}}  @enderror">
                <div class="element_input"></div>
                </div>
                <div class="auth_element">
                <label>Пароль</label>
                <input type="password" name="password"   placeholder="  @error('password') {{$message}}  @enderror">
                <div class="element_input"></div>
                </div>
                <div>
                <input type="submit" value="Войти" class="submit_auth" >
                </div>
            </form>
    </div>
  
</section>

@endsection('content')



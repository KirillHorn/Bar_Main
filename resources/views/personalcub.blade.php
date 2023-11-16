@extends('app.header')
@section('title', 'Too Much, Too Little')
@section('content')
<section class="section_personalcub">
    <div class="container">
        <div class="logo_personal">
            <h2>Добро Пожаловать Алексей   </h2>
            <img src="/img/personalElement.png">
        </div>
            <div class="main_personal">
                <div class="information_personal">
                    <h2>Личная информация</h2>
                    <img src="/img/elementper.png" class="element_personal">
                        <div class="info_pers">
                                <div>
                    <p>Имя  <span>[{{$personalInfo->name}}]</span></p>
                    <p>Фамилия  <span>[{{$personalInfo->surname}}]</span></p>
                    <p>Отчество  <span>[{{$personalInfo->patronymic}}]</span></p>
                    <p >Номер телефона  <span >[{{$personalInfo->phone}}]</span></p>
                    <p style="width: 400px;">Электронная почта  <span>[{{$personalInfo->email}}]</span> </p>
                  
                    </div>
                    <a href="signout"><button class="logout_pers">Выйти</button></a>

                    <a href="/admin">Админ панель для ебланов </a>
                        </div>
                </div>
                    <div>
                        <h2>Ваши заказы</h2>
                        <img src="/img/el1.png" class="element_personal">
                            <div class="order_info">
                        <div>1</div>
                        <div>2</div>
                        <div>3</div>
                        <div>4</div>
                            </div>
                    </div>
            </div>
    </div>
</section>

@endsection('content')



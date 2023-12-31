@include('admin.inc.sidebar')
<div class="wrapper">
<div class="container">
  <h2 class="text-center">Отклонённые заявки</h2>
  <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Имя</th>
      <th scope="col">Номер телефона</th>
      <th scope="col">e-mail</th>
      <th scope="col">Товары</th>
      <th scope="col">Количество</th>
      <th scope="col">Сумма</th>
      <th scope="col">Тип оплаты</th>
      <th scope="col">Адрес</th>
      <th scope="col">Дата подачи заявки</th>
      <th scope="col">Статус</th>
    </tr>
  </thead>
  <tbody>
    @forelse($orders as $order)
    <tr>
      <td class="align-middle">{{$order ->id}}</td>
      <td class="align-middle">{{$order ->name}}</td>
      <td class="align-middle">{{$order ->phone}}</td>
      <td class="align-middle">{{$order ->email}}</td>
      <td class="align-middle">{{$order ->title}}</td>
      <td class="align-middle">{{$order ->amount}}</td>
      <td class="align-middle">{{$order ->title}}</td>
      <td class="align-middle">{{$order ->title}}</td>
      <td class="align-middle">{{$order ->address}}</td>
      <td class="align-middle">{{$order ->created_at}}</td>
      <td class="align-middle text-success">Отклонено</td>
    </tr>
    @empty
      <p>Тут нет заявок.</p>
    @endforelse
    {{ $orders->withQueryString()->links('pagination::bootstrap-5') }}
  </tbody>
  </table>
</div>
</div>

@include('admin.inc.sidebar')
<div class="wrapper">
<div class="container">
  <h2 class="text-center">Выполненные заявки</h2>
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
    <!-- @forelse($orders as $order) -->
    <tr>
      <td class="align-middle"></td>
      <td class="align-middle"></td>
      <td class="align-middle"></td>
      <td class="align-middle"></td>
      <td class="align-middle"></td>
      <td class="align-middle"></td>
      <td class="align-middle"></td>
      <td class="align-middle"></td>
      <td class="align-middle"></td>
      <td class="align-middle"></td>
      <td class="align-middle text-success"></td>
    </tr>
   
      <p>Тут нет заявок.</p>
    <!-- @endforelse -->
  </tbody>
  </table>
</div>
</div>

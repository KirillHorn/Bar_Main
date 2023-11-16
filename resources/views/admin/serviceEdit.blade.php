@include('admin.inc.sidebar')
<div class="wrapper">
<div class="container">
  <h2 class="text-center">Товар</h2>
  <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Название</th>
      <th scope="col">Фото</th>
      <th scope="col">Описание</th>
      <th scope="col">Цена</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($product_info as $item_product )
    <tr>
      <td class="align-middle">{{ $item_product->id}}</td>
      <td class="align-middle">{{ $item_product->title}}</td>
      <td class="align-middle">{{ $item_product->img}}</td>
      <td class="align-middle">{{ $item_product->description}}</td>
      <td class="align-middle"> {{ $item_product->cost}}</td>
      <td class="align-middle"><a href=" /admin/{{ $item_product->id}}/edit"><button type="submit" class="btn btn-primary">Редактировать</button></a></td>
      <td class="align-middle">
      <form action="{{ route('r.destroy', ['id' => $item_product->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')  
      <button type="submit" class="btn btn-danger">Удалить</button>
      </form>
    </td>
    </tr>
    @endforeach
  </tbody>
  </table>
  <hr>
</div>
</div>

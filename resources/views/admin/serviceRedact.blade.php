@include('admin.inc.sidebar')
<div class="wrapper">
<div class="container">
  <form action="/addproduct" method="POST" enctype="multipart/form-data" class="addservice">
    <h2 class="text-center">Добавить товар</h2>
    @csrf
    <div class="mb-3"><input type="text" name="title" class="form-control" placeholder="Название товара" required></div>
    <div class="mb-3">
      <label for="formFile" class="form-label">Фотография товара</label>
      <input class="form-control" name="img" type="file" id="formFile" required>
    </div>
    <div class="mb-3"><textarea class="form-control" name="description" rows="8" placeholder="Описание" required></textarea></div>
    <div class="mb-3"><input type="text" name="cost" class="form-control" placeholder="Цена" required></div>
    <select name="categoru_id"> 
    @foreach ($categories as $item )
    <option value="{{ $item->id}}"> {{ $item->title}}</option>
    @endforeach
</select>
    <button type="submit" class="btn btn-primary">Добавить товар</button>
  </form>
</div>
</div>

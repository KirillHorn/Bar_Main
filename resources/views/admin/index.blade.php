<div>
    вы еблан
</div>
<form method="POST" action="/addproduct" enctype="multipart/form-data">
    @csrf
    <input type="text" name="title">
    <input type="text" name="description">
    <input type="number" name="cost">
    <input type="file" name="img">
<select name="categoru_id"> 
    @foreach ($categories as $item )
    <option value="{{ $item->id}}"> {{ $item->title}}</option>
    @endforeach
</select>
    <input type="submit">
</form>
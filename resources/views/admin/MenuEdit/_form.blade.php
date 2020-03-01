@csrf

<div class="row">
    <div class="col-md-5" >
    <label for="title"   > Titel </label>
    <input type="text" name="title" value="{{old('title') ?? $menu->title ?? ''}}" class="form-control @if ($errors->has('title')) is-invalid @endif " id="title" autocomplete="off" required>
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">{{$errors->first('title')}}</div>
   </div>

    <div class="col-md-6" >
    <label for="discription"  > Gericht </label>
    <textarea cols="100" type="text" rows="5"  name="description" value="{{old('description') ?? $menu->description ?? ''}}" class="form-control col-md-auto @if ($errors->has('description')) is-invalid @endif " id="description'" required></textarea>
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">{{$errors->first('description')}}</div>
    </div>

    <div class="col-md-1" >
    <label for="price"  > Preis </label>
    <input type="text" name="price" value="{{old('price') ?? $menu->price ?? ''}}" class="form-control @if ($errors->has('price')) is-invalid @endif " id="price'" autocomplete="off" required>
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">{{$errors->first('price')}}</div>
    </div>
</div>

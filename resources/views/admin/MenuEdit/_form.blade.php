@csrf

<div class="row">
    <div class="col-md-4" >
    <label for="title"   > Titel </label>
        <textarea type="text" name="title" rows="2" value="{{old('title') ?? $menu->title ?? ''}}" class="form-control @if ($errors->has('title')) is-invalid @endif " id="title" autocomplete="off" required></textarea>
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">{{$errors->first('title')}}</div>
   </div>

    <div class="col-md-5" >
    <label for="discription"  > Gericht </label>
    <textarea cols="100" type="text" rows="5"  name="description" value="{{old('description') ?? $menu->description ?? ''}}" class="form-control col-md-auto @if ($errors->has('description')) is-invalid @endif " id="description'" required></textarea>
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">{{$errors->first('description')}}</div>
    </div>

    <div class="col-md-2" >
        <div class="form-group">
            <label for="categorieID">Categorie</label>
            <select class="form-control" name="categorieID" id="categorieID" value="{{old('categorieID') ?? $menu->categorieID ?? ''}}" class="form-control @if ($errors->has('categorieID')) is-invalid @endif " id="categorieID'" autocomplete="off" required>
                <option value="1">Vorspeise</option>
                <option value="2">Hauptgericht</option>
                <option value="3">Nachspeise</option>
                <option value="4">Vegan</option>
            </select>
        </div>
        <div class="valid-feedback">Valid.</div>
        <div class="invalid-feedback">{{$errors->first('categorieID')}}</div>
    </div>

    <div class="col-md-1" >
    <label for="price"  > Preis </label>
    <input type="text" name="price" value="{{old('price') ?? $menu->price ?? ''}}" class="form-control @if ($errors->has('price')) is-invalid @endif " id="price'" autocomplete="off" required>
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">{{$errors->first('price')}}</div>
    </div>
</div>

@extends('admin.layout.app')
@section('content')
<a href="{{route('admin.truck-category.index')}}" class="btn btn-white"> &lt; Back</a>
<div class="bg-white p-20 col-12 m-t-30">
    <form action="{{route('admin.truck-category.store')}}" method="POST">
        @csrf
        <fieldset>
            <legend class="m-b-15">Add Truck Category</legend>
            <div class="form-group">
                <label for="model">Model</label>
                <select name="truck_model_category_id" id="model" class="form-control">
                    <option selected>Choose Model</option>
                    @foreach ($truckModelCategories as $item)
                    <option value="{{$item->id}}">{{$item->model}}</option>
                    @endforeach
                </select>
                @error('truck_model_category_id')
                <span>{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="weight">Weight</label>
                <select name="truck_weight_category_id" id="weight" class="form-control">
                    <option selected>Choose Weight</option>
                    @foreach ($truckWeightCategories as $item)
                    <option value="{{$item->id}}">{{$item->weight}} Ton</option>
                    @endforeach
                </select>
                @error('truck_weight_category_id')
                <span>{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="size">Size</label>
                <select name="truck_size_category_id" id="size" class="form-control">
                    <option selected>Choose Size</option>
                    @foreach ($truckSizeCategories as $item)
                    <option value="{{$item->id}}">{{$item->size}} Feet</option>
                    @endforeach
                </select>
                @error('truck_size_category_id')
                <span>{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="covered">Covered</label>
                <select name="truck_covered_category_id" id="covered" class="form-control">
                    <option selected>Choose Covered</option>
                    @foreach ($truckCoveredCategories as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
                @error('truck_covered_category_id')
                <span>{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="description">Description (<span class="text-warning">Optional</span>)</label>
                <textarea name="description" id="description" cols="30" rows="5" class="form-control"></textarea>
                @error('description')
                <span>{{$message}}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-sm btn-primary m-r-5">Save</button>
            <a href="{{url()->previous()}}" class="btn btn-sm btn-default">Cancel</a>
        </fieldset>
    </form>
</div>
@endsection
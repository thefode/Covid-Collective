@extends('layout')

@section('content')

    <h1>Add Resource</h1>

    @if($error ?? false)
        <div class="alert alert-danger" role="alert">
            {!! $error !!}
        </div>
    @endif

    @if($success ?? false)
        <div class="alert alert-success" role="alert">
            {{$success}}
        </div>
    @endif

    <form method="post">
        <div class="form-group row">
            <label for="title" class="col-sm-2 col-form-label">Title</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="title" name="title" value="{{$title ?? ''}}">
            </div>
        </div>
        
        <div class="form-group row">
            <label for="description" class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="description" name="description" value="{{$description ?? ''}}">
            </div>
        </div>
        
        <div class="form-group row">
            <label for="url" class="col-sm-2 col-form-label">URL</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="url" name="url" value="{{$url ?? ''}}">
            </div>
        </div>
        
        <div class="form-group row">
            <label for="category" class="col-sm-2 col-form-label">Audience</label>
            <div class="col-sm-10">
                <select class="form-control" id="audience" name="audience">
                    <option></option>
                    <option @if($audience ?? null == 'Kids')selected @endif>Kids</option>
                    <option @if($audience ?? null == 'Parents')selected @endif>Parents</option>
                    <option @if($audience ?? null == 'LGBT')selected @endif>LGBT</option>
                    <option @if($audience ?? null == 'Vulnerable')selected @endif>Vulnerable</option>
                    <option @if($audience ?? null == 'Business')selected @endif>Business</option>
                </select>
            </div>
        </div>
        
        <div class="form-group row">
            <label for="category" class="col-sm-2 col-form-label">Category</label>
            <div class="col-sm-10">
                <select class="form-control" id="category" name="category">
                    <option></option>
                    <option @if($category ?? null == 'Fitness')selected @endif>Fitness</option>
                    <option @if($category ?? null == 'Mental heath')selected @endif>Mental heath</option>
                    <option @if($category ?? null == 'Teaching')selected @endif>Teaching</option>
                    <option @if($category ?? null == 'Social')selected @endif>Social</option>
                    <option @if($category ?? null == 'Entertainment')selected @endif>Entertainment</option>
                    <option @if($category ?? null == 'Information')selected @endif>Information</option>
                    <option @if($category ?? null == 'Finance')selected @endif>Finance</option>
                    <option @if($category ?? null == 'Support')selected @endif>Support</option>
                    <option @if($category ?? null == 'News')selected @endif>News</option>
                </select>
            </div>
        </div>
        
        <div class="form-group row">
            <label for="cost" class="col-sm-2 col-form-label">Cost</label>
            <div class="col-sm-10">
                <select class="form-control" id="cost" name="cost">
                    <option></option>
                    <option @if($cost ?? null == 'Free')selected @endif>Free</option>
                    <option @if($cost ?? null == 'Freemium')selected @endif>Freemium</option>
                    <option @if($cost ?? null == 'Paid')selected @endif>Paid</option>
                </select>
            </div>
        </div>
        
        <div class="form-group row">
            <label for="media" class="col-sm-2 col-form-label">Media</label>
            <div class="col-sm-10">
                <select class="form-control" id="media" name="media">
                    <option></option>
                    <option @if($media ?? null == 'Website')selected @endif>Website</option>
                    <option @if($media ?? null == 'Video')selected @endif>Video</option>
                    <option @if($media ?? null == 'Audio')selected @endif>Audio</option>
                    <option @if($media ?? null == 'Reading')selected @endif>Reading</option>
                    <option @if($media ?? null == 'Social Media')selected @endif>Social Media</option>
                </select>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-2">
                {{--  --}}
            </div>
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>

@endsection

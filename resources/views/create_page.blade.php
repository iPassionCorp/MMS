@extends('layouts.app')

@section('content')
<style>
    .dtp-btn-cancel{
        margin-right: 5px;
    }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
            <div class="card-header"><h5><b><a href="{{url('home')}}" class="text-primary"><i class="fas fa-arrow-circle-left"></i></a> Create Page</b></h5></div>
                <div class="card-body">
                    <form method="POST" action="{{ url('store') }}">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <div class="row">
                                        <div class="col col-sm-5">
                                                <div class="form-group">
                                                    <label><b>Seq No :</b></label>
                                                    <input type="number" name="seq" class="form-control" required min="1">
                                                    @if(session()->has('error'))
                                                        <span class="text-danger"><b>{{ session()->get('error') }}</b></span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col col-sm-7">
                                                <label><b>Published :</b></label>
                                                <select name="published" class="form-control">
                                                    <option value="1">Published</option>
                                                    <option value="2">Hidden</option>
                                                </select>
                                            </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="row">
                                        <div class="col">
                                                <div class="form-row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label><b>Minutes:</b></label>
                                                            <input type="number" name="minutes" class="form-control">
                                                        </div>    
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label><b>Seconds:</b></label>
                                                            <input type="number" name="seconds" class="form-control" required>
                                                        </div>    
                                                    </div>
                                                </div>
                                            </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label><b>Page Name:</b></label>
                                        <input type="text" name="name" class="form-control" required>
                                    </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label><b>Url Iframe:</b></label>
                                        <textarea type="text" name="url" class="form-control" required rows="3"></textarea>
                                        <span class="text-danger">* include http:// or https://</span>
                                    </div>
                            </div>
                        </div>
                        <hr>
                        <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Save</button>
                        <button type="reset" class="btn btn-dark">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

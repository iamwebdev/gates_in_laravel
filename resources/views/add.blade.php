@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Private Resources</div>

                <div class="panel-body">
                    Add Confidential Data
                    <form action="add" method="POST">
                        @csrf
                        <input type="text" name="datacon">
                        <input type="submit" name="" value="Save">
                    </form>
                </div>
                @if(Session::has('done'))
                    <h1>Data Saved</h1>
                @endif
                @if(Session::has('undone'))
                    <h1>You dont have rights to add data</h1>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
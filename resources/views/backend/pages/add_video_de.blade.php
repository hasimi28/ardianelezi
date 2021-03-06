@extends('backend.adm_master')


@section('content')

    <div class="page-title">
        <div>
            <h1><i class="fa fa-edit"></i> Form Components</h1>
            <p>Bootstrap default form components</p>
        </div>
        <div>
            <ul class="breadcrumb">
                <li><i class="fa fa-home fa-lg"></i></li>
                <li>Forms</li>
                <li><a href="#">Add Video Gjermanisht</a></li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="row">
                    <div class="col-lg-10 col-md-offset-1">
                        <div class="well bs-component">
                            <form class="form-horizontal" id="forma" action="{{route('videomanagerde.store')}}" method="POST">
                                {{ csrf_field() }}

                                <fieldset>
                                    <legend>Add Video Gjermanisht</legend>
                                    <div class="form-group">

                                        <label class="col-lg-2 control-label" for="select">Kategoria</label>
                                        <div class="col-lg-10">

                                            <select class="form-control" id="select" name="video__category_id">
                                                @foreach($cat as $c)
                                                    <option value="{{$c->id}}">{{$c->name}}</option>
                                                @endforeach

                                            </select>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-lg-2 control-label" for="inputEmail">Titulli Videos</label>
                                        <div class="col-lg-10">
                                            <input class="form-control" name="title" id="email" type="text" placeholder="Titulli Videos">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label" for="inputPassword">ID Youtube Video</label>
                                        <div class="col-lg-10" >
                                            <input class="form-control" id="password" type="text" name="youtube_id" placeholder="ID Youtube Video">
                                        <br>

                                        </div>
                                    </div>



                                    @if ($errors->any())
                                        <div class="alert alert-danger" id="ajaxResponse">

                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    <div class="form-group">
                                        <div class="col-lg-10 col-lg-offset-2">

                                            <input class="btn btn-primary" type="submit" id="submit" value="Shtoje">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-offset-2 load"></div><br>
                                    <div class="col-12 col-md-offset-2  edit_alert " style="color:white;padding:10px;">
                                        <ul>


                                        </ul>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')



@endsection
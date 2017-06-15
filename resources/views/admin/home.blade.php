@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">

                    <li><a href="{{ url('admin/article') }}" class="btn btn-lg btn-success col-xs-12">管理文章</a></li>
                    <li><a href="{{ url('admin/comment') }}" class="btn btn-lg btn-success col-xs-12">管理评论</a></li>
                    <li><a href="{{ url('admin/catetory') }}" class="btn btn-lg btn-success col-xs-12">管理分类</a></li>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
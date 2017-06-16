@extends('admin.home')

@section('left-article', 'active')

@section('main')
@include('editor::head')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">编辑一篇文章</div>
                <div class="panel-body">

                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>新增失败</strong> 输入不符合要求<br><br>
                            {!! implode('<br>', $errors->all()) !!}
                        </div>
                    @endif
                    <form action="{{ url('admin/article/'.$article->id)}}" method="post">
                        {{ method_field('PUT') }}
                        {!! csrf_field() !!}
                        <input type="text" name="title" class="form-control" required="required" value="{{$article->title}}">
                        <br>
                        <select class="form-control" name='cate_id' required="required">
                        <option value='0'>选择分类</option>
                        {{!! $cate_list !!}}
                        </select>
                        <br>
                        <div class="editor">
                        <textarea name="body" id='myEditor' rows="10" class="form-control" required="required">{{$article->body}}</textarea>
                        </div>
                        <br>
                        <button class="btn btn-lg btn-info">编辑文章</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
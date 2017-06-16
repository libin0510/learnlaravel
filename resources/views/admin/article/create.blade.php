@extends('admin.home')

@section('left-article', 'active')

@section('main')
@include('editor::head')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">新增一篇文章</div>
                <div class="panel-body">

                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>新增失败</strong> 输入不符合要求<br><br>
                            {!! implode('<br>', $errors->all()) !!}
                        </div>
                    @endif

                    <form action="{{ url('admin/article') }}" method="POST">
                        {!! csrf_field() !!}
                        <input type="text" name="title" class="form-control" required="required" placeholder="请输入标题">
                        <br>
                        <select class="form-control" name='cate_id' required="required">
                        <option value='0'>选择分类</option>
                        {{!! $cate_list !!}}
                        </select>
                        <br>
                        <div class="editor">
                        <textarea id='myEditor' name="body" rows="10" class="form-control" required="required" placeholder="请输入内容"></textarea>
                        </div>
                        <br>
                        <button class="btn btn-lg btn-info">新增文章</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
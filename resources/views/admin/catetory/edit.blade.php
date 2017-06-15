@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">编辑评论</div>
                <div class="panel-body">

                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>编辑失败</strong> 输入不符合要求<br><br>
                            {!! implode('<br>', $errors->all()) !!}
                        </div>
                    @endif
                    <form action="{{ url('admin/catetory/'.$catetory->id)}}" method="post">
                        {{ method_field('PUT') }}
                        {!! csrf_field() !!}     
                        分类名称：<input type="text" name="cate_name" class="form-control" required="required" value="{{$catetory->cate_name}}">
                        <br>  
                        父级分类：                 
                        <select class="form-control" name='pid'>
                        <option value='0'>---</option>
                        {{!! $cate_list !!}}
                        </select>
                        <br>                        
                        <button class="btn btn-lg btn-info">编辑分类</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
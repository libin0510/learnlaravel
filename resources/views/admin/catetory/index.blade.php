@extends('admin.home')

@section('left-catetory', 'active')

@section('main')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">分类管理</div>
                <div class="panel-body">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            {!! implode('<br>', $errors->all()) !!}
                        </div>
                    @endif

                    <table class="table table-bordered">
                      <caption><a href="{{ url('admin/catetory/create') }}" style="float: left" class="btn btn-lg btn-primary">新增</a></caption>
                      <thead>
                        <tr>
                          <th>id</th>
                          <th>名称</th>
                          <th>pid</th>
                          <th>操作</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach ($catetories as $catetory)
                        <tr>
                          <td>{{$catetory->id}}</td>
                          <td>{{$catetory->cate_name}}</td>
                          <td>{{$catetory->pid}}</td>
                          <td><a href="{{ url('admin/catetory/'.$catetory->id.'/edit') }}" class="btn btn-success">编辑</a>
                        <form action="{{ url('admin/catetory/'.$catetory->id) }}" method="POST" style="display: inline;">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger">删除</button>
                        </form></td>
                        </tr>
                      @endforeach 
                      </tbody>
                    </table>

             </div>
            </div>
         {{ $catetories->render() }}
        </div>
    </div>
</div>
@endsection
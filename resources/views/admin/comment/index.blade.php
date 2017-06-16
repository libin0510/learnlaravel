@extends('admin.home')

@section('left-comment', 'active')

@section('main')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">评论管理</div>
                <div class="panel-body">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            {!! implode('<br>', $errors->all()) !!}
                        </div>
                    @endif

                    @foreach ($data as $comment)
                        <hr>
                        <div class="comment">
                            <h4>{{ $comment->hasOneArticle->title }}</h4>
                            <div class="content">
                                <p>
                                    {{ $comment->content }}
                                </p>
                            </div>
                        <span>{{ $comment->nickname }}</span><span> 发表于：</span><span>{{ $comment->updated_at }}</span>
                        
                        <div style="Float:right">
                        <a href="{{ url('admin/comment/'.$comment->id.'/edit') }}" class="btn btn-success">编辑</a>
                        <form action="{{ url('admin/comment/'.$comment->id) }}" method="POST" style="display: inline;">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger">删除</button>
                        </form>
                        </div>
                        </div>
                    @endforeach                    
                </div>
            </div>
         {!! $data->render() !!}
        </div>
    </div>
</div>
@endsection
@extends('admin.home')

@section('left-comment', 'active')

@section('main')
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
                    <span>{{$comment->hasOneArticle->title}}</span>                    
                        <br>
                    <span>{{ $comment->nickname }}</span><span> </span><span>{{ $comment->updated_at }}</span>
                        <br>
                    <form action="{{ url('admin/comment/'.$comment->id)}}" method="post">
                        {{ method_field('PUT') }}
                        {!! csrf_field() !!}                        
                        <textarea name="content" rows="10" class="form-control" required="required">{{$comment->content}}</textarea>
                        <br>                        
                        <button class="btn btn-lg btn-info">编辑评论</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
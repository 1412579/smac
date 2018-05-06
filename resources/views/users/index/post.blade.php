@extends('users.thi')
@section('content')

    <div class="container">
        <section>
            <div class="row">
                <div class="col-md-8">
                    <article class="blog-post">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>               
                      <li class="breadcrumb-item"><a href="#">{{ $baiviet->title }}</a></li>
                    </ol>
                        <div class="blog-post-image">
                        
                            <a href="post.html"><img src="{{asset('/public/thumbnail/'.$baiviet->thumbnail) }}" alt=""></a>
                            
                        </div>
                        <div class="blog-post-body">
                            <h2><a href="post.html">{{ $baiviet->title }}</a></h2>
                            <div class="post-meta"><span>by <a href="#"><?php
                                    $name = DB::table('teams')->select('TenNhom')->where('id',$baiviet->idNhom)->first();
                                    echo $name->TenNhom;
                                ?></a></span><span><i class="fa fa-clock-o"></i>{!! $baiviet->created_at !!}</span><span><i class="fa fa-eye"></i> <a href="#"></a></span></div>
                            <div class="blog-post-text">

                                {!! $baiviet->content !!}
                            </div>
                        </div>
                    </article>

                </div>
@endsection
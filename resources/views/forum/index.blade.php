@extends('layouts.app')

@section('content')
    <div class="row" style="margin-top: 15px;">
        <div class="col">
            <h2>Вопросы и ответы</h2>
        </div>
    </div>
    <div class="row" style="margin-top: 15px;">

        <div class="col-12">
            <form>
                <div class="form-row">
                    <div class="col-12 col-md-9">
                        <input type="text" class="form-control" placeholder="Как работает...">
                    </div>
                    <div class="col-auto">
                        <input type="submit" class="btn btn-success" value="Найти" style="margin-right: 5px;"/>
                        <a class="float-right btn btn-success" href="{{url('/insider/forum/create/')}}"><i
                                    class="icon ion-plus-round"></i>&nbsp;Задать вопрос</a>
                    </div>

                </div>
            </form>
        </div>
    </div>
    <div class="row" style="margin-top: 15px;">

        <div class="col-12">
            <div class="card-deck">
                @foreach ($threads as $thread)
                    <div class="card"
                         style="min-width: 280px; width: 50%; border-left: 5px solid #28a745;">

                        <div class="card-body" style="background-color: rgba(255,255,255,0.9);">
                            <div class="row">
                                <div class="col">
                                    <h5 style="margin-top: 15px; font-weight: 300;"
                                        class="card-title">
                                        <a href="{{url('/insider/forum/'.$thread->id)}}">{{$thread->name}}</a>
                                        </h5>
                                    <p>
                                        @foreach($thread->tags as $tag)
                                            <span class="badge badge-secondary badge-light"
                                                  style="font-size: 1.2rem;">{{$tag->name}}</span>
                                        @endforeach
                                    </p>
                                    <p style="margin-bottom: 0;">
                                        <small class="text-muted">Задан: {{$thread->created_at->format('H:i d.m.Y')}}, {{$thread->user->name}}</small>
                                    </p>
                                </div>
                                <div class="col">
                                    <table class="table" border="0">
                                        <tr>
                                            <td>
                                                <h4 class="lead"
                                                    style="text-align: center;">{{$thread->posts()->count()-1}}<br>
                                                    <small>ответов</small>
                                                </h4>
                                            </td>
                                            <td>
                                                <h4 class="lead"
                                                    style="text-align: center;">{{$thread->posts->first()->getVotes()}}
                                                    <br>
                                                    <small>голосов</small>
                                                </h4>
                                            </td>
                                            <td>
                                                <h4 class="lead" style="text-align: center;">{{$thread->visits}}<br>
                                                    <small>просмотров</small>
                                                </h4>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>


                        </div>
                    </div>
                @endforeach
            </div>
        </div>


    </div>

@endsection
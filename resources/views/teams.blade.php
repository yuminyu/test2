<!-- resources/views/teams.blade.php -->
@extends('layouts.app')
@section('content')
    <!-- Bootstrapの定形コード… -->
    <div class="card-body">
        <div class="card-title">
            投稿フォーム
        </div>
        <!-- バリデーションエラーの表示に使用-->
    	@include('common.errors')
        <!-- バリデーションエラーの表示に使用-->
        <!-- 投稿フォーム -->
        @if( Auth::check() )
        <form action="{{ url('teams') }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}
            <!-- チーム名 -->
            <div class="form-group">
                チーム名
                <div class="col-sm-6">
                    <input type="text" name="team_name" class="form-control">
                </div>
            </div>
            <!--　登録ボタン -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-primary">
                        Save
                    </button>
                </div>
            </div>
        </form>
        @endif
    </div>
    <!-- 全てのチームリスト -->
    @if (count($wawa) > 0)
       <div class="card-body">
           <div class="card-body">
               <table class="table table-striped task-table">
                   <!-- テーブルヘッダ -->
                   <thead>
                       <th>チーム一覧</th>
                       <th>オーナー</th>
                       <th>参加人数</th>
                       <th>詳細</th>
                       <th>参加</th>
                       <th>編集</th>
                   </thead>
                   <!-- テーブル本体 -->
                   <tbody>
                       @foreach ($wawa as $wawa_no_hitotu)
                           <tr>
                               <!-- チーム名 -->
                               <td class="table-text">
                                   <div>{{ $wawa_no_hitotu->team_name }}</div>
                               </td>
                                <!-- チームオーナー -->
                               <td class="table-text">
                                   <div>{{ $wawa_no_hitotu->user->name }}</div>
                               </td>
                               <!-- 所属人数 -->
                               <td class="table-text">
                                   <div>{{$wawa_no_hitotu->members()->count()}}人参加中</div>
                               </td>
                               <!-- 詳細ボタン -->
                               <td class="table-text">
                               <a href="{{ url('teams/'.$wawa_no_hitotu->id) }}" class="btn btn-danger">詳細</a>
                               </td>
				                <!-- チーム参加ボタン -->
                               <td class="table-text">
                                @if(Auth::check())
                                @if(Auth::id() != $wawa_no_hitotu->user_id && $wawa_no_hitotu->members()->where('user_id',Auth::id())->exists() !== true)
                               <form action="{{ url('team/'.$wawa_no_hitotu->id) }}" method="GET">
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-danger">
                                    参加
                                    </button>
                                </form>
                                @endif
                                @endif
                               </td>
                               <!-- チーム編集ボタン-->
                               <td class="table-text">
                               @if(Auth::check()&& Auth::id() == $wawa_no_hitotu->user_id )
                                    <form action="{{ url('teamedit/'.$wawa_no_hitotu->id) }}" method="GET">
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-danger">
                                        編集
                                        </button>
                                    </form>	
                                @endif
                               </td>
                           </tr>
                       @endforeach
                   </tbody>
               </table>
           </div>
       </div>		
   @endif
@endsection
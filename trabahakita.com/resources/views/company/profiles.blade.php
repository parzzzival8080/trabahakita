@extends('layouts.app')
@section('content')
    
<div class="card">
    <div class="card-header">
        <h2>COMPANY PROFILES</h2>
        <div class="card-body">
            <div class="card-text">
                @if(count($profile) > 0)
                @foreach($profile as $profiles)
                @if($profiles->status_update == '1')
                    <div class="card" style="margin-top:10px">
                    <div class="card-header">
                        <div class="card-title">
                                <h1>{{$profiles->company_name}}</h1>
                            </div></div>
                        <div class="card-body">
                            <div class="card-text">
                                <h4>
                                        ADDRESS:{{$profiles->adress}}    
                                </h4>
                                <h4>
                                        Email:{{$profiles->email}}
                                </h4>
                               
                               <h4>
                                    Representative:{{$profiles->company_rep}}
                               </h4>
                               <h4>
                                    Posts:
                                    @if(count($post) > 0 )
                                       @php
                                            $count = DB::table('posts')->where(['company_id' => $profiles->id])->get();
                                            echo $count->count();
                                       @endphp
                                        @endif
                               </h4>
                               
                               
                               
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-info">Visit</button>
                            </div>
                            

                        </div>
                        
                    </div>
                    @endif
                @endforeach
                @endif
            </div>
        </div>
    </div>
</div>


@endsection
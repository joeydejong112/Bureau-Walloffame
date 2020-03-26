<div class="form-group" style="margin-bottom: 0px;text-align:center">
            <label for="text">{{$users->rank}} Likes</label>
            @include('errors/flash')
        </div>

    @if(Auth::user()->klas == $users->klas)

            @if(Auth::user()->klas_vote == 1)
           
            
            @else
             <div class="form-group" style="margin-bottom: 0px;text-align:center">
                <label for="text">{{$users->rank}} Likes</label>
                @include('errors/flash')
            </div>
            @endif
            
    @endif








                <form class="likes_form" method="POST" action="{{ action('Updateusers@Like',[
                    'id'=> $users->id,
                    'rank' =>$users->rank,
                    'authid'=>Auth::user()->id,
                    'klas'=>$users->klas
                    ])}}">
                        @csrf
                        <div class="form-group" style="margin-bottom: 0px">
                            <label for="text">{{$users->rank}} Likes</label>
                            @include('errors/flash')
                        </div>
                        <button type="submit" class="button button-like">
                            <i class="fa fa-heart"></i>
                            <span>Like</span>
                        </button>
                    </form>
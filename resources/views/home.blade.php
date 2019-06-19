 @extends('layouts.app')
@section('content')
<div class="container">
        <div class="row">
            <a href="/question/create">
               <div class="box-color-grey">+ Create New Question</div>  
            </a>
        </div>
        <div class="row justify-content-center mb-10">
        <div class="col-md-8">
            
            @foreach ($questions as $item)
            <div class="card mtb-10">
            <div class="card-header" onclick="">
                 <div class="d-flex justify-content-between"> Q. <?php echo $item->title ?>
                 <span class="d-flex justify-content-end">
                    <div class="mlr-10 d-flex">
                        {{$item->up_votes}} <i class='far fa-thumbs-up ml-5' style="color:blue"></i>
                    </div>
                    <div class="mlr-10 d-flex align-items-center">
                        {{$item->down_votes}} <i class='far fa-thumbs-down ml-5'  style="color:grey"></i>
                    </div>
                </span>
                </div> 
            </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="container">     
                        <div class="question-body"> {{$item->description}} </div>
                    </div>
                </div>
            </div>
            
            <div class="mb-30">
                <div class="text-center">
                <a class="btn btn-primary" href="#collapse{{$item->id}}" role="button"  data-toggle="collapse" aria-expanded="false" aria-controls="collapse{{$item->id}}">
                        Add answer
                    </a>
                    <a href="/expanded-view/{{$item->id}}" class="btn btn-secondary">
                        <div class=""> View Answer(s)</div>  
                    </a>
                    <div class="collapse" id="collapse{{$item->id}}">
                    <div class="card card-body mt-10">
                    <form method="POST" action="/answers/post/{{$item->id}}">
                            @csrf
                            <div class="form-group row">
                                <label for="description" class="col-md-3 col-form-label text-md-right">{{ __('Enter your answer :') }}</label>
    
                                <div class="col-md-9">
                                    <textarea id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" required autocomplete="description" autofocus> </textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                </div>
                                <div class="col-auto">
                                    <button type="submit" class="btn">submit </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
            @endforeach
        
        </div>
    </div>
</div>
@endsection

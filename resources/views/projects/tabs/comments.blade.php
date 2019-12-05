<!-- Add Comment -->
<div class="row mt-3 pt-3">
    <div class="col-md-6 mx-auto">
        <h4 class="text-center pb-2">Add Comment</h4>
        <form action="{{ route('comments.store') }}" method="POST" novalidate>
            @csrf
            <div class="form-group row">
                <div class="col-md-12">
                    <label for="body">Body</label>
                </div>

                <div class="col-md-12">
                    <textarea id="body" type="text" class="form-control @error('body') is-invalid @enderror" name="body" value="{{ old('body') }}" required autocomplete="body" autofocus rows="3"></textarea>

                    @error('body')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <input type="hidden" name="commentable_type" value="App\Project">
                <input type="hidden" name="commentable_id" value="{{ $project->id }}">

            </div>

            <div class="form-group row">
                <div class="col-md-12">
                    <label for="url">Url (Proof of work done) </label>
                </div>

                <div class="col-md-12">
                    <textarea id="url" type="text" class="form-control @error('url') is-invalid @enderror" name="url" value="{{ old('url') }}" required autocomplete="url" autofocus rows="2" placeholder="e.g, https://www.new-comment.com"></textarea>

                    @error('url')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                    {{-- <a href="/companies">Back</button> --}}
                </div>
            </div>
        </form>
    </div>
</div>


<!-- List of comments -->
<div class="row">
    <div class="col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2 col-sm-12 col-xs-12">

        <!-- Fluid width widget -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <span class="fas fa-comment"></span>
                    Recent Comments
                </h3>
            </div>
            <div class="panel-body">
                <ul class="media-list">
                    @foreach ($comments as $comment)
                    <li class="media">
                            <div class="media-left">
                                <img src="http://placehold.it/60x60" class="img-circle">
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">
                                    {{ $comment }}
                                    <br>
                                    <small>
                                    commented on {{ $comment->created_at }}
                                    </small>
                                </h4>
                                <p>
                                    {{ $comment->body }}
                                </p>
                                <div class="bold">Proof:<div>
                                <p>
                                    <a href="{{ $comment->url }}">{{ $comment->url }}</a>
                                </p>
                            </div>
                        </li>
                    @endforeach
                </ul>
                {{-- <a href="#" class="btn btn-default btn-block">More Events »</a> --}}
            </div>
        </div>
        <!-- End fluid width widget -->

    </div>
</div>

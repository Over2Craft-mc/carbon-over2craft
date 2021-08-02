@extends('layouts.app')

@section('title', trans('messages.home'))

@section('content')


    <script src="http://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <script>
        particlesJS.load('particles-js', '{{ theme_asset('particles.json') }}', null);
    </script>

    <div class="home-background mb-4 ">
        <div id="particles-js" style="background-image: url('{{ theme_asset('img/logo.png') }}'); background-repeat: no-repeat; background-size: 20%; background-position: 50% 14%;"></div>
    </div>
    <div class="hr-minecraft" style="margin-top: -22px;">
        <div class="hr-minecraft-middle home-hr">
            <div class="container h-100">
                <div class="row justify-content-center align-items-center text-center text-white h-100">
                    <div class="col-md-8">
                        <div id="ip-address" class="">
                          <span class="arrow">
                            <span id="ip-address-text" onclick="let el = document.getElementById('ip-address-to-copy'); console.log(el); el.select(); document.execCommand('copy');">
                              Jouez maintenant en 1.17<br>
                              <span>
                                <i class="fa fa-gamepad" aria-hidden="true"></i>
                                  <input type="text" style="width: 206px; background: transparent; color: white; border: transparent" value="play.over2craft.com" id="ip-address-to-copy">
                              </span>
                            </span>
                          </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="hr-minecraft-bottom"></div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                @foreach($posts as $post)
                    <div class="post-preview mb-3">
                        @if($post->image !== null)
                            <img src="{{ $post->imageUrl() }}" class="post-img img-fluid" alt="{{ $post->title }}">
                        @endif

                        <div class="post-body">
                            <h3><a href="{{ route('posts.show', $post->slug) }}">{{ $post->title }}</a></h3>
                            @if($post->image === null)
                                <p>{{ Str::limit(strip_tags($post->content), 250, '...') }}
                                    <a href="{{ route('posts.show', $post->slug) }}">{{ trans('messages.posts.read') }}</a>
                                </p>
                            @endif

                            {{ trans('messages.posts.posted', ['date' => format_date($post->published_at), 'user' => $post->author->name]) }}
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="col-md-4">
                @if(config('theme.discord-id'))
                    <iframe src="https://discordapp.com/widget?id={{ config('theme.discord-id') }}&theme=dark" title="Discord" height="500" class="discord-widget shadow mb-3" allowtransparency="true"></iframe>
                @endif

                @if(config('theme.twitter'))
                    <div class="twitter-widget shadow">
                        <a class="twitter-timeline" data-theme="dark" data-height="500" href="{{ config('theme.twitter') }}">Tweets by Azuriom</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://platform.twitter.com/widgets.js" async></script>
@endpush


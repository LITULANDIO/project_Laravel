 @extends('layouts.app')

 <div class="title m-b-md">
                    Laravel by Litus
                </div>

                <div class="links">
                    @foreach ($links as $link => $text)
                        <a href="{{$link}}"> {{$text}}</a>
                    @endforeach
                </div>
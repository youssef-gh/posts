@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            @if ($posts->count())
            @foreach ($posts as $post)
                <div class="mb-4">
                    <a href="{{ route('users.posts', $post->user) }}" class="font-bold"> {{ $post->user->name }} </a> <span class="text-gray-600 text-sm"> 
                        {{ $post->created_at->diffForHumans() }}</span>
                    <p class=""> {{ $post->body }}</p>
                    

                    <div class="flex items-center">
                        {{-- you should be signed in to be able to like and dislike (logic) --}}
                        @auth
                        
                        @if (!$post->likedBy(auth()->user()))
                                
                            <form action="{{ route('posts.likes', $post) }}" method="post" class="mr-1">
                                @csrf
                                <button type="submit" class="text-blue-500">Like</button>
                            </form>
                        @else
                            
                            <form action="{{ route('posts.unlikes', $post) }}" method="post" class="mr-1">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-blue-500">Dislike</button>
                            </form>
                        @endif

                        @endauth


                        <span>{{ $post->likes->count()  }} {{ Str::plural('like', $post->likes->count()) }}</span>
                    </div>

                    {{-- delete button --}}
                    @can('delete', $post)
                        
                        <div >
                            <form action="{{ route('posts.destroy', $post) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-blue-500">DELETE</button>
                            </form>
                        </div>
                    @endcan

                </div>



                
            @endforeach

            {{ $posts->links() }}

        @else
        {{ $posts->count() }}
            <p>there is no posts</p>
            
        @endif
        </div>
    </div>
@endsection
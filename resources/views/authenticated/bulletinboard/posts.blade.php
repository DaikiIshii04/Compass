@extends('layouts.sidebar')

@section('content')
<div class="board_area w-100 border m-auto d-flex">
  <div class="post_view w-75 mt-5">
    <p class="w-75 m-auto">投稿一覧</p>
    @foreach($posts as $post)
    <div class="post_area border w-75 m-auto p-3">
      <p><span>{{ $post->user->over_name }}</span><span class="ml-3">{{ $post->user->under_name }}</span>さん</p>
      <p><a href="{{ route('post.detail', ['id' => $post->id]) }}">{{ $post->post_title }}</a></p>

      <!-- サブカテゴリーを表示 -->
      @foreach($post->subCategories as $sub_category)
      <div class="sub_category_label">
      <label>{{ $sub_category->sub_category }}</label>
      </div>
      @endforeach

      <div class="post_bottom_area d-flex">
        <div class="d-flex post_status">
          <div class="mr-5">
            <i class="fa fa-comment"></i><span class="">{{ $post_comment->commentCounts($post->id)->get()->count() }}</span>
          </div>
          <div>
            @if(Auth::user()->is_Like($post->id))
            <p class="m-0"><i class="fas fa-heart un_like_btn" post_id="{{ $post->id }}"></i><span class="like_counts{{ $post->id }}">{{$like->likeCounts($post->id) }}</span></p>
            @else
            <p class="m-0"><i class="fas fa-heart like_btn" post_id="{{ $post->id }}"></i><span class="like_counts{{ $post->id }}">{{$like->likeCounts($post->id) }}</span></p>
            @endif
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
  <div class="other_area border w-25">
    <div class="border m-4">
      <div class="custom-link">
  <a href="{{ route('post.input') }}">投稿</a>
</div>
<div class="search-form">
  <input type="text" placeholder="キーワードを検索" name="keyword" class="search-input" form="postSearchRequest">
  <input type="submit" value="検索" class="search-button" form="postSearchRequest">
</div>

<input type="submit" name="like_posts" class="category-btn like-posts" value="いいねした投稿" form="postSearchRequest">
<input type="submit" name="my_posts" class="category-btn my-posts" value="自分の投稿" form="postSearchRequest">

      <div class="category_search">カテゴリー検索
      <!-- <ul>
        @foreach($categories as $category)
        <li class="main_categories" category_id="{{ $category->id }}"><span>{{ $category->main_category }}</span></li>
        <ul>
          @foreach($category->SubCategories as $sub_category)
          <ul>
            <li><input type="submit" name="category_word" class="category_btn" value="{{$sub_category->sub_category}}" form="postSearchRequest"></li>
          </ul>
          @endforeach
        </ul>
        @endforeach
      </ul> -->
<ul>
  @php
    $firstCategory = true;
  @endphp
  @foreach($categories as $category)
    <li class="main_categories" category_id="{{ $category->id }}">
      <span onclick="toggleSubCategories(this)">
        {{ $category->main_category }}
        @if($firstCategory)
          <i class="arrow-icon fa fa-chevron-up"></i>
          <i class="arrow-icon fa fa-chevron-down" style="display: none;"></i>
          @php
            $firstCategory = false;
          @endphp
        @else
          <i class="arrow-icon fa fa-chevron-down"></i>
          <i class="arrow-icon fa fa-chevron-up" style="display: none;"></i>
        @endif
      </span>
      <ul>
        @foreach($category->SubCategories as $sub_category)
          <li class="sub_categories">
            <input type="submit" name="category_word" class="category_btn" value="{{$sub_category->sub_category}}" form="postSearchRequest">
          </li>
        @endforeach
      </ul>
    </li>
  @endforeach
</ul>


<style>
  .arrow-icon {
    margin-right: 5px;
  }
</style>

<script>
  function toggleSubCategories(mainCategory) {
    var subCategories = mainCategory.nextElementSibling.querySelectorAll('.sub_categories');
    var arrowIcons = mainCategory.querySelectorAll('.arrow-icon');
    subCategories.forEach(function(subCategory) {
      subCategory.style.display = subCategory.style.display === 'none' ? 'block' : 'none';
    });
    arrowIcons.forEach(function(arrowIcon) {
      arrowIcon.classList.toggle('fa-chevron-up');
      arrowIcon.classList.toggle('fa-chevron-down');
    });
  }
</script>

<script>
  // 初期状態で開いているメインカテゴリの矢印アイコンを修正
  document.addEventListener("DOMContentLoaded", function() {
    var mainCategories = document.querySelectorAll('.main_categories');
    mainCategories.forEach(function(mainCategory) {
      var subCategories = mainCategory.nextElementSibling;
      var arrowIcons = mainCategory.querySelectorAll('.arrow-icon');
      if (subCategories.style.display !== 'none') {
        arrowIcons.forEach(function(arrowIcon) {
          arrowIcon.classList.toggle('fa-chevron-up');
          arrowIcon.classList.toggle('fa-chevron-down');
        });
      }
    });
  });
</script>
</div>
    </div>
  </div>
  <form action="{{ route('post.show') }}" method="get" id="postSearchRequest"></form>
</div>
@endsection

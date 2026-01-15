@extends('layouts.app')
<h1 class="text-3xl font-bold text-red-500">
  STARTER TEMPLATE HEADER
</h1>
<section class="section-padding bg-gray-100">
  <p>Univerzális szekció</p>
</section>
@section('content')
  @include('partials.page-header')

  @if (! have_posts())
    <x-alert type="warning">
      {!! __('Sorry, no results were found.', 'sage') !!}
    </x-alert>

    {!! get_search_form(false) !!}
  @endif

  @while(have_posts()) @php(the_post())
    @includeFirst(['partials.content-' . get_post_type(), 'partials.content'])
  @endwhile

  {!! get_the_posts_navigation() !!}
@endsection

@section('sidebar')
  @include('sections.sidebar')
@endsection

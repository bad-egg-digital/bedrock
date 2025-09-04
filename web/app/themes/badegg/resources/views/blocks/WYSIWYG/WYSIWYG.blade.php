@extends('layouts.block', [
  'block' => $block,
  'data' => $data,
])

@section('block-content')
  @if(@$data['wysiwyg'])
    <div class="main-wysiwyg wysiwyg">
      {!! @$data['wysiwyg'] !!}
    </div>
  @endif
@overwrite


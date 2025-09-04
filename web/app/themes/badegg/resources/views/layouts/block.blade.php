@if(@$data['section_anchor_id'])
  <div id="{{ $data['section_anchor_id'] }}" class="section-anchor"></div>
@endif

<section
  id="{{ $block['id'] }}"
  class="badegg-block
    @if(@$data['section_classes']) {{ implode(' ', $data['section_classes']) }} @endif
    {{ @$block['className'] }}
  ">

  <div class="section-{{ $block['name'] }}-inner">
    @if(@$data['heading'] || @$data['blurb'])
      <div class="section-intro section-medium section-zero-top container container-large bg-watermarked-content {{ @$data['knockout'] }} align-{{ @$data['intro_alignment'] ?: 'centre' }} ">
        <div class="section-intro-inner wysiwyg">
          @if(@$data['overline']) <p class="overline secondary"><strong>{{ $data['overline'] }}</strong></p> @endif
          <h2 class="section-title">{{ @$data['heading'] }}</h2>
          <p>{{ @$data['blurb'] }}</p>
        </div>
      </div>
    @endif

    <div class="container container-{{ @$data['container_width'] ?: 'large' }} block-content bg-watermarked-content">
      @yield('block-content')
    </div>

    @if(@$data['links'] || @$data['blurb_footer'])
      <div class="section-footer section-medium section-zero-bottom container container-narrow align-{{ @$data['footer_alignment'] ?: 'centre' }} wysiwyg bg-watermarked-content {{ @$data['knockout'] }}">

        <p>{{ @$data['blurb_footer'] }}</p>

        @if(@$data['links'])
          <div class="btn-wrap">
            @foreach($data['links'] as $link)
              @include('components.button', $link)
            @endforeach
          </div>
        @endif
      </div>
    @endif

    @if(@$data['bg_image'])
      <div class="bg-watermarked-image" style="opacity: {!! (@$data['bg_opacity'] ?: 30) * 0.01 !!}">
        {!! $ImageSrcset->render([
          'image' => $data['bg_image'],
          'name' => 'hero',
          'lazy' => true,
        ]) !!}
      </div>
    @endif
  </div>

  @if(@$data['angle_status'])
    @if(@$data['angle_position'] == 'both')
      @foreach(['top', 'bottom'] as $position)
        @include('partials.angle', [
          'position' => $position,
          'direction' => @$data['angle_direction'],
          'tint' => @$data['angle_tint'],
          'colour' => @$data['angle_colour'] ?: 'white',
        ])
      @endforeach
    @else
      @include('partials.angle', [
        'position' => @$data['angle_position'],
        'direction' => @$data['angle_direction'],
        'tint' => @$data['angle_tint'],
        'colour' => @$data['angle_colour'] ?: 'white',
      ])
    @endif
  @endif

</section>

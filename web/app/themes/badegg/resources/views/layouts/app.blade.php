<!doctype html>
<html @php(language_attributes())>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @php(do_action('get_header'))
    @php(wp_head())
  </head>

  <body @php(body_class())>
    @php(wp_body_open())

    <div id="app">
      <a class="visually-hidden" href="#main">
        {{ __('Skip to content', 'sage') }}
      </a>

      <div class="wrapper section-has-angle section-has-angle-bottom">

        @include('sections.header.header')

        <main id="main" class="main">
          @yield('content')
        </main>

        @hasSection('sidebar')
          <aside class="sidebar">
            @yield('sidebar')
          </aside>
        @endif

        <div class="last-slice angle-slice-wrap bottom">
          <div class="angle-slice small bottom right"></div>
        </div>
      </div>

      @include('sections.footer.footer')
    </div>

    @php(do_action('get_footer'))
    @php(wp_footer())
  </body>
</html>

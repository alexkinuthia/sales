<html>

	@include('template.header')
	@yield('headerinf')



	@yield('navigation')

	@yield('content')


<script type="text/javascript">
    var csrf = $('meta[name=_token]').attr('content');

    $.ajaxSetup({
        beforeSend: function(request) {
            return request.setRequestHeader('X-CSRF-Token', csrf);
        }
    });
</script>
@include('template.footer')
	@yield('footerinf')
</html>
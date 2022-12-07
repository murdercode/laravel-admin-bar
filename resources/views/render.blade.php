@auth

	<style type="text/css">
        body {
            margin-top: 35px !important;
        }

        .admin-bar {
			@if(config('admin-bar.style.theme') == 'light')
               background-color: #f8f9fa;
            color: #323f52;
			@else
               background-color: #343a40;
            color: #f8f9fa;
			@endif
               position: fixed;
            left: 0;
            top: 0;
            z-index: 999999;
            padding: 5px 10px;
            height: 35px;
            display: flex;
            align-items: center;
            width: 100%;
            font-size: 15px;
        }

        .admin-bar > .wrapper {
            width: 100%;
            max-width: {{config('admin-bar.style.max-width') }};
            margin: auto;
            display: flex;
        }

        .admin-bar > .wrapper > div {
            flex-grow: 1;
        }

        .admin-bar > .wrapper > div.right {
            text-align: right;
        }

        .admin-bar > .wrapper > div.right * + * {
            margin-left: 1rem;
        }

        .admin-bar > .wrapper > div > a {
	        opacity:0.8;
            color: inherit;
            text-decoration: none;
            font-weight: bold;
        }

        .admin-bar > .wrapper > div > a:hover {
            text-decoration: underline;
	        opacity: 1;
        }
	</style>

	<div class="admin-bar">
		<div class="wrapper">
			<div class="left">

				@if(config('admin-bar.style.show3labsLogo'))
					<x-admin-bar::icons.3labs-logo/>
				@endif

				{{__('Welcome back')}},
				<strong>
					{{auth()->user()->name}}
				</strong>
			</div>

			<div class="right">

				@if(isset($postEmptyCacheLink))
					<a href="{{$postEmptyCacheLink}}">
						<x-admin-bar::icons.trash/>
						{{__('Clear Cache')}}
					</a>
				@endif

				@if(isset($postEditLink))
				<a href="{{$postEditLink}}">
					<x-admin-bar::icons.edit/>
					{{__('Edit Post')}}
				</a>
				@endif

				<a target="_blank" href="{{config('admin-bar.config.adminUrl')}}">
					{{__('Control Panel')}}
				</a>
			</div>
		</div>
	</div>

@endauth
@auth

	<style>
        .admin-bar {
			@if(config('admin-bar.style.theme') == 'light')
             background-color: #f8f9fa;
            color: #323f52;
			@else
             background-color: #343a40;
            color: #f8f9fa;
			@endif

			@if(config('admin-bar.style.position') == 'top')
			      top: 0;
			@else
			   bottom: 0;
			@endif
			 position: fixed;

            left: 0;
            z-index: 999999;
            padding: 5px 10px;
            height: 35px;
            display: flex;
            align-items: center;
            width: 100%;
            font-size: {{ config('admin-bar.style.font-size') }};
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

        .admin-bar > .wrapper a {
            opacity: 0.8;
            color: inherit;
            text-decoration: none;
            font-weight: bold;
        }

        .admin-bar > .wrapper a:hover {
            text-decoration: underline;
            opacity: 1;
        }

        .admin-bar ul {
	        margin:0;
	        list-style: none;
        }
        .admin-bar ul li {
	        display: inline-block;
	        margin-left: 1rem;
		}

        .sr-only {
            position: absolute;
            width: 1px;
            height: 1px;
            padding: 0;
            margin: -1px;
            overflow: hidden;
            clip: rect(0, 0, 0, 0);
            white-space: nowrap;
            border-width: 0;
        }

        .hamburger, .close-button {
	        display:none;
        }


        /* Smartphone */
        @media (max-width: 768px) {
	        .hamburger, .close-button {
		        display: inline-block;
	        }
	        .admin-bar ul {
		        margin:0 !important;
		        padding:0 !important;
	        }
            .admin-bar ul li {
	            display: block;
	            margin-left: 0;
	            text-align: center;
	            font-size:18px;
	            padding-top: 1rem;
                padding-bottom: 1rem;
            }
            .admin-bar ul > * + * {
                border-top-width: 1px;
                border-bottom-width: 0px;
	            border-color: #4d4d4d;
            }
            .navbar {
                display: none;
            }
            .navbar:target {
                display: block;
	            position: fixed;
	            top: 0;
	            right: 0;
	            background: #343a40;
	            width:100%;
	            height:100%;
	            z-index: 99999;
	            padding:1rem;
            }


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

				<a class="hamburger" href="#navbar">
					<span class="sr-only">Open main menu</span>
					<x-admin-bar::icons.hamburger/>
				</a>

				<nav class="navbar" id="navbar" aria-label="Main menu">

					<a href="#" class="close-button">
						<span class="sr-only">Close main menu</span>
						<x-admin-bar::icons.close />
					</a>

					<ul>

					@if(isset($postEmptyCacheLink))
						<li>
						<a href="{{$postEmptyCacheLink}}">
							<x-admin-bar::icons.trash/>
							{{__('Clear Cache')}}
						</a>
						</li>
					@endif

					@if(isset($postEditLink))
<li>
						<a href="{{$postEditLink}}">
							<x-admin-bar::icons.edit/>
							{{__('Edit Post')}}
						</a>
						</li>
					@endif

							<li>
					<a target="_blank" href="{{config('admin-bar.config.adminUrl')}}">
						{{__('Control Panel')}}
					</a>
							</li>

					</ul>

				</nav>

			</div>
		</div>
	</div>

@endauth
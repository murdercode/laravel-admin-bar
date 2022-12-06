@auth

	<style type="text/css">
        body {
            margin-top: 40px !important;
        }

        .admin-bar {
            background: #0a001f;
            color: #fff;
            position: fixed;
            left: 0;
            top: 0;
            z-index: 999999;
            padding: 5px 10px;
            height: 40px;
            display: flex;
            align-items: center;
            width: 100%;
        }

        .admin-bar > .wrapper {
            width: 100%;
            max-width: {{config('admin-bar.style.max-width') }};
            margin: auto;
        }
	</style>

	<div class="admin-bar">
		<div class="wrapper">
			{{__('Welcome back')}},
			<strong>
				{{
                        auth()->user()->name
                }}
			</strong>
		</div>
	</div>

@endauth
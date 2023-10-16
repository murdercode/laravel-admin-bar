@auth
   <div class="admin-bar">
        <div class="wrapper">

            {{--3Labs Logo--}}
            @if(config('admin-bar.style.show3labsLogo'))
                <div class="3labs-logo">
                    <a target="_blank" href="{{config('admin-bar.config.adminUrl')}}">
                        <x-admin-bar::icons.3labs-logo/>
                    </a>
                </div>
            @endif

            {{--Create--}}
            @if(isset($postCreateLink))
                <div class="action-box">
                    <a href="{{$postCreateLink}}" target="_blank">
                        <x-admin-bar::icons.create/>
                        <span>
                            {{__('Create')}}
                        </span>
                    </a>
                </div>
            @endif
            {{--Edit--}}
            @if(isset($postEditLink))
                <div class="action-box">
                    <a href="{{$postEditLink}}" target="_blank">
                        <x-admin-bar::icons.edit/>
                        <span>
                            {{__('Edit')}}
                        </span>
                    </a>
                </div>
            @endif

            {{--Render Time--}}
            <div class="action-box">
                <x-admin-bar::icons.time/>
                <span>
                    {{$renderTime}}s
                </span>
            </div>
        </div>

       {{--User Avatar--}}
       <div class="user-icon" onclick="openAdminBar()">
           <img src="{{auth()->user()->avatar_url ?? auth()->user()->avatar_html}}"
                alt="{{auth()->user()->name}}" width="33"
                height="33">
       </div>

    </div>

   <script>
       function openAdminBar(){
            const wrapper = document.querySelector('.wrapper');

            wrapper.classList.toggle('open-wrapper');
       }
   </script>


   <style>
       .admin-bar svg {
           border-radius: 100%;
       }

       .admin-bar {
           background-color: #000;
           background: linear-gradient(91deg, rgba(255, 0, 0, 0.20) 3.84%, rgba(255, 0, 0, 0.00) 97.44%), #000;
           color: #f8f9fa;
           bottom: 10px;
           position: fixed;

           right: 10px;
           z-index: 999999;
           padding: 6px;
           display: flex;
           align-items: center;
           font-size: {{ config('admin-bar.style.font-size') }};
           border-radius: 9999px;
       }

       .admin-bar .wrapper {
           width: 100%;
           max-width: {{config('admin-bar.style.max-width') }};
           margin: auto;
           display: flex;
           align-items: center;
       }

       .action-box {
           display: flex;
           align-items: center;
           margin: 0 15px;

       }

       .action-box a{
           display: flex;
           align-items: center;
       }

       .action-box a:hover{
           text-decoration: underline;
       }

       .action-box span{
            margin-left: 4px;
       }

       .action-box svg{
           width:16px;
           height:16px;
           display: inline-block;
       }

       .user-icon img{
           border-radius: 100%;
           aspect-ratio: 1;
       }


       /* Smartphone */
       @media (max-width: 768px) {
           .admin-bar {
               display: flex;
               flex-direction: column;
           }

           .admin-bar .wrapper {
               flex-direction: column;
               display: none;
           }

           .open-wrapper {
               display: flex !important;
           }

           .action-box {
               display: flex;
               flex-direction: column;
               align-items: center;
               margin: 15px 0;
           }

           .action-box span{
               font-size: .8rem;
           }

           .action-box:not(:last-child) span {
               display: none;
           }

           .action-box svg{
               width:20px;
               height:20px;
               display: inline-block;
           }
       }

   </style>
@endauth

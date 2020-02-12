<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="userId" content="{{ Auth::check() ? Auth::user()->id : '' }}">
        
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <script src="//{{ Request::getHost() }}:6001/socket.io/socket.io.js"></script>

        <title>Laravel</title>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
        <!-- Fonts -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
        <!-- Styles -->
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
         <script>
           
           window.Laravel = {!! json_encode([

               'csrfToken' => csrf_token() ,
               
           ]) !!};

        </script>


<input type="hidden" id="receiver_id" value="{{auth()->id()}}" />
    </head>
    <body>

    
          <div id="app"  class="flex-center position-ref full-height">

            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        
                        <div class="collapse navbar-collapse navbar-brand," id="navbarSupportedContent">

                          <ul class="navbar-nav mr-auto navbar-brand,">
                           
                             <!--Notification -->

                             <notifications :userid="{{auth()->id()}}" :userssenders="{{auth()->user()->unreadNotifications}}" :countnotificaitons="{{count(auth()->user()->unreadNotifications)}}"></notifications>

                           
                          </ul>
                        
                        </div>

                      </nav>
                     

                 
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>

               
            @endif

 

         <div  style="margin-left:25%">
           
                 
            <test :userid="{{auth()->id()}}" :usertoken="222" ></test>
               
                
            </div>

            <!-- End id="app"  -->

        </div>

        <script>

              /*
            
                $(document).ready(function() {
                     
                     
                 
                     var userId= "{{ Auth::id() }}";
                     
                   
                     Echo.private('App.User.' + this.userid)
                        .notification((notification) => {
                            console.log(notification);
            
                                   
                }    );
         
     
                  });
     
                    
          */
                
     
                 </script>

       

        <script src="{{ asset('js/app.js') }}"></script>

     

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
    </body>
</html>

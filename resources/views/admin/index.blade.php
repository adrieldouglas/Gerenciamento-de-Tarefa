<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8"/> 
    <link rel="stylesheet" href="{{ url(mix('assets/css/reset.css')) }}"/>
    <link rel="stylesheet" href="{{ url(mix('assets/css/boot.css')) }}"/>
    <link rel="stylesheet" href="{{ url(mix('assets/css/login.css')) }}"/>
    <link rel="stylesheet" href="{{ url(mix('assets/css/bootstrap.css')) }}">
    <link rel="icon" type="image/png" href="{{ url('assets/logotipo/logotipo.png') }}"/>    
    <meta name="csrf-token" content="{{ csrf_token() }}">  

    <style type="text/css">
        video {
            object-fit: cover;
            width: 100vw;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
        }

    </style>

    <video playsinline autoplay muted loop poster="{{ url('assets/images/login_bg.png') }}">
    </video>

    <title>{{  $tit_login }}</title>

</head>
<body>
<div class="ajax_response"></div>
    <div class="container">
        <div class="row justify-content-start">
            <div class="col-md-5">
                <div class="card" style="margin-top: 10%; border-color: blue;">
                    <div class="card-header">Entrar - Gerenciamento de Tarefas</div>
                    <div class="card-body">                 
                         <form name="login" action="{{ route('admin.login.do') }}" method="post" autocomplete="off">                   
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="email" class="font-weight-bold">E-mail</label>
                                    <input id="email" type="email" class="form-control" name="email" placeholder="E-mail">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="password" class="font-weight-bold">Senha</label>
                                    <input id="password" type="password" class="form-control"
                                    name="password_check" placeholder="Senha">

                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-8">
                                    <button class="btn btn-outline-primary radius" data-toggle="tooltip" data-placement="right" title="Logar Agora">
                                     Logar
                                 </button>                                  
                             </div>
                         </div>
                     </form>
                 </div>
             </div>
         </div>
     </div>
 </div>

 <script src="{{ url(mix('assets/js/jquery.js')) }}"></script> 
 <script src="{{ url(mix('assets/js/login.js')) }}"></script>
 <script src="{{ url(mix('assets/js/bundle.js')) }}"></script> 

 <script>
    $(function () {
      $('[data-toggle="tooltip"]').tooltip()
  })
</script>

</body>
</html>

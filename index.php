<?php

// add config
require __DIR__ ."/Config.php";
// require da class
require __DIR__."/src/AuthGitHub.php";

// instanciando a class AuthGitHub
$gitoAuth = new AuthGitHub(CLIENT['client_id'], CLIENT['client_secret']);
 ?>


 <!DOCTYPE html>
 <html lang="pt-BR" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Login GitHub</title>
     <link rel="stylesheet" href="assets/css/style.css"/>
   </head>
   <body>
     <main class="container">
         <div class="content">
           <!-- verifica se o codigo retornado pela api existe -->
           <?php if(isset($_GET['code'])):
             // chama o metodo e armazena os dados retornado na variavel $auth
             $auth = $gitoAuth->auth();

             // verifica se foi retornado algun dado se não estar vazio
             if(!empty($auth)){
               // armazena os dados do user na $dataLogin
               $dataLogin = $gitoAuth->user($auth);
               ?>
              <!-- se tiver retornado os dados do usuário exibe os dados do usuário -->
               <section class="box-container">
                   <article class="box-login">
                       <div class="header">
                         <h1>Logado no Sistema</h1>
                         <a href="<?= CONF_URL_BASE ?>" >Sair</a>
                       </div>
                       <div class="content-user">
                           <img src="<?= $dataLogin->avatar_url; ?>"/>
                           <div>
                             <h2><?= $dataLogin->name; ?> <span>(<?= $dataLogin->login; ?>)</span></h2>
                             <p><?= $dataLogin->bio; ?></p>
                             <small><strong>Respos: </strong><?= $dataLogin->public_repos; ?></small>
                             <small><strong>Followers: </strong><?= $dataLogin->followers; ?></small>
                             <small><strong>Following: </strong><?= $dataLogin->following; ?></small>
                             <small><strong>Location: </strong><?= $dataLogin->location; ?></small>
                           </div>
                       </div>
                   </article>
               </section>
            <?php }?>
           <?php else: ?>
                <!-- exibe tela inicial de autenticação -->
               <section class="box-container">
                   <article class="box-login">
                       <h1>Entrar com Github</h1>
                       <a href="<?= URL_LINK ?>" class="btn-login"><i class="fab fa-github"></i>Login GitHub</a>
                   </article>
               </section>
           <?php endif; ?>
         </div>
     </main>
   </body>
      <!-- fontawesome -->
   <script src="https://kit.fontawesome.com/86f5b0a58f.js" crossorigin="anonymous"></script>
 </html>

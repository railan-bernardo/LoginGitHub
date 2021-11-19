


                    ##  AUTENTICAÇÃO USANDO API DO GITHUB




                    [![Maintainer](http://img.shields.io/badge/maintainer-@railan-bernardo-blue.svg?style=flat-square)](https://twitter.com/railanbernardo)
                    [![Source Code](http://img.shields.io/badge/source-railan-bernardo/logingithub-blue.svg?style=flat-square)](https://github.com/railan-bernardo/LoginGitHub)

                    [![Latest Version](https://img.shields.io/github/release/railan-bernardo/LoginGitHub.svg?style=flat-square)](https://github.com/railan-bernardo/LoginGitHub/releases)
                    [![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE)
                    
                    ## Sobre

                    Sistema de autenticação utilizando a api do github com php



                    ## Configuração

                    ``` php
                    <?php
                      //URL BASE
                      define("CONF_URL_BASE", "");

                      //URLs API
                      define("URL_API_TOKEN", "https://github.com/login/oauth/access_token");
                      define("URL_API_USER", "https://api.github.com/user");
                      define("URL_API_AUTH", "https://github.com/login/oauth/authorize");

                      //CLIENT CREDENTIALS
                      define("CLIENT",
                       ["client_id"=>"",
                       "client_secret"=>""
                      ]);

                      //LINK
                      define("URL_LINK", URL_API_AUTH . "?client_id=". CLIENT['client_id']);

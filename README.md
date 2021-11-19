


                    # AUTENTICAÇÃO USANDO API DO GITHUB



                    ## Sobre

                    Sistema de autenticação utilizando a api do github com php



                    #### Configuração

                    ```php
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
                      ```

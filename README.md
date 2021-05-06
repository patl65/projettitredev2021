<!-- Dans .env -->
APP_NAME=Latu
TODO:production qd fini
APP_ENV=local
APP_KEY=base64:xVHT+mj782Wqg248X1rx8zWBt376QOWCsaHM5VtLy+g=
APP_DEBUG=true
TODO: si en prod mettre l'extension  .fr 
APP_URL=http://latu.local

LOG_CHANNEL=stack
LOG_LEVEL=debug

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=latu
TODO:créa utilisateur et mot de passe
DB_USERNAME=root
TODO:créa utilisateur et mot de passe
DB_PASSWORD=

BROADCAST_DRIVER=log
CACHE_DRIVER=file
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

MEMCACHED_HOST=127.0.0.1

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

TODO:avec mailTrap ligne 29 à 34 voir site : https://mailtrap.io/
        MAIL_MAILER=smtp
        MAIL_HOST=smtp.mailtrap.io
        MAIL_PORT=2525
        MAIL_USERNAME=f697fc50418d49
        MAIL_PASSWORD=b76fe176171cd9
        MAIL_ENCRYPTION=tls
TODO:mettre mail Latu + créa comte dans MailTrap
MAIL_FROM_ADDRESS=patlay65@gmail.com
MAIL_FROM_NAME="${APP_NAME}"



TODO: pour rédac support Latu
un utilisateur ne peut pas être supprimé si il y a des articles à lui

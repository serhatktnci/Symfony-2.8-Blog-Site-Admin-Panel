Symfony2.8 Blog Site + Admin Panel

After draw the codes, we need to have some config

 # app/config/parameters.yml
parameters:
    database_host: 127.0.0.1
    database_port: null
    database_name: WebSiteDB
    database_user: root
    database_password: null
    mailer_transport: smtp
    mailer_host: 127.0.0.1
    mailer_user: mail@mail.com
    mailer_password: null
    secret: b5a8507db9c6c54c232511fa062f84c2ef0d840f


php app/console doctrine:schema:update --force

we create database charts with this code


we create new admin with this code

 php app/console fos:user:create admin admin@serhat.com admin

 php app/console fos:user:promote admin ROLE_ADMIN

It had used EasyAdmin in the Admin panel
====

A Symfony project created on April 14, 2017, 12:51 pm.

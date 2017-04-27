Symfony 2.8 Blog Site + Admin Panel

After draw the codes, we need to have some config

 # app/config/parameters.yml
parameters:
    
    database_host: 127.0.0.1
    
    database_port: null
    
    database_name: WebSiteDB 
   
    database_user: root
    
    database_password: null


php app/console doctrine:schema:update --force

we create database charts with this code


we create new admin with this code

 php app/console fos:user:create admin admin@serhat.com admin

 php app/console fos:user:promote admin ROLE_ADMIN

It had used EasyAdmin in the Admin panel


<table>
<thead>
<tr>
<th align="center"><strong>Catalog demo</strong></th>
<th align="center"><strong>Admin Panel demo</strong></th>
</tr>
</thead>
<tbody>
<tr>
<td align="center"><a href="http://i.hizliresim.com/DPANL3.png" target="_blank"><img src="http://i.hizliresim.com/DPANL3.png" alt="Catalog demo" data-canonical-src="http://i.hizliresim.com/DPANL3.png" style="max-width:100%;"></a></td>
<td align="center"><a href="http://i.hizliresim.com/Qanr6j.png" target="_blank"><img src="http://i.hizliresim.com/Qanr6j.png" alt="Admin Panel demo" data-canonical-src="http://i.hizliresim.com/Qanr6j.png" style="max-width:100%;"></a></td>
</tr></tbody></table>

====

A Symfony project created on April 14, 2017, 12:51 pm.

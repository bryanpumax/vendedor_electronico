
1->Base de  datos en  mysql  debemos  ejecutar estos pasos 
a->Pestaña sql ejecutar  ese  codigo  se  verifica si  se  creo en  la base  de  datos  con mismo nombre "Vendedor" y contraseña electronico
CREATE USER 'vendedor'@'%' IDENTIFIED VIA mysql_native_password USING '***';GRANT ALL PRIVILEGES ON *.* TO 'vendedor'@'%' REQUIRE NONE WITH GRANT OPTION MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;CREATE DATABASE IF NOT EXISTS `vendedor`;GRANT ALL PRIVILEGES ON `vendedor`.* TO 'vendedor'@'%';GRANT ALL PRIVILEGES ON `vendedor\_%`.* TO 'vendedor'@'%';
b->Se debe copiar y  pegar el codigo  sql de  archivo  estructurabdd.txt obviamente seleccionando la  base de  datos su tablas es  de  15.

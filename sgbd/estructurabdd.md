

CREATE TABLE tbl_usuario (
                id_usuario INT AUTO_INCREMENT NOT NULL,
                usuario_usuario VARCHAR(120) NOT NULL,
                pasword_usuario VARCHAR(300) NOT NULL,
                nombre_usuario VARCHAR(120) NOT NULL,
                apellido_usuario VARCHAR(120) NOT NULL,
                rol_id INT NOT NULL,
                rol VARCHAR(120) NOT NULL,
                PRIMARY KEY (id_usuario)
);


CREATE TABLE tmp_factura (
                id_factura INT AUTO_INCREMENT NOT NULL,
                usuario_tmp VARCHAR(120) NOT NULL,
                descuento_factura DECIMAL(10,2) NOT NULL,
                fecha_factura DATE NOT NULL,
                total_factura DECIMAL(10,2) NOT NULL,
                iva_factura DECIMAL(10,2) NOT NULL,
                hora_factura TIME NOT NULL,
                PRIMARY KEY (id_factura)
);


CREATE TABLE tbl_forma_pago (
                id_forma_pago INT AUTO_INCREMENT NOT NULL,
                tipo_pago VARCHAR(120) NOT NULL,
                PRIMARY KEY (id_forma_pago)
);


CREATE TABLE tbl_categoria (
                id_categoria INT AUTO_INCREMENT NOT NULL,
                nombre_categoria VARCHAR(120) NOT NULL,
                PRIMARY KEY (id_categoria)
);


CREATE TABLE tbl_producto (
                id_producto INT AUTO_INCREMENT NOT NULL,
                nombre_producto VARCHAR(120) NOT NULL,
                marca_producto VARCHAR(120) NOT NULL,
                serie_producto VARCHAR(120) NOT NULL,
                modelo_producto VARCHAR(120) NOT NULL,
                id_categoria INT NOT NULL,
                PRIMARY KEY (id_producto)
);


CREATE TABLE tbl_pais (
                id_pais INT AUTO_INCREMENT NOT NULL,
                cod_pais VARCHAR(10) NOT NULL,
                pais_pais VARCHAR(120) NOT NULL,
                PRIMARY KEY (id_pais)
);


CREATE TABLE tbl_provincia (
                id_provincia INT AUTO_INCREMENT NOT NULL,
                provincia_provincia VARCHAR(120) NOT NULL,
                id_pais INT NOT NULL,
                PRIMARY KEY (id_provincia)
);


CREATE TABLE tbl_canton (
                id_canton INT AUTO_INCREMENT NOT NULL,
                canton_canton VARCHAR(120) NOT NULL,
                id_provincia INT NOT NULL,
                PRIMARY KEY (id_canton)
);


CREATE TABLE tbl_parroquia (
                id_parroquia INT AUTO_INCREMENT NOT NULL,
                parroquia_parroquia VARCHAR(120) NOT NULL,
                id_canton INT NOT NULL,
                PRIMARY KEY (id_parroquia)
);


CREATE TABLE tbl_proveedor (
                id_proveedor INT AUTO_INCREMENT NOT NULL,
                cedula_provee VARCHAR(10) NOT NULL,
                nombre_provee VARCHAR(120) NOT NULL,
                apellido_provee VARCHAR(120) NOT NULL,
                telefono_provee VARCHAR(10) NOT NULL,
                correo_provee VARCHAR(220) NOT NULL,
                id_parroquia INT NOT NULL,
                direccion_provee VARCHAR(120) NOT NULL,
                PRIMARY KEY (id_proveedor)
);


CREATE TABLE detalle_kardex (
                id_detalle_kardex INT AUTO_INCREMENT NOT NULL,
                id_proveedor INT NOT NULL,
                id_producto INT NOT NULL,
                stock_total_kardex INT NOT NULL,
                precio_kardex DECIMAL(10,2) NOT NULL,
                estado_kardex VARCHAR(120) NOT NULL,
                stock_parcial_kardex INT NOT NULL,
                iva_producto VARCHAR(2) NOT NULL,
                descuento_kardex DECIMAL(10,2) NOT NULL,
                PRIMARY KEY (id_detalle_kardex)
);


CREATE TABLE tmp_detalle (
                id_detalle INT AUTO_INCREMENT NOT NULL,
                id_factura INT NOT NULL,
                id_detalle_kardex INT NOT NULL,
                id_imagen INT NOT NULL,
                cantidad INT NOT NULL,
                precio_unitario_cliente DECIMAL(10,2) NOT NULL,
                precio_total_cliente DECIMAL(10,2) NOT NULL,
                PRIMARY KEY (id_detalle)
);


CREATE TABLE tbl_imagen (
                id_imagen INT AUTO_INCREMENT NOT NULL,
                ruta VARCHAR(300) NOT NULL,
                color VARCHAR(130) NOT NULL,
                id_detalle_kardex INT NOT NULL,
                PRIMARY KEY (id_imagen)
);


CREATE TABLE tbl_clliente (
                id_cliente INT AUTO_INCREMENT NOT NULL,
                cedula_cliente VARCHAR(10) NOT NULL,
                nombre_cliente VARCHAR(120) NOT NULL,
                apellido_cliente VARCHAR(120) NOT NULL,
                telefono_cliente VARCHAR(120) NOT NULL,
                correo_cliente VARCHAR(220) NOT NULL,
                id_parroquia INT NOT NULL,
                direccion_cliente VARCHAR(120) NOT NULL,
                nombre_equipo VARCHAR(120) NOT NULL,
                PRIMARY KEY (id_cliente)
);


CREATE TABLE tbl_facturacion (
                id_facturacion INT AUTO_INCREMENT NOT NULL,
                n_factura VARCHAR(10) NOT NULL,
                id_cliente INT NOT NULL,
                iva_factura DECIMAL(10,2) NOT NULL,
                total_factura DECIMAL(10,2) NOT NULL,
                descuento_factura DECIMAL(10,2) NOT NULL,
                fecha_factura DATE NOT NULL,
                hora_factura TIME NOT NULL,
                id_forma_pago INT NOT NULL,
                PRIMARY KEY (id_facturacion)
);


CREATE TABLE detalle_factura (
                id_detalle_factura INT AUTO_INCREMENT NOT NULL,
                id_facturacion INT NOT NULL,
                id_detalle_kardex INT NOT NULL,
                id_imagen INT NOT NULL,
                cantidad_cliente INT NOT NULL,
                precio_unitario_cliente DECIMAL(10,2) NOT NULL,
                precio_total_cliente DECIMAL(10,2) NOT NULL,
                PRIMARY KEY (id_detalle_factura)
);


ALTER TABLE tmp_detalle ADD CONSTRAINT tmp_factura_tmp_detalle_fk
FOREIGN KEY (id_factura)
REFERENCES tmp_factura (id_factura)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE tbl_facturacion ADD CONSTRAINT tbl_forma_pago_tbl_facturacion_fk
FOREIGN KEY (id_forma_pago)
REFERENCES tbl_forma_pago (id_forma_pago)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE tbl_producto ADD CONSTRAINT tbl_categoria_tbl_producto_fk
FOREIGN KEY (id_categoria)
REFERENCES tbl_categoria (id_categoria)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE detalle_kardex ADD CONSTRAINT tbl_producto_detalle_kardex_fk
FOREIGN KEY (id_producto)
REFERENCES tbl_producto (id_producto)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE tbl_provincia ADD CONSTRAINT tbl_pais_tbl_provincia_fk
FOREIGN KEY (id_pais)
REFERENCES tbl_pais (id_pais)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE tbl_canton ADD CONSTRAINT tbl_provincia_tbl_canton_fk
FOREIGN KEY (id_provincia)
REFERENCES tbl_provincia (id_provincia)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE tbl_parroquia ADD CONSTRAINT tbl_canton_tbl_parroquia_fk
FOREIGN KEY (id_canton)
REFERENCES tbl_canton (id_canton)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE tbl_clliente ADD CONSTRAINT tbl_parroquia_tbl_clliente_fk
FOREIGN KEY (id_parroquia)
REFERENCES tbl_parroquia (id_parroquia)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE tbl_proveedor ADD CONSTRAINT tbl_parroquia_tbl_proveedor_fk
FOREIGN KEY (id_parroquia)
REFERENCES tbl_parroquia (id_parroquia)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE detalle_kardex ADD CONSTRAINT tbl_proveedor_detalle_kardex_fk
FOREIGN KEY (id_proveedor)
REFERENCES tbl_proveedor (id_proveedor)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE detalle_factura ADD CONSTRAINT detalle_kardex_detalle_factura_fk
FOREIGN KEY (id_detalle_kardex)
REFERENCES detalle_kardex (id_detalle_kardex)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE tbl_imagen ADD CONSTRAINT detalle_kardex_tbl_imagen_fk
FOREIGN KEY (id_detalle_kardex)
REFERENCES detalle_kardex (id_detalle_kardex)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE tmp_detalle ADD CONSTRAINT detalle_kardex_tmp_detalle_fk
FOREIGN KEY (id_detalle_kardex)
REFERENCES detalle_kardex (id_detalle_kardex)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE tbl_facturacion ADD CONSTRAINT tbl_clliente_tbl_facturacion_fk
FOREIGN KEY (id_cliente)
REFERENCES tbl_clliente (id_cliente)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE detalle_factura ADD CONSTRAINT tbl_facturacion_detalle_factura_fk
FOREIGN KEY (id_facturacion)
REFERENCES tbl_facturacion (id_facturacion)
ON DELETE NO ACTION
ON UPDATE NO ACTION;
 

DELIMITER $$
 CREATE PROCEDURE factura(login int,usuario varchar(120),n_facturas varchar(120))
BEGIN
DECLARE total decimal(10,2);
declare iva decimal(10,2);
declare hora time;
DECLARE id int;
IF(login=0)THEN
IF NOT EXISTS(SELECT * from tmp_factura where fecha_factura=curdate() and usuario_tmp=usuario and 
DATE_FORMAT(hora_factura,"%H")>=01   and DATE_FORMAT(hora_factura,"%H")<=23)THEN
INSERT into tmp_factura(id_factura,usuario_tmp, descuento_factura, fecha_factura, total_factura, iva_factura, hora_factura) VALUES(null,usuario,0,curdate(),0,0,CURTIME());
end if;
ELSE
IF NOT EXISTS(SELECT * from tbl_facturacion where tbl_facturacion.fecha_factura=curdate() and estado_facturacion!="Verificacion" and tbl_facturacion.id_cliente=usuario and 
DATE_FORMAT(tbl_facturacion.hora_factura,"%H")>=01   and DATE_FORMAT(tbl_facturacion.hora_factura,"%H")<=23)THEN
INSERT into tbl_facturacion(tbl_facturacion.id_facturacion, tbl_facturacion.id_cliente,tbl_facturacion.descuento_factura,tbl_facturacion.fecha_factura,tbl_facturacion.total_factura, tbl_facturacion.iva_factura, tbl_facturacion.hora_factura,tbl_facturacion.n_factura,tbl_facturacion.id_forma_pago,tbl_facturacion.estado_facturacion) VALUES(null,usuario,0,curdate(),0,0,CURTIME(),n_facturas,1,"Nueva");
 
end if;
end if;
END;


$$ DELIMITER ;



DELIMITER $$
CREATE PROCEDURE detalle_facturas(login int,id_detalle_kardexs int ,id_imagens int ,id_facturas int ,cantidads int ,precio_unitario_clientes double(10,2) )
BEGIN
DECLARE total double(10,2);
DECLARE totalf double(10,2);
DECLARE resultado double(10,2);
DECLARE total_facturas double(10,2);
set total=cantidads*precio_unitario_clientes;
IF(login=0)THEN 
if NOT EXISTS(SELECT * from tmp_detalle WHERE id_factura=id_facturas and id_imagen=id_imagens)then 
INSERT into tmp_detalle(id_detalle,id_detalle_kardex,id_imagen,id_factura,cantidad,precio_unitario_cliente,precio_total_cliente) VALUES (null,id_detalle_kardexs,id_imagens,id_facturas,cantidads,precio_unitario_clientes,total);
ELSE 
UPDATE tmp_detalle SET cantidad=cantidads , precio_total_cliente=total where id_factura=id_facturas and id_imagen=id_imagens;
 
END IF;

ELSE
if NOT EXISTS(SELECT * from detalle_factura WHERE detalle_factura.id_facturacion=id_facturas and id_imagen=id_imagens)then 
INSERT into detalle_factura(detalle_factura.id_detalle_factura,id_detalle_kardex,id_imagen,id_facturacion,detalle_factura.cantidad_cliente,precio_unitario_cliente,precio_total_cliente) VALUES (null,id_detalle_kardexs,id_imagens,id_facturas,cantidads,precio_unitario_clientes,total);
 SELECT sum(cantidad_cliente*precio_unitario_cliente) INTO total_facturas  from detalle_factura where id_facturacion=id_facturas;
 UPDATE tbl_facturacion SET iva_factura=(total_facturas*0.12), total_factura=(total_facturas+(total_facturas*0.12)) where id_facturacion=id_facturas;
ELSE 
UPDATE detalle_factura SET detalle_factura.cantidad_cliente=cantidads , detalle_factura.precio_total_cliente=total where detalle_factura.id_facturacion=id_facturas and id_imagen=id_imagens;
 SELECT sum(cantidad_cliente*precio_unitario_cliente) INTO total_facturas  from detalle_factura where id_facturacion=id_facturas;
 UPDATE tbl_facturacion SET iva_factura=(total_facturas*0.12), total_factura=(total_facturas+(total_facturas*0.12)) where id_facturacion=id_facturas;
END IF;

end if;
END;
$$ DELIMITER ;












DROP FUNCTION cantidad_productos;
DELIMITER $$
CREATE FUNCTION cantidad_productos(login int,id_facturas int,usuario varchar(120))RETURNS int
BEGIN
DECLARE total int;
IF(login=0)then 
SELECT COUNT(*) into total from tmp_detalle INNER JOIN tmp_factura on tmp_detalle.id_factura=tmp_factura.id_factura WHERE tmp_detalle.id_factura=id_facturas AND tmp_factura.fecha_factura=curdate()   and DATE_FORMAT(hora_factura,"%H")<=23 and tmp_factura.usuario_tmp=usuario;
ELSE
SELECT COUNT(*) into total from detalle_factura INNER JOIN tbl_facturacion on detalle_factura.id_facturacion=tbl_facturacion.id_facturacion WHERE detalle_factura.id_facturacion=id_facturas and tbl_facturacion.fecha_factura=curdate() and DATE_FORMAT(hora_factura,"%H")<=23 and tbl_facturacion.id_cliente=usuario;
end if;
RETURN total;
END;
$$  DELIMITER ;


DELIMITER
    $$
CREATE PROCEDURE insertar_cliente(
    login INT,
    cedula_clientes VARCHAR(10),
    nombre_clientes VARCHAR(120),
    apellido_clientes VARCHAR(120),
    telefono_clientes VARCHAR(10),
    correo_clientes VARCHAR(120),
    id_parroquias int ,
    direccion_clientes VARCHAR(120),usuario_usuarios varchar(120),pasword_usuarios varchar(300))
BEGIN
IF(login=0)then 
IF NOT EXISTS(SELECT * FROM tbl_clliente INNER JOIN tbl_usuario on tbl_usuario.cedula_usuario=tbl_clliente.cedula_cliente  WHERE cedula_cliente=cedula_clientes)THEN
INSERT into tbl_clliente(id_cliente,cedula_cliente,nombre_cliente,apellido_cliente,telefono_cliente,correo_cliente,id_parroquia,direccion_cliente)VALUES(null,cedula_clientes,nombre_clientes,apellido_clientes,telefono_clientes,correo_clientes,id_parroquias,direccion_clientes);

        INSERT into tbl_usuario(id_usuario,usuario_usuario,pasword_usuario,nombre_usuario,apellido_usuario,cedula_usuario,rol_id,rol)VALUES(null,usuario_usuarios,md5(pasword_usuarios),nombre_clientes,apellido_clientes,cedula_clientes,1,"cliente");
END if;


end if;
    END
        ; $$
    DELIMITER
        ;
DELIMITER $$
CREATE PROCEDURE factura_eliminacion_tmp(id_facturas int,n_facturas varchar(10),id_clientes int ,iva_facturas decimal(10,2),total_facturas decimal(10,2),hora_facturas time,id_forma_pagos int,estado_facturacions varchar(120) )
BEGIN
DECLARE id int;
IF EXISTS(SELECT * from tmp_factura where tmp_factura.id_factura=id_facturas)then 
INSERT into tbl_facturacion (id_facturacion,n_factura,id_cliente,iva_factura,total_factura,descuento_factura,fecha_factura,hora_factura,id_forma_pago,estado_facturacion)VALUES(null,n_facturas,id_clientes,iva_facturas,total_facturas,0,curdate(),hora_facturas,id_forma_pagos,estado_facturacions);
SELECT id_facturacion into id 
from tbl_facturacion where tbl_facturacion.id_cliente=id_clientes and tbl_facturacion.fecha_factura=curdate() and tbl_facturacion.hora_factura=hora_facturas;
INSERT into detalle_factura(id_detalle_factura,id_facturacion,id_detalle_kardex,id_imagen,cantidad_cliente,precio_unitario_cliente,precio_total_cliente)
SELECT null,id,tmp_detalle.id_detalle_kardex,tmp_detalle.id_imagen,tmp_detalle.cantidad,tmp_detalle.precio_unitario_cliente,tmp_detalle.precio_total_cliente FROM tmp_detalle where tmp_detalle.id_factura=id_facturas;
 
DELETE FROM tmp_detalle where tmp_detalle.id_factura=id_facturas;
DELETE FROM tmp_factura WHERE tmp_factura.id_factura=id_facturas;

end if;
END
$$ DELIMITER ;
CREATE TABLE categoria (
    categoriaID INT NOT NULL,
    tipo VARCHAR(20) NOT NULL,
    PRIMARY KEY (categoriaID)
    );


CREATE TABLE fruta (
    frutaID INT NOT NULL,
    categoriaID INT NOT NULL,
    nombre VARCHAR(20) NOT NULL,
    precio DECIMAL(5,2) NOT NULL,
    stock INT NOT NULL,
    tipo VARCHAR(20) NOT NULL,
    PRIMARY KEY (frutaID),
    FOREIGN KEY (categoriaID) REFERENCES categoria (categoriaID)
    );



DROP TABLE producttb;
CREATE TABLE producttb (
    frutaID INT NOT NULL,
    categoriaID INT NOT NULL,
    product_name VARCHAR(20) NOT NULL,
    product_price DECIMAL(5,2) NOT NULL,
    product_image VARCHAR(20) NOT NULL,
    stock INT NOT NULL,
    PRIMARY KEY (frutaID),
    FOREIGN KEY (categoriaID) REFERENCES categoria (categoriaID)
    );




DELETE FROM producttb;

INSERT INTO producttb(frutaID,categoriaID,product_name, product_price, product_image,stock) VALUES 
        (1,1,"Fresas", 3.50, "./assets/img/products/product-img-1.jpg",100),
        (2,1,"Uva", 2.50, "./assets/img/products/product-img-2.jpg",100),
        (3,1,"Limones",2, "./assets/img/products/product-img-3.jpg",100),
        (4,1,"Kiwi", 2.70, "./assets/img/products/product-img-4.jpg",100),
        (5,1,"Manzanas", 2.20, "./assets/img/products/product-img-5.jpg",100),
        (6,1,"Frambuesas", 5.00, "./assets/img/products/product-img-6.jpg",100);



CREATE TABLE cliente (
    clienteID INT NOT NULL,
    nombre VARCHAR(20) NOT NULL,
    primerAp VARCHAR(20) NOT NULL,
    segundoAp VARCHAR(20) NOT NULL,
    telefono VARCHAR(9) NOT NULL,
    direccion VARCHAR(50) NOT NULL,
    correo VARCHAR(50) NOT NULL,
    PRIMARY KEY (clienteID)
    );

CREATE TABLE metodopago (
    metodoID INT NOT NULL,
    tipoPago VARCHAR(20) NOT NULL,
    PRIMARY KEY (metodoID)
);


CREATE TABLE pedido (
    pedidoID INT NOT NULL,
    clienteID INT NOT NULL,
    metodoID INT NOT NULL,
    precioTotal INT(20) NOT NULL,
    PRIMARY KEY (pedidoID),
    FOREIGN KEY (clienteID) REFERENCES cliente (clienteID),
    FOREIGN KEY (metodoID) REFERENCES metodoPago (metodoID)
    );

CREATE TABLE lineapedido (
    pedidoID INT NOT NULL,
    frutaID INT NOT NULL,
    cantidad INT NOT NULL,
    PRIMARY KEY (frutaID, pedidoID),
    FOREIGN KEY (frutaID) REFERENCES fruta (frutaID),
    FOREIGN KEY (pedidoID) REFERENCES pedido (pedidoID)

);


DELETE FROM categoria;
INSERT INTO categoria VALUES (1,"Ácidas");
INSERT INTO categoria VALUES (2,"Semiácidas");
INSERT INTO categoria VALUES (3,"Neutras");
INSERT INTO categoria VALUES (4,"Dulces");



DELETE FROM fruta;
INSERT INTO fruta VALUES(1,1,"Naranja",10,100,"Ácidas");
INSERT INTO fruta VALUES(2,1,"Manzana",7.46,25,"Ácidas");
INSERT INTO fruta VALUES(3,2,"Ciruela",1.18,40,"Semiácidas");
INSERT INTO fruta VALUES(4,2,"Melocotón",4.7,4,"Semiácidas");
INSERT INTO fruta VALUES(5,3,"Coco",8.34,25,"Neutras");
INSERT INTO fruta VALUES(6,3,"Aguacate",4,73,"Neutras");
INSERT INTO fruta VALUES(7,4,"Plátano",3.2,0,"Dulces");


DELETE FROM cliente;
INSERT INTO cliente VALUES(1,"Antonio","García","Alfaro","123456789","c/ Calamar nº13 3ºA","antonio@gmail.es");
INSERT INTO cliente VALUES(2,"Marcos","Serrano","Martínez","435432674","c/ Invent nº35 1ºA","marcos@gmail.es");
INSERT INTO cliente VALUES(3,"Laura","Gómez","Sánchez","987654321","c/ Pintor nº13 2ºB","laura@gmail.es");
INSERT INTO cliente VALUES(4,"María","González","Saez","111111111","c/ Ayala nº13 1ºB","maria@gmail.es");


DELETE FROM metodopago;
INSERT INTO metodopago VALUES(1,"Tarjeta");
INSERT INTO metodopago VALUES(2,"Paypal");
INSERT INTO metodopago VALUES(3,"Bizum");


DELETE FROM pedido;
INSERT INTO pedido VALUES (1,1,1,"78");
INSERT INTO pedido VALUES (2,2,1,"92");
INSERT INTO pedido VALUES (3,3,1,"32");
INSERT INTO pedido VALUES (4,2,2,"46");


DELETE FROM lineapedido;
INSERT INTO lineapedido VALUES (1,2,3);
INSERT INTO lineapedido VALUES (2,4,2);
INSERT INTO lineapedido VALUES (3,5,1);






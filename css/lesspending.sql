CREATE TABLE monto (
    id INT NOT NULL,
    monto INT,
    PRIMARY KEY (id)
);

CREATE TABLE Tipo_Gasto (
    id INT NOT NULL PRIMARY KEY,
    tipo_gasto VARCHAR(255)
);

INSERT INTO Tipo_Gasto (id, tipo_gasto) VALUES
(1, 'Restaurante/ Comida'),
(2, 'Gasolina/ Coche'),
(3, 'Cuidado Personal'),
(4, 'Entretenimiento'),
(5, 'Transporte'),
(6, 'Bebidas / Fiestas'), 
(7, 'Compras'),
(8, 'Teléfono'),
(9, 'Cuidado de la salud'),
(10, 'Mascotas'),
(11, 'Videojuegos'),
(12, 'Hogar');


CREATE TABLE Tipo_Pago (
    id INT NOT NULL PRIMARY KEY,
    tipo_pago VARCHAR(255)
);

INSERT INTO Tipo_Pago (id, tipo_pago) VALUES
(1, 'Efectivo'),
(2, 'Tarjeta de Crédito'),
(3, 'Tarjeta de Débito'),
(4, 'Transferencia');

CREATE TABLE Tipo_Ingreso (
    id INT NOT NULL PRIMARY KEY,
    tipo_ingreso VARCHAR(255)
);

INSERT INTO Tipo_Ingreso (id, tipo_ingreso) VALUES
(1, 'Salario'),
(2, 'Ventas'),
(3, 'Alquiler'),
(4, 'Préstamo'),
(5, 'Inversión'),
(6, 'Pensión');


CREATE TABLE Usuario (
    id INT NOT NULL,
    nombre VARCHAR(255),
    apellido VARCHAR(255),
    Correo VARCHAR(255),
    contraseña INT,
    telefono VARCHAR(20),
    fecha_nacimiento DATE,
    usuario INT NOT NULL,
    suscripcion INT,
    PRIMARY KEY (id, usuario),
    FOREIGN KEY (contraseña) REFERENCES Autenticacion(id),
    FOREIGN KEY (suscripcion) REFERENCES Suscripcion(id)
);

CREATE TABLE Ingresos (
    id INT NOT NULL,
    usuario INT,
    monto INT,
    fecha_ingreso DATE,
    PRIMARY KEY (id),
    FOREIGN KEY (usuario) REFERENCES Usuario(id),
    FOREIGN KEY (monto) REFERENCES Monto(id)
);

CREATE TABLE Egresos (
    id INT NOT NULL,
    usuario INT,
    tipo_gasto INT,
    tipo_pago INT,
    monto INT,
    PRIMARY KEY (id),
    FOREIGN KEY (usuario) REFERENCES Usuario(id),
    FOREIGN KEY (tipo_gasto) REFERENCES Tipo_Gasto(id),
    FOREIGN KEY (tipo_pago) REFERENCES Tipo_Pago(id),
    FOREIGN KEY (monto) REFERENCES Monto(id)
);

CREATE TABLE Operacion (
    id INT NOT NULL,
    usuario INT,
    fecha_operacion DATE,
    tipo_gasto INT,
    tipo_pago INT,
    monto INT,
    PRIMARY KEY (id),
    FOREIGN KEY (usuario) REFERENCES Usuario(id),
    FOREIGN KEY (tipo_gasto) REFERENCES Tipo_Gasto(id),
    FOREIGN KEY (tipo_pago) REFERENCES Tipo_Pago(id),
    FOREIGN KEY (monto) REFERENCES Monto(id)
);

CREATE TABLE Autenticacion (
    id INT NOT NULL PRIMARY KEY,
    contraseña VARCHAR(255)
);


CREATE TABLE Suscripcion (
    id INT NOT NULL PRIMARY KEY,
    nombre VARCHAR(255),
    pago_suscripcion DECIMAL(10, 2),
    vigencia DATE
);

INSERT INTO Suscripcion (id, nombre, pago_suscripcion, vigencia) VALUES 
(1, 'Básico', 0.00, '2024-12-31'),
(2, 'Premium', 40.00, '2023-12-31'),
(3, 'Ultra', 130.00, '2023-11-30');

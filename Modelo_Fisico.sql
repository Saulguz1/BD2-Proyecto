

CREATE KEYSPACE Proyecto with replication={‘class’:’SimpleStrategy’, ‘replication_factor’:’3’};

USE Proyecto;

#Reporte de operaciones realizadas por un cuentahabiente 

CREATE TABLE Transaccion_by_CuentaHabiente(
    nombre TEXT,
    apellido TEXT,
    cui TEXT,
    email TEXT,
    fechareg DATE,
    genero TEXT,
    institucion TEXT,
    abreviatura TEXT,
    tipocuenta TEXT,
    saldoinicial INT,
    montotransf INT,
    fechatransf DATE,
    PRIMARY KEY ((cui),institucion,tipocuenta,fechatransf)
) WITH CLUSTERING ORDER BY (institucion desc, tipocuenta desc,fechatransf desc);

COPY Transaccion_by_CuentaHabiente(nombre, apellido, cui, email, fechareg, genero, institucion, 
abreviatura,tipocuenta, saldoinicial, montotransf,fechatransf) FROM 'Transaccion_by_CuentaHabiente.csv'
 WITH HEADER=TRUE AND DELIMITER=';';

SELECT * FROM Transaccion_by_CuentaHabiente WHERE cui = '2344960856';
SELECT COUNT(*) FROM Transaccion_by_CuentaHabiente WHERE cui = '2344960856';


# Reporte de totales de créditos y débitos para una institución financiera. 
CREATE TABLE Debito_by_Institucion(
    institucion TEXT, 
    abreviatura TEXT,
    montotransf INT,
    fechatransf DATE,
    PRIMARY KEY ((institucion),fechatransf,montotransf)
) WITH CLUSTERING ORDER BY (fechatransf desc,montotransf desc);

COPY Debito_by_Institucion(institucion, abreviatura, montotransf,fechatransf) 
FROM 'Transaccion_by_Institucion1.csv' WITH HEADER=TRUE AND DELIMITER=';';


SELECT * FROM Debito_by_Institucion WHERE institucion = 'Banco Promerica' ;
SELECT COUNT(*) FROM Debito_by_Institucion WHERE institucion = 'Banco Promerica';

CREATE TABLE Credito_by_Institucion(
    institucion TEXT, 
    abreviatura TEXT,
    montotransf INT,
    fechatransf DATE,
    PRIMARY KEY ((institucion),fechatransf,montotransf)
) WITH CLUSTERING ORDER BY (fechatransf desc,montotransf desc);

COPY Credito_by_Institucion(institucion, abreviatura, montotransf,fechatransf) 
FROM 'Transaccion_by_Institucion2.csv' WITH HEADER=TRUE AND DELIMITER=';';


SELECT * FROM Credito_by_Institucion WHERE institucion = 'Banco Promerica' ;
SELECT COUNT(*) FROM Credito_by_Institucion WHERE institucion = 'Banco Promerica';

#Reporte de cuentahabientes 
CREATE TABLE CuentaHabiente(
    nombre text, 
    apellido text,
    cui text,
    email text,
    fechareg date,
    genero text,
    institucion text,
    abreviatura text,
    tipocuenta text,
    saldoinicial INT
    PRIMARY KEY ((cui),institucion,fechareg)
) WITH CLUSTERING ORDER BY (institucion desc, fechareg desc);

COPY CuentaHabiente(nombre,apellido,cui,email,fechareg,genero,institucion,abreviatura,tipocuenta,saldoinicial)
 FROM 'CuentaHabiente1.csv' WITH HEADER=TRUE AND DELIMITER=';';
COPY CuentaHabiente(nombre,apellido,cui,email,fechareg,genero,institucion,abreviatura,tipocuenta,saldoinicial) 
FROM 'CuentaHabiente2.csv' WITH HEADER=TRUE AND DELIMITER=';';

SELECT * FROM CuentaHabiente;
SELECT COUNT(*) FROM CuentaHabiente;



# Reporte de instituciones bancarias 
CREATE TABLE Institucion(
    institucion text,
    abreviatura text,
    PRIMARY KEY (institucion)
) ;

COPY Institucion(institucion,abreviatura) FROM 'Institucion1.csv' WITH HEADER=TRUE AND DELIMITER=';';
COPY Institucion(institucion,abreviatura) FROM 'Institucion2.csv' WITH HEADER=TRUE AND DELIMITER=';';

SELECT * FROM Institucion;
SELECT COUNT(*) FROM Institucion;




# Reporte de movimientos por cuentahabiente por mes.

CREATE TABLE Movimientos_by_Cuentahabiente_by_mes(
    nombre TEXT,
    apellido TEXT,
    cui TEXT,
    email TEXT,
    fechareg DATE,
    genero TEXT,
    institucion TEXT,
    abreviatura TEXT,
    tipocuenta TEXT,
    montotransf INT,
    fechatransf DATE,
    PRIMARY KEY ((cui),fechatransf,institucion,tipocuenta)
) WITH CLUSTERING ORDER BY (fechatransf desc,institucion desc,tipocuenta desc);

COPY Movimientos_by_Cuentahabiente_by_mes(nombre, apellido, cui, email, fechareg, genero, 
    institucion, abreviatura,tipocuenta, montotransf,fechatransf) FROM 'Movimientos_by_Cuentahabiente_by_mes.csv'
     WITH HEADER=TRUE AND DELIMITER=';';

SELECT * FROM Movimientos_by_Cuentahabiente_by_mes WHERE cui = '6816494733' AND 
fechatransf >= '2020-05-01' AND fechatransf < '2020-05-31';
SELECT COUNT(*) FROM Movimientos_by_Cuentahabiente_by_mes WHERE cui = '6816494733' AND 
fechatransf >= '2020-05-01' AND fechatransf < '2020-05-31';
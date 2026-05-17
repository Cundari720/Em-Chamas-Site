CREATE DATABASE EC;
USE EC;

CREATE TABLE PEDIDOS (
ID	INT AUTO_INCREMENT PRIMARY KEY,
NOME	VARCHAR(150),
PEDIDO	TEXT NOT NULL
);

INSERT INTO PEDIDOS (NOME, PEDIDO) VALUES
('Matheus', 'Gostaria que orassem pela entrevista de estágio que farei na quinta-feira');

select * from PEDIDOS;


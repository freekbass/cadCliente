/**
 * Author:  Wilson
 * Created: 07/04/2017
 */

Create table usuario (
cod_usuario Int UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
login Varchar(30),
senha Varchar(255),
email Varchar(255),
Primary Key (cod_usuario));

Create table cliente (
cod_cliente Int UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
nome_fantasia Varchar(255),
cnpj Varchar(20),
telefone Varchar (15),
Primary Key (cod_cliente));

Create table produto (
cod_produto varchar (20) NOT NULL,
descricao Varchar(255),
custo_unitario Float,
Primary Key (cod_produto));

Create table pedido (
cod_pedido Int UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
cod_cliente Int,
cod_produto Int,
quantidade Float,
preco_unitario Float,
preco_total Float,
data Date,
Primary Key (cod_pedido));

ALTER TABLE pedido ADD CONSTRAINT fk_cliente FOREIGN KEY (cod_cliente) REFERENCES cliente (codigo_cliente);
ALTER TABLE pedido ADD CONSTRAINT fk_produto FOREIGN KEY (cod_produto) REFERENCES produto (cod_produto);


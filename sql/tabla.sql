create table registros(
id_user int auto_increment,
nombre varchar(45),
apellido varchar(45),
correo varchar(45),
contraseña varchar(256),
constraint pk_registros PRIMARY KEY (id_user)
);
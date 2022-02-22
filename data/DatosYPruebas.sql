select * from productos;

INSERT INTO productos (nombre, stock, precio_compra)
  VALUES 
        ('Huevos',100,5.5),
        ('Patata Semipreparada',5000,15.5),
        ('Sal',2000,33.5),
        ('Aceite',10000,43),
        ('Mayonesa',1000,15.3),
        ('Atún',2100,25.1),
        ('Jamón cocido',1000,11.99),
        ('Queso fundido',5000,25.5),
        ('Bacon en lonchas',1000,15.15),
        ('Queso rulo de cabra',1000,25),
        ('Pan bimbo',1000,25.5),
        ('Margarina',1000,9.99),
        ('Tomate',1000,25.6),
        ('Lechuga',1000,9),
        ('Patata cortada tipo brava',10000,3.5),
        ('Kikmchee',500,5.5);
        


insert into productos_en_platos (id_plato, id_producto, gramos_producto)
	values
		('3','15',100),
		('3','4',50),
		('3','3',5),
		('3','15',100);
		

select distinct p.nombre,c.nombre, p.precio_publico, p.coste from platos p left join categorias c on c.id = p.categoria;


select p.nombre,pp.gramos_producto  from productos_en_platos pp left join productos p on pp.id_producto = p.id;  
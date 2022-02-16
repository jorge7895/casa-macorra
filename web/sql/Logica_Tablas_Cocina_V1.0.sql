delimiter //


-- Trigger utilizado para establecer la fecha y el precio total de las comandas
create TRIGGER act_comandas_au 
before insert ON comandas
FOR EACH ROW
begin
	
	declare precio float(2);
	select distinct (new.cantidad*(select precio_publico from platos where platos.id = new.id_plato)) into precio from comandas;
	
	set new.fecha = curdate(); 
	set new.precio_total = precio;

end//

delimiter ;
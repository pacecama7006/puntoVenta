DELIMITER
    |
CREATE TRIGGER `tr_updStockCompra` AFTER INSERT ON `purchase_details`
 FOR EACH ROW BEGIN
    UPDATE
        products
    SET
        stock = stock + NEW.quantity
    WHERE
        products.id = NEW.product_id;
END; |
DELIMITER
    ;

DELIMITER
    |
CREATE TRIGGER tr_updStockCompraAnular AFTER UPDATE
ON
    purchases FOR EACH ROW
BEGIN
    IF OLD.status = 'VALID' THEN
        UPDATE
            products p
        JOIN purchase_details di ON
            di.product_id = p.id AND di.purchase_id = NEW.id
        SET
            p.stock = p.stock - di.quantity;
    ELSEIF OLD.status = 'CANCELED' THEN
        UPDATE
            products p
        JOIN purchase_details di ON
            di.product_id = p.id AND di.purchase_id = NEW.id
        SET
            p.stock = p.stock + di.quantity;
    END IF;
END; |
DELIMITER
    ;


DELIMITER
    |
CREATE TRIGGER tr_updStockVenta AFTER INSERT ON
    sale_details FOR EACH ROW
BEGIN
    UPDATE
        products
    SET
        stock = stock - NEW.quantity
    WHERE
        products.id = NEW.product_id;
END; |
DELIMITER
    ;

DELIMITER
    |
CREATE TRIGGER tr_updStockVentaAnular AFTER UPDATE
ON
    sales FOR EACH ROW
BEGIN
    IF OLD.status = 'VALID' THEN
        UPDATE
        products p
        JOIN sale_details dv ON
            dv.product_id = p.id AND dv.sale_id = NEW.id
        SET
            p.stock = p.stock + dv.quantity;
    ELSEIF OLD.status = 'CANCELED' THEN
        UPDATE
        products p
        JOIN sale_details dv ON
            dv.product_id = p.id AND dv.sale_id = NEW.id
        SET
            p.stock = p.stock - dv.quantity;
    END IF;
END; |
DELIMITER
    ;

-- Triger para cuando inserto un movimiento a la caja, ya sea de ingreso o de egreso
DELIMITER
    |
CREATE TRIGGER MOVES_AI AFTER INSERT
    ON
        moves FOR EACH ROW
    BEGIN
        IF NEW.tipo = 'INGRESO' THEN
            UPDATE
                boxes
            SET
                saldo = saldo + NEW.importe
            WHERE
                boxes.id = NEW.box_id;
        ELSEIF NEW.tipo = 'EGRESO' THEN
            UPDATE
                boxes
            SET
                saldo = saldo - NEW.importe
            WHERE
                boxes.id = NEW.box_id;
        END IF;

    END; |
DELIMITER
    ;

-- Triger para cuando actualizo un movimiento a la caja, ya sea de ingreso o de egreso
DELIMITER
    |
CREATE TRIGGER MOVES_AU AFTER UPDATE
    ON
        moves FOR EACH ROW
    BEGIN
        IF OLD.tipo = 'INGRESO' AND NEW.tipo = 'INGRESO' THEN
            UPDATE
                boxes
            SET
                saldo = saldo -OLD.importe + NEW.importe
            WHERE
                boxes.id = NEW.box_id;
        ELSEIF OLD.tipo = 'INGRESO' AND NEW.tipo = 'EGRESO' THEN
            UPDATE
                boxes
            SET
                saldo = saldo -OLD.importe - NEW.importe
            WHERE
                boxes.id = NEW.box_id;
        ELSEIF OLD.tipo = 'EGRESO'  AND NEW.tipo = 'EGRESO' THEN
            UPDATE
                boxes
            SET
                saldo = saldo + OLD.importe - NEW.importe
            WHERE
                boxes.id = NEW.box_id;
        ELSEIF OLD.tipo = 'EGRESO'  AND NEW.tipo = 'INGRESO' THEN
            UPDATE
                boxes
            SET
                saldo = saldo + OLD.importe + NEW.importe
            WHERE
                boxes.id = NEW.box_id;
        END IF;

    END; |
DELIMITER
    ;


-- Triger para cuando elimino un movimiento a la caja, ya sea de ingreso o de egreso
DELIMITER
    |
CREATE TRIGGER MOVES_AD AFTER DELETE
    ON
        moves FOR EACH ROW
    BEGIN
        IF OLD.tipo = 'INGRESO' THEN
            UPDATE
                boxes
            SET
                saldo = saldo -OLD.importe
            WHERE
                boxes.id = OLD.box_id;
        ELSEIF OLD.tipo = 'EGRESO' THEN
            UPDATE
                boxes
            SET
                saldo = saldo + OLD.importe
            WHERE
                boxes.id = OLD.box_id;
        END IF;

    END; |
DELIMITER
    ;


/*CREATE TRIGER NOMBRE_TABLA_A_OBSERVAR SEGUIDO DE _A(DE AFTER) O _B(DE BEFORE) SEGUIDO DE
I(DE INSERT), U(DE UPDATE) O D(DE DELETE) INDICAR SI ES ANTES O DESPUÉS CON AFTER O CON
BEFORE SEGUIDO DE LA ACCIÓN INSERT, UPDATE O DELETE SEGUIDO DE ON SEGUIDO DE NOMBRE_TABLA
QUE SE ESTA OBSERVANDO*/
CREATE TRIGGER PRODUCTOSAI AFTER INSERT ON PRODUCTOS FOR EACH ROW
INSERT INTO REG_PRODUCTOS(codigo_articulo, nombre_articulo, precio, insertado)
VALUES(New.codigo_articulo, New.nombre_articulo, New.precio, now())


DELIMITER
    |
CREATE TRIGGER tr_updStockCompraAnular AFTER UPDATE
ON
    purchases FOR EACH ROW
BEGIN
    IF OLD.status = 'VALID' THEN
        UPDATE
            products p
        JOIN purchase_details di ON
            di.product_id = p.id AND di.purchase_id = NEW.id
        SET
            p.stock = p.stock - di.quantity;
    ELSEIF OLD.status = 'CANCELED' THEN
        UPDATE
            products p
        JOIN purchase_details di ON
            di.product_id = p.id AND di.purchase_id = NEW.id
        SET
            p.stock = p.stock + di.quantity;
    END IF;
END; |
DELIMITER
    ;

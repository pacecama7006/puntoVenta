<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $role1 = Role::create(['name' => 'SuperAdmin']);
        $role2 = Role::create(['name' => 'Administrador']);
        $role3 = Role::create(['name' => 'Vendedor']);
        $role4 = Role::create(['name' => 'Invitado']);

        Permission::create(['name' => 'users.index', 'description' => 'Ver listado de usuarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'users.edit', 'description' => 'Editar un usuario'])->syncRoles([$role1]);
        Permission::create(['name' => 'users.update', 'description' => 'Actualizar un usuario'])->syncRoles([$role1]);
        Permission::create(['name' => 'users.create', 'description' => 'Crear un usuario'])->syncRoles([$role1]);
        Permission::create(['name' => 'users.destroy', 'description' => 'Eliminar un usuario'])->syncRoles([$role1]);
        Permission::create(['name' => 'users.show', 'description' => 'Ver detalles de un usuario'])->syncRoles([$role1]);
        Permission::create(['name' => 'users.pdfUsers', 'description' => 'Generar PDF de usuarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'users.export', 'description' => 'Exportar Excel de usuarios'])->syncRoles([$role1]);

        Permission::create(['name' => 'roles.index', 'description' => 'Ver listado de roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'roles.edit', 'description' => 'Editar un rol'])->syncRoles([$role1]);
        Permission::create(['name' => 'roles.update', 'description' => 'Actualizar un rol'])->syncRoles([$role1]);
        Permission::create(['name' => 'roles.create', 'description' => 'Crear un rol'])->syncRoles([$role1]);
        Permission::create(['name' => 'roles.destroy', 'description' => 'Eliminar un rol'])->syncRoles([$role1]);
        Permission::create(['name' => 'roles.show', 'description' => 'Ver detalles de un rol'])->syncRoles([$role1]);
        Permission::create(['name' => 'roles.pdfRoles', 'description' => 'Generar PDF de roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'roles.export', 'description' => 'Exportar Excel de roles'])->syncRoles([$role1]);

        Permission::create(['name' => 'categories.index', 'description' => 'Ver listado de categorías'])->syncRoles([$role1]);
        Permission::create(['name' => 'categories.edit', 'description' => 'Editar una categoría'])->syncRoles([$role1]);
        Permission::create(['name' => 'categories.update', 'description' => 'Actualizar una categoría'])->syncRoles([$role1]);
        Permission::create(['name' => 'categories.create', 'description' => 'Crear una categoría'])->syncRoles([$role1]);
        Permission::create(['name' => 'categories.destroy', 'description' => 'Eliminar una categoría'])->syncRoles([$role1]);
        Permission::create(['name' => 'categories.show', 'description' => 'Ver detalles de una categoría'])->syncRoles([$role1]);

        Permission::create(['name' => 'categories.pdfCategories', 'description' => 'Generar PDF de categorías'])->syncRoles([$role1]);
        Permission::create(['name' => 'categories.export', 'description' => 'Exportar Excel de categorías'])->syncRoles([$role1]);

        Permission::create(['name' => 'clients.index', 'description' => 'Ver listado de clientes'])->syncRoles([$role1]);
        Permission::create(['name' => 'clients.edit', 'description' => 'Editar un cliente'])->syncRoles([$role1]);
        Permission::create(['name' => 'clients.update', 'description' => 'Actualizar un cliente'])->syncRoles([$role1]);
        Permission::create(['name' => 'clients.create', 'description' => 'Crear un cliente'])->syncRoles([$role1]);
        Permission::create(['name' => 'clients.destroy', 'description' => 'Eliminar un cliente'])->syncRoles([$role1]);
        Permission::create(['name' => 'clients.show', 'description' => 'Mostrar detalles de un cliente'])->syncRoles([$role1]);

        Permission::create(['name' => 'clients.pdfClients', 'description' => 'Generar PDF de clientes'])->syncRoles([$role1]);
        Permission::create(['name' => 'clients.export', 'description' => 'Exportar Excel de clientes'])->syncRoles([$role1]);

        Permission::create(['name' => 'products.index', 'description' => 'Ver listado de productos'])->syncRoles([$role1]);
        Permission::create(['name' => 'products.edit', 'description' => 'Editar un producto'])->syncRoles([$role1]);
        Permission::create(['name' => 'products.update', 'description' => 'Actualizar un producto'])->syncRoles([$role1]);
        Permission::create(['name' => 'products.create', 'description' => 'Crear un producto'])->syncRoles([$role1]);
        Permission::create(['name' => 'products.destroy', 'description' => 'Eliminar un producto'])->syncRoles([$role1]);
        Permission::create(['name' => 'products.show', 'description' => 'Mostrar detalles de un producto'])->syncRoles([$role1]);

        Permission::create(['name' => 'product.file', 'description' => 'Obtener imagen de un producto'])->syncRoles([$role1]);

        Permission::create(['name' => 'products.pdfProducts', 'description' => 'Generar PDF de productos'])->syncRoles([$role1]);
        Permission::create(['name' => 'products.export', 'description' => 'Exportar Excel de productos'])->syncRoles([$role1]);

        Permission::create(['name' => 'providers.index', 'description' => 'Ver listado de proveedors'])->syncRoles([$role1]);
        Permission::create(['name' => 'providers.edit', 'description' => 'Editar un proveedor'])->syncRoles([$role1]);
        Permission::create(['name' => 'providers.update', 'description' => 'Actualizar un proveedor'])->syncRoles([$role1]);
        Permission::create(['name' => 'providers.create', 'description' => 'Crear un proveedor'])->syncRoles([$role1]);
        Permission::create(['name' => 'providers.destroy', 'description' => 'Eliminar un proveedor'])->syncRoles([$role1]);
        Permission::create(['name' => 'providers.show', 'description' => 'Mostrar detalle de un proveedor'])->syncRoles([$role1]);

        Permission::create(['name' => 'providers.pdfProviders', 'description' => 'Generar PDF de proveedores'])->syncRoles([$role1]);
        Permission::create(['name' => 'providers.export', 'description' => 'Exportar Excel de proveedores'])->syncRoles([$role1]);

        Permission::create(['name' => 'purchases.index', 'description' => 'Ver listado de compras'])->syncRoles([$role1]);
        Permission::create(['name' => 'purchases.edit', 'description' => 'Editar una compra'])->syncRoles([$role1]);
        Permission::create(['name' => 'purchases.update', 'description' => 'Actualizar una compra'])->syncRoles([$role1]);
        Permission::create(['name' => 'purchases.create', 'description' => 'Crear una compra'])->syncRoles([$role1]);
        Permission::create(['name' => 'purchases.destroy', 'description' => 'Eliminar una compra'])->syncRoles([$role1]);
        Permission::create(['name' => 'purchases.show', 'description' => 'Mostrar detalles de una compra'])->syncRoles([$role1]);
        Permission::create(['name' => 'purchases.pdf_detalle', 'description' => 'Generar el pdf de una compra'])->syncRoles([$role1]);
        Permission::create(['name' => 'purchases.excel_detalle', 'description' => 'Generar el detalle de una compra en excel'])->syncRoles([$role1]);
        Permission::create(['name' => 'purchases.pdfPurchases', 'description' => 'Generar PDF de compras'])->syncRoles([$role1]);
        Permission::create(['name' => 'purchases.export', 'description' => 'Exportar Excel de compras'])->syncRoles([$role1]);

        Permission::create(['name' => 'sales.pdfSales', 'description' => 'Generar PDF de ventas'])->syncRoles([$role1]);
        Permission::create(['name' => 'sales.export', 'description' => 'Exportar Excel de ventas'])->syncRoles([$role1]);

        Permission::create(['name' => 'sales.index', 'description' => 'Ver listado de ventas'])->syncRoles([$role1]);
        Permission::create(['name' => 'sales.edit', 'description' => 'Editar una venta'])->syncRoles([$role1]);
        Permission::create(['name' => 'sales.update', 'description' => 'Actualizar una venta'])->syncRoles([$role1]);
        Permission::create(['name' => 'sales.create', 'description' => 'Crear una venta'])->syncRoles([$role1]);
        Permission::create(['name' => 'sales.destroy', 'description' => 'Eliminar una venta'])->syncRoles([$role1]);
        Permission::create(['name' => 'sales.show', 'description' => 'Mostrar detalles de una venta'])->syncRoles([$role1]);

        Permission::create(['name' => 'sales.pdf_detalle', 'description' => 'Generar el pdf de una venta'])->syncRoles([$role1]);
        Permission::create(['name' => 'sales.excel_detalle', 'description' => 'Generar el detalle de una venta en excel'])->syncRoles([$role1]);
        Permission::create(['name' => 'sales.print', 'description' => 'Imprimir tickets de venta'])->syncRoles([$role1]);

        Permission::create(['name' => 'business.index', 'description' => 'Configurar datos del negocio'])->syncRoles([$role1]);
        Permission::create(['name' => 'business.update', 'description' => 'Actualizar datos del negocio'])->syncRoles([$role1]);
        Permission::create(['name' => 'printer.index', 'description' => 'Configurar datos de la impresora'])->syncRoles([$role1]);
        Permission::create(['name' => 'printer.update', 'description' => 'Actualizar datos de la impresora'])->syncRoles([$role1]);
        Permission::create(['name' => 'purchases.upload', 'description' => 'Subir imagen de una compra'])->syncRoles([$role1]);
        Permission::create(['name' => 'products.status', 'description' => 'Modificar el status de un producto'])->syncRoles([$role1]);
        Permission::create(['name' => 'purchases.status', 'description' => 'Modificar el status de una compra'])->syncRoles([$role1]);
        Permission::create(['name' => 'sales.status', 'description' => 'Modificar el status de una venta'])->syncRoles([$role1]);
        Permission::create(['name' => 'sales.reports.day', 'description' => 'Generar reporte de ventas del día'])->syncRoles([$role1]);
        Permission::create(['name' => 'sales.reports.date', 'description' => 'Generar reporte de ventas por rango de fecha'])->syncRoles([$role1]);
        Permission::create(['name' => 'sales.report.result', 'description' => 'Generar reportes de ventas'])->syncRoles([$role1]);

        Permission::create(['name' => 'purchases.reports.purchases.day', 'description' => 'Generar reporte de compras del día'])->syncRoles([$role1]);
        Permission::create(['name' => 'purchases.reports.purchases.date', 'description' => 'Generar reporte de compras por rango de fecha'])->syncRoles([$role1]);
        Permission::create(['name' => 'purchases.report.purchases.result', 'description' => 'Generar reportes de compras'])->syncRoles([$role1]);
        Permission::create(['name' => 'boxes.index', 'description' => 'Ver listado de cajas'])->syncRoles([$role1]);
        Permission::create(['name' => 'boxes.edit', 'description' => 'Editar una caja'])->syncRoles([$role1]);
        Permission::create(['name' => 'boxes.update', 'description' => 'Actualizar una caja'])->syncRoles([$role1]);
        Permission::create(['name' => 'boxes.create', 'description' => 'Crear una caja'])->syncRoles([$role1]);
        Permission::create(['name' => 'boxes.destroy', 'description' => 'Eliminar una caja'])->syncRoles([$role1]);
        Permission::create(['name' => 'boxes.pdfBoxes', 'description' => 'Generar PDF de cajas'])->syncRoles([$role1]);
        Permission::create(['name' => 'boxes.export', 'description' => 'Exportar Excel de cajas'])->syncRoles([$role1]);
        Permission::create(['name' => 'concepts.index', 'description' => 'Ver listado de concepto'])->syncRoles([$role1]);
        Permission::create(['name' => 'concepts.edit', 'description' => 'Editar un concepto'])->syncRoles([$role1]);
        Permission::create(['name' => 'concepts.update', 'description' => 'Actualizar un concepto'])->syncRoles([$role1]);
        Permission::create(['name' => 'concepts.create', 'description' => 'Crear un concepto'])->syncRoles([$role1]);
        Permission::create(['name' => 'concepts.destroy', 'description' => 'Eliminar un concepto'])->syncRoles([$role1]);
        Permission::create(['name' => 'concepts.pdfConcepts', 'description' => 'Generar PDF de conceptos de Egresos e Ingresos'])->syncRoles([$role1]);
        Permission::create(['name' => 'concepts/export', 'description' => 'Exportar Excel de conceptos de Egresos e Ingresos'])->syncRoles([$role1]);

        Permission::create(['name' => 'moves.index', 'description' => 'Ver listado de movimientos'])->syncRoles([$role1]);
        Permission::create(['name' => 'moves.edit', 'description' => 'Editar un movimiento'])->syncRoles([$role1]);
        Permission::create(['name' => 'moves.update', 'description' => 'Actualizar un movimiento'])->syncRoles([$role1]);
        Permission::create(['name' => 'moves.create', 'description' => 'Crear un movimiento'])->syncRoles([$role1]);
        Permission::create(['name' => 'moves.destroy', 'description' => 'Eliminar un movimiento'])->syncRoles([$role1]);
        Permission::create(['name' => 'moves.show', 'description' => 'Mostrar detalles de un movimiento'])->syncRoles([$role1]);
        Permission::create(['name' => 'moves.conciliado', 'description' => 'Cambiar la situación de conciliación de un movimiento'])->syncRoles([$role1]);
    }
}

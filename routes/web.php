<?php

use App\Http\Controllers\BoxController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ConceptController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MoveController;
use App\Http\Controllers\PrinterController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('ptoventa', [HomeController::class, 'index'])->name('ptoventa');

//Rutas para la generación de reportes de ventas
Route::prefix('sales')->group(function () {
    Route::get('reports_day}', [ReportController::class, 'reports_day'])->name('sales.reports.day');
    Route::get('reports_date}', [ReportController::class, 'reports_date'])->name('sales.reports.date');
    Route::post('report_result}', [ReportController::class, 'report_result'])->name('sales.report.result');
});

//Rutas para la generación de reportes de compras
Route::prefix('purchases')->group(function () {
    Route::get('reports_day}', [ReportController::class, 'reports_purchases_day'])->name('purchases.reports.purchases.day');
    Route::get('reports_date}', [ReportController::class, 'reports_purchases_date'])->name('purchases.reports.purchases.date');
    Route::post('report_result}', [ReportController::class, 'report_purchases_result'])->name('purchases.report.purchases.result');
});

Route::get('categories/pdfCategories', [CategoryController::class, 'pdfCategories'])->name('categories.pdfCategories');
Route::get('categories/export', [CategoryController::class, 'export'])->name('categories.export');
Route::get('clients/pdfClients', [ClientController::class, 'pdfClients'])->name('clients.pdfClients');
Route::get('clients/export', [ClientController::class, 'export'])->name('clients.export');
Route::get('products/pdfProducts', [ProductController::class, 'pdfProducts'])->name('products.pdfProducts');
Route::get('products/export', [ProductController::class, 'export'])->name('products.export');
Route::get('providers/pdfProviders', [ProviderController::class, 'pdfProviders'])->name('providers.pdfProviders');
Route::get('providers/export', [ProviderController::class, 'export'])->name('providers.export');
Route::get('purchases/pdfPurchases', [PurchaseController::class, 'pdfPurchases'])->name('purchases.pdfPurchases');
Route::get('purchases/export', [PurchaseController::class, 'export'])->name('purchases.export');
Route::get('sales/pdfSales', [SaleController::class, 'pdfSales'])->name('sales.pdfSales');
Route::get('sales/export', [SaleController::class, 'export'])->name('sales.export');
Route::get('users/pdfUsers', [UserController::class, 'pdfUsers'])->name('users.pdfUsers');
Route::get('users/export', [UserController::class, 'export'])->name('users.export');
Route::get('roles/pdfRoles', [RoleController::class, 'pdfRoles'])->name('roles.pdfRoles');
Route::get('roles/export', [RoleController::class, 'export'])->name('roles.export');
Route::get('boxes/pdfBoxes', [BoxController::class, 'pdfBoxes'])->name('boxes.pdfBoxes');
Route::get('boxes/export', [BoxController::class, 'export'])->name('boxes.export');
Route::get('concepts/pdfConcepts', [ConceptController::class, 'pdfConcepts'])->name('concepts.pdfConcepts');
Route::get('concepts/export', [ConceptController::class, 'export'])->name('concepts.export');

Route::get('moves/pdfMoves', [MoveController::class, 'pdfMoves'])->name('moves.pdfMoves');
Route::get('moves/export', [MoveController::class, 'export'])->name('moves.export');
Route::get('change_conciliado/{move}', [MoveController::class, 'change_conciliado'])->name('moves.conciliado');

Route::resource('users', UserController::class)->names('users');
Route::resource('roles', RoleController::class)->names('roles');
Route::resource('categories', CategoryController::class)->names('categories');
Route::resource('clients', ClientController::class)->names('clients');
Route::resource('products', ProductController::class)->names('products');
Route::resource('boxes', BoxController::class)->names('boxes');
Route::resource('concepts', ConceptController::class)->names('concepts');
Route::resource('moves', MoveController::class)->names('moves');

//Ruta que me permite obtener el archivo de imágen de un producto
Route::get('file/{filename}', [ProductController::class, 'getImagen'])->name('product.file');
Route::resource('providers', ProviderController::class)->names('providers');
Route::resource('purchases', PurchaseController::class)->names('purchases');
//Ruta que permite generar el pdf del detalle de una compra
Route::get('purchases/pdf/{purchase}', [PurchaseController::class, 'pdf_detalle'])->name('purchases.pdf_detalle');

//Ruta que permite generar el excel del detalle de una compra
Route::get('purchases/excel/{purchase}', [PurchaseController::class, 'excel_detalle'])->name('purchases.excel_detalle');

Route::resource('sales', SaleController::class)->names('sales');
//Ruta que permite generar el pdf del detalle de una compra
Route::get('sales/pdf/{sale}', [SaleController::class, 'pdf_detalle'])->name('sales.pdf_detalle');
//Ruta que permite generar el excel del detalle de una compra
Route::get('sales/excel/{sale}', [SaleController::class, 'excel_detalle'])->name('sales.excel_detalle');
//Ruta que permite imprimir un ticket en impresora térmica del detalle de una compra
Route::get('sales/print/{sale}', [SaleController::class, 'print'])->name('sales.print');

Route::prefix('businesses')->group(function () {
    Route::get('/', [BusinessController::class, 'index'])->name('business.index');
    Route::put('/{business}', [BusinessController::class, 'update'])->name('business.update');
});

Route::prefix('printers')->group(function () {
    Route::get('/', [PrinterController::class, 'index'])->name('printer.index');
    Route::put('/{printer}', [PrinterController::class, 'update'])->name('printer.update');
});
//Ruta que me permite cargar imágenes a las compras
Route::get('purchases/upload/{purchase}', [PurchaseController::class, 'upload'])->name('purchases.upload');

//Rutas que cambian el status
Route::prefix('change_status')->group(function () {
    Route::get('products/{product}', [ProductController::class, 'change_status'])->name('products.status');
    Route::get('purchases/{purchase}', [PurchaseController::class, 'change_status'])->name('purchases.status');
    Route::get('sales/{sale}', [SaleController::class, 'change_status'])->name('sales.status');
});
//Ruta para generar los códigos de barras
Route::get('get_products_by_barcode', [ProductController::class, 'get_products_by_barcode'])->name('get_products_by_barcode');

Route::get('get_products_by_id', [ProductController::class, 'get_products_by_id'])->name('get_products_by_id');

Route::get('print_barcode', [ProductController::class, 'print_barcode'])->name('print_barcode');

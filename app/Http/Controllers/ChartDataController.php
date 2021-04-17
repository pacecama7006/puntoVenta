<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Models\Sale;
use Carbon\Carbon;

class ChartDataController extends Controller
{
    //
    public function getAllFechas()
    {

        $fecha_array = array();
        $fechas_vtas = Sale::orderBy('sale_date', 'ASC')->pluck('sale_date');
        $fechas_vtas = json_decode($fechas_vtas);

        if (!empty($fechas_vtas)) {
            foreach ($fechas_vtas as $unformatted_date) {
                $fecha                   = new \DateTime($unformatted_date);
                $fecha_dia               = $fecha->format('d');
                $fecha_formateada        = $fecha->format('d-m-Y');
                $fecha_array[$fecha_dia] = $fecha_formateada;
            }
        }
        return $fecha_array;
    }

    public function getVentasDiarias($day)
    {
        $ventas_diarias = Sale::whereDay('sale_date', $day)->where('status', 'valid')->get()->sum('total');
        return $ventas_diarias;
    }

    public function getDatosVentasDiarias()
    {

        $ventas_diarias_totales = array();
        $fecha_array            = $this->getAllFechas();
        $fecha_name_array       = array();
        if (!empty($fecha_array)) {
            foreach ($fecha_array as $fecha_dia => $fecha_formateada) {
                $ventas_diarias = $this->getVentasDiarias($fecha_dia);
                array_push($ventas_diarias_totales, $ventas_diarias);
                array_push($fecha_name_array, $fecha_formateada);
            }
        }

        $max_no                    = max($ventas_diarias_totales);
        $max                       = round(($max_no + 1000 / 2) / 1000) * 1000;
        $ventas_diarias_data_array = array(
            'fechas'           => $fecha_name_array,
            'ventas_suma_data' => $ventas_diarias_totales,
            'max'              => $max,
        );

        return $ventas_diarias_data_array;
    }

    public function getMesesVenta()
    {

        $mes_array     = array();
        $ventas_fechas = Sale::orderBy('sale_date', 'ASC')->pluck('sale_date');
        $ventas_fechas = json_decode($ventas_fechas);

        if (!empty($ventas_fechas)) {
            foreach ($ventas_fechas as $unformatted_date) {
                $date       = new \DateTime($unformatted_date);
                $mes_num    = $date->format('m');
                $mes_nombre = $date->format('F');
                setlocale(LC_TIME, 'es_ES', 'Spanish_Spain', 'Spanish');
                $mes_nombre          = strftime('%B', strtotime($mes_nombre));
                $mes_array[$mes_num] = $mes_nombre;
            }
        }
        return $mes_array;
    }

    public function getMesVenta()
    {

        $mes_array     = array();
        $ventas_fechas = Sale::orderBy('sale_date', 'ASC')->whereMonth('sale_date', Carbon::now())->pluck('sale_date');
        $ventas_fechas = json_decode($ventas_fechas);

        if (!empty($ventas_fechas)) {
            foreach ($ventas_fechas as $unformatted_date) {
                $date       = new \DateTime($unformatted_date);
                $mes_num    = $date->format('m');
                $mes_nombre = $date->format('F');
                setlocale(LC_TIME, 'es_ES', 'Spanish_Spain', 'Spanish');
                $mes_nombre          = strftime('%B', strtotime($mes_nombre));
                $mes_array[$mes_num] = $mes_nombre;
            }
        }
        return $mes_array;
    }

    public function getVentasMensuales($mes)
    {
        $venta_mensual_total = Sale::whereMonth('sale_date', $mes)->where('status', 'valid')->get()->sum('total');
        return $venta_mensual_total;
    }

    public function getVentasMensualesDatos()
    {

        $mes_ventas_totales_array = array();
        $mes_array                = $this->getMesVenta();
        $nombre_mes_array         = array();
        if (!empty($mes_array)) {
            foreach ($mes_array as $mes_num => $mes_nombre) {
                $venta_mensual_total = $this->getVentasMensuales($mes_num);
                array_push($mes_ventas_totales_array, $venta_mensual_total);
                array_push($nombre_mes_array, $mes_nombre);
            }
        }

        $max_no                       = max($mes_ventas_totales_array);
        $max                          = round(($max_no + 1000 / 2) / 1000) * 1000;
        $ventas_mensuales_datos_array = array(
            'mes'              => $nombre_mes_array,
            'venta_total_dato' => $mes_ventas_totales_array,
            'max'              => $max,
        );

        return $ventas_mensuales_datos_array;

    }

    public function getMesCompra()
    {

        $mes_array      = array();
        $compras_fechas = Purchase::orderBy('purchase_date', 'ASC')->whereMonth('purchase_date', Carbon::now())->pluck('purchase_date');
        $compras_fechas = json_decode($compras_fechas);

        if (!empty($compras_fechas)) {
            foreach ($compras_fechas as $unformatted_date) {
                $date       = new \DateTime($unformatted_date);
                $mes_num    = $date->format('m');
                $mes_nombre = $date->format('F');
                setlocale(LC_TIME, 'es_ES', 'Spanish_Spain', 'Spanish');
                $mes_nombre          = strftime('%B', strtotime($mes_nombre));
                $mes_array[$mes_num] = $mes_nombre;
            }
        }
        return $mes_array;
    }

    public function getComprasMensuales($mes)
    {
        $compra_mensual_total = Purchase::whereMonth('purchase_date', $mes)->where('status', 'valid')->get()->sum('total');
        return $compra_mensual_total;
    }

    public function getComprasMensualData()
    {

        $mes_compras_totales_array = array();
        $mes_array                 = $this->getMesCompra();
        $nombre_mes_array          = array();
        if (!empty($mes_array)) {
            foreach ($mes_array as $mes_num => $mes_nombre) {
                $compra_mensual_total = $this->getComprasMensuales($mes_num);
                array_push($mes_compras_totales_array, $compra_mensual_total);
                array_push($nombre_mes_array, $mes_nombre);
            }
        }

        $max_no                        = max($mes_compras_totales_array);
        $max                           = round(($max_no + 1000 / 2) / 1000) * 1000;
        $compras_mensuales_datos_array = array(
            'mes'               => $nombre_mes_array,
            'compra_total_dato' => $mes_compras_totales_array,
            'max'               => $max,
        );

        return $compras_mensuales_datos_array;

    }

}

<?php
/*
 * Copyright (C) 2016 Joe Nilson <joenilson at gmail.com>
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */
require_once 'plugins/factura_preimpresa/vendors/tcpdf/tcpdf.php';
require_once 'plugins/factura_preimpresa/vendors/fpdi/fpdi.php';
/**
 * Description of factura_preimpresa
 * Proceso:
 * Se sube un pdf para confirmar las dimensiones del mismo
 * Se arrastran bloques de información con los valores de los campos
 * de las tablas facturascli y lineas_facturas_cli
 * Se guarda estas coordenadas en una tabla de formatos_preimpresos
 * y se agregan al model de formatos_preimpresos como opciones de impresion
 *
 * @todo Posibilidad de imprimir en impresoras matriciales
 *
 * @author Joe Nilson <joenilson at gmail.com>
 */
class formato_preimpreso extends fs_controller {
    public $archivo;
    public $pdf_import;
    public $resultados_w;
    public $resultados_h;
    public function __construct() {
        parent::__construct(__CLASS__, 'Formato Preimpreso', 'admin', TRUE, TRUE, FALSE);
    }

    protected function private_core() {
        if(isset($_FILES['archivo']) && $_FILES['archivo']['name']!=''){
            $this->archivo = $_FILES['archivo']['tmp_name'];
            $this->detectar_informacion();
        }
    }

    protected function detectar_informacion(){
        $this->pdf_import = new FPDI();
        $this->pdf_import->setSourceFile($this->archivo);
        $tplIdx = $this->pdf_import->ImportPage(1);
        $this->resultados_w = $this->pdf_import->getTemplateSize($tplIdx)['w'];
        $this->resultados_h = $this->pdf_import->getTemplateSize($tplIdx)['h'];
        //$this->pdf_import = new TCPDF_IMPORT();
        //$this->resultados = $this->pdf_import->importPDF($this->archivo);
    }

    public function share_extensions(){

    }
}
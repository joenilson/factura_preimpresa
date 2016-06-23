<?php

/*
 * Copyright (C) 2016 Joe Nilson <joenilson at gmail.com>
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
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

/**
 * Description of fs_papersizes
 *
 * @author Joe Nilson <joenilson at gmail.com>
 */
class fs_papersizes extends fs_model{
    public $id;
    public $descripcion;
    public $pulgadas;
    public $centimetros;
    public $ancho_pulgadas;
    public $alto_pulgadas;
    public $ancho_cm;
    public $alto_cm;
    public $estado;

    public function __construct($t = false) {
        parent::__construct('fs_papersizes');
        if($t){
            $this->id = $t['id'];
            $this->descripcion = $t['descripcion'];
            $this->pulgadas = $t['pulgadas'];
            $this->centimetros = $t['centimetros'];
            $this->ancho_pulgadas = floatval($t['ancho_pulgadas']);
            $this->alto_pulgadas = floatval($t['alto_pulgadas']);
            $this->ancho_cm = floatval($t['ancho_cm']);
            $this->alto_cm = floatval($t['alto_cm']);
            $this->estado = $this->str2bool($t['estado']);
        }else{
            $this->id = NULL;
            $this->descripcion = NULL;
            $this->pulgadas = NULL;
            $this->centimetros = NULL;
            $this->ancho_pulgadas = 0;
            $this->alto_pulgadas = 0;
            $this->ancho_cm = 0;
            $this->alto_cm = 0;
            $this->estado = FALSE;
        }
    }

    protected function install() {
        return "INSERT INTO ".$this->table_name." (descripcion, pulgadas, centimetros, ancho_pulgadas, alto_pulgadas, ancho_cm, alto_cm, estado) VALUES
            ('9x11','9 x 11','22.86 x 27.94',9,11,22.86,27.94,true), ('10x11','10 x 11','25.4 x 27.94',10,11,25.4,27.94,true),
            ('10x14','10 x 14','25.4 x 35.56',10,14,25.4,35.56,true), ('11x17','11 x 17','27.94 x 43.18',11,17,27.94,43.18,true),
            ('12x11','12 x 11','30.49 x 27.95',12,11,30.49,27.95,true), ('15x11','15 x 11','38.10 x 27.94',15,11,38.1,27.94,true),
            ('A0 (841 x 1189 mm)','33.11 x 46.81','84.1 x 118.9',33.11,46.81,84.1,118.9,true), ('A1 (594 x 841 mm)','23.39 x 33.11','59.4 x 84.1',23.39,33.11,59.4,84.1,true),
            ('A2','16.54 x 23.39','42 x 59.4',16.54,23.39,42,59.4,true), ('A3','11.69 x 16.54','29.7 x 42',11.69,16.54,29.7,42,true),
            ('A3 Extra','12.68 x 17.52','32.2 x 44.5',12.68,17.52,32.2,44.5,true), ('A3 Rotated','16.54 x 11.69','42 x 29.7',16.54,11.69,42,29.7,true),
            ('A4','8.27 x 11.69','21 x 29.7',8.27,11.69,21,29.7,true), ('A4 Extra','9.27 x 12.69','23.55 x 32.23',9.27,12.69,23.55,32.23,true),
            ('A4 Plus','8.27 x 12.99','21 x 33',8.27,12.99,21,33,true), ('A4 Rotated','11.69 x 8.27','29.7 x 21',11.69,8.27,29.7,21,true),
            ('A5','5.83 x 8.27','14.8 x 21',5.83,8.27,14.8,21,true), ('A5 Extra','6.85 x 9.25','17.4 x 23.5',6.85,9.25,17.4,23.5,true),
            ('A5 Rotated','8.27 x 5.83','21 x 14.8',8.27,5.83,21,14.8,true), ('A6','4.13 x 5.83','10.5 x 14.8',4.13,5.83,10.5,14.8,true),
            ('A6 Rotated','5.83 x 4.13','14.8 x 10.5',5.83,4.13,14.8,10.5,true), ('B0 ISO (1000 x 1414 mm)','39.37 x 55.67','100 x 141.4',39.37,55.67,100,141.4,true),
            ('B0 JIS (1030 x 1456 mm)','40.55 x 57.32','103 x 145.6',40.55,57.32,103,145.6,true), ('B1 ISO (707 x 1000 mm)','27.83 x 39.37','70.7 x 100',27.83,39.37,70.7,100,true),
            ('B1 JIS (728 x 1030 mm)','28.66 x 40.55','72.8 x 103',28.66,40.55,72.8,103,true), ('B2 ISO (500 x 707 mm)','19.69 x 27.83','50 x 70.7',19.69,27.83,50,70.7,true),
            ('B2 JIS (515 x 728 mm)','20.27 x 28.66','51.5 x 72.8',20.27,28.66,51.5,72.8,true), ('B3 ISO (353 x 500 mm)','13.9 x 19.69','35.3 x 50',13.9,19.69,35.3,50,true),
            ('B3 JIS (364 x 515 mm)','14.33 x 20.27','36.4 x 51.5',14.33,20.27,36.4,51.5,true), ('B4 (ISO)','9.84 x 13.9','25 x 35.4',9.84,13.9,25,35.4,true),
            ('B4 (JIS)','10.12 x 14.33','25.7 x 36.4',10.12,14.33,25.7,36.4,true), ('B4 (JIS) Rotated','14.33 x 10.12','36.4 x 25.7',14.33,10.12,36.4,25.7,true),
            ('B5 (JIS)','7.17 x 10.12','18.2 x 25.7',7.17,10.12,18.2,25.7,true), ('B5 (JIS) Rotated','10.12 x 7.17','25.7 x 18.2',10.12,7.17,25.7,18.2,true),
            ('B6 (JIS)','5.04 x 7.17','12.8 x 18.2',5.04,7.17,12.8,18.2,true), ('B6 (JIS) Rotated','7.17 x 5.04','18.2 x 12.8',7.17,5.04,18.2,12.8,true),
            ('C size sheet','17 x 22','43.18 x 55.88',17,22,43.18,55.88,true), ('D size sheet','22 x 34','55.88 x 86.36',22,34,55.88,86.36,true),
            ('E size sheet','34 x 44','86.36 x 111.76',34,44,86.36,111.76,true), ('Envelope','4.33 x 9.06','11 x 23',4.33,9.06,11,23,true),
            ('Envelope #9','3.875 x 8.875','9.83 x 22.53',3.875,8.875,9.83,22.53,true), ('Envelope #10','4.125 x 9.5','10.49 x 24.13',4.125,9.5,10.49,24.13,true),
            ('Envelope #11','4.5 x 10.375','11.43 x 26.34',4.5,10.375,11.43,26.34,true), ('Envelope #12','4.75 x 11','12.07 x 27.94',4.75,11,12.07,27.94,true),
            ('Envelope #14','5 x 11.5','12.70 x 29.21',5,11.5,12.7,29.21,true), ('Envelope DL','4.33 x 8.66','11 x 22',4.33,8.66,11,22,true),
            ('Envelope C3','12.75 x 18','32.4 x 45.8',12.75,18,32.4,45.8,true), ('Envelope C4','9 x 12.75','22.9 x 32.4',9,12.75,22.9,32.4,true),
            ('Envelope C5','6.38 x 9.02','16.2 x 22.9',6.38,9.02,16.2,22.9,true), ('Envelope C6','4.5 x 6.4','11.4 x 16.2',4.5,6.4,11.4,16.2,true),
            ('Envelope C65','4.5 x 9','11.4 x 22.9',4.5,9,11.4,22.9,true), ('Envelope B4','9.85 x 13.9','25 x 35.3',9.85,13.9,25,35.3,true),
            ('Envelope B5','6.9 x 9.85','17.6 x 25',6.9,9.85,17.6,25,true), ('Envelope B6','6.9 x 4.9','17.6 x 12.5',6.9,4.9,17.6,12.5,true),
            ('Envelope Monarch','3.875 x 7.5','9.86 x 19.05',3.875,7.5,9.86,19.05,true), ('Envelope Invite','8.66 x 8.66','22 x 22',8.66,8.66,22,22,true),
            ('Executive','7.25 x 10.5','18.42 x 26.67',7.25,10.5,18.42,26.67,true), ('Folio','8.5 x 13','21.6 x 33',8.5,13,21.6,33,true),
            ('Fanfold 8.5 x 12 in','8.5 x 12','21.6 x 30.48',8.5,12,21.6,30.48,true), ('F size sheet','28 x 40','71.12 x 101.6',28,40,71.12,101.6,true),
            ('German Legal Fanfold','8.5 x 13','21.59 x 33.02',8.5,13,21.59,33.02,true), ('Japanese Postcard','3.94 x 5.83','10 x 14.8',3.94,5.83,10,14.8,true),
            ('Japanese Double Postcard','7.87 x 5.83','20 x 14.8',7.87,5.83,20,14.8,true), ('Ledger','17 x 11','43.18 x 27.94',17,11,43.18,27.94,true),
            ('Legal','8.5 x 14','21.6 x 35.6',8.5,14,21.6,35.6,true), ('Legal Extra','9.5 x 15','24.13 x 38.1',9.5,15,24.13,38.1,true),
            ('Letter','8.5 x 11','21.6 x 27.9',8.5,11,21.6,27.9,true), ('Letter Plus','8.5 x 12.69','21.6 x 32.23',8.5,12.69,21.6,32.23,true),
            ('Letter Extra','9.5 x 12','24.13 x 30.48',9.5,12,24.13,30.48,true), ('Note','8.5 x 11','21.6 x 27.9',8.5,11,21.6,27.9,true),
            ('Quarto','8.46 x 10.83','21.5 x 27.5',8.46,10.83,21.5,27.5,true), ('Square 64 x 64 mm','2.52 x 2.52','6.4 x 6.4',2.52,2.52,6.4,6.4,true),
            ('Square 128 x 128 mm','5.04 x 5.04','12.8 x 12.8',5.04,5.04,12.8,12.8,true), ('Square 256 x 256 mm','10.08 x 10.08','25.6 x 25.6',10.08,10.08,25.6,25.6,true),
            ('Square 512 x 512 mm','20.16 x 20.16','51.2 x 51.2',20.16,20.16,51.2,51.2,true), ('Statement','5.5 x 8.5','14 x 21.6',5.5,8.5,14,21.6,true),
            ('SuperA','8.94 x 14.02','22.7 x 35.6',8.94,14.02,22.7,35.6,true), ('SuperB','12.01 x 19.17','30.5 x 48.7',12.01,19.17,30.5,48.7,true),
            ('Tabloid','11 x 17','27.9 x 43.2',11,17,27.9,43.2,true), ('Tabloid Extra','12 x 18','30.48 x 45.72',12,18,30.48,45.72,true),
            ('US Std Fanfold','14.875 x 11','37.77 x 27.94',14.875,11,37.77,27.94,true);";
    }

    public function url()
    {
        return "index.php?page=admin_papersizes";
    }

    public function exists() {
        if(is_null($this->id)){
            return false;
        }else{
            return $this->db->select("SELECT * FROM ".$this->table_name." WHERE id = ".$this->intval($this->id).";");
        }
    }

    public function save() {
        if($this->exists()){

        }else{

        }
        return true;
    }

    public function delete() {
        return '';
    }

    public function update(){
        $sql = "UPDATE ".$this->table_name." SET ".
            ", estado = ".$this->var2str($this->estado).
            ", tipo = ".$this->var2str($this->tipo).
            ", nombre = ".$this->intval($this->nombre).
            " WHERE codbanco = ".$this->var2str($this->codbanco).";";
        return $this->db->exec($sql);
    }
}

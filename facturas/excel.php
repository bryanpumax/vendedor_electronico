<?php
 include ("../sgbd/interacion.php");
require_once   $_SERVER["DOCUMENT_ROOT"] . '/app_php/vendedor_electronico/assets/libreria/phpexcel/Classes/PHPExcel.php';
 $file=$_FILES["input_excel"];

 $banco=$_REQUEST["banco"];
  $file=  ($file["tmp_name"]);
$objPHPExcel = PHPExcel_IOFactory::createReaderForFile($file);
$excel_obj=$objPHPExcel->load($file);
$hoja=$excel_obj->getSheet(0);
$numerofila=$hoja->getHighestRow();
 
// Set document properties
  $html="";
         for ($i=banco_fila_inicio($banco); $i <=banco_fila_final($banco,$numerofila) ; $i++) { 
                # code...
                $a=$hoja->getCell(banco_columna($banco,0).$i)->getValue();
                $b=$hoja->getCell(banco_columna($banco,1).$i)->getValue();
                $c= banco_columna($banco,2); 
                $a=str_replace("/","-",$a);  
                $newDate = date("Y-m-d", strtotime($a));
                if ($b=="") {$b="No existe baucher";} else {$b=$b;}
                $valor="null,'$newDate',$banco,$b";
                if ((existe_datos("tbl_bancos","where id_forma_pago=$banco and documento='$b'")>0)) {
                         if(existe_datos("tbl_facturacion","where  documento='$b'")){
                      update("tbl_facturacion","estado_facturacion='Baucher comprobado'","documento='$b'");
                    } 
                }else {
                    insertar("tbl_bancos","id_bancos, fecha, id_forma_pago, documento",$valor);
                    if(existe_datos("tbl_facturacion","where  documento='$b'")){
                      update("tbl_facturacion","estado_facturacion='Baucher comprobado'","documento='$b'");
                    } 
                }  
        } 
       echo '<script>alert("Ingresar seguimiento de la factura en el menu");
    window.location.href=("https://lab-mrtecks.com/app_php/vendedor_electronico/");
    </script>';   
      
      function banco_columna($banco,$i)
      {
      
              switch ($banco) {
                      case '2':
                              $columna[0]="A";
                              $columna[1]="C";
                              $columna[2]="Pichincha";
                              break;
                                    case '3':
                              $columna[0]="B";
                              $columna[1]="E";
                              $columna[2]="Bolivariano";
                              break;
                                    case '4':
                              $columna[0]="A";
                              $columna[1]="C";
                              $columna[2]="JEP";
                              break; 
              }

              return $columna[$i];
      }
        function banco_fila_inicio($banco)
      {
      $inicio="";
              switch ($banco) {
                      case '2':
                             $inicio="2";
                              break;
                                    case '3':
                           $inicio="6";
                              break;
                                    case '4':
                     $inicio="8";
                              break; 
              }

              return $inicio;
      }
      
   function banco_fila_final($banco,$fila)
      {
      $fin="";
              switch ($banco) {
                      case '2':
                             $fin=$fila;
                              break;
                                    case '3':
                           $fin=$fila;
                              break;
                                    case '4':
                     $fin=$fila-1;
                              break; 
              }

              return $fin;
      }
  
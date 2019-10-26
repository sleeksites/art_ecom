
<?php
    //require('./fpdf/fpdf.php');
    require('db_info.php');
    $order_id = $_POST['oid'];
    $select_sql = "select * from orders where '$order_id'";
    $result = $con -> query($select_sql);
    $new_name = "Jishant";
    $pdf = new FPDF('P','mm','A4');
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',30);
    $pdf->SetTextColor(0,0,0);
    $pdf->MultiCell(0,0,"Invoice",0,'R');
    $pdf->Output();
?>
<?php
include'koneksi.php';
include"fpdf.php";
require('makefont/makefont.php');
$pdf = new FPDF("L","cm","A4");

$pdf->SetMargins(1,1,1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',12);
$pdf->SetX(1.6);            
$pdf->MultiCell(15.5,0.6,'PT. MITRA SAKANA BALI',0,'L');
$pdf->SetX(1.6);
$pdf->SetFont('Times','i',10);
$pdf->MultiCell(22.5,0.6,'Jln. Pelabuhan Benoa No.88, Denpasar, Bali',0,'L'); 

$pdf->SetX(1.6);
$pdf->SetFont('Times','i',10);
$pdf->MultiCell(22.5,0.6,"Laporan Hasil Interview",0,'L'); 
$pdf->Line(1,3.1,28.5,3.1);
$pdf->SetLineWidth(0.1);      
$pdf->Line(1,3.2,28.5,3.2);   
$pdf->SetLineWidth(0);
$pdf->SetFont('Times','i',8);
$pdf->ln(1);
$pdf->Cell(3.5,0.7,"Di cetak pada : ".date("D-d/m/Y"),0,0,'C');
$pdf->ln(1);
$pdf->SetFont('Times','B',10);
$pdf->Cell(1, 0.5, 'No', 1, 0, 'C');
$pdf->Cell(9, 0.5, 'Pelamar', 1, 0, 'L');
$pdf->Cell(9.5, 0.5, 'Lowongan', 1, 0, 'L');
$pdf->Cell(3, 0.5, 'Nilai Interview', 1, 0, 'L');
$pdf->Cell(5, 0.5, 'Status', 1, 1, 'L');

 $no=1;
 $query="SELECT*FROM tbl_lamaran WHERE status_interview!=''";
 $sql=mysqli_query($connect, $query);
 while($data=mysqli_fetch_array($sql)) { 
    $pdf->SetFont('Times','',10);
    $pdf->Cell(1, 0.5, $no,1, 0, 'L');

    $query_pelamar=mysqli_query($connect, "SELECT * FROM tbl_pelamar WHERE id_pelamar='".$data['id_pelamar']."'");
    while($data_pelamar=mysqli_fetch_array($query_pelamar)){
         $pdf->Cell(9, 0.5, "(".$data['id_pelamar'].")".$data_pelamar['nama_pelamar'],1, 0, 'L');
     }

      $query_lowongan=mysqli_query($connect, "SELECT * FROM tbl_lowongan WHERE id_lowongan='".$data['id_lowongan']."'");
      $data_lowongan=mysqli_fetch_array($query_lowongan);
      $pdf->Cell(9.5, 0.5,"(".$data['id_lowongan'].") ".$data_lowongan['judul']."-".$data_lowongan['tgl_upload'],1, 0, 'L');

      $query_nilai=mysqli_query($connect, "SELECT * FROM tbl_nilai_interview WHERE id_lamaran='".$data['id_lamaran']."'");
      $data_nilai=mysqli_fetch_array($query_nilai);
      $pdf->Cell(3, 0.5, $data_nilai['nilai_interview'],1, 0, 'L');
      $pdf->Cell(5, 0.5, $data_nilai['status'],1, 1, 'L');
                           
       
        $no++;
    }
     

$order="SELECT * FROM tbl_nilai_interview WHERE status='Lulus'";
$query_order=mysqli_query($connect, $order);
$data_order=array();
while(($row_order=mysqli_fetch_array($query_order)) !=null){
$data_order[]=$row_order;
}
$count=count($data_order);
$pdf->SetFont('Times','B',10);
$pdf->Cell(22.5, 0.6,"Lulus",1, 0, '');
$pdf->Cell(5, 0.6, $count ,1, 1, 'C');

$order_a="SELECT * FROM tbl_nilai_interview WHERE status='Tidak Lulus'";
$query_order_a=mysqli_query($connect, $order_a);
$data_order_a=array();
while(($row_order_a=mysqli_fetch_array($query_order_a)) !=null){
$data_order_a[]=$row_order_a;
}
$count_x=count($data_order_a);
$pdf->SetFont('Times','B',10);
$pdf->Cell(22.5, 0.6,"Tidak Lulus",1, 0, '');
$pdf->Cell(5, 0.6, $count_x ,1, 1, 'C');
$pdf->Output();
?>
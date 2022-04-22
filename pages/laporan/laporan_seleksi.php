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
$pdf->Image('img/lg.png', 1, 1, 2);
$pdf->SetX(1.6);
$pdf->SetFont('Times','B',12);
$pdf->SetX(3);            
$pdf->MultiCell(15.5,0.6,'PT. PRIMAFOOD INTERNATIONAL',0,'L');
$pdf->SetX(3);
$pdf->SetFont('Times','i',10);
$pdf->MultiCell(22.5,0.6,'Jln. Pelabuhan Benoa No.88, Denpasar, Bali',0,'L'); 
$periode = $_POST['periode'];
$tahun = $_POST['tahun'];
$pdf->SetX(3);
$pdf->SetFont('Times','i',10);
$pdf->MultiCell(22.5,0.6,"Laporan Hasil Seleksi Penerimaan Karyawan Periode: ".$periode."/ Tahun: ".$tahun,0,'L'); 
$pdf->Line(1,3.1,28.5,3.1);
$pdf->SetLineWidth(0.1);      
$pdf->Line(1,3.2,28.5,3.2);   
$pdf->SetLineWidth(0);
$pdf->SetFont('Times','i',8);
$periode = $_POST['periode'];
$tahun = $_POST['tahun'];
$pdf->ln(1);
$pdf->Cell(3.5,0.7,"Di cetak pada : ".date("D-d/m/Y"),0,0,'C');
$pdf->ln(1);
$pdf->SetFont('Times','B',10);
$pdf->Cell(1, 0.5, 'No', 1, 0, 'C');
$pdf->Cell(7, 0.5, 'Nama', 1, 0, 'C');
$pdf->Cell(2, 0.5, 'JK', 1, 0, 'C');
$pdf->Cell(4, 0.5, 'Alamat', 1, 0, 'C');
$pdf->Cell(4, 0.5, 'No. Telepon', 1, 0, 'C');
$pdf->Cell(7, 0.5, 'Perangkingan', 1, 0, 'C');
$pdf->Cell(2.5, 0.5, 'Status', 1, 1, 'C');

    $pdf->SetFont('Times','',10);
    $no=1;
    $query1="SELECT * FROM tbl_hasil_seleksi WHERE month(tanggal)='$periode' AND year(tanggal)='$tahun'";
    $sql1=mysqli_query($connect, $query1);
    while ($data1=mysqli_fetch_array($sql1)){
        $pdf->Cell(1, 0.5, $no,1, 0, 'C');
        $query2="SELECT * FROM tbl_pelamar WHERE id_pelamar='".$data1['id_pelamar']."'";
        $sql2=mysqli_query($connect, $query2);
        $data2=mysqli_fetch_array($sql2);
        $pdf->Cell(7, 0.5, $data2['nama_pelamar'],1, 0, 'L');
        $pdf->Cell(2, 0.5, $data2['jk_pelamar'],1, 0, 'L');
        $pdf->Cell(4, 0.5, $data2['alamat_pelamar'],1, 0, 'L');
        $pdf->Cell(4, 0.5, $data2['telepon_pelamar'],1, 0, 'L');

        $pdf->Cell(7, 0.5, $data1['rangking'],1, 0, 'C');
        $pdf->Cell(2.5, 0.5, $data1['status_seleksi'],1, 1, 'L');
        $no++;
    }
    $result="SELECT status_seleksi, COUNT(status_seleksi) AS jumlah FROM tbl_hasil_seleksi WHERE month(tanggal)='$periode' AND year(tanggal)='$tahun' GROUP BY status_seleksi ORDER BY jumlah DESC";
     $sd=mysqli_query($connect, $result);
    while($hasil=mysqli_fetch_object($sd))
    {
        $pdf->Cell(25, 0.8, $hasil->status_seleksi,1, 0, '');
        $pdf->Cell(2.5, 0.8, $hasil->jumlah,1, 1, 'C');
    }

   $pdf->ln(1);
   $pdf->SetFont('Times','B',12);
     $pdf->Cell(20, 0.9,"Hasil Rekapitulasi Kelulusan Pelamar Periode ".$periode."/ Tahun: ".$tahun, 0, 1, 'L');
   
    $pdf->SetFont('Times','B',10);
    $pdf->Cell(1, 0.5, 'No', 1, 0, 'C');
    $pdf->Cell(7, 0.5, 'Nama', 1, 0, 'C');
    $pdf->Cell(2, 0.5, 'JK', 1, 0, 'C');
    $pdf->Cell(4, 0.5, 'Alamat', 1, 0, 'C');
    $pdf->Cell(4, 0.5, 'No. Telepon', 1, 0, 'C');
    $pdf->Cell(7, 0.5, 'Perangkingan', 1, 0, 'C');
    $pdf->Cell(2.5, 0.5, 'Status', 1, 1, 'C');
     $pdf->SetFont('Times','',11);
        $no=1;
    $query1="SELECT * FROM tbl_hasil_seleksi WHERE month(tanggal)='$periode' AND year(tanggal)='$tahun' AND status_seleksi='Lulus'";
    $sql1=mysqli_query($connect, $query1);
    while ($data1=mysqli_fetch_array($sql1)){
        $pdf->Cell(1, 0.5, $no,1, 0, 'C');
        $query2="SELECT * FROM tbl_pelamar WHERE id_pelamar='".$data1['id_pelamar']."'";
        $sql2=mysqli_query($connect, $query2);
        $data2=mysqli_fetch_array($sql2);
        $pdf->Cell(7, 0.5, $data2['nama_pelamar'],1, 0, 'L');
        $pdf->Cell(2, 0.5, $data2['jk_pelamar'],1, 0, 'L');
        $pdf->Cell(4, 0.5, $data2['alamat_pelamar'],1, 0, 'L');
        $pdf->Cell(4, 0.5, $data2['telepon_pelamar'],1, 0, 'L');

        $pdf->Cell(7, 0.5, $data1['rangking'],1, 0, 'C');
        $pdf->Cell(2.5, 0.5, $data1['status_seleksi'],1, 1, 'L');
        $no++;
    }
    $order="SELECT * FROM tbl_hasil_seleksi WHERE month(tanggal)='$periode' AND year(tanggal)='$tahun' AND status_seleksi='Lulus'";
$query_order=mysqli_query($connect, $order);
$data_order=array();
while(($row_order=mysqli_fetch_array($query_order)) !=null){
$data_order[]=$row_order;
}
$count=count($data_order);
$pdf->SetFont('Times','B',10);
$pdf->Cell(25, 0.6,"Jumlah Pelamar Lulus",1, 0, '');
$pdf->Cell(2.5, 0.6, $count ,1, 1, 'C');
$pdf->Output();
?>
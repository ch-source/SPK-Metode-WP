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
$pdf->MultiCell(22.5,0.6,"Laporan Data Pelamar Periode: ".$periode."/ Tahun: ".$tahun,0,'L'); 
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
$pdf->Cell(5, 0.5, 'Nama', 1, 0, 'L');
$pdf->Cell(5, 0.5, 'Alamat', 1, 0, 'L');
$pdf->Cell(3, 0.5, 'No. Telepon', 1, 0, 'L');
$pdf->Cell(4, 0.5, 'Email', 1, 0, 'L');
$pdf->Cell(4, 0.5, 'Pendidikan', 1, 0, 'L');
$pdf->Cell(2.5, 0.5, 'Status', 1, 0, 'L');
$pdf->Cell(3, 0.5, 'Tgl. Registrasi', 1, 1, 'L');
$sql="SELECT * FROM tbl_user WHERE month(tgl_registrasi)='$periode' AND year(tgl_registrasi)='$tahun' AND level='Pelamar'";
$tampil=mysqli_query($connect, $sql);
while($lihat=mysqli_fetch_array($tampil)){
    $pdf->SetFont('Times','',10);
    $no=1;
    $query1="SELECT * FROM tbl_pelamar WHERE id_pelamar='".$lihat['id_pelamar']."'";
    $sql1=mysqli_query($connect, $query1);
    while ($data1=mysqli_fetch_array($sql1)){
        $pdf->Cell(1, 0.5, $no,1, 0, 'L');
        $pdf->Cell(5, 0.5, $data1['nama_pelamar'],1, 0, 'L');
        $pdf->Cell(5, 0.5, $data1['alamat_pelamar'],1, 0, 'L');
        $pdf->Cell(3, 0.5, $data1['telepon_pelamar'],1, 0, 'L');
        $pdf->Cell(4, 0.5, $data1['email_pelamar'],1, 0, 'L');
        $pdf->Cell(4, 0.5, $data1['pendidkan_terakhir_pelamar'],1, 0, 'L');
        $query_a="SELECT*FROM tbl_hasil_seleksi WHERE id_pelamar='".$data1['id_pelamar']."'";
        $sql_a=mysqli_query($connect, $query_a);
        $data_a=mysqli_fetch_array($sql_a);
        if ($data_a['status_seleksi']=='Lulus') {
            $pdf->Cell(2.5, 0.5, "Diterima",1, 0, 'L');
        }elseif($data_a['status_seleksi']=='Tidak Lulus') {
            $pdf->Cell(2.5, 0.5, "Tidak Diterima",1, 0, 'L');
        }else{
            $pdf->Cell(2.5, 0.5, "",1, 0, 'L');
        }
       
        $no++;
    }
     $pdf->Cell(3, 0.5, $lihat['tgl_registrasi'],1, 1, 'L');
}

$order="SELECT * FROM tbl_user WHERE month(tgl_registrasi)='$periode' AND year(tgl_registrasi)='$tahun' AND level='Pelamar'";
$query_order=mysqli_query($connect, $order);
$data_order=array();
while(($row_order=mysqli_fetch_array($query_order)) !=null){
$data_order[]=$row_order;
}
$count=count($data_order);
$pdf->SetFont('Times','B',10);
$pdf->Cell(24.5, 0.6,"Jumlah Pelamar",1, 0, '');
$pdf->Cell(3, 0.6, $count ,1, 1, 'C');
$pdf->Output();
?>
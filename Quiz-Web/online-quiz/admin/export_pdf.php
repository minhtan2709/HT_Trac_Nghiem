<?php
session_start();
require_once('TCPDF/TCPDF-main/tcpdf.php');
include "../connection.php";

if(!isset($_SESSION["admin_name"]))
{
    header('Location: /login system admin/login_form.php');
    exit();
}

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Your Name');
$pdf->SetTitle('Exam Results');
$pdf->SetSubject('Exam Results PDF');
$pdf->SetKeywords('Exam, Results, PDF');

// set default font subsetting mode
$pdf->setFontSubsetting(true);



// add a page
$pdf->AddPage();



// fetch data from database
$res=mysqli_query($link,"select * from exam_results order by id desc");

$pdf->SetFont('dejavusans', 'B', 16); //font bold
$pdf->MultiCell(0, 0, 'Bảng kết quả thi', 0, 'C');


// set font
$pdf->SetFont('dejavusans', 'B', 10);
// create table header
$header = array('Tên tài khoản');
$header2 = array('Chủ đề thi', 'Tổng câu hỏi', 'Đáp án đúng', 'Đáp án sai');
$header3 = array('Thời gian làm bài');

$pdf->Ln();
$pdf->Ln();

// create table
$pdf->SetFillColor(5, 152, 98); // thiết lập background màu xanh lá
$pdf->SetTextColor(255, 255, 255); // thiết lập màu chữ trắng


// cột header
foreach($header as $col) {
    $pdf->Cell(40, 7, $col, 1, 0, 'C',1);
}
// cột header 2
foreach($header2 as $col) {
    $pdf->Cell(27, 7, $col, 1, 0, 'C',1);
    
}
// cột header 3
foreach($header3 as $col) {
    $pdf->Cell(40, 7, $col, 1, 0, 'C',1);
    
}

$pdf->SetTextColor(0, 0, 0); // thiết lập màu chữ đen
$pdf->SetFont('dejavusans', '', 10); // font bình thường

while($row=mysqli_fetch_array($res)) {
    $pdf->Ln();
    $pdf->Cell(40, 7, $row["username"], 1, 0, 'C');
    $pdf->Cell(27, 7, $row["exam_type"], 1, 0, 'C');
    $pdf->Cell(27, 7, $row["total_question"], 1, 0, 'C');
    $pdf->Cell(27, 7, $row["correct_answer"], 1, 0, 'C');
    $pdf->Cell(27, 7, $row["wrong_answer"], 1, 0, 'C');
    $pdf->Cell(40, 7, $row["exam_time"], 1, 0, 'C');
}

// output the PDF
$pdf->Output('Bảng kết quả.pdf', 'D');
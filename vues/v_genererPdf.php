<?php
//fonction qui créer le pdf de la reservation
require('fpdf/fpdf.php');
$fraisForfait = $_SESSION['fraisForfait'];
$fraisHorsForfait = $_SESSION['fraisHorsForfait'];
$visiteur = $_SESSION['visiteur'];
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','',12);
$pdf->Image('images/logo.jpg',10,10, 30, 30);
$pdf->Ln(40);
$pdf->Cell(75,7,"Fiche de frais du visiteur : ".utf8_decode($visiteur[0]));
$pdf->MultiCell(30,7,utf8_decode($visiteur[1]));
$pdf->Ln(10);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(180,7,"Remboursement de frais engages",1,0,"C");
$pdf->SetFont('Arial','',12);
$pdf->Ln(7);
$pdf->Cell(50,7,"Frais Forfaitaires",1,0,"C");
$pdf->Cell(30,7,"Quantite",1,0,"C");
$pdf->Cell(50,7,"Montant Unitaire",1,0,"C");
$pdf->Cell(50,7,"Total",1,0,"C");
$pdf->Ln(7);
foreach ($fraisForfait as $lesFraisF){
    $pdf->Cell(50,7,utf8_decode($lesFraisF["libelle"]),1,0,"C");
    $pdf->Cell(30,7,$lesFraisF["quantite"],1,0,"C");
    $pdf->Cell(50,7,$lesFraisF["montant"],1,0,"C");
    $pdf->Cell(50,7,$lesFraisF["quantite"]*$lesFraisF["montant"],1,0,"C");
    $pdf->Ln(7);
}
$pdf->Ln(20);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(180,7,"Autre frais",1,0,"C");
$pdf->SetFont('Arial','',12);
$pdf->Ln(7);
$pdf->Cell(50,7,"Date",1,0,"C");
$pdf->Cell(80,7,"Libelle",1,0,"C");
$pdf->Cell(50,7,"Montant",1,0,"C");
$pdf->Ln(7);
foreach ($fraisHorsForfait as $lesFraisF){
    $pdf->Cell(50,7,$lesFraisF[3],1,0,"C");
    $pdf->Cell(80,7,utf8_decode($lesFraisF[5]),1,0,"C");
    $pdf->Cell(50,7,$lesFraisF[4],1,0,"C");
    $pdf->Ln(7);
}
$pdf->Ln(20);
$pdf->Cell(80,7,utf8_decode("Fait à Paris, le ").date('d M Y'));
$pdf->Ln(7);
$pdf->Cell(50,7,"Vu l'agent comptable");
$pdf->Image('images/signature.png',150,260, 43, 23);
ob_end_clean();
$pdf->Output();


<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
<head>
	<title>Suivi des frais de visite</title>
	
</head>
<body>
    <div name="gauche" style="clear:left;float:left;width:18%; height:100%;">
    <div name="coin" style="height:10%;text-align:center;"><img src="images/logo.jpg" width="100" height="60"/></div>
    <div name="menu" >
	<h2>Outils</h2>
	<ul><li>Frais</li>
		<ul>
			<li><a href="formSaisieFrais.htm" >Nouveau</a></li>
			<li><a href="formConsultFrais.htm">Consulter</a></li>
		</ul>
	</ul>
</div>
</div>
<div name="droite" style="float:left;width:80%;">
	<div name="haut" style="margin: 2 2 2 2 ;height:10%;float:left;"><h1>Suivi de remboursement des Frais</h1></div>	
	<div name="bas" style="margin : 10 2 2 2;clear:left;background-color:77AADD;color:white;height:88%;">
            <form name="formConsultFrais" method="post" action="index.php?uc=suiviFrais&action=genererPdf">
		<!--<h1> Période </h1>
			<label class="titre">Mois/Année :</label> <input class="zone" type="text" name="dateConsult" size="12" />
		<p class="titre" />-->
		<div style="clear:left;"><h2>Frais au forfait </h2></div>
		<table style="color:white;" border="1">
			<!--<tr><th>Repas midi</th><th>Nuitée </th><th>Etape</th><th>Km </th><th>Situation</th><th>Date opération</th><th>Remboursement</th></tr>-->
			<thead>
                <td>Libelle</td>
                <td>Quantité</td>
                <td>Montant</td>
                <td>Total</td>
            </thead>
                            <?php foreach ($fraisForfait as $lesFraisF){ ?>
       
                        <tr align="center">
                                <tr>
                                    <td><?php echo $lesFraisF["libelle"];?></td>
                                    <td><?php echo $lesFraisF["quantite"];?></td>
                                    <td><?php echo $lesFraisF["montant"];?></td>
                                    <td><?php echo $lesFraisF["quantite"] * $lesFraisF["montant"];?></td>
                                </tr>			      
			</tr><?php } ?>	
		</table>
		
		<p class="titre" /><div style="clear:left;"><h2>Hors Forfait</h2></div>
		<table style="color:white;" border="1">
			<tr><th>Date</th><th>Libellé </th><th>Montant</th><th>Date opération</th></tr>
			<?php foreach ($fraisHorsForfait as $lesHorsFraisF){ ?>
                        <tr align="center">
                                <td width="100" ><?php echo  $lesHorsFraisF[4] ; ?><label size="12" name="hfDate1"/></td>
				<td width="220"><?php echo  $lesHorsFraisF[3] ; ?><label size="30" name="hfLib1"/></td> 
				<td width="90" ><?php echo  $lesHorsFraisF[5] ; ?><label size="10" name="hfMont1"/></td>
				<td width="80"><?php echo  $lesHorsFraisF[4] ; ?><label size="3" name="hfDateOper1" /></td>		
				</tr><?php } ?>	
		</table>	
		<!--<p class="titre"></p>
		<div class="titre">Nb Justificatifs</div><input type="text" class="zone" size="4" name="hcMontant"/>
	        -->
                <br /><input id="pdfFrais" type="submit" value="Generer PDF" size="20" />
                <br /><a href="index.php?uc=suiviFrais&action=telechargerPdf" method="POST"><img src="images/pdf_icon.gif"/></a>
                            
                         
        </form>
	</div>
 
      

</div>
</body>
</html>
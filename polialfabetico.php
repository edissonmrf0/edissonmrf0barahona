<HTML>
<head>
    <title>ElectivaIV_Programa_cesar</title>
    <style type="text/css">
        .auto-style1 {
            width: 100%;
            text-align: center;
            font-weight: 700;
        }
        .auto-style2 {
        }
        </style>
</head>
<BODY>
 
    <?php
	//VECTOR DEL ALFABETO PLANTEADO  ...........   chr($car)
$ALFA[0]=chr(193);
$ALFA[1]=chr(201);
$ALFA[2]=chr(205);
$ALFA[3]=chr(211);
$ALFA[4]=chr(218);
$ALFA[5]=chr(225);
$ALFA[6]=chr(233);
$ALFA[7]=chr(237);
$ALFA[8]=chr(243);
$ALFA[9]=chr(250);
 
$ALFA[10]=chr(65);
$ALFA[11]=chr(66);
$ALFA[12]=chr(67);
$ALFA[13]=chr(68);
$ALFA[14]=chr(69);
$ALFA[15]=chr(70);
$ALFA[16]=chr(71);
$ALFA[17]=chr(72);
$ALFA[18]=chr(73);
$ALFA[19]=chr(74);
 
$ALFA[20]=chr(75);
$ALFA[21]=chr(76);
$ALFA[22]=chr(77);
$ALFA[23]=chr(78);
$ALFA[24]=chr(209);
$ALFA[25]=chr(79);
$ALFA[26]=chr(80);
$ALFA[27]=chr(81);
$ALFA[28]=chr(82);
$ALFA[29]=chr(83);
 
$ALFA[30]=chr(84);
$ALFA[31]=chr(85);
$ALFA[32]=chr(86);
$ALFA[33]=chr(87);
$ALFA[34]=chr(88);
$ALFA[35]=chr(89);
$ALFA[36]=chr(90);
$ALFA[37]=chr(48);
$ALFA[38]=chr(49);
$ALFA[39]=chr(50);
 
$ALFA[40]=chr(51);
$ALFA[41]=chr(52);
$ALFA[42]=chr(53);
$ALFA[43]=chr(54);
$ALFA[44]=chr(55);
$ALFA[45]=chr(56);
$ALFA[46]=chr(57);
$ALFA[47]=chr(32);
$ALFA[48]=chr(46);
$ALFA[49]=chr(44);
 
$ALFA[50]=chr(59);
$ALFA[51]=chr(45);
$ALFA[52]=chr(43);
$ALFA[53]=chr(42);
$ALFA[54]=chr(92);
$ALFA[55]=chr(47);
$ALFA[56]=chr(97);
$ALFA[57]=chr(98);
$ALFA[58]=chr(99);
$ALFA[59]=chr(100);
 
$ALFA[60]=chr(101);
$ALFA[61]=chr(102);
$ALFA[62]=chr(103);
$ALFA[63]=chr(104);
$ALFA[64]=chr(105);
$ALFA[65]=chr(106);
$ALFA[66]=chr(107);
$ALFA[67]=chr(108);
$ALFA[68]=chr(109);
$ALFA[69]=chr(110);
 
$ALFA[70]=chr(241);
$ALFA[71]=chr(111);
$ALFA[72]=chr(112);
$ALFA[73]=chr(113);
$ALFA[74]=chr(114);
$ALFA[75]=chr(115);
$ALFA[76]=chr(116);
$ALFA[77]=chr(117);
$ALFA[78]=chr(118);
$ALFA[79]=chr(119);
 
$ALFA[80]=chr(120);
$ALFA[81]=chr(121);
$ALFA[82]=chr(122);
$ALFA[83]=chr(64);
$ALFA[84]=chr(34);
$ALFA[85]=chr(39);
 
?>
 
 
 
        <form method="POST" action="ElectivaIV_Programa_polialfabetico.php">
    <div>
 
        <table class="auto-style1">
            <tr>
          <td colspan="2" style="text-align: center; font-weight: 700" class="auto-style1">CRIPTOGRAFÃA CESAR</td>
            </tr>
            <tr>
                <td colspan="2" class="auto-style1">
                LLAVE: <input type="text" name="Llave"></td>
                </td>
            </tr>
            <tr>
                <td colspan="2" class="auto-style1">&nbsp;</td>
            </tr>
            <tr>
                <td class="auto-style2">ENCRIPTAR</td>
                <td style="font-weight: 700; text-align: center" class="auto-style2">DECENCRIPTAR</td>
            </tr>
            <tr>
                <td class="auto-style2">
     <textarea name="Enc" maxlength="1000" size="100" rows="7" style="width:500px; height:150px"></textarea>
     <br><input type="submit" value="Encriptar" name="Encriptar"> 
                </td>
                <td class="auto-style2">
     <textarea name="Des" maxlength="1000" size="100" rows="7" style="width:500px; height:150px"></textarea>
     <br><input type="submit" value="Desencriptar" name="Desencriptar">
                </td>
            </tr>
        </table>
 
    </div>
    </form>
<?php
if(isset($_POST['Encriptar'])){
$bn=0;
$Texto=$_POST['Enc'];
$Llave=$_POST['Llave'];
//$Tipo=$_POST['Tipo'];
//$Nombre=$_POST['Figura'];

	  //marca la posicion de la  llave en el abecedario para saber el valor a sumar
	  $tamaño_llave=Strlen($Llave);
	  $posi=0;
	  $flag=0;
	  for ($i=0; $i < $tamaño_llave; $i++) { //recorre el texto escrito 
		  for ($j=0; $j < 86; $j++) { //recorre el vector con el abecedario 
			   if($Llave[$i] == $ALFA[$j]){
				  $sum_llave[$posi]=$j; 
				  $posi++;
				  $flag=1;
			   }else{
				   if($flag==0){
				   $sum_llave[$posi]=0; 
				   }			   
			   } 
		  }
		  if($flag==0){
		    $posi++; 
		  }	
	    $flag=0; 
	}
	
	//recore el texto a encriptar para sumarle el valorrespectivo
	  $posi_llave=0;
	  $flag=0;
      $tamaño=strlen($Texto);//tamaño de el texto 
	  for ($i=0; $i < $tamaño; $i++) { //recorre el texto escrito 
		  for ($j=0; $j < 86; $j++) { //recorre el vector con el abecedario 
			   if($Texto[$i] == $ALFA[$j]){			   
				  $posi=($j+$sum_llave[$posi_llave])%86;
				  $Resultado[$i]=$ALFA[$posi];	
				    $posi_llave++;
				    if($posi_llave==$tamaño_llave){
						$posi_llave=0;
					}
				  $flag=1;
			   }else{ 
			      if($flag==0){
				  $Resultado[$i]=$Texto[$i];
				  }
			  }
		  }
		$flag=0;  
	 }
	 
	 $tamaño_vector=count($Resultado);
	 if($posi_llave<$tamaño_llave && $posi_llave!=0){
		 for($i=$posi_llave; $i<$tamaño_llave;$i++){
			 $posi=(47+$sum_llave[$i])%86;
			 $Resultado[$tamaño_vector]=$ALFA[$posi];	
			 $tamaño_vector++;
		 }
	 }
	
     $ResulString = implode("",$Resultado);
?>
<table width="500px"  height="150px" border="1"  align="center">
  <tr>
      <td colspan="2" class="auto-style1">RESULTADO</td>
  </tr>
  <tr>
     <td class="auto-style1" colspan="2">
  <textarea name="Texto" maxlength="1000" size="100" rows="7" style="width:500px; height:150px"><?php echo $ResulString;?></textarea>
     </td>
  </tr>
  </tbody>
</table>
<?php } //if(isset($_POST['Encriptar'])){ ?>
 
<?php
if(isset($_POST['Desencriptar'])){
$bn=0;
$Texto=$_POST['Des'];
$Llave=$_POST['Llave'];
//$Tipo=$_POST['Tipo'];
//$Nombre=$_POST['Figura'];

	  //marca la posicion de la  llave en el abecedario para saber el valor a sumar
	  $tamaño_llave=Strlen($Llave);
	  $posi=0;
	  $flag=0;
	  for ($i=0; $i < $tamaño_llave; $i++) { //recorre el texto escrito 
		  for ($j=0; $j < 86; $j++) { //recorre el vector con el abecedario 
			   if($Llave[$i] == $ALFA[$j]){
				  $sum_llave[$posi]=$j; 
				  $posi++;
				  $flag=1;
			   }else{
				   if($flag==0){
				   $sum_llave[$posi]=0; 
				   }			   
			   } 
		  }
		  if($flag==0){
		    $posi++; 
		  }	
	    $flag=0; 
	}
	
	//recore el texto a encriptar para sumarle el valorrespectivo
	  $posi_llave=0;
	  $flag=0;
      $tamaño=strlen($Texto);//tamaño de el texto 
	  for ($i=0; $i < $tamaño; $i++) { //recorre el texto escrito 
		  for ($j=0; $j < 86; $j++) { //recorre el vector con el abecedario 
			   if($Texto[$i] == $ALFA[$j]){	  
				  $posi=($j-$sum_llave[$posi_llave])%86;
				   if($posi<0){
					     $posi=$posi+86;
						 $Resultado[$i]=$ALFA[$posi];
					  }else{  
					  $Resultado[$i]=$ALFA[$posi];
				     }	
				   $posi_llave++;
				   if($posi_llave==$tamaño_llave){
					 $posi_llave=0;
				   }
				  $flag=1;
			   }else{ 
			      if($flag==0){
				  $Resultado[$i]=$Texto[$i];
				  }
			  }
		  }
		$flag=0;  
	 }
	 
	 $tamaño_vector=count($Resultado);
	 if($posi_llave<$tamaño_llave && $posi_llave!=0){
		 for($i=$posi_llave; $i<$tamaño_llave;$i++){
			 $posi=(47-$sum_llave[$i])%86;
			  if($posi<0){
				 $posi=$posi+86;
				 $Resultado[$tamaño_vector]=$ALFA[$posi];
			 }else{  
       			 $Resultado[$tamaño_vector]=$ALFA[$posi];
		     }
			 $tamaño_vector++;
		 }
	 }
     $ResulString = implode("",$Resultado);
?>
<table width="500px"  height="150px" border="1"  align="center">
  <tr>
      <td colspan="2" class="auto-style1">RESULTADO</td>
  </tr>
  <tr>
     <td class="auto-style1" colspan="2">
  <textarea name="Texto" maxlength="1000" size="100" rows="7" style="width:500px; height:150px"><?php echo $ResulString;?></textarea>
     </td>
  </tr>
  </tbody>
</table>
<?php } //if(isset($_POST['Encriptar'])){ ?>
 
	</BODY>
</HTML>
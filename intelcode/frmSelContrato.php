<?php
	@session_start();
	include('class.db.php');
	if(isset($_POST['cmdSelContrato']))	{
		$_SESSION['ssIdTurno']	=	$_POST['cmbTurno'];
		header("Location:./frmMenu.php");
	}
?>
<html  DIR=ltr >
<head>
	<title>Seleccion del Contrato</title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
	<link rel="stylesheet" type="text/css" href="Ui/themes/metro/easyui.css">
	<link rel="stylesheet" type="text/css" href="Ui/themes/icon.css">
	<script type="text/javascript" src="Ui/jquery-1.8.0.min.js"></script>
	<script type="text/javascript" src="Ui/jquery.easyui.min.js"></script>

	<script type="text/javascript">
		$('input[type="submit"]').attr('disabled','disabled');
		var mesload	=	"<p style=\"text-align: center;\">Cargando...<br /><img src=\"loading_green.gif\"><br /></p>";
		cajon = 'Label8';
		// function $(id){return document.getElementById(id);}
		//Funciones:
		function creaAjax()	{
			var objetoAjax	=	false;
			try	{
				objetoAjax	=	new ActiveXObject("Msxm12.XMLHTTP");
			}	catch(e)	{
				try	{
					objetoAjax	=	new ActiveXObject("Microsoft.XMLHTTP");
				}	catch(e)	{
					objetoAjax	=	false;
				}
			}
			if(!objetoAjax	&&	typeof XMLHttpRequest	!=	'undefined')	{
				objetoAjax	=	new XMLHttpRequest();
			}
			return objetoAjax;
		}
		function GetInfoFromContract(Contract)	{
			var ajax	=	creaAjax();
			// var InfoDeContrato;
			$('input[type="submit"]').attr('disabled','disabled');
			$('#Label8').html(mesload);
			ajax.open("GET" , "ajax.php?src=DatosDeContrato&Contrato="+Contract , true);
			ajax.onreadystatechange	=	function()	{
				if(ajax.readyState	==	4)	{
					if(ajax.status	==	200)	{
						contenido	=	ajax.responseText;
						// var InfoDeContrato = contenido;
						eval('InfoDeContrato = ' + contenido);
						// InfoDeContrato = eval(contenido);
						for(i in InfoDeContrato){
							if(i == 'Descripcion') {
								$('#Label8').html(InfoDeContrato[i]);
							}
							if(i == 'Contrato')	{
								$('#ContratoSeleccionado').html(InfoDeContrato[i]);
							}
							if(i == 'FechaInicio')	{
								// $("input").Val(InfoDeContrato[i]);
								// window.document.FrmSelContrato.txtFechaInicio.value = InfoDeContrato[i];
								// document.FrmSelContrato.txtFechaInicio.value = InfoDeContrato[i];
								// document.forms["FrmSelContrato"].elements["txtFechaInicio"].Value = InfoDeContrato[i];
								$('#txtFechaInicio').val(InfoDeContrato[i]);
							}
							if(i == 'FechaFinal')	{
								$('#txtFechaFinal').val(InfoDeContrato[i]);
							}

							if(i == 'Turnos')	{
								// alert($("#cmbTurno").length);
								$('#cmbTurno').find('option').remove();
								for(z in InfoDeContrato[i])	{
									NuevoNodo="<option value='"+z+"'>" + InfoDeContrato[i][z] + "</option>";
      								$("#cmbTurno").append(NuevoNodo);
      							}
							}
							$('input[type="submit"]').removeAttr('disabled');
						}
						// document.getElementById(cajon).innerHTML	=	contenido;
					}	else if(ajax.status	==	404)	{
						document.getElementById(cajon).innerHTML	=	"<b style=\"color: #FF0000\">El contenido no existe: <br />Request: " + ruta + "</b>";
					}	else	{
						document.getElementById(cajon).innerHTML	=	"Se ha localizado un error: " + ajax.status;
					}
				}
			}
			ajax.send(null);
		}
		$(document).ready(function() {
			$('#tt').tree({
				onClick: function(node){
			        // var launch = $('a.launch', this);
			        // if (launch.size() > 0)	{ 
			        //   eval(launch[0].onclick());
			        // }
			        // testreg(node.text);
			        var Contrato = /\(\'([^\'\)]+)/gi;
					var CadenaInicial = node.text;
					var coincidencias = Contrato.exec(CadenaInicial);
					// for(i = 0; i < coincidencias.length; i++)
					GetInfoFromContract(coincidencias[1]);
					// alert(coincidencias[1]);

			  		// var Contrato = /^(\w+)/;
					// var CadenaInicial = node.text;
					// var coincidencias = Contrato.exec(CadenaInicial);
					// for(i = 0; i < coincidencias.length; i++)
					// 	alert(coincidencias[i]);

					// var CadenaInicial = node.text;
					// var Contrato = /(\(\'[^\'\)]+)/gi;
					// // var Coincidencias = CadenaInicial.exec(Contrato);
			  		// alert(CadenaInicial.match(Contrato));
				}
			});
		});

		function testreg(texto) {
			var regex = /\(\'([^\'\)]+)/gi;
			var email = texto;
			var coincidencias = regex.exec(email);
			// for(i = 0; i < coincidencias.length; i++)
			alert(coincidencias[1]);
		}

		function inspeccionar(obj)	{
		  var msg = '';
		 
		  for (var property in obj)	{
		    if (typeof obj[property] == 'function')	{
		      var inicio = obj[property].toString().indexOf('function');
		      var fin = obj[property].toString().indexOf(')')+1;
		      var propertyValue=obj[property].toString().substring(inicio,fin);
		      msg +=(typeof obj[property])+' '+property+' : '+propertyValue+' ;\n';
		    }
		    else if (typeof obj[property] == 'unknown')	{
		      msg += 'unknown '+property+' : unknown ;\n';
		    }
		    else	{
		      msg +=(typeof obj[property])+' '+property+' : '+obj[property]+' ;\n';
		    }
		  }
		  return msg;
		}

		
	</script>
</head>

<body  style=" margin-left: 0px;  margin-top: 0px;  margin-right: 0px;  margin-bottom: 0px;">

<form style="margin-bottom: 0;" id="FrmSelContrato" name="FrmSelContrato" method="post" action="">
	<input type="hidden" name="serverevent" value="">
	<input type="hidden" name="txtFechaInicio_hidden" value="2012-06-12">
	<input type="hidden" name="txtFechaFinal_hidden" value="2013-12-27">
	<table  width="800"   style="height:600px"  align="Right" >
		<tr>
			<td valign="top">
				<div id="tvContratos_outer" style="Z-INDEX: 0; LEFT: 80px; WIDTH: 274px; POSITION: absolute; TOP: 18px; HEIGHT: 265px;">
					<input type="hidden" name="tvContratosSelItemID" id="tvContratosSelItemID" value="-1" />
					<input type="hidden" name="tvContratosExpandedNodes" id="tvContratosExpandedNodes" value="" />
					<input type="hidden" id="tvContratos_state" name="tvContratos_state" value="" />
					<div id="tvContratos" style="border: 1px #E6E6E6 solid;">
						<div style="margin:10px 0;"></div>
						<ul id="tt" class="easyui-tree" style="font-size:13px; font-family:Arial;" data-options="animate:true">
								<?php
									
									$cs = DataBase::getInstance();
									$cs->setQuery('SELECT * FROM activos');
									$lista = $cs->loadObjectList();
									foreach($lista as $rev)	{
										echo"<li>\r\n";
										echo"	<span>".$rev->sDescripcion."</span>\r\n";
										echo"	<ul>\r\n";
										$cs2 = DataBase::getInstance();
										$QueryResidencias = "
											SELECT 
												DISTINCT(r.sIdResidencia), 
												r.sDescripcion
											FROM contratos AS c 
												INNER JOIN residencias AS r ON(c.sIdResidencia = r.sIdResidencia) 
											WHERE c.sIdActivo = '".$rev->sIdActivo."' ORDER BY r.sDescripcion;
										";
										$cs2->setQuery($QueryResidencias);
										$lista2 = $cs2->loadObjectList();
										foreach ($lista2 as $rev2) {
											echo"		<li data-options=\"state:'closed'\">\r\n";
											echo"			<span>$rev2->sDescripcion</span>\r\n";
											echo"			<ul>\r\n";
											$cs3 = DataBase::getInstance();
											$QueryContratos = "
												SELECT 
													c.sContrato 
												FROM contratos AS c 
													INNER JOIN contratosxusuario AS u 
														ON (c.sContrato = u.sContrato AND u.sIdUsuario = \"".$_SESSION['ssUsuario']."\") 
												WHERE 
													c.sIdResidencia = \"$rev2->sIdResidencia\" 
													AND 
													c.sIdActivo = \"$rev->sIdActivo\" 
													AND 
													c.lStatus = \"Activo\" 
												ORDER BY c.sContrato;
											";
											// echo $QueryContratos;
											$cs3->setQuery($QueryContratos);
											$lista3 = $cs3->loadObjectList();
											foreach ($lista3 as $rev3) {
												echo'				<li><a onclick="GetInfoFromContract(\''.$rev3->sContrato.'\');" class="launch">'.$rev3->sContrato.'</a></li>';
											}
											echo"			</ul>\r\n";
											echo"		</li>\r\n";
										}

										echo"	</ul>\r\n";
										echo"</li>";
									}

								?>
								</ul>
							</li>
						</ul>
					</div>
				</div>
				<div id="Label1_outer" style="Z-INDEX: 1; LEFT: 355px; WIDTH: 230px; POSITION: absolute; TOP: 41px; HEIGHT: 30px; display:block">
					<div id="Label1" style=" font-family: Verdana; font-size: 10px; color: #0000FF;font-weight: bold; cursor: default;height:30px;width:230px; display:block;"  align="Left">
						Descripcion de la Obra
						<br/>
					</div>
				</div>
				<div id="Label2_outer" style="Z-INDEX: 2; LEFT: 360px; WIDTH: 120px; POSITION: absolute; TOP: 162px; HEIGHT: 15px">
					<div id="Label2" style=" font-family: Verdana; font-size: 10px; color: #0000FF;font-weight: bold; cursor: default;height:15px;width:120px;">
						Periodo del Contrato
					</div>
				</div>
				<div id="txtFechaInicio_outer" style="Z-INDEX: 3; LEFT: 493px; WIDTH: 75px; POSITION: absolute; TOP: 157px; HEIGHT: 20px">
					<input type="text" id="txtFechaInicio" name="txtFechaInicio" value="" style=" font-family: Verdana; font-size: 10px; text-align: center; cursor: default;height:19px;width:75px;" readonly tabindex="0"/>
				</div>
				<div id="txtFechaFinal_outer" style="Z-INDEX: 4; LEFT: 588px; WIDTH: 75px; POSITION: absolute; TOP: 157px; HEIGHT: 20px">
					<input type="text" id="txtFechaFinal" name="txtFechaFinal" value="" style=" font-family: Verdana; font-size: 10px; text-align: center; cursor: default;height:19px;width:75px;" readonly tabindex="0"/>
				</div>
				<div id="Label3_outer" style="Z-INDEX: 5; LEFT: 571px; WIDTH: 15px; POSITION: absolute; TOP: 161px; HEIGHT: 15px">
					<div id="Label3" style=" font-family: Verdana; font-size: 10px; color: #0000FF;font-weight: bold; cursor: default;height:15px;width:15px;">
						Al
					</div>
				</div>
				<div id="Label4_outer" style="Z-INDEX: 6; LEFT: 360px; WIDTH: 94px; POSITION: absolute; TOP: 221px; HEIGHT: 16px">
					<div id="Label4" style=" font-family: Verdana; font-size: 10px; color: #0000FF;font-weight: bold; cursor: default;height:16px;width:94px;">
						Turno / Origen
					</div>
				</div>
				<div id="cmbTurno_outer" style="Z-INDEX: 7; LEFT: 450px; WIDTH: 215px; POSITION: absolute; TOP: 216px; HEIGHT: 21px">
					<select name="cmbTurno" id="cmbTurno" size="1" style=" font-family: Verdana; font-size: 10px; text-align: center; background-color: #FFFFFF;cursor: default;height:19px;width:215px;" tabindex="0">
						
					</select>
				</div>
				<div id="cmdSelContrato_outer" style="Z-INDEX: 8; LEFT: 355px; WIDTH: 215px; POSITION: absolute; TOP: 257px; HEIGHT: 26px; align:center;">
					<center><input type="submit" id="cmdSelContrato" name="cmdSelContrato" value="Seleccionar Contrato" style=" font-family: Verdana; font-size: 10px; text-align: center; cursor: default;height:26px;width:215px;" tabindex="0" disabled/></center>
				</div>
				<div id="Label5_outer" style="Z-INDEX: 9; LEFT: 355px; WIDTH: 305px; POSITION: absolute; TOP: 24px; HEIGHT: 15px">
					<div id="Label5" style=" font-family: Verdana; font-size: 10px; color: #FFFFFF;font-weight: bold; background-color: #000080;cursor: default;height:15px;width:305px;"  align="Center">
						INFORMACION DEL CONTRATO
					</div>
				</div>
				<div id="Label6_outer" style="Z-INDEX: 10; LEFT: 360px; WIDTH: 305px; POSITION: absolute; TOP: 191px; HEIGHT: 15px">
					<div id="Label6" style=" font-family: Verdana; font-size: 10px; color: #FFFFFF;font-weight: bold; background-color: #000080;cursor: default;height:15px;width:305px;"  align="Center">
						INTELIGENT
					</div>
				</div>
				<div id="lblSeleccionado_outer" style="Z-INDEX: 11; LEFT: 355px; WIDTH: 305px; POSITION: absolute; TOP: 240px; HEIGHT: 15px">
					<div id="lblSeleccionado" style=" font-family: Verdana; font-size: 10px; text-align: center; cursor: default;height:15px;width:305px;"  align="Center">
						Seleccionado: <span id="ContratoSeleccionado"></div>
					</div>
				</div>
				<div id="Label7_outer" style="Z-INDEX: 12; LEFT: 80px; WIDTH: 580px; POSITION: absolute; TOP: 4px; HEIGHT: 15px">
					<div id="Label7" style=" font-family: Verdana; font-size: 10px; color: #FFFFFF;font-weight: bold; background-color: #000080;cursor: default;height:15px;width:580px;"  align="Center">
						SELECIONANDO CONTRATO
					</div>
				</div>
				<div id="Label8_outer" style="Z-INDEX: 14; LEFT: 355px; WIDTH: 306px; POSITION: absolute; TOP: 53px; HEIGHT: 99px">
					<div id="Label8" style=" font-family: Tahoma; font-size: 9px; text-align: center; cursor: default;height:99px;width:306px;">
						
					</div>
				</div>
			</td>
		</tr>
	</table>
</form>
</body>
</html>
<!-- FrmSelContrato end -->


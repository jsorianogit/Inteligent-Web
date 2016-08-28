function progreso(n) {
				var i = 0;         
				if (n>0 && n<=100) {             // Calculo en que decena se encuentra             
						var valor =parseInt(n/10);             
						if (valor != 0) {                 // Cambio el cuadrado de la decena     correspondiente de vacio a lleno
							for(i =0 ; i<valor ; i++)                 
								document.getElementById("pos"+valor).className = "lleno";
						}             // Cambio el porcentaje             
						document.getElementById("texto").innerHTML = "Avance ...<BR>"+n+"%";         
				}     
			}       

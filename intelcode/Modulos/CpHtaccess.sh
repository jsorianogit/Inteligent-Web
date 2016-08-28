#!/bin/bash

#Adalberto Reyes Valenzuela
#Busca en todos los subdirectorios a partir de un directorio base
#y va asignando permisos a los archivos y subdirectorios encontrados

#Asina permisos a los archivos y directorios encontrados
function AsignaPermisos
{
   local File=$1
   local ARCHIVO
   for ARCHIVO in $File/*
      do
	if [ -d "$ARCHIVO" ]
	   then
		touch "$ARCHIVO"/.htaccess
		chmod 777 "$ARCHIVO"/.htaccess
		echo "deny from all" > "$ARCHIVO"/.htaccess
		echo "Check Spelling off"  >> "$ARCHIVO"/.htaccess
	fi
  done
}
#Va leyendo los directorios
function LeeDirectorios
{
   local Dir=$1
   local DIRECTORIO
   for DIRECTORIO in $Dir/*
      do
         if [ -d "$DIRECTORIO" ]
            then
               i=$i+1
               ListDir[$i]=$DIRECTORIO
         fi
      done
}
#Contenedor de directorios
declare -a ListDir
#Controladores de busqueda
declare -i i
declare -i j
i=0
j=0
#Directorio raiz
ListDir[$i]=$1
echo "Procesando Directorio $1"
LeeDirectorios ${ListDir[$i]}
#Mientras se siguan encontrando subdirectorios
while [ $j -lt $i ]
   do
      AsignaPermisos ${ListDir[$j]}
      j=$j+1
      #Verifica si existen mas subdirectorios
      LeeDirectorios ${ListDir[$j]}
   done
echo " ··················································································"
echo "·  Hecho										" 
echo " ··················································································"

#!/bin/bash

#Adalberto Reyes Valenzuela
#Busca en todos los subdirectorios a partir de un directorio base
#y va asignando permisos a los archivos y subdirectorios encontrados

#Asina permisos a los archivos y directorios encontrados
function AsignaPermisos
{
   local File=$1
   local ARCHIVO
   local Permisos=$2
   local Usuario=$3
   for ARCHIVO in $File/*
      do
         if [ -f $ARCHIVO -o -d $ARCHIVO ]
            then
               echo "chown "$Usuario $ARCHIVO
               chown $Usuario $ARCHIVO
               echo "chmod "$Permisos $ARCHIVO
               chmod $Permisos $ARCHIVO
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
         if [ -d $DIRECTORIO ]
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
ListDir[$i]=./
LeeDirectorios ${ListDir[$i]}
#Mientras se siguan encontrando subdirectorios
while [ $j -lt $i ]
   do
      AsignaPermisos ${ListDir[$j]} 755 apache:apache
      j=$j+1
      #Verifica si existen mas subdirectorios
      LeeDirectorios ${ListDir[$j]}
   done
echo " ··················································································"
echo "·  Habre tu explorador de internet, y escribe http://localhost/respro06  	         "  
echo "·  o su equivalente para continuar con la configuracion del sistema de registro 										" 
echo " ··················································································"
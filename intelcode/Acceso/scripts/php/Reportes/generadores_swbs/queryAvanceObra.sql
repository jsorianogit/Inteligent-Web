
select
   #--avance Real Anterior de la Obra
      @dAvanceRealObraAnterior:=(
         select sum(dAvance) as dAvance
         from avancesglobalesxorden
         where sContrato = 'OT-06' and sNumeroOrden = '' and dIdFecha < '2012-11-27' and sIdConvenio = ''
         group by sContrato
      ) as dAvanceRealObraAnterior,

   #--avance real actual de la obra
      @dAvanceRealObraActual:=(
         Select sum(dAvance) as dAvance
         from avancesglobalesxorden
         where sContrato = 'OT-06' and sNumeroOrden = '' and dIdFecha = '2012-11-27' and sIdConvenio = ''
         group by sContrato
      ) as dAvanceRealObraActual,
   #--avance acumulado real de la obra
   FORMAT((@dAvanceRealObraActual + @dAvanceRealObraAnterior ),4) as dAvanceRealObraAcum ,

   #--avance programado anterior de la obra
      @dAvanceProgObraAnterior:=(
         Select sum(dAvancePonderadoDia) as dAvance
         from avancesglobales
         where sContrato = 'OT-06' and sNumeroOrden = '' and dIdFecha < '2012-11-27' and sIdConvenio =''
         group by sContrato
      ) as dAvanceProgObraAnterior,
   #--avamce programado actual de la obra
      @dAvanceProgObraActual:=(
         Select sum(dAvancePonderadoDia) as dAvance
         from avancesglobales
         where sContrato = 'OT-06' and sNumeroOrden = '' and dIdFecha = '2012-11-27' and sIdConvenio = ''
         group by sContrato) as dAvanceProgObraActual,
   #--avance programado acumulado de la obra
   FORMAT((@dAvanceProgObraActual + @dAvanceProgObraAnterior),4) as dAvanceProgObraAcum

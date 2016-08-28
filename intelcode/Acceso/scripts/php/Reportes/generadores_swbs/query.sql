
SELECT
   CASE a.sMedida
      WHEN '' THEN CONCAT(repeat(' ',iNivel),a.sWbs)
      ELSE CONCAT(repeat(' ',iNivel),a.sNumeroActividad)
   END
      AS Partida,
   CONCAT(SUBSTR(a.mDescripcion,1,49),'...') AS Descripcion,
   a.sMedida AS Medida,
   CASE a.sMedida
      WHEN '' THEN NULL
      ELSE @Cantidad := a.dCantidadAnexo
   END
      AS Cantidad,
   CONCAT(a.dPonderado,' %') AS Ponderado,
   TRIM(CONCAT('$  ',a.dVentaMN)) AS Precio_Unitario,
   CASE a.sMedida
      WHEN '' THEN NULL
      ELSE
      CASE  (SELECT (SELECT CASE sum(ba.dCantidad) WHEN NULL THEN 0 ELSE sum(ba.dCantidad) END as CAnt FROM bitacoradeactividades ba where ba.sContrato=a.sContrato and ba.sNumeroActividad=a.sNumeroActividad and ba.dIdFecha<='2008-03-13' and ba.sWbs=a.sWbs ) IS NULL)
            WHEN 0 THEN
                @install:=(SELECT CASE sum(ba.dCantidad) WHEN NULL THEN 0 ELSE sum(ba.dCantidad) END as CAnt FROM bitacoradeactividades ba where ba.sContrato=a.sContrato and ba.sNumeroActividad=a.sNumeroActividad and ba.dIdFecha<='2008-03-13' and ba.sWbs=a.sWbs )
            ELSE
                @install:=0
      END

   END
      AS Instalado,
   CASE a.sMedida
      WHEN '' THEN NULL
      ELSE
          CASE
              WHEN @install>a.dCantidadAnexo THEN (@install-a.dCantidadAnexo)
              ELSE 0.0000
          END
   END
      AS Excedente,
   CASE a.sMedida
        WHEN '' THEN NULL
        ELSE
        CASE
            WHEN @install = NULL THEN a.dCantidadAnexo
            WHEN @Install>a.dCantidadAnexo THEN 0.0000
            ELSE
                a.dCantidadAnexo - @Install
        END
   END
      AS Pendiente,
   CASE
       WHEN a.sMedida='' THEN ''
       WHEN @Install>a.dCantidadAnexo THEN '100.0000 %'
       ELSE
       CASE (SELECT (Select
                        ROUND((sum(bac.dAvance) * ao.dCantidad)/@Cantidad,4) as avance
                      From bitacoradeactividades bac
                        INNER JOIN actividadesxorden ao ON (
                           ao.sContrato = bac.sContrato
                           And ao.sNumeroOrden = bac.sNumeroOrden
                           And ao.sWbs = bac.sWbs
                           And ao.sNumeroActividad = bac.sNumeroActividad
                           And ao.sIdConvenio = 'C-01'
                           And ao.sTipoActividad = 'Actividad' )
                     Where
                          bac.sContrato = '428236875'
                          And bac.sNumeroActividad = a.sNumeroActividad
                          And bac.sWbs = a.sWbs
                          And bac.dIdFecha <= '2008-03-13'
                          And ao.sTipoActividad='Actividad'
                     Group By bac.sWbs) IS NULL)
            WHEN 0 THEN
                 CONCAT((Select
                        ROUND((sum(bac.dAvance) * ao.dCantidad)/@Cantidad,4) as avance
                      From bitacoradeactividades bac
                        INNER JOIN actividadesxorden ao ON (
                           ao.sContrato = bac.sContrato
                           And ao.sNumeroOrden = bac.sNumeroOrden
                           And ao.sWbs = bac.sWbs
                           And ao.sNumeroActividad = bac.sNumeroActividad
                           And ao.sIdConvenio = 'C-01'
                           And ao.sTipoActividad = 'Actividad' )
                     Where
                          bac.sContrato = '428236875'
                          And bac.sNumeroActividad = a.sNumeroActividad
                          And bac.sWbs = a.sWbs
                          And bac.dIdFecha <= '2008-03-13'
                          And ao.sTipoActividad='Actividad'
                     Group By bac.sWbs),' %')
            ELSE
                '0.000 %'
       END
   END
      as Avance
FROM actividadesxanexo  a
WHERE a.sContrato='428236875' 
AND a.sIdConvenio='C-01' order by  iItemOrden  ;
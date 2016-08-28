<?php
<object class="frmAbrirAutorizaSolicitudes" name="frmAbrirAutorizaSolicitudes" baseclass="Page">
  <property name="Background"></property>
  <property name="Caption">Unit4</property>
  <property name="Color">#D0DDF0</property>
  <property name="DocType">dtNone</property>
  <property name="Font">
  <property name="Family">Verdana</property>
  <property name="Size">10px</property>
  </property>
  <property name="Height">324</property>
  <property name="IsMaster">0</property>
  <property name="Name">frmAbrirAutorizaSolicitudes</property>
  <property name="UseAjax">1</property>
  <property name="Width">944</property>
  <property name="OnShow">frmAbrirAutorizaSolicitudesShow</property>
  <object class="Panel" name="Panel3" >
    <property name="BorderColor">#000080</property>
    <property name="BorderWidth">2</property>
    <property name="Caption">Panel1</property>
    <property name="Dynamic"></property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">180</property>
    <property name="Left">20</property>
    <property name="Name">Panel3</property>
    <property name="ParentColor">0</property>
    <property name="Top">35</property>
    <property name="Width">760</property>
    <object class="Label" name="Label4" >
      <property name="Caption">ABRIR ORDENES DE COMPRA</property>
      <property name="Color">#400080</property>
      <property name="Font">
      <property name="Align">taCenter</property>
      <property name="Color">#FFFFFF</property>
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      <property name="Weight">bold</property>
      </property>
      <property name="Height">16</property>
      <property name="Name">Label4</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">2</property>
      <property name="Width">760</property>
    </object>
    <object class="DBGrid" name="ddanexo_pedidos1" >
      <property name="Columns">a:0:{}</property>
      <property name="Datasource">dsPedidos</property>
      <property name="Height">150</property>
      <property name="Left">5</property>
      <property name="Name">ddanexo_pedidos1</property>
      <property name="Top">20</property>
      <property name="Width">615</property>
    </object>
    <object class="Button" name="Button7" >
      <property name="Caption">Imprimir</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">25</property>
      <property name="Left">625</property>
      <property name="Name">Button7</property>
      <property name="ParentColor">0</property>
      <property name="Top">143</property>
      <property name="Width">131</property>
      <property name="jsOnClick">Button7JSClick</property>
    </object>
    <object class="Button" name="cmdAbreRevAdmin" >
      <property name="Caption">Marcar No Revisado por
(Coordinador Admin.)</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">40</property>
      <property name="Left">625</property>
      <property name="Name">cmdAbreRevAdmin</property>
      <property name="ParentColor">0</property>
      <property name="Top">61</property>
      <property name="Width">131</property>
      <property name="jsOnClick">cmdAbreRevAdminJSClick</property>
    </object>
    <object class="Button" name="cmdAbreRevCompra" >
      <property name="Caption">Marcar No Revisado
(Gerencia de Operaciones)</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">40</property>
      <property name="Left">625</property>
      <property name="Name">cmdAbreRevCompra</property>
      <property name="ParentColor">0</property>
      <property name="Top">21</property>
      <property name="Width">131</property>
      <property name="jsOnClick">cmdAbreRevCompraJSClick</property>
    </object>
    <object class="Button" name="cmdAbreAutorizaCompra" >
      <property name="Caption">Abrir Autorizar</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">40</property>
      <property name="Left">625</property>
      <property name="Name">cmdAbreAutorizaCompra</property>
      <property name="ParentColor">0</property>
      <property name="Top">102</property>
      <property name="Width">131</property>
      <property name="jsOnClick">cmdAbreAutorizaCompraJSClick</property>
    </object>
  </object>
  <object class="Panel" name="Panel1" >
    <property name="BorderColor">#000080</property>
    <property name="BorderWidth">2</property>
    <property name="Caption">Panel1</property>
    <property name="Dynamic"></property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">175</property>
    <property name="Left">20</property>
    <property name="Name">Panel1</property>
    <property name="ParentColor">0</property>
    <property name="Top">35</property>
    <property name="Width">760</property>
    <object class="DBGrid" name="dbgSolicitud" >
      <property name="Columns">a:0:{}</property>
      <property name="Datasource">dsSolicitud</property>
      <property name="Height">145</property>
      <property name="Left">6</property>
      <property name="Name">dbgSolicitud</property>
      <property name="Top">20</property>
      <property name="Width">614</property>
    </object>
    <object class="Label" name="Label2" >
      <property name="Caption">ABRIR  SOLICITUDES DE MATERIALES</property>
      <property name="Color">#0000A0</property>
      <property name="Font">
      <property name="Align">taCenter</property>
      <property name="Color">#FFFFFF</property>
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      <property name="Weight">bold</property>
      </property>
      <property name="Height">16</property>
      <property name="Name">Label2</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Width">760</property>
    </object>
    <object class="Button" name="cmdAbrirSolicitud" >
      <property name="Caption">Abrir Autorizar</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">40</property>
      <property name="Left">626</property>
      <property name="Name">cmdAbrirSolicitud</property>
      <property name="ParentColor">0</property>
      <property name="Top">20</property>
      <property name="Width">131</property>
      <property name="jsOnClick">cmdAbrirSolicitudJSClick</property>
    </object>
    <object class="Button" name="cmdImprimirSolicitud" >
      <property name="Caption">Imprimir</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">25</property>
      <property name="Left">626</property>
      <property name="Name">cmdImprimirSolicitud</property>
      <property name="ParentColor">0</property>
      <property name="Top">61</property>
      <property name="Width">131</property>
      <property name="jsOnClick">cmdImprimirSolicitudJSClick</property>
    </object>
  </object>
  <object class="Panel" name="Panel2" >
    <property name="BorderColor">#000080</property>
    <property name="BorderWidth">2</property>
    <property name="Caption">Panel1</property>
    <property name="Dynamic"></property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">175</property>
    <property name="Left">20</property>
    <property name="Name">Panel2</property>
    <property name="ParentColor">0</property>
    <property name="Top">35</property>
    <property name="Width">760</property>
    <object class="Button" name="cmdAbrirVerificarReq" >
      <property name="Caption">Marcar como
NO Verificado</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">40</property>
      <property name="Left">626</property>
      <property name="Name">cmdAbrirVerificarReq</property>
      <property name="ParentColor">0</property>
      <property name="Top">21</property>
      <property name="Width">130</property>
      <property name="jsOnClick">cmdAbrirVerificarReqJSClick</property>
    </object>
    <object class="Button" name="Button5" >
      <property name="Caption">Imprimir</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">25</property>
      <property name="Left">625</property>
      <property name="Name">Button5</property>
      <property name="ParentColor">0</property>
      <property name="Top">143</property>
      <property name="Width">130</property>
      <property name="jsOnClick">Button5JSClick</property>
    </object>
    <object class="Label" name="Label1" >
      <property name="Caption">ABRIR REQUISICIONES</property>
      <property name="Color">#004040</property>
      <property name="Font">
      <property name="Align">taCenter</property>
      <property name="Color">#FFFFFF</property>
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      <property name="Weight">bold</property>
      </property>
      <property name="Height">16</property>
      <property name="Name">Label1</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">2</property>
      <property name="Width">760</property>
    </object>
    <object class="DBGrid" name="ddanexo_requisicion1" >
      <property name="Columns">a:0:{}</property>
      <property name="Datasource">dsRequisicion</property>
      <property name="Height">149</property>
      <property name="Left">6</property>
      <property name="Name">ddanexo_requisicion1</property>
      <property name="Top">21</property>
      <property name="Width">615</property>
    </object>
    <object class="Button" name="cmdAbrirRecibirRequisicion" >
      <property name="Caption">Marcar como
NO Reibido</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">40</property>
      <property name="Left">625</property>
      <property name="Name">cmdAbrirRecibirRequisicion</property>
      <property name="ParentColor">0</property>
      <property name="Top">61</property>
      <property name="Width">130</property>
      <property name="jsOnClick">cmdAbrirRecibirRequisicionJSClick</property>
    </object>
    <object class="Button" name="cmdAbrirAutorizaRequisicion" >
      <property name="Caption">Abrir Autorizar</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">40</property>
      <property name="Left">625</property>
      <property name="Name">cmdAbrirAutorizaRequisicion</property>
      <property name="ParentColor">0</property>
      <property name="Top">101</property>
      <property name="Width">130</property>
      <property name="jsOnClick">cmdAbrirAutorizaRequisicionJSClick</property>
    </object>
  </object>
  <object class="Memo" name="Memo1" >
    <property name="BorderStyle">bsNone</property>
    <property name="Color">#D0DDF0</property>
    <property name="Font">
    <property name="Color">#FF8000</property>
    <property name="Family">Verdana</property>
    <property name="Size">14px</property>
    </property>
    <property name="Height">60</property>
    <property name="Left">20</property>
    <property name="Lines">a:0:{}</property>
    <property name="Name">Memo1</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">218</property>
    <property name="Width">760</property>
  </object>
  <object class="Button" name="cmdRecargar" >
    <property name="Caption">Recargar Listas</property>
    <property name="Color">#FF8000</property>
    <property name="Cursor">crPointer</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">90</property>
    <property name="Left">785</property>
    <property name="Name">cmdRecargar</property>
    <property name="ParentColor">0</property>
    <property name="Top">35</property>
    <property name="Width">110</property>
    <property name="OnClick">cmdRecargarClick</property>
  </object>
  <object class="Button" name="cmdSolicitudes" >
    <property name="Caption">Solicitudes</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">20</property>
    <property name="Left">20</property>
    <property name="Name">cmdSolicitudes</property>
    <property name="Top">10</property>
    <property name="Width">130</property>
    <property name="jsOnClick">cmdSolicitudesJSClick</property>
  </object>
  <object class="Button" name="cmdRequisiciones" >
    <property name="Caption">Requisiciones</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">20</property>
    <property name="Left">150</property>
    <property name="Name">cmdRequisiciones</property>
    <property name="Top">10</property>
    <property name="Width">130</property>
    <property name="jsOnClick">cmdRequisicionesJSClick</property>
  </object>
  <object class="Button" name="cmdOC" >
    <property name="Caption">Ordenes de Compra</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">20</property>
    <property name="Left">280</property>
    <property name="Name">cmdOC</property>
    <property name="Top">10</property>
    <property name="Width">130</property>
    <property name="jsOnClick">cmdOCJSClick</property>
  </object>
  <object class="Table" name="tableSolicitud" >
        <property name="Left">21</property>
        <property name="Top">242</property>
    <property name="Database">database</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="MasterFields">a:0:{}</property>
    <property name="MasterSource"></property>
    <property name="Name">tableSolicitud</property>
    <property name="TableName">anexo_solicitud</property>
  </object>
  <object class="Database" name="database" >
        <property name="Left">793</property>
        <property name="Top">273</property>
    <property name="Connected"></property>
    <property name="Name">database</property>
  </object>
  <object class="Datasource" name="dsSolicitud" >
        <property name="Left">90</property>
        <property name="Top">242</property>
    <property name="Dataset">tableSolicitud</property>
    <property name="Name">dsSolicitud</property>
  </object>
  <object class="Table" name="tableRequisicion" >
        <property name="Left">260</property>
        <property name="Top">245</property>
    <property name="Database">database</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="MasterFields">a:0:{}</property>
    <property name="MasterSource"></property>
    <property name="Name">tableRequisicion</property>
    <property name="TableName">anexo_requisicion</property>
  </object>
  <object class="Datasource" name="dsRequisicion" >
        <property name="Left">332</property>
        <property name="Top">250</property>
    <property name="Dataset">tableRequisicion</property>
    <property name="Name">dsRequisicion</property>
  </object>
  <object class="Table" name="tablePedidos" >
        <property name="Left">485</property>
        <property name="Top">254</property>
    <property name="Database">database</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="MasterFields">a:0:{}</property>
    <property name="MasterSource"></property>
    <property name="Name">tablePedidos</property>
    <property name="TableName">anexo_pedidos</property>
  </object>
  <object class="Datasource" name="dsPedidos" >
        <property name="Left">562</property>
        <property name="Top">254</property>
    <property name="Dataset">tablePedidos</property>
    <property name="Name">dsPedidos</property>
  </object>
</object>
?>

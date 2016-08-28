<?php
<object class="frmValidarSolicitudes" name="frmValidarSolicitudes" baseclass="Page">
  <property name="Background"></property>
  <property name="Caption">Unit4</property>
  <property name="Color">#D0DDF0</property>
  <property name="DocType">dtNone</property>
  <property name="Font">
  <property name="Family">Verdana</property>
  <property name="Size">10px</property>
  </property>
  <property name="Height">296</property>
  <property name="IsMaster">0</property>
  <property name="Name">frmValidarSolicitudes</property>
  <property name="UseAjax">1</property>
  <property name="Width">920</property>
  <property name="OnBeforeShow">frmValidarSolicitudesBeforeShow</property>
  <property name="OnShow">frmValidarSolicitudesShow</property>
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
    <object class="Label" name="Label2" >
      <property name="Caption">AUTORIZAR REQUISICIONES</property>
      <property name="Color">#004040</property>
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
      <property name="Top">2</property>
      <property name="Width">760</property>
    </object>
    <object class="DBGrid" name="ddanexo_requisicion1" >
      <property name="Columns"><![CDATA[a:7:{i:0;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:15:&quot;Requisicion No.&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:17:&quot;iFolioRequisicion&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:1;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:15:&quot;Numero de Orden&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:12:&quot;sNumeroOrden&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:2;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:10:&quot;Referencia&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:11:&quot;sReferencia&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:3;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:8:&quot;Revision&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:9:&quot;sRevision&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:4;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:11:&quot;Solicitante&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:9:&quot;sSolicito&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:5;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:11:&quot;Comentarios&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:12:&quot;mComentarios&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:6;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:6:&quot;Status&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:7:&quot;lStatus&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}}]]></property>
      <property name="Datasource">dsRequisicion</property>
      <property name="Height">150</property>
      <property name="Left">5</property>
      <property name="Name">ddanexo_requisicion1</property>
      <property name="Top">20</property>
      <property name="Width">615</property>
    </object>
    <object class="Button" name="cmdVerificar" >
      <property name="Caption">Marcar como
Verificado</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">40</property>
      <property name="Left">625</property>
      <property name="Name">cmdVerificar</property>
      <property name="ParentColor">0</property>
      <property name="Top">21</property>
      <property name="Width">130</property>
      <property name="jsOnClick">cmdVerificarJSClick</property>
    </object>
    <object class="Button" name="cmdRecibirRequisicion" >
      <property name="Caption">Marcar como
Reibido</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">40</property>
      <property name="Left">625</property>
      <property name="Name">cmdRecibirRequisicion</property>
      <property name="ParentColor">0</property>
      <property name="Top">61</property>
      <property name="Width">130</property>
      <property name="jsOnClick">cmdRecibirRequisicionJSClick</property>
    </object>
    <object class="Button" name="cmdImprimirRequisicion" >
      <property name="Caption">Imprimir</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">25</property>
      <property name="Left">625</property>
      <property name="Name">cmdImprimirRequisicion</property>
      <property name="ParentColor">0</property>
      <property name="Top">143</property>
      <property name="Width">130</property>
      <property name="jsOnClick">cmdImprimirRequisicionJSClick</property>
    </object>
    <object class="Button" name="cmdAutorizaRequisicion" >
      <property name="Caption">Autorizar</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">40</property>
      <property name="Left">625</property>
      <property name="Name">cmdAutorizaRequisicion</property>
      <property name="ParentColor">0</property>
      <property name="Top">101</property>
      <property name="Width">130</property>
      <property name="jsOnClick">cmdAutorizaRequisicionJSClick</property>
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
    <property name="Top">34</property>
    <property name="Width">760</property>
    <object class="DBGrid" name="dbgSolicitud" >
      <property name="Columns"><![CDATA[a:6:{i:0;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:19:&quot;Numero de Solicitud&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:12:&quot;sIdSolicitud&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:1;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:15:&quot;Numero de Orden&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:12:&quot;sNumeroOrden&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:2;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:18:&quot;Fecha de Solicitud&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:15:&quot;dFechaSolicitud&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:3;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:10:&quot;Referencia&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:11:&quot;sReferencia&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:4;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:11:&quot;Comentarios&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:12:&quot;mComentarios&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;200&quot;;}i:5;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:7:&quot;Creador&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:17:&quot;sIdUsuarioCreador&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:5:&quot;false&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}}]]></property>
      <property name="Cursor">crText</property>
      <property name="Datasource">dsSolicitud</property>
      <property name="Height">150</property>
      <property name="Left">6</property>
      <property name="Name">dbgSolicitud</property>
      <property name="ReadOnly">1</property>
      <property name="Top">20</property>
      <property name="Width">614</property>
    </object>
    <object class="Label" name="Label1" >
      <property name="Caption">AUTORIZAR SOLICITUDES DE MATERIALES</property>
      <property name="Color">#0000A0</property>
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
      <property name="Width">760</property>
    </object>
    <object class="Button" name="cmdAutorizarSolicitud" >
      <property name="Caption">Autorizar</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">40</property>
      <property name="Left">626</property>
      <property name="Name">cmdAutorizarSolicitud</property>
      <property name="ParentColor">0</property>
      <property name="Top">20</property>
      <property name="Width">131</property>
      <property name="jsOnClick">cmdAutorizarSolicitudJSClick</property>
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
    <object class="Label" name="Label3" >
      <property name="Caption">AUTORIZAR ORDENES DE COMPRA</property>
      <property name="Color">#400080</property>
      <property name="Font">
      <property name="Align">taCenter</property>
      <property name="Color">#FFFFFF</property>
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      <property name="Weight">bold</property>
      </property>
      <property name="Height">16</property>
      <property name="Name">Label3</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">2</property>
      <property name="Width">760</property>
    </object>
    <object class="DBGrid" name="ddanexo_pedidos1" >
      <property name="Columns"><![CDATA[a:8:{i:0;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:19:&quot;No. Orden de Compra&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:12:&quot;iFolioPedido&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:1;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:11:&quot;Requisicion&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:17:&quot;iFolioRequisicion&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:2;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:15:&quot;Numero de Orden&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:12:&quot;sNumeroOrden&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:3;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:17:&quot;Fecha de Creacion&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:8:&quot;dIdFecha&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:4;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:7:&quot;Elaboro&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:17:&quot;sIdUsuarioCreador&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:5;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:10:&quot;Referencia&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:11:&quot;sReferencia&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:6;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:11:&quot;Comentarios&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:12:&quot;mComentarios&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}i:7;a:13:{s:9:&quot;Alignment&quot;;s:13:&quot;taLeftJustify&quot;;s:11:&quot;ButtonStyle&quot;;s:6:&quot;bsAuto&quot;;s:7:&quot;Caption&quot;;s:6:&quot;Status&quot;;s:5:&quot;Color&quot;;s:0:&quot;&quot;;s:9:&quot;Fieldname&quot;;s:7:&quot;sStatus&quot;;s:9:&quot;FontColor&quot;;s:0:&quot;&quot;;s:12:&quot;DropDownRows&quot;;s:1:&quot;7&quot;;s:8:&quot;PickList&quot;;s:0:&quot;&quot;;s:8:&quot;ReadOnly&quot;;s:4:&quot;true&quot;;s:14:&quot;TitleAlignment&quot;;s:13:&quot;taLeftJustify&quot;;s:10:&quot;TitleColor&quot;;s:0:&quot;&quot;;s:7:&quot;Visible&quot;;s:4:&quot;true&quot;;s:5:&quot;Width&quot;;s:3:&quot;100&quot;;}}]]></property>
      <property name="Datasource">dsPedidos</property>
      <property name="Height">150</property>
      <property name="Left">6</property>
      <property name="Name">ddanexo_pedidos1</property>
      <property name="Top">19</property>
      <property name="Width">615</property>
    </object>
    <object class="Button" name="cmdImprimeCompra" >
      <property name="Caption">Imprimir</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">25</property>
      <property name="Left">625</property>
      <property name="Name">cmdImprimeCompra</property>
      <property name="ParentColor">0</property>
      <property name="Top">143</property>
      <property name="Width">131</property>
      <property name="jsOnClick">cmdImprimeCompraJSClick</property>
    </object>
    <object class="Button" name="cmdRevAdmin" >
      <property name="Caption">Revisado por
Coordinador Admin.</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">40</property>
      <property name="Left">625</property>
      <property name="Name">cmdRevAdmin</property>
      <property name="ParentColor">0</property>
      <property name="Top">61</property>
      <property name="Width">131</property>
      <property name="jsOnClick">cmdRevAdminJSClick</property>
    </object>
    <object class="Button" name="cmdRevCompra" >
      <property name="Caption">Revisado por
Gerencia de Operaciones</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">40</property>
      <property name="Left">625</property>
      <property name="Name">cmdRevCompra</property>
      <property name="ParentColor">0</property>
      <property name="Top">21</property>
      <property name="Width">131</property>
      <property name="jsOnClick">cmdRevCompraJSClick</property>
    </object>
    <object class="Button" name="cmdAutorizaCompra" >
      <property name="Caption">Autorizar</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">40</property>
      <property name="Left">625</property>
      <property name="Name">cmdAutorizaCompra</property>
      <property name="ParentColor">0</property>
      <property name="Top">102</property>
      <property name="Width">131</property>
      <property name="jsOnClick">cmdAutorizaCompraJSClick</property>
    </object>
  </object>
  <object class="Memo" name="Memo1" >
    <property name="BorderStyle">bsNone</property>
    <property name="Color">#D0DDF0</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">65</property>
    <property name="Left">20</property>
    <property name="Lines">a:0:{}</property>
    <property name="Name">Memo1</property>
    <property name="ParentColor">0</property>
    <property name="Top">215</property>
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
    <property name="ParentColor">0</property>
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
    <property name="ParentColor">0</property>
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
    <property name="ParentColor">0</property>
    <property name="Top">10</property>
    <property name="Width">130</property>
    <property name="jsOnClick">cmdOCJSClick</property>
  </object>
  <object class="Table" name="tableSolicitud" >
        <property name="Left">66</property>
        <property name="Top">217</property>
    <property name="Database">database</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="MasterFields">a:0:{}</property>
    <property name="MasterSource"></property>
    <property name="Name">tableSolicitud</property>
    <property name="TableName">anexo_solicitud</property>
  </object>
  <object class="Database" name="database" >
        <property name="Left">568</property>
        <property name="Top">122</property>
    <property name="Connected"></property>
    <property name="Name">database</property>
  </object>
  <object class="Datasource" name="dsSolicitud" >
        <property name="Left">15</property>
        <property name="Top">222</property>
    <property name="Dataset">tableSolicitud</property>
    <property name="Name">dsSolicitud</property>
  </object>
  <object class="Table" name="tableRequisicion" >
        <property name="Left">300</property>
        <property name="Top">225</property>
    <property name="Database">database</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="MasterFields">a:0:{}</property>
    <property name="MasterSource"></property>
    <property name="Name">tableRequisicion</property>
    <property name="TableName">anexo_requisicion</property>
  </object>
  <object class="Datasource" name="dsRequisicion" >
        <property name="Left">227</property>
        <property name="Top">225</property>
    <property name="Dataset">tableRequisicion</property>
    <property name="Name">dsRequisicion</property>
  </object>
  <object class="Table" name="tablePedidos" >
        <property name="Left">555</property>
        <property name="Top">239</property>
    <property name="Database">database</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="MasterFields">a:0:{}</property>
    <property name="MasterSource"></property>
    <property name="Name">tablePedidos</property>
    <property name="TableName">anexo_pedidos</property>
  </object>
  <object class="Datasource" name="dsPedidos" >
        <property name="Left">462</property>
        <property name="Top">234</property>
    <property name="Dataset">tablePedidos</property>
    <property name="Name">dsPedidos</property>
  </object>
</object>
?>

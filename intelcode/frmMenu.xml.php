<?php
<object class="FrmMenu" name="FrmMenu" baseclass="page">
  <property name="Alignment">agCenter</property>
  <property name="Background"></property>
  <property name="Caption">FrmMenu</property>
  <property name="Color">#F0F0F0</property>
  <property name="DocType">dtNone</property>
  <property name="Font">
    <property name="Align">taNone</property>
    <property name="Case"></property>
    <property name="Color"></property>
    <property name="Family">Verdana</property>
    <property name="LineHeight"></property>
    <property name="Size">10px</property>
    <property name="Style"></property>
    <property name="Variant"></property>
    <property name="Weight"></property>
  </property>
  <property name="Height">462</property>
  <property name="IsMaster">0</property>
  <property name="Layout">
    <property name="Cols">5</property>
    <property name="Rows">5</property>
    <property name="Type">ABS_XY_LAYOUT</property>
  </property>
  <property name="Name">FrmMenu</property>
  <property name="UseAjax">1</property>
  <property name="Width">844</property>
  <property name="OnAfterShow"></property>
  <property name="OnAfterShowFooter"></property>
  <property name="OnBeforeShow">FrmMenuBeforeShow</property>
  <property name="OnBeforeShowHeader"></property>
  <property name="OnCreate"></property>
  <property name="OnShow"></property>
  <property name="OnShowHeader"></property>
  <property name="OnStartBody"></property>
  <property name="OnTemplate"></property>
  <object class="Window" name="wAcerca" >
    <property name="Caption">Acerca de...</property>
    <property name="Height">275</property>
    <property name="IsVisible">0</property>
    <property name="Left">221</property>
    <property name="Modal">1</property>
    <property name="Name">wAcerca</property>
    <property name="Resizeable">0</property>
    <property name="Top">116</property>
    <property name="Width">355</property>
    <property name="OnAfterShow"></property>
    <property name="OnBeforeShow"></property>
    <property name="OnShow"></property>
    <object class="Label" name="Label6" >
      <property name="Alignment">agCenter</property>
      <property name="Caption"><![CDATA[&lt;P&gt;&lt;STRONG&gt;Sistema Inteligente&lt;/STRONG&gt; &lt;/P&gt;
&lt;P&gt;de Administraci&oacute;n de Obras &lt;/P&gt;]]></property>
      <property name="Color">#EBEBEB</property>
      <property name="Font">
            <property name="Align">taNone</property>
            <property name="Case"></property>
            <property name="Color">#0000A0</property>
            <property name="Family">Verdana</property>
            <property name="LineHeight"></property>
            <property name="Size">10px</property>
            <property name="Style"></property>
            <property name="Variant"></property>
            <property name="Weight"></property>
      </property>
      <property name="Height">47</property>
      <property name="Left">8</property>
      <property name="Name">Label6</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">98</property>
      <property name="Width">335</property>
      <property name="OnAfterShow"></property>
      <property name="OnBeforeShow"></property>
      <property name="OnShow"></property>
    </object>
    <object class="Button" name="Button1" >
      <property name="Caption">Aceptar</property>
      <property name="Font">
            <property name="Align">taNone</property>
            <property name="Case"></property>
            <property name="Color"></property>
            <property name="Family">Verdana</property>
            <property name="LineHeight"></property>
            <property name="Size">10px</property>
            <property name="Style"></property>
            <property name="Variant"></property>
            <property name="Weight"></property>
      </property>
      <property name="Height">25</property>
      <property name="Left">260</property>
      <property name="Name">Button1</property>
      <property name="Top">240</property>
      <property name="Width">75</property>
      <property name="OnAfterShow"></property>
      <property name="OnBeforeShow"></property>
      <property name="OnShow"></property>
      <property name="jsOnClick">Button1JSClick</property>
    </object>
    <object class="Label" name="Label7" >
      <property name="Alignment">agLeft</property>
      <property name="Caption"><![CDATA[&lt;P&gt;Esta aplicaci&oacute;n se ha concebido bajo el uso de:&lt;/P&gt;
&lt;P&gt;&lt;STRONG&gt;Dephi for PHP, &lt;/STRONG&gt;&lt;STRONG&gt;FPDF, &lt;/STRONG&gt;&lt;STRONG&gt;Java, &lt;/STRONG&gt;&lt;STRONG&gt;iReport&lt;/STRONG&gt;&lt;/P&gt;
&lt;P&gt;Todos los Derechos Reservados&lt;/P&gt;
&lt;P&gt;&lt;STRONG&gt;&lt;/STRONG&gt;&amp;nbsp;&lt;/P&gt;]]></property>
      <property name="Color">#EBEBEB</property>
      <property name="Font">
            <property name="Align">taNone</property>
            <property name="Case"></property>
            <property name="Color"></property>
            <property name="Family">Verdana</property>
            <property name="LineHeight"></property>
            <property name="Size">10px</property>
            <property name="Style"></property>
            <property name="Variant"></property>
            <property name="Weight"></property>
      </property>
      <property name="Height">82</property>
      <property name="Left">10</property>
      <property name="Name">Label7</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">157</property>
      <property name="Width">335</property>
      <property name="OnAfterShow"></property>
      <property name="OnBeforeShow"></property>
      <property name="OnShow"></property>
    </object>
    <object class="Image" name="Image1" >
      <property name="Autosize">0</property>
      <property name="Border">0</property>
      <property name="Height">55</property>
      <property name="ImageSource">recursos/imagenes/_inteligent.PNG</property>
      <property name="Left">73</property>
      <property name="Link"></property>
      <property name="LinkTarget"></property>
      <property name="Name">Image1</property>
      <property name="Top">30</property>
      <property name="Width">180</property>
      <property name="OnAfterShow"></property>
      <property name="OnBeforeShow"></property>
      <property name="OnCustomize"></property>
      <property name="OnShow"></property>
    </object>
  </object>
  <object class="Panel" name="Panel1" >
    <property name="BorderColor">#000080</property>
    <property name="Caption">Panel1</property>
    <property name="Dynamic"></property>
    <property name="Font">
        <property name="Align">taNone</property>
        <property name="Case"></property>
        <property name="Color"></property>
        <property name="Family">Verdana</property>
        <property name="LineHeight"></property>
        <property name="Size">10px</property>
        <property name="Style"></property>
        <property name="Variant"></property>
        <property name="Weight"></property>
    </property>
    <property name="Height">83</property>
    <property name="Layout">
        <property name="Cols">5</property>
        <property name="Rows">5</property>
        <property name="Type">ABS_XY_LAYOUT</property>
    </property>
    <property name="Left">1</property>
    <property name="Name">Panel1</property>
    <property name="Width">843</property>
    <property name="OnAfterShow"></property>
    <property name="OnBeforeShow"></property>
    <property name="OnShow"></property>
    <object class="MainMenu" name="MainMenu1" >
      <property name="Alignment">agCenter</property>
      <property name="Font">
            <property name="Align">taNone</property>
            <property name="Case"></property>
            <property name="Color"></property>
            <property name="Family">Verdana</property>
            <property name="LineHeight"></property>
            <property name="Size">10px</property>
            <property name="Style"></property>
            <property name="Variant"></property>
            <property name="Weight"></property>
      </property>
      <property name="Height">30</property>
      <property name="Images">imagenesMenu</property>
      <property name="Items"><![CDATA[a:8:{i:0;a:6:{s:7:&quot;Caption&quot;;s:13:&quot;Configuracion&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;0&quot;;s:13:&quot;SelectedIndex&quot;;s:1:&quot;0&quot;;s:10:&quot;StateIndex&quot;;s:2:&quot;-1&quot;;s:3:&quot;Tag&quot;;s:2:&quot;-1&quot;;s:5:&quot;Items&quot;;a:23:{i:0;a:6:{s:7:&quot;Caption&quot;;s:20:&quot;Familia de Productos&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;8&quot;;s:13:&quot;SelectedIndex&quot;;s:1:&quot;0&quot;;s:10:&quot;StateIndex&quot;;s:2:&quot;-1&quot;;s:3:&quot;Tag&quot;;s:3:&quot;111&quot;;s:5:&quot;Items&quot;;a:0:{}}i:1;a:6:{s:7:&quot;Caption&quot;;s:9:&quot;Almacenes&quot;;s:10:&quot;ImageIndex&quot;;s:2:&quot;41&quot;;s:13:&quot;SelectedIndex&quot;;s:1:&quot;0&quot;;s:10:&quot;StateIndex&quot;;s:2:&quot;-1&quot;;s:3:&quot;Tag&quot;;s:3:&quot;109&quot;;s:5:&quot;Items&quot;;a:0:{}}i:2;a:6:{s:7:&quot;Caption&quot;;s:11:&quot;Consumibles&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;8&quot;;s:13:&quot;SelectedIndex&quot;;s:1:&quot;0&quot;;s:10:&quot;StateIndex&quot;;s:2:&quot;-1&quot;;s:3:&quot;Tag&quot;;s:3:&quot;101&quot;;s:5:&quot;Items&quot;;a:0:{}}i:3;a:6:{s:7:&quot;Caption&quot;;s:1:&quot;-&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;0&quot;;s:13:&quot;SelectedIndex&quot;;s:1:&quot;0&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:1:&quot;0&quot;;s:5:&quot;Items&quot;;a:0:{}}i:4;a:6:{s:7:&quot;Caption&quot;;s:21:&quot;Medios de Transportes&quot;;s:10:&quot;ImageIndex&quot;;s:2:&quot;10&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:2:&quot;-1&quot;;s:5:&quot;Items&quot;;a:2:{i:0;a:6:{s:7:&quot;Caption&quot;;s:30:&quot;Tipos de Medios de Transportes&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;6&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:3:&quot;123&quot;;s:5:&quot;Items&quot;;a:0:{}}i:1;a:6:{s:7:&quot;Caption&quot;;s:21:&quot;Medios de Transportes&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;6&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:3:&quot;124&quot;;s:5:&quot;Items&quot;;a:0:{}}}}i:5;a:6:{s:7:&quot;Caption&quot;;s:8:&quot;Personal&quot;;s:10:&quot;ImageIndex&quot;;s:2:&quot;23&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:2:&quot;-1&quot;;s:5:&quot;Items&quot;;a:4:{i:0;a:6:{s:7:&quot;Caption&quot;;s:19:&quot;Tipos de Categorias&quot;;s:10:&quot;ImageIndex&quot;;s:2:&quot;23&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:3:&quot;125&quot;;s:5:&quot;Items&quot;;a:0:{}}i:1;a:6:{s:7:&quot;Caption&quot;;s:34:&quot;Catalogo de Categorias de Personal&quot;;s:10:&quot;ImageIndex&quot;;s:2:&quot;23&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:3:&quot;126&quot;;s:5:&quot;Items&quot;;a:0:{}}i:2;a:6:{s:7:&quot;Caption&quot;;s:33:&quot;Paquetes de Categoria de Personal&quot;;s:10:&quot;ImageIndex&quot;;s:2:&quot;23&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:3:&quot;127&quot;;s:5:&quot;Items&quot;;a:0:{}}i:3;a:6:{s:7:&quot;Caption&quot;;s:37:&quot;Programacion de Categoria de Personal&quot;;s:10:&quot;ImageIndex&quot;;s:2:&quot;23&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:3:&quot;128&quot;;s:5:&quot;Items&quot;;a:0:{}}}}i:6;a:6:{s:7:&quot;Caption&quot;;s:11:&quot;Tripulacion&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;6&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:2:&quot;-1&quot;;s:5:&quot;Items&quot;;a:3:{i:0;a:6:{s:7:&quot;Caption&quot;;s:29:&quot;Categoria de Tripulacion Base&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;6&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:3:&quot;129&quot;;s:5:&quot;Items&quot;;a:0:{}}i:1;a:6:{s:7:&quot;Caption&quot;;s:16:&quot;Tripulacion Base&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;6&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:1:&quot;8&quot;;s:5:&quot;Items&quot;;a:0:{}}i:2;a:6:{s:7:&quot;Caption&quot;;s:32:&quot;Floteles / Complejos / Pernoctan&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;6&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:1:&quot;9&quot;;s:5:&quot;Items&quot;;a:0:{}}}}i:7;a:6:{s:7:&quot;Caption&quot;;s:7:&quot;Equipos&quot;;s:10:&quot;ImageIndex&quot;;s:2:&quot;11&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:2:&quot;-1&quot;;s:5:&quot;Items&quot;;a:3:{i:0;a:6:{s:7:&quot;Caption&quot;;s:15:&quot;Tipo de Equipos&quot;;s:10:&quot;ImageIndex&quot;;s:2:&quot;11&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:2:&quot;-1&quot;;s:3:&quot;Tag&quot;;s:3:&quot;120&quot;;s:5:&quot;Items&quot;;a:0:{}}i:1;a:6:{s:7:&quot;Caption&quot;;s:19:&quot;Catalogo de Equipos&quot;;s:10:&quot;ImageIndex&quot;;s:2:&quot;11&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:3:&quot;122&quot;;s:5:&quot;Items&quot;;a:0:{}}i:2;a:6:{s:7:&quot;Caption&quot;;s:19:&quot;Paquetes de Equipos&quot;;s:10:&quot;ImageIndex&quot;;s:2:&quot;11&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:3:&quot;121&quot;;s:5:&quot;Items&quot;;a:0:{}}}}i:8;a:6:{s:7:&quot;Caption&quot;;s:1:&quot;-&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;1&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:1:&quot;0&quot;;s:5:&quot;Items&quot;;a:0:{}}i:9;a:6:{s:7:&quot;Caption&quot;;s:30:&quot;Tipos de Permisos de Seguridad&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;6&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:2:&quot;13&quot;;s:5:&quot;Items&quot;;a:0:{}}i:10;a:6:{s:7:&quot;Caption&quot;;s:1:&quot;-&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;1&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:1:&quot;0&quot;;s:5:&quot;Items&quot;;a:0:{}}i:11;a:6:{s:7:&quot;Caption&quot;;s:25:&quot;Tipos de Orden de Trabajo&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;6&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:2:&quot;14&quot;;s:5:&quot;Items&quot;;a:0:{}}i:12;a:6:{s:7:&quot;Caption&quot;;s:1:&quot;-&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;1&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:1:&quot;0&quot;;s:5:&quot;Items&quot;;a:0:{}}i:13;a:6:{s:7:&quot;Caption&quot;;s:34:&quot;Municipios/Localidades/Plataformas&quot;;s:10:&quot;ImageIndex&quot;;s:2:&quot;23&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:2:&quot;15&quot;;s:5:&quot;Items&quot;;a:0:{}}i:14;a:6:{s:7:&quot;Caption&quot;;s:1:&quot;-&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;1&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:1:&quot;0&quot;;s:5:&quot;Items&quot;;a:0:{}}i:15;a:6:{s:7:&quot;Caption&quot;;s:7:&quot;Cuentas&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;6&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:2:&quot;16&quot;;s:5:&quot;Items&quot;;a:0:{}}i:16;a:6:{s:7:&quot;Caption&quot;;s:10:&quot;Subcuentas&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;6&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:2:&quot;17&quot;;s:5:&quot;Items&quot;;a:0:{}}i:17;a:6:{s:7:&quot;Caption&quot;;s:1:&quot;-&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;1&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:1:&quot;0&quot;;s:5:&quot;Items&quot;;a:0:{}}i:18;a:6:{s:7:&quot;Caption&quot;;s:39:&quot;Clasificacion de Planos de Construccion&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;6&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:2:&quot;18&quot;;s:5:&quot;Items&quot;;a:0:{}}i:19;a:6:{s:7:&quot;Caption&quot;;s:22:&quot;Planos de Construccion&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;6&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:2:&quot;19&quot;;s:5:&quot;Items&quot;;a:0:{}}i:20;a:6:{s:7:&quot;Caption&quot;;s:1:&quot;-&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;1&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:1:&quot;0&quot;;s:5:&quot;Items&quot;;a:0:{}}i:21;a:6:{s:7:&quot;Caption&quot;;s:13:&quot;Pozos/Equipos&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;6&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:3:&quot;113&quot;;s:5:&quot;Items&quot;;a:0:{}}i:22;a:6:{s:7:&quot;Caption&quot;;s:30:&quot;Medidas x Fletes / Suministros&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;8&quot;;s:13:&quot;SelectedIndex&quot;;s:1:&quot;0&quot;;s:10:&quot;StateIndex&quot;;s:2:&quot;-1&quot;;s:3:&quot;Tag&quot;;s:3:&quot;116&quot;;s:5:&quot;Items&quot;;a:0:{}}}}i:1;a:6:{s:7:&quot;Caption&quot;;s:15:&quot;Control de Obra&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;1&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:2:&quot;-1&quot;;s:5:&quot;Items&quot;;a:16:{i:0;a:6:{s:7:&quot;Caption&quot;;s:30:&quot;Importacion de Plantilla Anexo&quot;;s:10:&quot;ImageIndex&quot;;s:2:&quot;19&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:2:&quot;20&quot;;s:5:&quot;Items&quot;;a:0:{}}i:1;a:6:{s:7:&quot;Caption&quot;;s:29:&quot;Reprogramaciones del Contrato&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;6&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:2:&quot;21&quot;;s:5:&quot;Items&quot;;a:0:{}}i:2;a:6:{s:7:&quot;Caption&quot;;s:17:&quot;Polizas y Fianzas&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;1&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:2:&quot;22&quot;;s:5:&quot;Items&quot;;a:0:{}}i:3;a:6:{s:7:&quot;Caption&quot;;s:1:&quot;-&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;1&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:1:&quot;0&quot;;s:5:&quot;Items&quot;;a:0:{}}i:4;a:6:{s:7:&quot;Caption&quot;;s:39:&quot;Conceptos Generales / Partidas de Anexo&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;6&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:3:&quot;115&quot;;s:5:&quot;Items&quot;;a:0:{}}i:5;a:6:{s:7:&quot;Caption&quot;;s:31:&quot;Recursos por Concepto / Partida&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;6&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:1:&quot;0&quot;;s:5:&quot;Items&quot;;a:0:{}}i:6;a:6:{s:7:&quot;Caption&quot;;s:36:&quot;Distribucion de Conceptos / Partidas&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;3&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:2:&quot;24&quot;;s:5:&quot;Items&quot;;a:0:{}}i:7;a:6:{s:7:&quot;Caption&quot;;s:13:&quot;Ficha Tecnica&quot;;s:10:&quot;ImageIndex&quot;;s:2:&quot;32&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:3:&quot;118&quot;;s:5:&quot;Items&quot;;a:0:{}}i:8;a:6:{s:7:&quot;Caption&quot;;s:1:&quot;-&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;1&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:1:&quot;0&quot;;s:5:&quot;Items&quot;;a:0:{}}i:9;a:6:{s:7:&quot;Caption&quot;;s:30:&quot;Registro de Frentes de Trabajo&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;1&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:2:&quot;95&quot;;s:5:&quot;Items&quot;;a:0:{}}i:10;a:6:{s:7:&quot;Caption&quot;;s:39:&quot;Conceptos / Partidas x Orden de Trabajo&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;3&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:3:&quot;117&quot;;s:5:&quot;Items&quot;;a:0:{}}i:11;a:6:{s:7:&quot;Caption&quot;;s:57:&quot;Distribucion de Conceptos / Partidas por Orden de Trabajo&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;3&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:2:&quot;24&quot;;s:5:&quot;Items&quot;;a:0:{}}i:12;a:6:{s:7:&quot;Caption&quot;;s:20:&quot;Puntos de Inspeccion&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;3&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:1:&quot;0&quot;;s:5:&quot;Items&quot;;a:0:{}}i:13;a:6:{s:7:&quot;Caption&quot;;s:18:&quot;Frentes de Trabajo&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;3&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:1:&quot;0&quot;;s:5:&quot;Items&quot;;a:0:{}}i:14;a:6:{s:7:&quot;Caption&quot;;s:1:&quot;-&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;1&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:1:&quot;0&quot;;s:5:&quot;Items&quot;;a:0:{}}i:15;a:6:{s:7:&quot;Caption&quot;;s:26:&quot;Condiciones Climatologicas&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;6&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:2:&quot;27&quot;;s:5:&quot;Items&quot;;a:0:{}}}}i:2;a:6:{s:7:&quot;Caption&quot;;s:15:&quot;Precio Unitario&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;1&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:2:&quot;-1&quot;;s:5:&quot;Items&quot;;a:12:{i:0;a:6:{s:7:&quot;Caption&quot;;s:32:&quot;Tramite de Permisos de Seguridad&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;6&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:2:&quot;13&quot;;s:5:&quot;Items&quot;;a:0:{}}i:1;a:6:{s:7:&quot;Caption&quot;;s:1:&quot;-&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;1&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:1:&quot;0&quot;;s:5:&quot;Items&quot;;a:0:{}}i:2;a:6:{s:7:&quot;Caption&quot;;s:26:&quot;Procesos y Configuraciones&quot;;s:10:&quot;ImageIndex&quot;;s:2:&quot;25&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:2:&quot;-1&quot;;s:5:&quot;Items&quot;;a:7:{i:0;a:6:{s:7:&quot;Caption&quot;;s:35:&quot;Distribucion de Programa de Trabajo&quot;;s:10:&quot;ImageIndex&quot;;s:2:&quot;24&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:1:&quot;0&quot;;s:5:&quot;Items&quot;;a:0:{}}i:1;a:6:{s:7:&quot;Caption&quot;;s:1:&quot;-&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;1&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:1:&quot;0&quot;;s:5:&quot;Items&quot;;a:0:{}}i:2;a:6:{s:7:&quot;Caption&quot;;s:36:&quot;Regeneracion de Avances del Contrato&quot;;s:10:&quot;ImageIndex&quot;;s:2:&quot;24&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:1:&quot;0&quot;;s:5:&quot;Items&quot;;a:0:{}}i:3;a:6:{s:7:&quot;Caption&quot;;s:32:&quot;Regeneracion de Avances Globales&quot;;s:10:&quot;ImageIndex&quot;;s:2:&quot;24&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:1:&quot;0&quot;;s:5:&quot;Items&quot;;a:0:{}}i:4;a:6:{s:7:&quot;Caption&quot;;s:35:&quot;Regeneracion de Avances Entregables&quot;;s:10:&quot;ImageIndex&quot;;s:2:&quot;24&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:1:&quot;0&quot;;s:5:&quot;Items&quot;;a:0:{}}i:5;a:6:{s:7:&quot;Caption&quot;;s:1:&quot;-&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;1&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:1:&quot;0&quot;;s:5:&quot;Items&quot;;a:0:{}}i:6;a:6:{s:7:&quot;Caption&quot;;s:27:&quot;Agrupamiento de Actividades&quot;;s:10:&quot;ImageIndex&quot;;s:2:&quot;24&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:1:&quot;0&quot;;s:5:&quot;Items&quot;;a:0:{}}}}i:3;a:6:{s:7:&quot;Caption&quot;;s:16:&quot;Avances Globales&quot;;s:10:&quot;ImageIndex&quot;;s:2:&quot;25&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:2:&quot;-1&quot;;s:5:&quot;Items&quot;;a:2:{i:0;a:6:{s:7:&quot;Caption&quot;;s:20:&quot;Avances del Contrato&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;5&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:2:&quot;28&quot;;s:5:&quot;Items&quot;;a:0:{}}i:1;a:6:{s:7:&quot;Caption&quot;;s:26:&quot;Avances x Orden de Trabajo&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;5&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:2:&quot;29&quot;;s:5:&quot;Items&quot;;a:0:{}}}}i:4;a:6:{s:7:&quot;Caption&quot;;s:9:&quot;Consultas&quot;;s:10:&quot;ImageIndex&quot;;s:2:&quot;26&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:2:&quot;-1&quot;;s:5:&quot;Items&quot;;a:16:{i:0;a:6:{s:7:&quot;Caption&quot;;s:49:&quot;Reporte de Equipos Utilizados en Reportes Diarios&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;8&quot;;s:13:&quot;SelectedIndex&quot;;s:1:&quot;0&quot;;s:10:&quot;StateIndex&quot;;s:2:&quot;-1&quot;;s:3:&quot;Tag&quot;;s:3:&quot;114&quot;;s:5:&quot;Items&quot;;a:0:{}}i:1;a:6:{s:7:&quot;Caption&quot;;s:1:&quot;-&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;0&quot;;s:13:&quot;SelectedIndex&quot;;s:1:&quot;0&quot;;s:10:&quot;StateIndex&quot;;s:2:&quot;-1&quot;;s:3:&quot;Tag&quot;;s:1:&quot;0&quot;;s:5:&quot;Items&quot;;a:0:{}}i:2;a:6:{s:7:&quot;Caption&quot;;s:24:&quot;Consulta x Partida Anexo&quot;;s:10:&quot;ImageIndex&quot;;s:2:&quot;20&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:2:&quot;30&quot;;s:5:&quot;Items&quot;;a:0:{}}i:3;a:6:{s:7:&quot;Caption&quot;;s:30:&quot;Consulta de Partidas x Alcance&quot;;s:10:&quot;ImageIndex&quot;;s:2:&quot;20&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:1:&quot;0&quot;;s:5:&quot;Items&quot;;a:0:{}}i:4;a:6:{s:7:&quot;Caption&quot;;s:42:&quot;Consulta de Partidas x Paquetes de Trabajo&quot;;s:10:&quot;ImageIndex&quot;;s:2:&quot;20&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:1:&quot;0&quot;;s:5:&quot;Items&quot;;a:0:{}}i:5;a:6:{s:7:&quot;Caption&quot;;s:34:&quot;Consulta de Partidas x Descripcion&quot;;s:10:&quot;ImageIndex&quot;;s:2:&quot;20&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:1:&quot;0&quot;;s:5:&quot;Items&quot;;a:0:{}}i:6;a:6:{s:7:&quot;Caption&quot;;s:19:&quot;Catalogo de Anexo C&quot;;s:10:&quot;ImageIndex&quot;;s:2:&quot;20&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:2:&quot;31&quot;;s:5:&quot;Items&quot;;a:0:{}}i:7;a:6:{s:7:&quot;Caption&quot;;s:1:&quot;-&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;1&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:1:&quot;0&quot;;s:5:&quot;Items&quot;;a:0:{}}i:8;a:6:{s:7:&quot;Caption&quot;;s:50:&quot;Comparativo Suministrado Vs. Reportado Vs Generado&quot;;s:10:&quot;ImageIndex&quot;;s:2:&quot;32&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:2:&quot;35&quot;;s:5:&quot;Items&quot;;a:0:{}}i:9;a:6:{s:7:&quot;Caption&quot;;s:48:&quot;Comparativo Instalado Vs. Generado en inteligent&quot;;s:10:&quot;ImageIndex&quot;;s:2:&quot;32&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:1:&quot;0&quot;;s:5:&quot;Items&quot;;a:0:{}}i:10;a:6:{s:7:&quot;Caption&quot;;s:32:&quot;Consulta General x Partida Anexo&quot;;s:10:&quot;ImageIndex&quot;;s:2:&quot;32&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:2:&quot;48&quot;;s:5:&quot;Items&quot;;a:0:{}}i:11;a:6:{s:7:&quot;Caption&quot;;s:47:&quot;Comparativo Reportado Vs. Generado (inteligent)&quot;;s:10:&quot;ImageIndex&quot;;s:2:&quot;32&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:2:&quot;33&quot;;s:5:&quot;Items&quot;;a:0:{}}i:12;a:6:{s:7:&quot;Caption&quot;;s:46:&quot;Comparativo Reportado Vs. Generado (intelcode)&quot;;s:10:&quot;ImageIndex&quot;;s:2:&quot;32&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:2:&quot;34&quot;;s:5:&quot;Items&quot;;a:0:{}}i:13;a:6:{s:7:&quot;Caption&quot;;s:49:&quot;Comparativo Suministrado vs Reportado vs Generado&quot;;s:10:&quot;ImageIndex&quot;;s:2:&quot;32&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:2:&quot;35&quot;;s:5:&quot;Items&quot;;a:0:{}}i:14;a:6:{s:7:&quot;Caption&quot;;s:22:&quot;Generacion de Informes&quot;;s:10:&quot;ImageIndex&quot;;s:2:&quot;32&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:2:&quot;32&quot;;s:5:&quot;Items&quot;;a:0:{}}i:15;a:6:{s:7:&quot;Caption&quot;;s:28:&quot;Generacion de Informes(Menu)&quot;;s:10:&quot;ImageIndex&quot;;s:2:&quot;32&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:2:&quot;50&quot;;s:5:&quot;Items&quot;;a:0:{}}}}i:5;a:6:{s:7:&quot;Caption&quot;;s:23:&quot;Busqueda de Comentarios&quot;;s:10:&quot;ImageIndex&quot;;s:2:&quot;22&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:1:&quot;0&quot;;s:5:&quot;Items&quot;;a:0:{}}i:6;a:6:{s:7:&quot;Caption&quot;;s:1:&quot;-&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;1&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:1:&quot;0&quot;;s:5:&quot;Items&quot;;a:0:{}}i:7;a:6:{s:7:&quot;Caption&quot;;s:19:&quot;Actividades Diarias&quot;;s:10:&quot;ImageIndex&quot;;s:2:&quot;27&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:2:&quot;-1&quot;;s:5:&quot;Items&quot;;a:13:{i:0;a:6:{s:7:&quot;Caption&quot;;s:9:&quot;Firmantes&quot;;s:10:&quot;ImageIndex&quot;;s:2:&quot;14&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:2:&quot;97&quot;;s:5:&quot;Items&quot;;a:0:{}}i:1;a:6:{s:7:&quot;Caption&quot;;s:1:&quot;-&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;1&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:1:&quot;0&quot;;s:5:&quot;Items&quot;;a:0:{}}i:2;a:6:{s:7:&quot;Caption&quot;;s:37:&quot;Captura de Instalacion por Isometrico&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;6&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:1:&quot;0&quot;;s:5:&quot;Items&quot;;a:0:{}}i:3;a:6:{s:7:&quot;Caption&quot;;s:34:&quot;Reporte de Instalacion por Periodo&quot;;s:10:&quot;ImageIndex&quot;;s:2:&quot;26&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:1:&quot;0&quot;;s:5:&quot;Items&quot;;a:0:{}}i:4;a:6:{s:7:&quot;Caption&quot;;s:17:&quot;Ordenes de Cambio&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;6&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:2:&quot;92&quot;;s:5:&quot;Items&quot;;a:0:{}}i:5;a:6:{s:7:&quot;Caption&quot;;s:1:&quot;-&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;1&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:1:&quot;0&quot;;s:5:&quot;Items&quot;;a:0:{}}i:6;a:6:{s:7:&quot;Caption&quot;;s:14:&quot;Reporte Diario&quot;;s:10:&quot;ImageIndex&quot;;s:2:&quot;38&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:2:&quot;39&quot;;s:5:&quot;Items&quot;;a:0:{}}i:7;a:6:{s:7:&quot;Caption&quot;;s:24:&quot;Reporte Diario Gerencial&quot;;s:10:&quot;ImageIndex&quot;;s:2:&quot;27&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:1:&quot;0&quot;;s:5:&quot;Items&quot;;a:0:{}}i:8;a:6:{s:7:&quot;Caption&quot;;s:18:&quot;Sintesis Gerencial&quot;;s:10:&quot;ImageIndex&quot;;s:2:&quot;27&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:1:&quot;0&quot;;s:5:&quot;Items&quot;;a:0:{}}i:9;a:6:{s:7:&quot;Caption&quot;;s:42:&quot;Cancelacion de Partidas x Orden de Trabajo&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;9&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:1:&quot;0&quot;;s:5:&quot;Items&quot;;a:0:{}}i:10;a:6:{s:7:&quot;Caption&quot;;s:1:&quot;-&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;1&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:1:&quot;0&quot;;s:5:&quot;Items&quot;;a:0:{}}i:11;a:6:{s:7:&quot;Caption&quot;;s:36:&quot;Validar Reportes Diarios/Generadores&quot;;s:10:&quot;ImageIndex&quot;;s:2:&quot;24&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:2:&quot;40&quot;;s:5:&quot;Items&quot;;a:0:{}}i:12;a:6:{s:7:&quot;Caption&quot;;s:34:&quot;Abrir Reportes Diarios Generadores&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;1&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:2:&quot;41&quot;;s:5:&quot;Items&quot;;a:0:{}}}}i:8;a:6:{s:7:&quot;Caption&quot;;s:38:&quot;Album Fotografico / Tiempos Muertos...&quot;;s:10:&quot;ImageIndex&quot;;s:2:&quot;28&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:2:&quot;-1&quot;;s:5:&quot;Items&quot;;a:4:{i:0;a:6:{s:7:&quot;Caption&quot;;s:15:&quot;Tiempos Muertos&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;6&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:2:&quot;42&quot;;s:5:&quot;Items&quot;;a:0:{}}i:1;a:6:{s:7:&quot;Caption&quot;;s:27:&quot;Personal / Equipo Utilizado&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;6&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:2:&quot;43&quot;;s:5:&quot;Items&quot;;a:0:{}}i:2;a:6:{s:7:&quot;Caption&quot;;s:18:&quot;Resumen Financiero&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;6&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:2:&quot;44&quot;;s:5:&quot;Items&quot;;a:0:{}}i:3;a:6:{s:7:&quot;Caption&quot;;s:17:&quot;Album Fotografico&quot;;s:10:&quot;ImageIndex&quot;;s:2:&quot;28&quot;;s:13:&quot;SelectedIndex&quot;;s:1:&quot;0&quot;;s:10:&quot;StateIndex&quot;;s:2:&quot;-1&quot;;s:3:&quot;Tag&quot;;s:2:&quot;89&quot;;s:5:&quot;Items&quot;;a:0:{}}}}i:9;a:6:{s:7:&quot;Caption&quot;;s:12:&quot;Estimaciones&quot;;s:10:&quot;ImageIndex&quot;;s:2:&quot;12&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:2:&quot;-1&quot;;s:5:&quot;Items&quot;;a:11:{i:0;a:6:{s:7:&quot;Caption&quot;;s:10:&quot;Proyeccion&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;6&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:1:&quot;0&quot;;s:5:&quot;Items&quot;;a:0:{}}i:1;a:6:{s:7:&quot;Caption&quot;;s:1:&quot;-&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;1&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:1:&quot;0&quot;;s:5:&quot;Items&quot;;a:0:{}}i:2;a:6:{s:7:&quot;Caption&quot;;s:24:&quot;Historial de Generadores&quot;;s:10:&quot;ImageIndex&quot;;s:2:&quot;16&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:1:&quot;0&quot;;s:5:&quot;Items&quot;;a:0:{}}i:3;a:6:{s:7:&quot;Caption&quot;;s:1:&quot;-&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;1&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:1:&quot;0&quot;;s:5:&quot;Items&quot;;a:0:{}}i:4;a:6:{s:7:&quot;Caption&quot;;s:31:&quot;Estimaciones de SubContratistas&quot;;s:10:&quot;ImageIndex&quot;;s:2:&quot;12&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:1:&quot;0&quot;;s:5:&quot;Items&quot;;a:0:{}}i:5;a:6:{s:7:&quot;Caption&quot;;s:1:&quot;-&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;1&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:1:&quot;0&quot;;s:5:&quot;Items&quot;;a:0:{}}i:6;a:6:{s:7:&quot;Caption&quot;;s:12:&quot;Estimaciones&quot;;s:10:&quot;ImageIndex&quot;;s:2:&quot;12&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:2:&quot;96&quot;;s:5:&quot;Items&quot;;a:0:{}}i:7;a:6:{s:7:&quot;Caption&quot;;s:21:&quot;Imprimir Estimaciones&quot;;s:10:&quot;ImageIndex&quot;;s:2:&quot;26&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:2:&quot;46&quot;;s:5:&quot;Items&quot;;a:0:{}}i:8;a:6:{s:7:&quot;Caption&quot;;s:1:&quot;-&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;1&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:1:&quot;0&quot;;s:5:&quot;Items&quot;;a:0:{}}i:9;a:6:{s:7:&quot;Caption&quot;;s:28:&quot;Autorizacion de Estimaciones&quot;;s:10:&quot;ImageIndex&quot;;s:2:&quot;24&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:3:&quot;119&quot;;s:5:&quot;Items&quot;;a:0:{}}i:10;a:6:{s:7:&quot;Caption&quot;;s:22:&quot;Filtro de Estimaciones&quot;;s:10:&quot;ImageIndex&quot;;s:2:&quot;19&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:1:&quot;0&quot;;s:5:&quot;Items&quot;;a:0:{}}}}i:10;a:6:{s:7:&quot;Caption&quot;;s:19:&quot;Generadores de Obra&quot;;s:10:&quot;ImageIndex&quot;;s:2:&quot;16&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:2:&quot;-1&quot;;s:5:&quot;Items&quot;;a:3:{i:0;a:6:{s:7:&quot;Caption&quot;;s:30:&quot;Captura de Generadores de Obra&quot;;s:10:&quot;ImageIndex&quot;;s:2:&quot;16&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:2:&quot;98&quot;;s:5:&quot;Items&quot;;a:0:{}}i:1;a:6:{s:7:&quot;Caption&quot;;s:24:&quot;Impresion de Generadores&quot;;s:10:&quot;ImageIndex&quot;;s:2:&quot;26&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:2:&quot;48&quot;;s:5:&quot;Items&quot;;a:0:{}}i:2;a:6:{s:7:&quot;Caption&quot;;s:24:&quot;Historial de Generadores&quot;;s:10:&quot;ImageIndex&quot;;s:2:&quot;22&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:1:&quot;0&quot;;s:5:&quot;Items&quot;;a:0:{}}}}i:11;a:6:{s:7:&quot;Caption&quot;;s:8:&quot;Reportes&quot;;s:10:&quot;ImageIndex&quot;;s:2:&quot;29&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:2:&quot;-1&quot;;s:5:&quot;Items&quot;;a:3:{i:0;a:6:{s:7:&quot;Caption&quot;;s:33:&quot;Reportes de Instalacion x Periodo&quot;;s:10:&quot;ImageIndex&quot;;s:2:&quot;26&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:2:&quot;37&quot;;s:5:&quot;Items&quot;;a:0:{}}i:1;a:6:{s:7:&quot;Caption&quot;;s:16:&quot;Reportes Diarios&quot;;s:10:&quot;ImageIndex&quot;;s:2:&quot;26&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:2:&quot;38&quot;;s:5:&quot;Items&quot;;a:0:{}}i:2;a:6:{s:7:&quot;Caption&quot;;s:28:&quot;Reportes Diarios + Gerencial&quot;;s:10:&quot;ImageIndex&quot;;s:2:&quot;26&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:1:&quot;0&quot;;s:5:&quot;Items&quot;;a:0:{}}}}}}i:3;a:6:{s:7:&quot;Caption&quot;;s:7:&quot;Almacen&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;1&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:2:&quot;-1&quot;;s:5:&quot;Items&quot;;a:17:{i:0;a:6:{s:7:&quot;Caption&quot;;s:17:&quot;Pagos Proveedores&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;8&quot;;s:13:&quot;SelectedIndex&quot;;s:1:&quot;0&quot;;s:10:&quot;StateIndex&quot;;s:2:&quot;-1&quot;;s:3:&quot;Tag&quot;;s:3:&quot;112&quot;;s:5:&quot;Items&quot;;a:0:{}}i:1;a:6:{s:7:&quot;Caption&quot;;s:1:&quot;-&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;0&quot;;s:13:&quot;SelectedIndex&quot;;s:1:&quot;0&quot;;s:10:&quot;StateIndex&quot;;s:2:&quot;-1&quot;;s:3:&quot;Tag&quot;;s:1:&quot;0&quot;;s:5:&quot;Items&quot;;a:0:{}}i:2;a:6:{s:7:&quot;Caption&quot;;s:11:&quot;Proveedores&quot;;s:10:&quot;ImageIndex&quot;;s:2:&quot;30&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:3:&quot;103&quot;;s:5:&quot;Items&quot;;a:0:{}}i:3;a:6:{s:7:&quot;Caption&quot;;s:18:&quot;Movtos. de Almacen&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;6&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:2:&quot;52&quot;;s:5:&quot;Items&quot;;a:0:{}}i:4;a:6:{s:7:&quot;Caption&quot;;s:1:&quot;-&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;1&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:1:&quot;0&quot;;s:5:&quot;Items&quot;;a:0:{}}i:5;a:6:{s:7:&quot;Caption&quot;;s:18:&quot;Inventario General&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;8&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:1:&quot;0&quot;;s:5:&quot;Items&quot;;a:0:{}}i:6;a:6:{s:7:&quot;Caption&quot;;s:1:&quot;-&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;1&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:1:&quot;0&quot;;s:5:&quot;Items&quot;;a:0:{}}i:7;a:6:{s:7:&quot;Caption&quot;;s:34:&quot;Solicitudes de Material de Almacen&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;8&quot;;s:13:&quot;SelectedIndex&quot;;s:1:&quot;0&quot;;s:10:&quot;StateIndex&quot;;s:2:&quot;-1&quot;;s:3:&quot;Tag&quot;;s:3:&quot;104&quot;;s:5:&quot;Items&quot;;a:0:{}}i:8;a:6:{s:7:&quot;Caption&quot;;s:24:&quot;Captura de Requisiciones&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;8&quot;;s:13:&quot;SelectedIndex&quot;;s:1:&quot;0&quot;;s:10:&quot;StateIndex&quot;;s:2:&quot;-1&quot;;s:3:&quot;Tag&quot;;s:2:&quot;99&quot;;s:5:&quot;Items&quot;;a:0:{}}i:9;a:6:{s:7:&quot;Caption&quot;;s:29:&quot;Captura de Ordenes de Compra &quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;8&quot;;s:13:&quot;SelectedIndex&quot;;s:1:&quot;0&quot;;s:10:&quot;StateIndex&quot;;s:2:&quot;-1&quot;;s:3:&quot;Tag&quot;;s:3:&quot;100&quot;;s:5:&quot;Items&quot;;a:0:{}}i:10;a:6:{s:7:&quot;Caption&quot;;s:30:&quot;Captura de Avisos de Embarques&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;8&quot;;s:13:&quot;SelectedIndex&quot;;s:1:&quot;0&quot;;s:10:&quot;StateIndex&quot;;s:2:&quot;-1&quot;;s:3:&quot;Tag&quot;;s:3:&quot;102&quot;;s:5:&quot;Items&quot;;a:0:{}}i:11;a:6:{s:7:&quot;Caption&quot;;s:1:&quot;-&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;0&quot;;s:13:&quot;SelectedIndex&quot;;s:1:&quot;0&quot;;s:10:&quot;StateIndex&quot;;s:2:&quot;-1&quot;;s:3:&quot;Tag&quot;;s:1:&quot;0&quot;;s:5:&quot;Items&quot;;a:0:{}}i:12;a:6:{s:7:&quot;Caption&quot;;s:19:&quot;Entradas al Almacen&quot;;s:10:&quot;ImageIndex&quot;;s:2:&quot;42&quot;;s:13:&quot;SelectedIndex&quot;;s:1:&quot;0&quot;;s:10:&quot;StateIndex&quot;;s:2:&quot;-1&quot;;s:3:&quot;Tag&quot;;s:3:&quot;110&quot;;s:5:&quot;Items&quot;;a:0:{}}i:13;a:6:{s:7:&quot;Caption&quot;;s:18:&quot;Salidas de Almacen&quot;;s:10:&quot;ImageIndex&quot;;s:2:&quot;43&quot;;s:13:&quot;SelectedIndex&quot;;s:1:&quot;0&quot;;s:10:&quot;StateIndex&quot;;s:2:&quot;-1&quot;;s:3:&quot;Tag&quot;;s:3:&quot;107&quot;;s:5:&quot;Items&quot;;a:0:{}}i:14;a:6:{s:7:&quot;Caption&quot;;s:1:&quot;-&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;0&quot;;s:13:&quot;SelectedIndex&quot;;s:1:&quot;0&quot;;s:10:&quot;StateIndex&quot;;s:2:&quot;-1&quot;;s:3:&quot;Tag&quot;;s:1:&quot;0&quot;;s:5:&quot;Items&quot;;a:0:{}}i:15;a:6:{s:7:&quot;Caption&quot;;s:51:&quot;Validar Solicitudes/Requisiciones/Ordenes de Compra&quot;;s:10:&quot;ImageIndex&quot;;s:2:&quot;39&quot;;s:13:&quot;SelectedIndex&quot;;s:1:&quot;0&quot;;s:10:&quot;StateIndex&quot;;s:2:&quot;-1&quot;;s:3:&quot;Tag&quot;;s:3:&quot;106&quot;;s:5:&quot;Items&quot;;a:0:{}}i:16;a:6:{s:7:&quot;Caption&quot;;s:49:&quot;Abrir Solicitudes/Requisiciones/Ordenes de Compra&quot;;s:10:&quot;ImageIndex&quot;;s:2:&quot;40&quot;;s:13:&quot;SelectedIndex&quot;;s:1:&quot;0&quot;;s:10:&quot;StateIndex&quot;;s:2:&quot;-1&quot;;s:3:&quot;Tag&quot;;s:3:&quot;105&quot;;s:5:&quot;Items&quot;;a:0:{}}}}i:4;a:6:{s:7:&quot;Caption&quot;;s:12:&quot;Herramientas&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;1&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:1:&quot;0&quot;;s:5:&quot;Items&quot;;a:13:{i:0;a:6:{s:7:&quot;Caption&quot;;s:8:&quot;Graficas&quot;;s:10:&quot;ImageIndex&quot;;s:2:&quot;17&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:1:&quot;0&quot;;s:5:&quot;Items&quot;;a:0:{}}i:1;a:6:{s:7:&quot;Caption&quot;;s:1:&quot;-&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;1&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:1:&quot;0&quot;;s:5:&quot;Items&quot;;a:0:{}}i:2;a:6:{s:7:&quot;Caption&quot;;s:14:&quot;SQL intel-code&quot;;s:10:&quot;ImageIndex&quot;;s:2:&quot;35&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:1:&quot;0&quot;;s:5:&quot;Items&quot;;a:0:{}}i:3;a:6:{s:7:&quot;Caption&quot;;s:20:&quot;Importacion de Datos&quot;;s:10:&quot;ImageIndex&quot;;s:2:&quot;19&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:1:&quot;0&quot;;s:5:&quot;Items&quot;;a:0:{}}i:4;a:6:{s:7:&quot;Caption&quot;;s:20:&quot;Exportacion de Datos&quot;;s:10:&quot;ImageIndex&quot;;s:2:&quot;19&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:2:&quot;57&quot;;s:5:&quot;Items&quot;;a:0:{}}i:5;a:6:{s:7:&quot;Caption&quot;;s:47:&quot;Importar Datos (Reportes Diarios / Generadores)&quot;;s:10:&quot;ImageIndex&quot;;s:2:&quot;13&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:1:&quot;0&quot;;s:5:&quot;Items&quot;;a:0:{}}i:6;a:6:{s:7:&quot;Caption&quot;;s:25:&quot;Exportacion Personalizada&quot;;s:10:&quot;ImageIndex&quot;;s:2:&quot;13&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:1:&quot;0&quot;;s:5:&quot;Items&quot;;a:0:{}}i:7;a:6:{s:7:&quot;Caption&quot;;s:1:&quot;-&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;1&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:1:&quot;0&quot;;s:5:&quot;Items&quot;;a:0:{}}i:8;a:6:{s:7:&quot;Caption&quot;;s:19:&quot;Ejecutar Script SQL&quot;;s:10:&quot;ImageIndex&quot;;s:2:&quot;35&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:2:&quot;58&quot;;s:5:&quot;Items&quot;;a:0:{}}i:9;a:6:{s:7:&quot;Caption&quot;;s:1:&quot;-&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;1&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:1:&quot;0&quot;;s:5:&quot;Items&quot;;a:0:{}}i:10;a:6:{s:7:&quot;Caption&quot;;s:41:&quot;Herramienta de Migracion de Base de Datos&quot;;s:10:&quot;ImageIndex&quot;;s:2:&quot;35&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:2:&quot;84&quot;;s:5:&quot;Items&quot;;a:0:{}}i:11;a:6:{s:7:&quot;Caption&quot;;s:1:&quot;-&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;1&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:1:&quot;0&quot;;s:5:&quot;Items&quot;;a:0:{}}i:12;a:6:{s:7:&quot;Caption&quot;;s:50:&quot;Descargas de Actualizaciones Inteligent Escritorio&quot;;s:10:&quot;ImageIndex&quot;;s:2:&quot;13&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:2:&quot;59&quot;;s:5:&quot;Items&quot;;a:0:{}}}}i:5;a:6:{s:7:&quot;Caption&quot;;s:16:&quot;Panel de Control&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;1&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:2:&quot;-1&quot;;s:5:&quot;Items&quot;;a:23:{i:0;a:6:{s:7:&quot;Caption&quot;;s:28:&quot;Permisos de Acceso a Almacen&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;8&quot;;s:13:&quot;SelectedIndex&quot;;s:1:&quot;0&quot;;s:10:&quot;StateIndex&quot;;s:2:&quot;-1&quot;;s:3:&quot;Tag&quot;;s:3:&quot;108&quot;;s:5:&quot;Items&quot;;a:0:{}}i:1;a:6:{s:7:&quot;Caption&quot;;s:1:&quot;-&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;0&quot;;s:13:&quot;SelectedIndex&quot;;s:1:&quot;0&quot;;s:10:&quot;StateIndex&quot;;s:2:&quot;-1&quot;;s:3:&quot;Tag&quot;;s:1:&quot;0&quot;;s:5:&quot;Items&quot;;a:0:{}}i:2;a:6:{s:7:&quot;Caption&quot;;s:26:&quot;Administracion de Usuarios&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;1&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:2:&quot;-1&quot;;s:5:&quot;Items&quot;;a:13:{i:0;a:6:{s:7:&quot;Caption&quot;;s:18:&quot;Kardex del Sistema&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;0&quot;;s:13:&quot;SelectedIndex&quot;;s:1:&quot;0&quot;;s:10:&quot;StateIndex&quot;;s:2:&quot;-1&quot;;s:3:&quot;Tag&quot;;s:2:&quot;90&quot;;s:5:&quot;Items&quot;;a:0:{}}i:1;a:6:{s:7:&quot;Caption&quot;;s:1:&quot;-&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;0&quot;;s:13:&quot;SelectedIndex&quot;;s:1:&quot;0&quot;;s:10:&quot;StateIndex&quot;;s:2:&quot;-1&quot;;s:3:&quot;Tag&quot;;s:1:&quot;0&quot;;s:5:&quot;Items&quot;;a:0:{}}i:2;a:6:{s:7:&quot;Caption&quot;;s:13:&quot;Departamentos&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;6&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:2:&quot;60&quot;;s:5:&quot;Items&quot;;a:0:{}}i:3;a:6:{s:7:&quot;Caption&quot;;s:1:&quot;-&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;1&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:1:&quot;0&quot;;s:5:&quot;Items&quot;;a:0:{}}i:4;a:6:{s:7:&quot;Caption&quot;;s:9:&quot;Programas&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;6&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:2:&quot;61&quot;;s:5:&quot;Items&quot;;a:0:{}}i:5;a:6:{s:7:&quot;Caption&quot;;s:34:&quot;Asignacion de Contratos a Usuarios&quot;;s:10:&quot;ImageIndex&quot;;s:2:&quot;37&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:2:&quot;62&quot;;s:5:&quot;Items&quot;;a:0:{}}i:6;a:6:{s:7:&quot;Caption&quot;;s:1:&quot;-&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;1&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:1:&quot;0&quot;;s:5:&quot;Items&quot;;a:0:{}}i:7;a:6:{s:7:&quot;Caption&quot;;s:8:&quot;Usuarios&quot;;s:10:&quot;ImageIndex&quot;;s:2:&quot;37&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:2:&quot;63&quot;;s:5:&quot;Items&quot;;a:0:{}}i:8;a:6:{s:7:&quot;Caption&quot;;s:6:&quot;Grupos&quot;;s:10:&quot;ImageIndex&quot;;s:2:&quot;38&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:2:&quot;64&quot;;s:5:&quot;Items&quot;;a:0:{}}i:9;a:6:{s:7:&quot;Caption&quot;;s:1:&quot;-&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;1&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:1:&quot;0&quot;;s:5:&quot;Items&quot;;a:0:{}}i:10;a:6:{s:7:&quot;Caption&quot;;s:34:&quot;Asignacion de Programas a Usuarios&quot;;s:10:&quot;ImageIndex&quot;;s:2:&quot;37&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:2:&quot;65&quot;;s:5:&quot;Items&quot;;a:0:{}}i:11;a:6:{s:7:&quot;Caption&quot;;s:32:&quot;Asignacion de Programas a Grupos&quot;;s:10:&quot;ImageIndex&quot;;s:2:&quot;38&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:2:&quot;66&quot;;s:5:&quot;Items&quot;;a:0:{}}i:12;a:6:{s:7:&quot;Caption&quot;;s:1:&quot;-&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;1&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:1:&quot;0&quot;;s:5:&quot;Items&quot;;a:0:{}}}}i:3;a:6:{s:7:&quot;Caption&quot;;s:9:&quot;Contratos&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;3&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:2:&quot;68&quot;;s:5:&quot;Items&quot;;a:0:{}}i:4;a:6:{s:7:&quot;Caption&quot;;s:12:&quot;SubContratos&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;3&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:1:&quot;0&quot;;s:5:&quot;Items&quot;;a:0:{}}i:5;a:6:{s:7:&quot;Caption&quot;;s:25:&quot;Configuracion del Sistema&quot;;s:10:&quot;ImageIndex&quot;;s:2:&quot;34&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:2:&quot;91&quot;;s:5:&quot;Items&quot;;a:0:{}}i:6;a:6:{s:7:&quot;Caption&quot;;s:6:&quot;Turnos&quot;;s:10:&quot;ImageIndex&quot;;s:2:&quot;21&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:2:&quot;67&quot;;s:5:&quot;Items&quot;;a:0:{}}i:7;a:6:{s:7:&quot;Caption&quot;;s:13:&quot;Dias Festivos&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;5&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:2:&quot;69&quot;;s:5:&quot;Items&quot;;a:0:{}}i:8;a:6:{s:7:&quot;Caption&quot;;s:22:&quot;Presupuesto Mal Tiempo&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;6&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:1:&quot;0&quot;;s:5:&quot;Items&quot;;a:0:{}}i:9;a:6:{s:7:&quot;Caption&quot;;s:28:&quot;Registro de Avisos y Alertas&quot;;s:10:&quot;ImageIndex&quot;;s:2:&quot;15&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:2:&quot;70&quot;;s:5:&quot;Items&quot;;a:0:{}}i:10;a:6:{s:7:&quot;Caption&quot;;s:27:&quot;Administracion de Catalogos&quot;;s:10:&quot;ImageIndex&quot;;s:2:&quot;15&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:1:&quot;0&quot;;s:5:&quot;Items&quot;;a:0:{}}i:11;a:6:{s:7:&quot;Caption&quot;;s:1:&quot;-&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;1&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:1:&quot;0&quot;;s:5:&quot;Items&quot;;a:0:{}}i:12;a:6:{s:7:&quot;Caption&quot;;s:26:&quot;Administracion del Cliente&quot;;s:10:&quot;ImageIndex&quot;;s:2:&quot;28&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:2:&quot;-1&quot;;s:5:&quot;Items&quot;;a:12:{i:0;a:6:{s:7:&quot;Caption&quot;;s:18:&quot;Residencia de Obra&quot;;s:10:&quot;ImageIndex&quot;;s:2:&quot;28&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:2:&quot;71&quot;;s:5:&quot;Items&quot;;a:0:{}}i:1;a:6:{s:7:&quot;Caption&quot;;s:18:&quot;Activos Integrales&quot;;s:10:&quot;ImageIndex&quot;;s:2:&quot;28&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:2:&quot;72&quot;;s:5:&quot;Items&quot;;a:0:{}}i:2;a:6:{s:7:&quot;Caption&quot;;s:1:&quot;-&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;1&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:1:&quot;0&quot;;s:5:&quot;Items&quot;;a:0:{}}i:3;a:6:{s:7:&quot;Caption&quot;;s:15:&quot;Factor de Costo&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;6&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:2:&quot;73&quot;;s:5:&quot;Items&quot;;a:0:{}}i:4;a:6:{s:7:&quot;Caption&quot;;s:1:&quot;-&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;1&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:1:&quot;0&quot;;s:5:&quot;Items&quot;;a:0:{}}i:5;a:6:{s:7:&quot;Caption&quot;;s:19:&quot;Tipos de Estimacion&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;6&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:2:&quot;74&quot;;s:5:&quot;Items&quot;;a:0:{}}i:6;a:6:{s:7:&quot;Caption&quot;;s:18:&quot;Tipos de Convenios&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;6&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:2:&quot;75&quot;;s:5:&quot;Items&quot;;a:0:{}}i:7;a:6:{s:7:&quot;Caption&quot;;s:18:&quot;Fases de Proyectos&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;6&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:2:&quot;76&quot;;s:5:&quot;Items&quot;;a:0:{}}i:8;a:6:{s:7:&quot;Caption&quot;;s:14:&quot;Fases de Costo&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;6&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:1:&quot;0&quot;;s:5:&quot;Items&quot;;a:0:{}}i:9;a:6:{s:7:&quot;Caption&quot;;s:1:&quot;-&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;1&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:1:&quot;0&quot;;s:5:&quot;Items&quot;;a:0:{}}i:10;a:6:{s:7:&quot;Caption&quot;;s:9:&quot;Trinomios&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;6&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:2:&quot;77&quot;;s:5:&quot;Items&quot;;a:0:{}}i:11;a:6:{s:7:&quot;Caption&quot;;s:1:&quot;-&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;1&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:1:&quot;0&quot;;s:5:&quot;Items&quot;;a:0:{}}}}i:13;a:6:{s:7:&quot;Caption&quot;;s:17:&quot;Status de Ordenes&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;6&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:2:&quot;78&quot;;s:5:&quot;Items&quot;;a:0:{}}i:14;a:6:{s:7:&quot;Caption&quot;;s:19:&quot;Tipos de Movimiento&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;6&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:3:&quot;116&quot;;s:5:&quot;Items&quot;;a:0:{}}i:15;a:6:{s:7:&quot;Caption&quot;;s:1:&quot;-&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;1&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:1:&quot;0&quot;;s:5:&quot;Items&quot;;a:0:{}}i:16;a:6:{s:7:&quot;Caption&quot;;s:33:&quot;Programa de Platicas de Seguridad&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;5&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:3:&quot;117&quot;;s:5:&quot;Items&quot;;a:0:{}}i:17;a:6:{s:7:&quot;Caption&quot;;s:1:&quot;-&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;1&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:1:&quot;0&quot;;s:5:&quot;Items&quot;;a:0:{}}i:18;a:6:{s:7:&quot;Caption&quot;;s:21:&quot;Fases  de Embarcacion&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;6&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:1:&quot;0&quot;;s:5:&quot;Items&quot;;a:0:{}}i:19;a:6:{s:7:&quot;Caption&quot;;s:18:&quot;Costos Emb. x Fase&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;6&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:1:&quot;0&quot;;s:5:&quot;Items&quot;;a:0:{}}i:20;a:6:{s:7:&quot;Caption&quot;;s:1:&quot;-&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;6&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:1:&quot;0&quot;;s:5:&quot;Items&quot;;a:0:{}}i:21;a:6:{s:7:&quot;Caption&quot;;s:19:&quot;Catalogo de Errores&quot;;s:10:&quot;ImageIndex&quot;;s:2:&quot;44&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:1:&quot;0&quot;;s:5:&quot;Items&quot;;a:0:{}}i:22;a:6:{s:7:&quot;Caption&quot;;s:33:&quot;Informe de Transferencia de Datos&quot;;s:10:&quot;ImageIndex&quot;;s:2:&quot;44&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:3:&quot;131&quot;;s:5:&quot;Items&quot;;a:0:{}}}}i:6;a:6:{s:7:&quot;Caption&quot;;s:9:&quot;Gerencial&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;1&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:2:&quot;-1&quot;;s:5:&quot;Items&quot;;a:10:{i:0;a:6:{s:7:&quot;Caption&quot;;s:9:&quot;Gerencial&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;4&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:2:&quot;81&quot;;s:5:&quot;Items&quot;;a:0:{}}i:1;a:6:{s:7:&quot;Caption&quot;;s:1:&quot;-&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;1&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:1:&quot;0&quot;;s:5:&quot;Items&quot;;a:0:{}}i:2;a:6:{s:7:&quot;Caption&quot;;s:27:&quot;Avances Fisico / Financiero&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;4&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:1:&quot;0&quot;;s:5:&quot;Items&quot;;a:0:{}}i:3;a:6:{s:7:&quot;Caption&quot;;s:1:&quot;-&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;1&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:1:&quot;0&quot;;s:5:&quot;Items&quot;;a:0:{}}i:4;a:6:{s:7:&quot;Caption&quot;;s:26:&quot;Personal Programado / Real&quot;;s:10:&quot;ImageIndex&quot;;s:2:&quot;23&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:1:&quot;0&quot;;s:5:&quot;Items&quot;;a:0:{}}i:5;a:6:{s:7:&quot;Caption&quot;;s:1:&quot;-&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;1&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:1:&quot;0&quot;;s:5:&quot;Items&quot;;a:0:{}}i:6;a:6:{s:7:&quot;Caption&quot;;s:34:&quot;Retenciones y Penas Convencionales&quot;;s:10:&quot;ImageIndex&quot;;s:2:&quot;12&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:2:&quot;82&quot;;s:5:&quot;Items&quot;;a:0:{}}i:7;a:6:{s:7:&quot;Caption&quot;;s:21:&quot;Retenciones Aplicadas&quot;;s:10:&quot;ImageIndex&quot;;s:2:&quot;12&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:2:&quot;83&quot;;s:5:&quot;Items&quot;;a:0:{}}i:8;a:6:{s:7:&quot;Caption&quot;;s:1:&quot;-&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;1&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:1:&quot;0&quot;;s:5:&quot;Items&quot;;a:0:{}}i:9;a:6:{s:7:&quot;Caption&quot;;s:27:&quot;Administracion de Contratos&quot;;s:10:&quot;ImageIndex&quot;;s:2:&quot;32&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:2:&quot;94&quot;;s:5:&quot;Items&quot;;a:0:{}}}}i:7;a:6:{s:7:&quot;Caption&quot;;s:7:&quot;Sistema&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;1&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:2:&quot;-1&quot;;s:5:&quot;Items&quot;;a:8:{i:0;a:6:{s:7:&quot;Caption&quot;;s:12:&quot;Acerca de...&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;2&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:3:&quot;300&quot;;s:5:&quot;Items&quot;;a:0:{}}i:1;a:6:{s:7:&quot;Caption&quot;;s:12:&quot;Tips del Dia&quot;;s:10:&quot;ImageIndex&quot;;s:2:&quot;36&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:1:&quot;0&quot;;s:5:&quot;Items&quot;;a:0:{}}i:2;a:6:{s:7:&quot;Caption&quot;;s:13:&quot;Advertencias!&quot;;s:10:&quot;ImageIndex&quot;;s:2:&quot;15&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:1:&quot;0&quot;;s:5:&quot;Items&quot;;a:0:{}}i:3;a:6:{s:7:&quot;Caption&quot;;s:1:&quot;-&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;1&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:1:&quot;0&quot;;s:5:&quot;Items&quot;;a:0:{}}i:4;a:6:{s:7:&quot;Caption&quot;;s:18:&quot;Cambio de Password&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;1&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:2:&quot;87&quot;;s:5:&quot;Items&quot;;a:0:{}}i:5;a:6:{s:7:&quot;Caption&quot;;s:5:&quot;Login&quot;;s:10:&quot;ImageIndex&quot;;s:2:&quot;18&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:2:&quot;88&quot;;s:5:&quot;Items&quot;;a:0:{}}i:6;a:6:{s:7:&quot;Caption&quot;;s:21:&quot;Seleccion de Contrato&quot;;s:10:&quot;ImageIndex&quot;;s:2:&quot;33&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:2:&quot;85&quot;;s:5:&quot;Items&quot;;a:0:{}}i:7;a:6:{s:7:&quot;Caption&quot;;s:5:&quot;Salir&quot;;s:10:&quot;ImageIndex&quot;;s:2:&quot;31&quot;;s:13:&quot;SelectedIndex&quot;;s:2:&quot;-1&quot;;s:10:&quot;StateIndex&quot;;s:1:&quot;0&quot;;s:3:&quot;Tag&quot;;s:2:&quot;86&quot;;s:5:&quot;Items&quot;;a:0:{}}}}}]]></property>
      <property name="Left">4</property>
      <property name="Name">MainMenu1</property>
      <property name="Width">831</property>
      <property name="OnAfterShow"></property>
      <property name="OnBeforeShow"></property>
      <property name="OnShow"></property>
      <property name="jsOnClick">MainMenu1JSClick</property>
    </object>
    <object class="ToolBar" name="ToolBar1" >
      <property name="Height">35</property>
      <property name="Images">imagenesToolbar</property>
      <property name="Items"><![CDATA[a:25:{i:0;a:6:{s:7:&quot;Caption&quot;;s:0:&quot;&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;1&quot;;s:13:&quot;SelectedIndex&quot;;s:1:&quot;0&quot;;s:10:&quot;StateIndex&quot;;s:2:&quot;-1&quot;;s:3:&quot;Tag&quot;;s:2:&quot;91&quot;;s:5:&quot;Items&quot;;a:0:{}}i:1;a:6:{s:7:&quot;Caption&quot;;s:0:&quot;&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;2&quot;;s:13:&quot;SelectedIndex&quot;;s:1:&quot;0&quot;;s:10:&quot;StateIndex&quot;;s:2:&quot;-1&quot;;s:3:&quot;Tag&quot;;s:2:&quot;85&quot;;s:5:&quot;Items&quot;;a:0:{}}i:2;a:6:{s:7:&quot;Caption&quot;;s:0:&quot;&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;3&quot;;s:13:&quot;SelectedIndex&quot;;s:1:&quot;0&quot;;s:10:&quot;StateIndex&quot;;s:2:&quot;-1&quot;;s:3:&quot;Tag&quot;;s:1:&quot;5&quot;;s:5:&quot;Items&quot;;a:0:{}}i:3;a:6:{s:7:&quot;Caption&quot;;s:0:&quot;&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;4&quot;;s:13:&quot;SelectedIndex&quot;;s:1:&quot;0&quot;;s:10:&quot;StateIndex&quot;;s:2:&quot;-1&quot;;s:3:&quot;Tag&quot;;s:2:&quot;12&quot;;s:5:&quot;Items&quot;;a:0:{}}i:4;a:6:{s:7:&quot;Caption&quot;;s:0:&quot;&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;5&quot;;s:13:&quot;SelectedIndex&quot;;s:1:&quot;0&quot;;s:10:&quot;StateIndex&quot;;s:2:&quot;-1&quot;;s:3:&quot;Tag&quot;;s:2:&quot;30&quot;;s:5:&quot;Items&quot;;a:0:{}}i:5;a:6:{s:7:&quot;Caption&quot;;s:0:&quot;&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;6&quot;;s:13:&quot;SelectedIndex&quot;;s:1:&quot;0&quot;;s:10:&quot;StateIndex&quot;;s:2:&quot;-1&quot;;s:3:&quot;Tag&quot;;s:1:&quot;0&quot;;s:5:&quot;Items&quot;;a:0:{}}i:6;a:6:{s:7:&quot;Caption&quot;;s:0:&quot;&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;6&quot;;s:13:&quot;SelectedIndex&quot;;s:1:&quot;8&quot;;s:10:&quot;StateIndex&quot;;s:2:&quot;-1&quot;;s:3:&quot;Tag&quot;;s:2:&quot;35&quot;;s:5:&quot;Items&quot;;a:0:{}}i:7;a:6:{s:7:&quot;Caption&quot;;s:0:&quot;&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;6&quot;;s:13:&quot;SelectedIndex&quot;;s:1:&quot;0&quot;;s:10:&quot;StateIndex&quot;;s:2:&quot;-1&quot;;s:3:&quot;Tag&quot;;s:2:&quot;35&quot;;s:5:&quot;Items&quot;;a:0:{}}i:8;a:6:{s:7:&quot;Caption&quot;;s:0:&quot;&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;7&quot;;s:13:&quot;SelectedIndex&quot;;s:1:&quot;0&quot;;s:10:&quot;StateIndex&quot;;s:2:&quot;-1&quot;;s:3:&quot;Tag&quot;;s:1:&quot;0&quot;;s:5:&quot;Items&quot;;a:0:{}}i:9;a:6:{s:7:&quot;Caption&quot;;s:0:&quot;&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;8&quot;;s:13:&quot;SelectedIndex&quot;;s:1:&quot;0&quot;;s:10:&quot;StateIndex&quot;;s:2:&quot;-1&quot;;s:3:&quot;Tag&quot;;s:1:&quot;0&quot;;s:5:&quot;Items&quot;;a:0:{}}i:10;a:6:{s:7:&quot;Caption&quot;;s:0:&quot;&quot;;s:10:&quot;ImageIndex&quot;;s:1:&quot;9&quot;;s:13:&quot;SelectedIndex&quot;;s:1:&quot;0&quot;;s:10:&quot;StateIndex&quot;;s:2:&quot;-1&quot;;s:3:&quot;Tag&quot;;s:2:&quot;39&quot;;s:5:&quot;Items&quot;;a:0:{}}i:11;a:6:{s:7:&quot;Caption&quot;;s:0:&quot;&quot;;s:10:&quot;ImageIndex&quot;;s:2:&quot;10&quot;;s:13:&quot;SelectedIndex&quot;;s:1:&quot;0&quot;;s:10:&quot;StateIndex&quot;;s:2:&quot;-1&quot;;s:3:&quot;Tag&quot;;s:1:&quot;0&quot;;s:5:&quot;Items&quot;;a:0:{}}i:12;a:6:{s:7:&quot;Caption&quot;;s:0:&quot;&quot;;s:10:&quot;ImageIndex&quot;;s:2:&quot;11&quot;;s:13:&quot;SelectedIndex&quot;;s:1:&quot;0&quot;;s:10:&quot;StateIndex&quot;;s:2:&quot;-1&quot;;s:3:&quot;Tag&quot;;s:3:&quot;102&quot;;s:5:&quot;Items&quot;;a:0:{}}i:13;a:6:{s:7:&quot;Caption&quot;;s:0:&quot;&quot;;s:10:&quot;ImageIndex&quot;;s:2:&quot;12&quot;;s:13:&quot;SelectedIndex&quot;;s:1:&quot;0&quot;;s:10:&quot;StateIndex&quot;;s:2:&quot;-1&quot;;s:3:&quot;Tag&quot;;s:2:&quot;89&quot;;s:5:&quot;Items&quot;;a:0:{}}i:14;a:6:{s:7:&quot;Caption&quot;;s:0:&quot;&quot;;s:10:&quot;ImageIndex&quot;;s:2:&quot;13&quot;;s:13:&quot;SelectedIndex&quot;;s:1:&quot;0&quot;;s:10:&quot;StateIndex&quot;;s:2:&quot;-1&quot;;s:3:&quot;Tag&quot;;s:2:&quot;92&quot;;s:5:&quot;Items&quot;;a:0:{}}i:15;a:6:{s:7:&quot;Caption&quot;;s:0:&quot;&quot;;s:10:&quot;ImageIndex&quot;;s:2:&quot;14&quot;;s:13:&quot;SelectedIndex&quot;;s:1:&quot;0&quot;;s:10:&quot;StateIndex&quot;;s:2:&quot;-1&quot;;s:3:&quot;Tag&quot;;s:2:&quot;93&quot;;s:5:&quot;Items&quot;;a:0:{}}i:16;a:6:{s:7:&quot;Caption&quot;;s:0:&quot;&quot;;s:10:&quot;ImageIndex&quot;;s:2:&quot;15&quot;;s:13:&quot;SelectedIndex&quot;;s:1:&quot;0&quot;;s:10:&quot;StateIndex&quot;;s:2:&quot;-1&quot;;s:3:&quot;Tag&quot;;s:2:&quot;97&quot;;s:5:&quot;Items&quot;;a:0:{}}i:17;a:6:{s:7:&quot;Caption&quot;;s:0:&quot;&quot;;s:10:&quot;ImageIndex&quot;;s:2:&quot;17&quot;;s:13:&quot;SelectedIndex&quot;;s:1:&quot;0&quot;;s:10:&quot;StateIndex&quot;;s:2:&quot;-1&quot;;s:3:&quot;Tag&quot;;s:2:&quot;40&quot;;s:5:&quot;Items&quot;;a:0:{}}i:18;a:6:{s:7:&quot;Caption&quot;;s:0:&quot;&quot;;s:10:&quot;ImageIndex&quot;;s:2:&quot;18&quot;;s:13:&quot;SelectedIndex&quot;;s:1:&quot;0&quot;;s:10:&quot;StateIndex&quot;;s:2:&quot;-1&quot;;s:3:&quot;Tag&quot;;s:2:&quot;41&quot;;s:5:&quot;Items&quot;;a:0:{}}i:19;a:6:{s:7:&quot;Caption&quot;;s:0:&quot;&quot;;s:10:&quot;ImageIndex&quot;;s:2:&quot;19&quot;;s:13:&quot;SelectedIndex&quot;;s:1:&quot;0&quot;;s:10:&quot;StateIndex&quot;;s:2:&quot;-1&quot;;s:3:&quot;Tag&quot;;s:2:&quot;96&quot;;s:5:&quot;Items&quot;;a:0:{}}i:20;a:6:{s:7:&quot;Caption&quot;;s:0:&quot;&quot;;s:10:&quot;ImageIndex&quot;;s:2:&quot;16&quot;;s:13:&quot;SelectedIndex&quot;;s:1:&quot;0&quot;;s:10:&quot;StateIndex&quot;;s:2:&quot;-1&quot;;s:3:&quot;Tag&quot;;s:2:&quot;98&quot;;s:5:&quot;Items&quot;;a:0:{}}i:21;a:6:{s:7:&quot;Caption&quot;;s:0:&quot;&quot;;s:10:&quot;ImageIndex&quot;;s:2:&quot;20&quot;;s:13:&quot;SelectedIndex&quot;;s:1:&quot;0&quot;;s:10:&quot;StateIndex&quot;;s:2:&quot;-1&quot;;s:3:&quot;Tag&quot;;s:2:&quot;50&quot;;s:5:&quot;Items&quot;;a:0:{}}i:22;a:6:{s:7:&quot;Caption&quot;;s:0:&quot;&quot;;s:10:&quot;ImageIndex&quot;;s:2:&quot;21&quot;;s:13:&quot;SelectedIndex&quot;;s:1:&quot;0&quot;;s:10:&quot;StateIndex&quot;;s:2:&quot;-1&quot;;s:3:&quot;Tag&quot;;s:3:&quot;106&quot;;s:5:&quot;Items&quot;;a:0:{}}i:23;a:6:{s:7:&quot;Caption&quot;;s:0:&quot;&quot;;s:10:&quot;ImageIndex&quot;;s:2:&quot;22&quot;;s:13:&quot;SelectedIndex&quot;;s:1:&quot;0&quot;;s:10:&quot;StateIndex&quot;;s:2:&quot;-1&quot;;s:3:&quot;Tag&quot;;s:3:&quot;105&quot;;s:5:&quot;Items&quot;;a:0:{}}i:24;a:6:{s:7:&quot;Caption&quot;;s:0:&quot;&quot;;s:10:&quot;ImageIndex&quot;;s:2:&quot;23&quot;;s:13:&quot;SelectedIndex&quot;;s:1:&quot;0&quot;;s:10:&quot;StateIndex&quot;;s:2:&quot;-1&quot;;s:3:&quot;Tag&quot;;s:3:&quot;130&quot;;s:5:&quot;Items&quot;;a:0:{}}}]]></property>
      <property name="Left">4</property>
      <property name="Name">ToolBar1</property>
      <property name="Top">32</property>
      <property name="UseParts">0</property>
      <property name="Width">831</property>
      <property name="OnAfterShow"></property>
      <property name="OnBeforeShow"></property>
      <property name="OnShow"></property>
      <property name="jsOnClick">ToolBar1JSClick</property>
    </object>
    <object class="Label" name="Label1" >
      <property name="Caption">Contrato:</property>
      <property name="Color">#F0F0F0</property>
      <property name="Font">
            <property name="Align">taNone</property>
            <property name="Case"></property>
            <property name="Color">#000000</property>
            <property name="Family">Verdana</property>
            <property name="LineHeight"></property>
            <property name="Size">8px</property>
            <property name="Style"></property>
            <property name="Variant"></property>
            <property name="Weight"></property>
      </property>
      <property name="Height">13</property>
      <property name="Left">4</property>
      <property name="Name">Label1</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">69</property>
      <property name="Width">55</property>
      <property name="OnAfterShow"></property>
      <property name="OnBeforeShow"></property>
      <property name="OnShow"></property>
    </object>
    <object class="Edit" name="txtContrato" >
      <property name="Color">CornSilk</property>
      <property name="Font">
            <property name="Align">taNone</property>
            <property name="Case"></property>
            <property name="Color"></property>
            <property name="Family">Verdana</property>
            <property name="LineHeight"></property>
            <property name="Size">8px</property>
            <property name="Style"></property>
            <property name="Variant"></property>
            <property name="Weight"></property>
      </property>
      <property name="Height">18</property>
      <property name="Left">60</property>
      <property name="Name">txtContrato</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="ReadOnly">1</property>
      <property name="Text">02350376</property>
      <property name="Top">65</property>
      <property name="Width">60</property>
      <property name="OnAfterShow"></property>
      <property name="OnBeforeShow"></property>
      <property name="OnShow"></property>
      <property name="OnSubmit"></property>
    </object>
    <object class="Label" name="Label2" >
      <property name="Caption">Convenio:</property>
      <property name="Color">#F0F0F0</property>
      <property name="Font">
            <property name="Align">taNone</property>
            <property name="Case"></property>
            <property name="Color">#000000</property>
            <property name="Family">Verdana</property>
            <property name="LineHeight"></property>
            <property name="Size">8px</property>
            <property name="Style"></property>
            <property name="Variant"></property>
            <property name="Weight"></property>
      </property>
      <property name="Height">13</property>
      <property name="Left">126</property>
      <property name="Name">Label2</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">69</property>
      <property name="Width">54</property>
      <property name="OnAfterShow"></property>
      <property name="OnBeforeShow"></property>
      <property name="OnShow"></property>
    </object>
    <object class="Edit" name="txtConvenio" >
      <property name="Color">CornSilk</property>
      <property name="Font">
            <property name="Align">taNone</property>
            <property name="Case"></property>
            <property name="Color"></property>
            <property name="Family">Verdana</property>
            <property name="LineHeight"></property>
            <property name="Size">8px</property>
            <property name="Style"></property>
            <property name="Variant"></property>
            <property name="Weight"></property>
      </property>
      <property name="Height">18</property>
      <property name="Left">182</property>
      <property name="Name">txtConvenio</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="ReadOnly">1</property>
      <property name="Top">65</property>
      <property name="Width">76</property>
      <property name="OnAfterShow"></property>
      <property name="OnBeforeShow"></property>
      <property name="OnShow"></property>
      <property name="OnSubmit"></property>
    </object>
    <object class="Label" name="Label3" >
      <property name="Caption">Turno:</property>
      <property name="Color">#F0F0F0</property>
      <property name="Font">
            <property name="Align">taNone</property>
            <property name="Case"></property>
            <property name="Color">#000000</property>
            <property name="Family">Verdana</property>
            <property name="LineHeight"></property>
            <property name="Size">8px</property>
            <property name="Style"></property>
            <property name="Variant"></property>
            <property name="Weight"></property>
      </property>
      <property name="Height">13</property>
      <property name="Left">266</property>
      <property name="Name">Label3</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">69</property>
      <property name="Width">39</property>
      <property name="OnAfterShow"></property>
      <property name="OnBeforeShow"></property>
      <property name="OnShow"></property>
    </object>
    <object class="Edit" name="txtTurno" >
      <property name="Color">CornSilk</property>
      <property name="Font">
            <property name="Align">taNone</property>
            <property name="Case"></property>
            <property name="Color"></property>
            <property name="Family">Verdana</property>
            <property name="LineHeight"></property>
            <property name="Size">8px</property>
            <property name="Style"></property>
            <property name="Variant"></property>
            <property name="Weight"></property>
      </property>
      <property name="Height">18</property>
      <property name="Left">308</property>
      <property name="Name">txtTurno</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="ReadOnly">1</property>
      <property name="Top">65</property>
      <property name="Width">119</property>
      <property name="OnAfterShow"></property>
      <property name="OnBeforeShow"></property>
      <property name="OnShow"></property>
      <property name="OnSubmit"></property>
    </object>
    <object class="Label" name="Label4" >
      <property name="Caption">Usuario:</property>
      <property name="Color">#F0F0F0</property>
      <property name="Font">
            <property name="Align">taNone</property>
            <property name="Case"></property>
            <property name="Color">#000000</property>
            <property name="Family">Verdana</property>
            <property name="LineHeight"></property>
            <property name="Size">8px</property>
            <property name="Style"></property>
            <property name="Variant"></property>
            <property name="Weight"></property>
      </property>
      <property name="Height">13</property>
      <property name="Left">436</property>
      <property name="Name">Label4</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">69</property>
      <property name="Width">42</property>
      <property name="OnAfterShow"></property>
      <property name="OnBeforeShow"></property>
      <property name="OnShow"></property>
    </object>
    <object class="Edit" name="txtUsuario" >
      <property name="Color">CornSilk</property>
      <property name="Font">
            <property name="Align">taNone</property>
            <property name="Case"></property>
            <property name="Color"></property>
            <property name="Family">Verdana</property>
            <property name="LineHeight"></property>
            <property name="Size">8px</property>
            <property name="Style"></property>
            <property name="Variant"></property>
            <property name="Weight"></property>
      </property>
      <property name="Height">18</property>
      <property name="Left">480</property>
      <property name="Name">txtUsuario</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="ReadOnly">1</property>
      <property name="Top">65</property>
      <property name="Width">174</property>
      <property name="OnAfterShow"></property>
      <property name="OnBeforeShow"></property>
      <property name="OnShow"></property>
      <property name="OnSubmit"></property>
    </object>
    <object class="Label" name="Label5" >
      <property name="Alignment">agRight</property>
      <property name="Caption">BD:</property>
      <property name="Color">#F0F0F0</property>
      <property name="Font">
            <property name="Align">taNone</property>
            <property name="Case"></property>
            <property name="Color">#000000</property>
            <property name="Family">Verdana</property>
            <property name="LineHeight"></property>
            <property name="Size">8px</property>
            <property name="Style"></property>
            <property name="Variant"></property>
            <property name="Weight"></property>
      </property>
      <property name="Height">13</property>
      <property name="Left">661</property>
      <property name="Name">Label5</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="Top">69</property>
      <property name="Width">25</property>
      <property name="OnAfterShow"></property>
      <property name="OnBeforeShow"></property>
      <property name="OnShow"></property>
    </object>
    <object class="Edit" name="txtBaseDatos" >
      <property name="Color">CornSilk</property>
      <property name="Font">
            <property name="Align">taNone</property>
            <property name="Case"></property>
            <property name="Color"></property>
            <property name="Family">Verdana</property>
            <property name="LineHeight"></property>
            <property name="Size">8px</property>
            <property name="Style"></property>
            <property name="Variant"></property>
            <property name="Weight"></property>
      </property>
      <property name="Height">18</property>
      <property name="Left">693</property>
      <property name="Name">txtBaseDatos</property>
      <property name="ParentColor">0</property>
      <property name="ParentFont">0</property>
      <property name="ReadOnly">1</property>
      <property name="Top">65</property>
      <property name="Width">142</property>
      <property name="OnAfterShow"></property>
      <property name="OnBeforeShow"></property>
      <property name="OnShow"></property>
      <property name="OnSubmit"></property>
    </object>
  </object>
  <object class="ImageList" name="imagenesToolbar" >
        <property name="Left">77</property>
        <property name="Top">141</property>
    <property name="Images"><![CDATA[a:23:{s:1:&quot;1&quot;;s:35:&quot;recursos/imagenesMenu/ToolBar/1.png&quot;;s:1:&quot;2&quot;;s:35:&quot;recursos/imagenesMenu/ToolBar/2.png&quot;;s:1:&quot;3&quot;;s:35:&quot;recursos/imagenesMenu/ToolBar/3.png&quot;;s:1:&quot;4&quot;;s:35:&quot;recursos/imagenesMenu/ToolBar/4.png&quot;;s:1:&quot;5&quot;;s:35:&quot;recursos/imagenesMenu/ToolBar/5.png&quot;;s:1:&quot;6&quot;;s:35:&quot;recursos/imagenesMenu/ToolBar/6.png&quot;;s:1:&quot;7&quot;;s:35:&quot;recursos/imagenesMenu/ToolBar/7.png&quot;;s:1:&quot;8&quot;;s:35:&quot;recursos/imagenesMenu/ToolBar/8.png&quot;;s:1:&quot;9&quot;;s:35:&quot;recursos/imagenesMenu/ToolBar/9.png&quot;;s:2:&quot;10&quot;;s:36:&quot;recursos/imagenesMenu/ToolBar/10.png&quot;;s:2:&quot;11&quot;;s:36:&quot;recursos/imagenesMenu/ToolBar/11.png&quot;;s:2:&quot;12&quot;;s:36:&quot;recursos/imagenesMenu/ToolBar/12.png&quot;;s:2:&quot;13&quot;;s:36:&quot;recursos/imagenesMenu/ToolBar/13.png&quot;;s:2:&quot;14&quot;;s:36:&quot;recursos/imagenesMenu/ToolBar/14.png&quot;;s:2:&quot;15&quot;;s:36:&quot;recursos/imagenesMenu/ToolBar/15.png&quot;;s:2:&quot;16&quot;;s:36:&quot;recursos/imagenesMenu/ToolBar/16.png&quot;;s:2:&quot;17&quot;;s:36:&quot;recursos/imagenesMenu/ToolBar/17.png&quot;;s:2:&quot;18&quot;;s:36:&quot;recursos/imagenesMenu/ToolBar/18.png&quot;;s:2:&quot;19&quot;;s:36:&quot;recursos/imagenesMenu/ToolBar/19.png&quot;;s:2:&quot;20&quot;;s:36:&quot;recursos/imagenesMenu/ToolBar/20.png&quot;;s:2:&quot;21&quot;;s:36:&quot;recursos/imagenesMenu/ToolBar/21.gif&quot;;s:2:&quot;22&quot;;s:36:&quot;recursos/imagenesMenu/ToolBar/22.gif&quot;;s:2:&quot;23&quot;;s:40:&quot;recursos/imagenesMenu/Menu/230_ancla.png&quot;;}]]></property>
    <property name="Name">imagenesToolbar</property>
  </object>
  <object class="ImageList" name="imagenesMenu" >
        <property name="Left">75</property>
        <property name="Top">201</property>
    <property name="Images"><![CDATA[a:44:{s:1:&quot;1&quot;;s:44:&quot;recursos/imagenesMenu/Menu/1_AbreReporte.png&quot;;s:1:&quot;2&quot;;s:41:&quot;recursos/imagenesMenu/Menu/2_Acercade.png&quot;;s:1:&quot;3&quot;;s:41:&quot;recursos/imagenesMenu/Menu/3_Archivar.png&quot;;s:1:&quot;4&quot;;s:52:&quot;recursos/imagenesMenu/Menu/4_CalculodePonderados.png&quot;;s:1:&quot;5&quot;;s:43:&quot;recursos/imagenesMenu/Menu/5_calendario.png&quot;;s:1:&quot;6&quot;;s:44:&quot;recursos/imagenesMenu/Menu/6_comparativo.png&quot;;s:1:&quot;7&quot;;s:48:&quot;recursos/imagenesMenu/Menu/7_consultageneral.png&quot;;s:1:&quot;8&quot;;s:44:&quot;recursos/imagenesMenu/Menu/8_CtrlAlmacen.png&quot;;s:1:&quot;9&quot;;s:55:&quot;recursos/imagenesMenu/Menu/9_DevoluciondeMateriales.png&quot;;s:2:&quot;10&quot;;s:45:&quot;recursos/imagenesMenu/Menu/10_embarcacion.png&quot;;s:2:&quot;11&quot;;s:40:&quot;recursos/imagenesMenu/Menu/11_equipo.png&quot;;s:2:&quot;12&quot;;s:46:&quot;recursos/imagenesMenu/Menu/12_Estimaciones.png&quot;;s:2:&quot;13&quot;;s:43:&quot;recursos/imagenesMenu/Menu/13_Exportar2.png&quot;;s:2:&quot;14&quot;;s:43:&quot;recursos/imagenesMenu/Menu/14_firmantes.png&quot;;s:2:&quot;15&quot;;s:36:&quot;recursos/imagenesMenu/Menu/15_FN.png&quot;;s:2:&quot;16&quot;;s:45:&quot;recursos/imagenesMenu/Menu/16_Generadores.png&quot;;s:2:&quot;17&quot;;s:43:&quot;recursos/imagenesMenu/Menu/17_GraficaDT.png&quot;;s:2:&quot;18&quot;;s:39:&quot;recursos/imagenesMenu/Menu/18_login.png&quot;;s:2:&quot;19&quot;;s:39:&quot;recursos/imagenesMenu/Menu/19_magia.png&quot;;s:2:&quot;20&quot;;s:44:&quot;recursos/imagenesMenu/Menu/20_materiales.png&quot;;s:2:&quot;21&quot;;s:40:&quot;recursos/imagenesMenu/Menu/21_Muerto.png&quot;;s:2:&quot;22&quot;;s:47:&quot;recursos/imagenesMenu/Menu/22_otrosreportes.png&quot;;s:2:&quot;23&quot;;s:42:&quot;recursos/imagenesMenu/Menu/23_personal.png&quot;;s:2:&quot;24&quot;;s:42:&quot;recursos/imagenesMenu/Menu/24_protejer.png&quot;;s:2:&quot;25&quot;;s:43:&quot;recursos/imagenesMenu/Menu/25_recalculo.png&quot;;s:2:&quot;26&quot;;s:41:&quot;recursos/imagenesMenu/Menu/26_reporte.png&quot;;s:2:&quot;27&quot;;s:47:&quot;recursos/imagenesMenu/Menu/27_reportediario.png&quot;;s:2:&quot;28&quot;;s:52:&quot;recursos/imagenesMenu/Menu/28_ReporteFotografico.png&quot;;s:2:&quot;29&quot;;s:52:&quot;recursos/imagenesMenu/Menu/29_reporteinstalacion.png&quot;;s:2:&quot;30&quot;;s:55:&quot;recursos/imagenesMenu/Menu/30_RequisiciondeMaterial.png&quot;;s:2:&quot;31&quot;;s:39:&quot;recursos/imagenesMenu/Menu/31_salir.png&quot;;s:2:&quot;32&quot;;s:43:&quot;recursos/imagenesMenu/Menu/32_seleccion.png&quot;;s:2:&quot;33&quot;;s:52:&quot;recursos/imagenesMenu/Menu/33_selecionarcontrato.png&quot;;s:2:&quot;34&quot;;s:39:&quot;recursos/imagenesMenu/Menu/34_Setup.png&quot;;s:2:&quot;35&quot;;s:37:&quot;recursos/imagenesMenu/Menu/35_Sql.png&quot;;s:2:&quot;36&quot;;s:51:&quot;recursos/imagenesMenu/Menu/36_TramitedePermisos.png&quot;;s:2:&quot;37&quot;;s:41:&quot;recursos/imagenesMenu/Menu/37_Usuario.png&quot;;s:2:&quot;38&quot;;s:42:&quot;recursos/imagenesMenu/Menu/38_usuarios.png&quot;;s:2:&quot;39&quot;;s:40:&quot;recursos/imagenesMenu/Menu/39_cerrar.gif&quot;;s:2:&quot;40&quot;;s:39:&quot;recursos/imagenesMenu/Menu/40_abrir.gif&quot;;s:2:&quot;41&quot;;s:41:&quot;recursos/imagenesMenu/Menu/41_almacen.gif&quot;;s:2:&quot;42&quot;;s:39:&quot;recursos/imagenesMenu/Menu/42_right.png&quot;;s:2:&quot;43&quot;;s:41:&quot;recursos/imagenesMenu/Menu/43_forward.png&quot;;s:2:&quot;44&quot;;s:33:&quot;recursos/imagenesMenu/Menu/Db.png&quot;;}]]></property>
    <property name="Name">imagenesMenu</property>
  </object>
</object>
?>

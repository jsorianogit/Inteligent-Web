<?php
<object class="frmFichaTecnica" name="frmFichaTecnica" baseclass="Page">
  <property name="Background"></property>
  <property name="Caption">FichaTecnica</property>
  <property name="Color">#D0DDF0</property>
  <property name="DocType">dtNone</property>
  <property name="Font">
  <property name="Family">Verdana</property>
  <property name="Size">10px</property>
  </property>
  <property name="Height">540</property>
  <property name="IsMaster">0</property>
  <property name="Name">frmFichaTecnica</property>
  <property name="UseAjax">1</property>
  <property name="Width">872</property>
  <property name="OnBeforeShow">frmFichaTecnicaBeforeShow</property>
  <object class="Panel" name="Panel1" >
    <property name="BorderColor">#808080</property>
    <property name="BorderWidth">1</property>
    <property name="Color">#EBEBEB</property>
    <property name="Dynamic"></property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">509</property>
    <property name="Left">118</property>
    <property name="Name">Panel1</property>
    <property name="ParentColor">0</property>
    <property name="Top">27</property>
    <property name="Width">651</property>
    <object class="Memo" name="memoPartida" >
      <property name="Font">
      <property name="Align">taJustify</property>
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">67</property>
      <property name="Left">85</property>
      <property name="Lines">a:0:{}</property>
      <property name="Name">memoPartida</property>
      <property name="Top">44</property>
      <property name="Width">526</property>
      <property name="jsOnFocus">memoPartidaJSFocus</property>
    </object>
    <object class="Memo" name="memoDescripcion" >
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">60</property>
      <property name="Left">80</property>
      <property name="Lines">a:0:{}</property>
      <property name="Name">memoDescripcion</property>
      <property name="ParentColor">0</property>
      <property name="Top">435</property>
      <property name="Width">535</property>
      <property name="jsOnBlur">memoDescripcionJSBlur</property>
      <property name="jsOnFocus">memoDescripcionJSFocus</property>
      <property name="jsOnKeyPress">memoDescripcionJSKeyPress</property>
    </object>
    <object class="Label" name="Label5" >
      <property name="Caption">Descripcion</property>
      <property name="Color">#EBEBEB</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">10</property>
      <property name="Name">Label5</property>
      <property name="ParentColor">0</property>
      <property name="Top">436</property>
      <property name="Width">65</property>
    </object>
    <object class="Upload" name="Carga1" >
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">20</property>
      <property name="Left">139</property>
      <property name="Name">Carga1</property>
      <property name="ParentColor">0</property>
      <property name="Top">357</property>
      <property name="Width">188</property>
      <property name="jsOnBlur">Carga1JSBlur</property>
      <property name="jsOnClick">Carga1JSClick</property>
      <property name="jsOnFocus">Carga1JSFocus</property>
      <property name="jsOnKeyPress">Carga1JSKeyPress</property>
    </object>
    <object class="Upload" name="Carga2" >
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">21</property>
      <property name="Left">391</property>
      <property name="Name">Carga2</property>
      <property name="ParentColor">0</property>
      <property name="Top">356</property>
      <property name="Width">190</property>
      <property name="jsOnBlur">Carga2JSBlur</property>
      <property name="jsOnClick">Carga2JSClick</property>
      <property name="jsOnFocus">Carga2JSFocus</property>
      <property name="jsOnKeyPress">Carga2JSKeyPress</property>
    </object>
    <object class="Image" name="Image1" >
      <property name="Binary">1</property>
      <property name="Border">0</property>
      <property name="Height">220</property>
      <property name="ImageSource"></property>
      <property name="Left">82</property>
      <property name="Link"></property>
      <property name="LinkTarget"></property>
      <property name="Name">Image1</property>
      <property name="Top">129</property>
      <property name="Width">256</property>
    </object>
    <object class="Image" name="Image2" >
      <property name="Binary">1</property>
      <property name="Border">0</property>
      <property name="Height">220</property>
      <property name="ImageSource"></property>
      <property name="Left">359</property>
      <property name="Link"></property>
      <property name="LinkTarget"></property>
      <property name="Name">Image2</property>
      <property name="Top">129</property>
      <property name="Width">248</property>
    </object>
    <object class="Label" name="Label6" >
      <property name="Caption">Imagen</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">176</property>
      <property name="Name">Label6</property>
      <property name="Top">114</property>
      <property name="Width">75</property>
    </object>
    <object class="Label" name="Label7" >
      <property name="Caption">Imagen</property>
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">13</property>
      <property name="Left">465</property>
      <property name="Name">Label7</property>
      <property name="Top">114</property>
      <property name="Width">52</property>
    </object>
    <object class="Button" name="cmdRefresca" >
      <property name="Font">
      <property name="Family">Verdana</property>
      <property name="Size">10px</property>
      </property>
      <property name="Height">30</property>
      <property name="Hint">Refrescar</property>
      <property name="ImageSource">Project6.ico</property>
      <property name="Left">219</property>
      <property name="Name">cmdRefresca</property>
      <property name="ParentShowHint">0</property>
      <property name="ShowHint">1</property>
      <property name="Top">10</property>
      <property name="Width">40</property>
      <property name="jsOnClick">cmdRefrescaJSClick</property>
      <property name="jsOnMouseMove">cmdRefrescaJSMouseMove</property>
      <property name="jsOnMouseOut">cmdRefrescaJSMouseOut</property>
    </object>
  </object>
  <object class="Label" name="Label1" >
    <property name="Caption">FICHA TECNICA</property>
    <property name="Color">#0000A0</property>
    <property name="Font">
    <property name="Align">taCenter</property>
    <property name="Color">#FFFFFF</property>
    <property name="Family">ARIAL BLACK</property>
    <property name="Size">12px</property>
    </property>
    <property name="Height">16</property>
    <property name="Left">117</property>
    <property name="Name">Label1</property>
    <property name="ParentColor">0</property>
    <property name="ParentFont">0</property>
    <property name="Top">10</property>
    <property name="Width">652</property>
  </object>
  <object class="Label" name="Label2" >
    <property name="Caption">No. Partida</property>
    <property name="Color">#EBEBEB</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">128</property>
    <property name="Name">Label2</property>
    <property name="ParentColor">0</property>
    <property name="Top">50</property>
    <property name="Width">69</property>
  </object>
  <object class="Label" name="Label3" >
    <property name="Caption">Referencia</property>
    <property name="Color">#EBEBEB</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">128</property>
    <property name="Name">Label3</property>
    <property name="ParentColor">0</property>
    <property name="Top">417</property>
    <property name="Width">65</property>
  </object>
  <object class="Label" name="Label4" >
    <property name="Caption">Link</property>
    <property name="Color">#EBEBEB</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">13</property>
    <property name="Left">128</property>
    <property name="Name">Label4</property>
    <property name="ParentColor">0</property>
    <property name="Top">440</property>
    <property name="Width">61</property>
  </object>
  <object class="Button" name="cmdAgregar" >
    <property name="Color">#EBEBEB</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">30</property>
    <property name="Hint">Agregar</property>
    <property name="ImageSource">Symbol-Add.ico</property>
    <property name="Left">416</property>
    <property name="Name">cmdAgregar</property>
    <property name="ParentColor">0</property>
    <property name="ParentShowHint">0</property>
    <property name="ShowHint">1</property>
    <property name="Top">37</property>
    <property name="Width">40</property>
    <property name="jsOnClick">cmdAgregarJSClick</property>
    <property name="jsOnMouseMove">cmdAgregarJSMouseMove</property>
    <property name="jsOnMouseOut">cmdAgregarJSMouseOut</property>
  </object>
  <object class="Edit" name="txtPartida" >
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">203</property>
    <property name="Name">txtPartida</property>
    <property name="ParentColor">0</property>
    <property name="Top">46</property>
    <property name="Width">124</property>
    <property name="jsOnBlur">txtPartidaJSBlur</property>
    <property name="jsOnFocus">txtPartidaJSFocus</property>
    <property name="jsOnKeyPress">txtPartidaJSKeyPress</property>
  </object>
  <object class="Edit" name="txtReferencia" >
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">198</property>
    <property name="Name">txtReferencia</property>
    <property name="ParentColor">0</property>
    <property name="Top">414</property>
    <property name="Width">143</property>
    <property name="jsOnBlur">txtReferenciaJSBlur</property>
    <property name="jsOnFocus">txtReferenciaJSFocus</property>
    <property name="jsOnKeyPress">txtReferenciaJSKeyPress</property>
  </object>
  <object class="Edit" name="txtLink" >
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">21</property>
    <property name="Left">198</property>
    <property name="Name">txtLink</property>
    <property name="ParentColor">0</property>
    <property name="Top">438</property>
    <property name="Width">535</property>
    <property name="jsOnBlur">txtLinkJSBlur</property>
    <property name="jsOnFocus">txtLinkJSFocus</property>
    <property name="jsOnKeyPress">txtLinkJSKeyPress</property>
  </object>
  <object class="HiddenField" name="HiConsecutivo" >
    <property name="Height">18</property>
    <property name="Left">762</property>
    <property name="Name">HiConsecutivo</property>
    <property name="Top">268</property>
    <property name="Width">109</property>
  </object>
  <object class="HiddenField" name="HiOpcion" >
    <property name="Height">16</property>
    <property name="Left">763</property>
    <property name="Name">HiOpcion</property>
    <property name="Top">288</property>
    <property name="Width">108</property>
  </object>
  <object class="Button" name="cmdModificar" >
    <property name="Color">#EBEBEB</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">30</property>
    <property name="Hint">Modificar</property>
    <property name="ImageSource">Edit.ico</property>
    <property name="Left">456</property>
    <property name="Name">cmdModificar</property>
    <property name="ParentColor">0</property>
    <property name="ParentShowHint">0</property>
    <property name="ShowHint">1</property>
    <property name="Top">34</property>
    <property name="Width">40</property>
    <property name="jsOnClick">cmdModificarJSClick</property>
    <property name="jsOnMouseMove">cmdModificarJSMouseMove</property>
    <property name="jsOnMouseOut">cmdModificarJSMouseOut</property>
  </object>
  <object class="Button" name="cmdEliminar" >
    <property name="Color">#EBEBEB</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">30</property>
    <property name="Hint">Eliminar</property>
    <property name="ImageSource">Symbol-Delete.ico</property>
    <property name="Left">496</property>
    <property name="Name">cmdEliminar</property>
    <property name="ParentColor">0</property>
    <property name="ParentShowHint">0</property>
    <property name="ShowHint">1</property>
    <property name="Top">37</property>
    <property name="Width">40</property>
    <property name="OnClick">cmdEliminarClick</property>
    <property name="jsOnClick">cmdEliminarJSClick</property>
    <property name="jsOnMouseMove">cmdEliminarJSMouseMove</property>
    <property name="jsOnMouseOut">cmdEliminarJSMouseOut</property>
  </object>
  <object class="Button" name="cmdAceptar" >
    <property name="Color">#EBEBEB</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">30</property>
    <property name="Hint">Aceptar</property>
    <property name="ImageSource">Symbol-Check.ico</property>
    <property name="Left">536</property>
    <property name="Name">cmdAceptar</property>
    <property name="ParentColor">0</property>
    <property name="ParentShowHint">0</property>
    <property name="ShowHint">1</property>
    <property name="Top">37</property>
    <property name="Width">40</property>
    <property name="OnClick">cmdAceptarClick</property>
    <property name="jsOnClick">cmdAceptarJSClick</property>
    <property name="jsOnMouseMove">cmdAceptarJSMouseMove</property>
    <property name="jsOnMouseOut">cmdAceptarJSMouseOut</property>
  </object>
  <object class="Button" name="cmdCancelar" >
    <property name="Color">#EBEBEB</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">30</property>
    <property name="Hint">Cancelar</property>
    <property name="ImageSource">Undo.ico</property>
    <property name="Left">580</property>
    <property name="Name">cmdCancelar</property>
    <property name="ParentColor">0</property>
    <property name="ParentShowHint">0</property>
    <property name="ShowHint">1</property>
    <property name="Top">37</property>
    <property name="Width">40</property>
    <property name="jsOnClick">cmdCancelarJSClick</property>
    <property name="jsOnMouseMove">cmdCancelarJSMouseMove</property>
    <property name="jsOnMouseOut">cmdCancelarJSMouseOut</property>
  </object>
  <object class="Button" name="cmdImprimir" >
    <property name="Color">#EBEBEB</property>
    <property name="Font">
    <property name="Family">Verdana</property>
    <property name="Size">10px</property>
    </property>
    <property name="Height">30</property>
    <property name="Hint">Imprimir</property>
    <property name="ImageSource">32px-Crystal_Clear_action_fileprint.ico</property>
    <property name="Left">622</property>
    <property name="Name">cmdImprimir</property>
    <property name="ParentColor">0</property>
    <property name="ParentShowHint">0</property>
    <property name="ShowHint">1</property>
    <property name="Top">36</property>
    <property name="Width">40</property>
    <property name="jsOnClick">cmdImprimirJSClick</property>
    <property name="jsOnMouseMove">cmdImprimirJSMouseMove</property>
    <property name="jsOnMouseOut">cmdImprimirJSMouseOut</property>
  </object>
  <object class="Database" name="base" >
        <property name="Left">784</property>
        <property name="Top">48</property>
    <property name="Connected"></property>
    <property name="DatabaseName">geotechAdal</property>
    <property name="Host">localhost</property>
    <property name="Name">base</property>
    <property name="UserName">root</property>
    <property name="UserPassword">danae</property>
  </object>
  <object class="Datasource" name="SourFicha" >
        <property name="Left">768</property>
        <property name="Top">116</property>
    <property name="DataSet">QryFicha</property>
    <property name="Name">SourFicha</property>
  </object>
  <object class="Query" name="QryFicha" >
        <property name="Left">820</property>
        <property name="Top">113</property>
    <property name="Database">base</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="Name">QryFicha</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL">a:0:{}</property>
  </object>
</object>
?>

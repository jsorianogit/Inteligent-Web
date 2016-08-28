
<html>
<head>
	<title>ActiveWidgets Examples</title>
	<style>body {font: 13px Tahoma}</style>

<!-- include links to the script and stylesheet files -->
<!-- replace "../../runtime" with the actual path to the ActiveWidgets runtime directory on your webserver -->
<!-- if you get ['AW' is undefined] error - check path to the aw.js file -->

	<script src="../../../../ActiveWidgets/runtime/lib/aw.js"></script>
	<link href="../../../../ActiveWidgets/runtime/styles/xp/aw.css" rel="stylesheet"></link>

</head>
<body>

<!-- insert the placeholder tag for the grid control -->
<!-- use the same id attribute as in grid.setId() call below -->
<!-- this tag will be replaced by the script when you call grid.refresh() method -->
<span id="myGrid"></span>

<script>

var cells = {
	getText: function(col, row){return "cell-" + col + "-" + row},
	getImage: function(col, row){return "favorites"},
	getTooltip: function(col, row){return "tooltip text"}
}

var headers = {
	getText: function(col){return "header-" + col}
}

var columns = {
	getCount: function(){return 5}
}

var rows = {
	getCount: function(){return 10}
}

</script>

<!-- insert the script which creates and configures the controls -->
<!-- attach the external data models with setXXXModel() methods -->
<script>

	var grid = new AW.UI.Grid;
	grid.setId("myGrid");
	grid.setCellTemplate(new AW.Templates.ImageText, 0); // show image in the first column
	grid.setCellModel(cells);
	grid.setHeaderModel(headers);
	grid.setColumnModel(columns);
	grid.setRowModel(rows);
	grid.refresh();

</script>
</body>
</html>
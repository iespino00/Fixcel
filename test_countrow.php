<script language="JavaScript">
function prueba() {
	alert(document.getElementById('tabla').tBodies[0].rows[0].cells[0].innerHTML);

  alert(document.getElementById('tabla').tBodies[0].rows[0].cells[1].innerHTML);
    alert(document.getElementById('tabla').tBodies[0].rows[0].cells[2].innerHTML);


}
</script>
</head>

<body onLoad="prueba()">
<table width="100%" border="0" cellspacing="0" cellpadding="0" id="tabla">
<thead>
  <tr>
      <th>ID</th>
      <th>NOMBRES</th>
  </tr>
</thead>
<tbody>
  <tr>
      <td>1</td>
      <td>Iv&aacute;n</td>
  </tr>
  <tr>
      <td>2</td>
      <td>Ale</td>
  </tr>
</tbody>
</table>
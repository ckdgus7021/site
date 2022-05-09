<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - 테이블 페이징 처리하기</title>
  <link rel="stylesheet" href="./paging.css">

</head>
<body>
<!-- partial:index.partial.html -->
<table id="products" border="1">
	<caption>product list
		<form action="" id="setRows">
			<p>
				showing
				<input type="text" name="rowPerPage" value="3">
				item per page
			</p>
		</form>

	</caption>

	<thead>
		<tr>
			<th>No</th>
			<th>Category</th>
			<th>Product</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>1</td>
			<td>Clothing</td>
			<td>Jacket</td>
		</tr>
		<tr>
			<td>2</td>
			<td>life</td>
			<td>dish</td>
		</tr>
		<tr>
			<td>3</td>
			<td>Clothing</td>
			<td>shocks</td>
		</tr>
		<tr>
			<td>4</td>
			<td>Clothing</td>
			<td>sports</td>
		</tr>
		<tr>
			<td>5</td>
			<td>shoes</td>
			<td>nike</td>
		</tr>
		<tr>
			<td>6</td>
			<td>shoes</td>
			<td>addidas</td>
		</tr>
		<tr>
			<td>7</td>
			<td>Bags</td>
			<td>backpack</td>
		</tr>
		<tr>
			<td>8</td>
			<td>Clothing</td>
			<td>Jacket</td>
		</tr>
		<tr>
			<td>9</td>
			<td>shoes</td>
			<td>bonie</td>
		</tr>
		<tr>
			<td>10</td>
			<td>Clothing</td>
			<td>Jacket</td>
		</tr>
	</tbody>

</table>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script><script  src="./paging.js"></script>

</body>
</html>

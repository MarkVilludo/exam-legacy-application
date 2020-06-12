<!DOCTYPE HTML>
<html>
<head>
    <title>Users</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
</head>
<body class="is-preload">
<div id="wrapper">	
	<section id="main">
		<table class="table">
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Comments</th>
				<th>Action</th>
			</tr>
			@if (@$users)
				@foreach ($users as $user)
					<tr>
						<td>{{$user->id}}</td>
						<td>{{$user->name}}</td>
						<td>{{$user->comments}}</td>
						<td>
							<a href="{{url('users', $user->id)}}">
								View
							</a>
						</td>
					</tr>
				@endforeach
			@endif
		</table>
</div>



</body>
</html>

<style>
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {background-color: #f2f2f2;}
</style>
